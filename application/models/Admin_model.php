<?php

class Admin_model extends CI_model
{
    public function get_data()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['name'] = 'Admin Kasir';
        $data['jenis'] = 'admin';
        $data['color'] = 'danger';
        return $data;
    }

    public function get_list_user($id = null)
    {
        $data = $this->db->get_where('user', ['role_id' => $id]);
        return $data->result();
    }

    public function get_itemAll()
    {
        $data = $this->db->get('barang');
        return $data->result();
    }

    public function _uploadImage()
    {
        $config['upload_path'] = './assets/img/barang/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = uniqid();
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            return "error";
        } else {
            return $this->upload->data("file_name");
        }
        return 'barang.png';
    }

    public function imageProfile()
    {
        $config['upload_path'] = './assets/img/profiles/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = uniqid();
        $config['max_size'] = '1024';
        $config['overwrite'] = true;
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('imageProfile')) {
            $data = $this->get_data();
            $image = $data['user']['image'];
            return $image;
        } else {
            return $this->upload->data("file_name");
        }
        return 'user.png';
    }
}
