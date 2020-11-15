<?php
defined('BASEPATH') or exit("No Admin Controller");

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        if (!$this->session->userdata('email')) {
            redirect('auth', 'refresh');
        } else if ($this->session->userdata('role_id') == 2) {
            redirect(base_url('user'), 'refresh');
        }
    }

    public function index()
    {
        $data = $this->admin_model->get_data();
        $data['list_item'] = $this->admin_model->get_itemAll();
        $data['title'] = "Admin Page";
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/admin_navbar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/user_footer');
    }

    public function list_user()
    {
        $data = $this->admin_model->get_data();
        $data['list'] = $this->admin_model->get_list_user(2);
        $data['title'] = "List Users";
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/admin_navbar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/list_user', $data);
        $this->load->view('templates/user_footer');
    }
    public function delete_user($id = null)
    {
        $this->db->delete('user', ['id' => $id]);
        $rest = $this->db->affected_rows();
        if ($rest == 0) {
            // $this->session->set_flashdata('error', "<script>$('#error').modal('show')</script>");
            $this->session->set_flashdata('error', '<script>window.alert("Error! Not account can be deleted!");</script>');
        } else {
            $this->session->set_flashdata('error', '<script>window.alert("Success! The account have Deleted!");</script>');
        }
        redirect('admin/list_user', 'refresh');
    }

    public function block_user($id = null)
    {
        $this->db->set('is_active', '0');
        $this->db->where('id', $id);
        $this->db->update('user');
        $rest = $this->db->affected_rows();
        if ($rest == 0) {
            $this->session->set_flashdata('error', '<script>window.alert("Error! Not account can be Blocked!");</script>');
        } else {
            $this->session->set_flashdata('error', '<script>window.alert("Success! The account have Blocked!");</script>');
        }
        redirect('admin/list_user', 'refresh');
    }

    public function active_user($id = null)
    {
        $this->db->set('is_active', '1');
        $this->db->where('id', $id);
        $this->db->update('user');
        $rest = $this->db->affected_rows();
        if ($rest == 0) {
            $this->session->set_flashdata('error', '<script>window.alert("Error! Not account can be activated!");</script>');
        } else {
            $this->session->set_flashdata('error', '<script>window.alert("Success! The account have activated!");</script>');
        }
        redirect('admin/list_user', 'refresh');
    }

    public function change_user()
    {
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[user.email]', [
            'is_unique' => 'The Email already exists!'
        ]);
        $name = htmlspecialchars($this->input->get_post('name', true));
        $email = htmlspecialchars($this->input->get_post('email', true));
        $id = $this->input->get_post('id');
        $data = [
            'name' => $name,
            'email' => $email
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');
        $rest = $this->db->affected_rows();
        if ($rest == 0) {
            $this->session->set_flashdata('error', '<script>window.alert("Error! Not account can be Changed!");</script>');
        } else {
            $this->session->set_flashdata('error', '<script>window.alert("Success! The account have Changed!");</script>');
        }
        redirect('admin/list_user', 'refresh');
    }

    public function delete_barang($id = null)
    {
        $this->db->delete('barang', ['kode_brg' => $id]);
        $rest = $this->db->affected_rows();
        if ($rest == 0) {
            // $this->session->set_flashdata('error', "<script>$('#error').modal('show')</script>");
            $this->session->set_flashdata('error', '<script>window.alert("Error! Not Item can be deleted!");</script>');
        }
        $this->session->set_flashdata('error', '<script>window.alert("Success! Item have ben deleted!");</script>');
        redirect('admin/index', 'refresh');
    }

    public function add_stok()
    {
        $id = $this->input->get_post('id');
        $stok = $this->input->get_post('item');
        $data = $this->db->get_where('barang', ['kode_brg' => $id])->row_array();
        if (intval($data['stock_brg']) == null) {
            $data['stock_brg'] = 0;
        }
        $stok = intval($stok) + intval($data['stock_brg']);
        if ($stok < 0) {
            $stok = 0;
        }
        $this->db->set('stock_brg', $stok);
        $this->db->where('kode_brg', $id);
        $this->db->update('barang');
        if ($this->db->affected_rows() < 0) {
            $this->session->set_flashdata('error', '<script>window.alert("Error! Not Item can be Changed!");</script>');
        }
        redirect('admin/index', 'refresh');
    }

    public function change_item()
    {
        $name = htmlspecialchars($this->input->post('name', true));
        $id = htmlspecialchars($this->input->post('id', true));
        $price = $this->input->post('price');
        $image = $this->admin_model->_uploadImage();
        if (trim($name) == '' || trim($price) == '') {
            $this->session->set_flashdata('error', '<script>window.alert("Error! Input did\'n Null!");</script>');
            redirect('admin', 'refresh');
        } elseif ($image == 'error') {
            $arr = $this->db->get_where('barang', ['kode_brg' => $id])->row_array();
            $image = $arr['image_brg'];
        }
        $this->db->set([
            'name_brg' => $name,
            'price_brg' => $price,
            'image_brg' => $image
        ]);
        $this->db->where('kode_brg', $id);
        $this->db->update('barang');
        if ($this->db->affected_rows() < 0) {
            $this->session->set_flashdata('error', '<script>window.alert("Error! Not Item can be Changed!");</script>');
        }
        redirect('admin', 'refresh');
    }

    public function add_item()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stock', 'trim|required');
        // $this->form_validation->set_rules('image', 'Image', 'trim|required');

        if ($this->form_validation->run() == true) {
            $this->save();
        } else {
            $data = $this->admin_model->get_data();
            $data['list_item'] = $this->admin_model->get_itemAll();
            $data['title'] = "Add New Item";
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/admin_navbar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/add_item', $data);
            $this->load->view('templates/user_footer');
        }
    }

    public function save()
    {
        $id = $this->session->userdata('id');
        $image = $this->admin_model->_uploadImage();
        if ($image == 'error') {
            $this->session->set_flashdata('error', '<script>window.alert("Error! Don\'t a Image Is Uploaded!");</script>');
            redirect('admin/add_item', 'refresh');
        } else {
            $kode = "U" + $id + "KD" + random_int(1, 9999);
            $save = [
                'kode_brg' => $kode,
                'name_brg' => htmlspecialchars($this->input->post('name', true)),
                'price_brg' => htmlspecialchars($this->input->post('price', true)),
                'image_brg' => $image,
                'stock_brg' => htmlspecialchars($this->input->post('stok', true)),
            ];
            $this->db->insert('barang', $save);
            $this->session->set_flashdata('error', '<script>window.alert("Success! Item successfully created!");</script>');
            redirect(base_url('admin/index'));
        }
    }

    public function profile()
    {
        $data = $this->admin_model->get_data();
        $data['list_item'] = $this->admin_model->get_itemAll();
        $data['title'] = "Profile";

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/admin_navbar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/user_footer');
    }

    public function setting()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data = $this->admin_model->get_data();
            $data['list_item'] = $this->admin_model->get_itemAll();
            $data['title'] = "Setting";
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/admin_navbar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/setting', $data);
            $this->load->view('templates/user_footer');
        } else {
            $id = $this->session->userdata('id');
            $image = $this->admin_model->imageProfile();
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
            } else {
                $this->session->set_flashdata('error', '<script>window.alert("Success! User successfully Updated!");</script>');
            }
            redirect(base_url('admin/profile'));
        }
    }

    public function histori()
    {
        $data = $this->admin_model->get_data();
        $data['histori'] = $this->user_model->getRiwayatAll();
        $data['title'] = "Histori";
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/admin_navbar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/histori', $data);
        $this->load->view('templates/user_footer');
    }

    public function detail($kd = "")
    {
        if ($kd == "") {
            $this->session->set_flashdata('error', '<script>window.alert("Error! Failed no code exists!");</script>');
            redirect(base_url('user/histori'));
        }
        $data = $this->admin_model->get_data();
        $data['title'] = "Details History";
        $data['histori'] = $this->user_model->getDetailsHistori($kd);
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail-histori', $data);
        $this->load->view('templates/user_footer');
    }

    public function delete($kd = "")
    {
        if ($kd != "") {
            $this->admin_model->deleteHistori($kd);
            $this->session->set_flashdata('success', '<script>window.alert("Success! successfully deleted!");</script>');
            redirect(base_url('admin/histori'));
        } else {
            $this->session->set_flashdata('error', '<script>window.alert("Error! Failed no code exists!");</script>');
            redirect(base_url('admin/histori'));
        }
    }
}
