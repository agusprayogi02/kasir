<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function get_data()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['name'] = 'Kasir';
		$data['jenis'] = 'user';
		$data['color'] = 'primary';
		return $data;
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

	public function get_Item()
	{
		$data = $this->db->get('barang')->result();
		return $data;
	}

	public function getBykd($kd)
	{
		return $this->db->get_where('barang', ['kode_brg' => $kd])->row_array();
	}

	public function getHistori()
	{
		$this->db->select('*');
		$this->db->from('histori');
		$this->db->join('barang', 'barang.kode_brg = histori.kode_brg');
		$data = $this->db->get();
		return $data->result();
	}

	public function getRiwayatByuid($id)
	{
		$data = $this->db->where('uid', $id)->order_by('nomor', 'DESC')->get('riwayat');
		return $data->result();
	}

	public function getRiwayatAll()
	{
		$data = $this->db->join('user', 'user.id = riwayat.uid')->order_by('nomor', 'DESC')->get_where('riwayat', array('onDelete' => '1'));
		return $data->result();
	}

	public function getDetailsHistori($kd)
	{
		$data = $this->db->where('kode_history', $kd)->join('barang', 'barang.kode_brg = histori.kode_brg')->get('histori');
		// var_dump($data);
		// die();
		return $data->result();
	}

	public function getItemByKode($kode)
	{
		$data = $this->db->where('kode_brg', $kode)->get("barang");
		return $data->result();
	}
}

/* End of file User_model.php */
