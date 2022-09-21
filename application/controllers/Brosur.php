<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brosur extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_Brosur');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["brosur"] = $this->M_Brosur->getAllBrosur();
		$this->load->view("dashboard/brosur", $data);
	}

	// Get Save User
	public function save_brosur()
	{
		$data = array(
			'nama_brosur'	        => $this->input->post('nama_brosur'),
			'deskripsi_brosur'	    => $this->input->post('deskripsi_brosur'),
			'thumb_brosur'     		=> $this->M_Brosur->_uploadImageBrosur(),
			'file_brosur'	        => $this->M_Brosur->_uploadFileBrosur(),
			'link_youtube'	 	    => $this->input->post('link_youtube')
		);
		$this->M_Brosur->simpandatabrosur($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('brosurs'));
	}

	// Edit User
	public function edit_brosur($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["brosur"] = $this->M_Brosur->getID($id);
		$this->load->view("component/_editBrosur", $data);
	}

	// Update User
	public function update_brosur()
	{
		$id = array(
			'id' => $this->input->post('id')
		);

		if (!empty($_FILES['image']['name'])) {
			$update_foto = $this->M_Brosur->_uploadImage();
		} else {
			$update_foto = $this->input->post('thumb_brosur');
		}

		$data = array(
			'nama_brosur'	        => $this->input->post('nama_brosur'),
			'deskripsi_brosur'	    => $this->input->post('deskripsi_brosur'),
			'thumb_brosur'     		=> $this->M_Brosur->_uploadImageBrosur(),
			'file_brosur'	        => $this->M_Brosur->_uploadFileBrosur(),
			'link_youtube'	 	    => $this->input->post('link_youtube')
		);
		$this->M_Brosur->updatedatabrosur($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('brosurs'));
	}

	// Delete User akun
	public function deletebrosur($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Brosur->del_brosur($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('brosurs'));
		}
	}
}
