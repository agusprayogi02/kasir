<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin_model');
		if ($this->input->cookie('user_login')) {
			$data = json_decode(get_cookie('user_login', true), true);
			$this->session->set_userdata($data);
		}
	}


	public function index()
	{
		if ($this->session->userdata('role_id') == 1) {
			redirect('admin/index');
		} else if ($this->session->userdata('role_id') == 2) {
			redirect('user/index', 'refresh');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Login page";
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($pass, $user['password'])) {
					$data = array(
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'id' => $user['id']
					);
					$this->session->set_userdata($data);
					if ($this->input->post('remember') == 'on') {
						$this->input->set_cookie('user_login', json_encode($data), time() + 86400);
					}
					if ($user['role_id'] == 1) {
						redirect('admin/index');
					}
					redirect('user/index');
				} else {
					$this->session->set_flashdata('succes', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> Password is Wrong!
				</div>');

					redirect('auth', 'refresh');
				}
			} else {
				$this->session->set_flashdata('succes', '<script>window.alert("Error! Account blocked by admin!");</script>');
				redirect('auth/index', 'refresh');
			}
		} else {
			$this->session->set_flashdata('succes', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> Email not registered
			</div>');
			redirect('auth', 'refresh');
		}
	}

	public function registration()
	{
		if (!$this->session->userdata('email')) {
			$this->session->set_flashdata('succes', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> You not have Login admin!
			</div>');
			redirect('auth', 'refresh');
		} else if ($this->session->userdata('role_id') == 2) {
			redirect(base_url('user'), 'refresh');
		}
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[user.email]', [
			'is_unique' => 'The Email already exists!'
		]);
		$this->form_validation->set_rules('password1', 'Fist Password', 'trim|required|min_length[6]', [
			'min_lenght' => 'Password too Short!'
		]);
		$this->form_validation->set_rules('password2', 'Repeat Password', "matches[password1]", [
			'matches' => 'Password not match!'
		]);


		if ($this->form_validation->run() == false) {
			$data = $this->admin_model->get_data();
			$data['title'] = "Registration New user";
			// $this->load->view('templates/auth_header', $data);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/admin_navbar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/user_footer');
		} else {
			$data = array(
				'name' => htmlspecialchars($this->input->post('fullname', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'user.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			);
			$this->db->insert('user', $data);
			$this->session->set_flashdata('succes', '<script>window.alert("Success! Account successfully created!");</script>');
			redirect(base_url('admin/list_user'));
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->sess_destroy();
		delete_cookie('user_login');
		$this->session->set_flashdata('succes', '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success!</strong> You have been Logged out!
			</div>');
		redirect('auth', 'refresh');
	}
}
