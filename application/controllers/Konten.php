<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_Konten');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["distributor"] = $this->M_Konten->getDistributor();
		$data["konten"] = $this->M_Konten->getAlldata();
		$this->load->view("dashboard/konten", $data);
	}

	public function brosur()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["brosur"] = $this->M_Brosur->getAllBrosur();
		$this->load->view("user/brosur", $data);
	}


	// Get Save User
	public function save_dst()
	{
		$data = array(
			'nama_produk'	        => $this->input->post('nama_produk'),
			'informasi_produk'	 	=> $this->M_Konten->_uploadInformasiKonten(),
			'tagline_produk'	    => $this->input->post('tagline_produk'),
			'kategori_produk'	    => $this->input->post('kategori_produk'),
			'kode_produk'	    	=> $this->input->post('kode_produk'),
			'gambar1_produk'	    => $this->M_Konten->_uploadImageKonten(),
			'feature_produk'	 	=> $this->input->post('kode_produk'),
			'file_produk'	  		=> $this->M_Konten->_uploadFilekonten()
		);
		$this->M_Konten->simpandatakonten($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('dst'));
	}

	// Edit User
	public function edit_dst($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["brosur"] = $this->M_Brosur->getID($id);
		$this->load->view("component/_editBrosur", $data);
	}

	// Update User
	public function update_dst()
	{
		$id = array(
			'id' => $this->input->post('id')
		);
		$url = $this->input->post('link_youtube');
		preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
		$video_id = $match[1];

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
			'link_youtube'	 	    => $video_id
		);
		$this->M_Brosur->updatedatabrosur($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('dst'));
	}

	// Delete User akun
	public function deletedst($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Brosur->del_brosur($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('dst'));
		}
	}
}
