<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_User');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["user"] = $this->All_model->getAllUser();
		$this->load->view("dashboard/user", $data);
	}
	// Get Save User
	public function save_user()
	{
		$options = [
			'cost' => 10,
		];

		$data = array(
			'nama_pengguna'	        => $this->input->post('nama_pengguna'),
			'instansi_pengguna'     => $this->input->post('instansi_pengguna'),
			'email_pengguna'	    => $this->input->post('email_pengguna'),
			'telepon_pengguna'      => $this->input->post('telepon_pengguna'),
			'id_role'	            => $this->input->post('id_role'),
			'username_pengguna'	    => $this->input->post('username_pengguna'),
			'password_pengguna'	    => sha1(sha1($this->input->post('password_pengguna'))),
			// 'password_pengguna'	    => password_hash($this->input->post('password_pengguna'),PASSWORD_DEFAULT,$options),
			'foto_pengguna'		    => $this->M_User->_uploadImage()
		);
		$this->M_User->simpandatauser($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('users'));
	}

	// Edit User
	public function edit_user($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["user"] = $this->M_User->getID($id);
		$this->load->view("component/_editPengguna", $data);
	}

	// Update User
	public function update_user()
	{
		$id = array(
			'id_pengguna' => $this->input->post('id_pengguna')
		);

		if (!empty($_FILES['image']['name'])) {
			$update_foto = $this->M_User->_uploadImage();
		} else {
			$update_foto = $this->input->post()["old_image"];
		}

		$data = array(
			'nama_pengguna'	        => $this->input->post('nama_pengguna'),
			'email_pengguna'	    => $this->input->post('email_pengguna'),
			'telepon_pengguna'      => $this->input->post('telepon_pengguna'),
			'id_role'	            => $this->input->post('id_role'),
			'username_pengguna'	    => $this->input->post('username_pengguna'),
			'password_pengguna'	    => $this->input->post('password_pengguna'),
			'foto_pengguna'		    => $update_foto
		);
		$this->M_User->updatedatauser($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('users'));
	}

	public function verifuser($id = null)
	{
		$idp = array(
			'id_pengguna' => $id
		);
		$nama = $this->db->get_where('pengguna', ["id_pengguna" => $id])->row()->nama_pengguna;
		$data = array(
			'terverifikasi' => 1
		);
		$this->M_User->verif_user($data, $idp);
		$this->session->set_flashdata('notif', ucfirst($nama) . ' berhasil terverifikasi');
		redirect(base_url('users'));
	}

	// Delete User akun
	public function deleteuser($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_User->del_user($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('users'));
		}
	}
}
