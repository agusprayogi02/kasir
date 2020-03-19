<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('auth', 'refresh');
        } else if ($this->session->userdata('role_id') == 1) {
            redirect(base_url('admin'), 'refresh');
        }
    }

    public function index()
    {
        $data = $this->user_model->get_data();
        $data['title'] = "Dashboard";
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_footer');
    }

    public function profile()
    {
        $data = $this->user_model->get_data();
        $data['title'] = "Profile";
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/user_footer');
    }

    public function setting()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data = $this->user_model->get_data();
            $data['title'] = "Setting";
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_navbar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/setting', $data);
            $this->load->view('templates/user_footer');
        } else {
            $id = $this->session->userdata('id');
            $image = $this->user_model->imageProfile();
            $name = $this->input->post('name');
            $update = [
                'name' => $name,
                'image' => $image
            ];
            $this->db->set($update);
            $this->db->where('id', $id);
            $this->db->update('user');
            if ($this->db->affected_rows() < 0) {
                $this->session->set_flashdata('error', '<script>window.alert("Error! Image is Not valid!");</script>');
                redirect(base_url('user/profile'));
            } else {
                $this->session->set_flashdata('error', '<script>window.alert("Success! User successfully Updated!");</script>');
                redirect(base_url('user/profile'));
            }
        }
    }
}
