<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
		$this->load->view("dashboard/profil_user",$data);
	}

	public function update_user()
	{
		$id = array(
			'id_pengguna' => $this->input->post('id_pengguna')
		);

		if ($_FILES['image']['size'] > 5094) {
			$this->session->set_flashdata('error', 'Ukuran file terlalu besar, Coba untuk lebih kecil lagi!');
			redirect(base_url('profiles'));
		} else {
			if (!empty($_FILES['image']['name'])) {
				$update_foto = $this->M_User->_uploadImage();
			} else {
				$update_foto = $this->input->post()["old_image"];
			}
	
			$data = array(
				'nama_pengguna'	        => $this->input->post('nama_pengguna'),
				'instansi_pengguna'	    => $this->input->post('instansi_pengguna'),
				'email_pengguna'	    => $this->input->post('email_pengguna'),
				'telepon_pengguna'      => $this->input->post('telepon_pengguna'),
				'id_role'	            => $this->input->post('id_role'),
				'username_pengguna'	    => $this->input->post('username_pengguna'),
				'foto_pengguna'		    => $update_foto
			);
			$this->M_User->updatedatauser($data, $id);
			$this->session->set_flashdata('notif', 'Data berhasil diupdate');	
			redirect(base_url('profiles'));
		}
	}
	public function update_pass()
	{
		$id = array(
			'id_pengguna' => $this->input->post('id_pengguna')
		);

		$id_pengguna = $this->input->post('id_pengguna'); 
		$pass = sha1(sha1($this->input->post('password_pengguna_lama')));
		$hash = $this->db->get_where('pengguna', ["id_pengguna" => $id_pengguna])->row()->password_pengguna;
		if ($pass == $hash){
			$data = array(
				'password_pengguna'	    => sha1(sha1($this->input->post('password_pengguna_konfirm')))
			);
			$this->M_User->updatedatauser($data, $id);
			$this->session->set_flashdata('notif', 'Password berhasil diupdate');
			redirect(base_url('profiles'));
		}else{
			$this->session->set_flashdata('error', 'Password lama tidak ditemukan!');
			redirect(base_url('profiles'));
		}
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
