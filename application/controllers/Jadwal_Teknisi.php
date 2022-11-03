<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_Teknisi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_JadwalTeknisi');
		$this->load->model('M_Produk');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["jadwal_tek"] = $this->M_JadwalTeknisi->getAllJadtek();
		$data["produk"] = $this->M_Produk->getAllprodukshow();
		$this->load->view("dashboard/jadwal_teknisi", $data);
	}



	// Get Save User
	public function save_jadtek()
	{
		$url = $this->input->post('link_youtube');
		preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
		$video_id = $match[1];

		$data = array(
			'no_permohonan'	    => $this->input->post('no_permohonan'),
			'id_produk'	    	=> $this->input->post('id_produk'),
			'pabrik_produk'   	=> $this->input->post('pabrik_produk'),
			'status'			=> "Baru"
		);
		$this->M_Brosur->simpandatajadwaltek($data);
		$this->session->set_flashdata('notif', 'Jadwal berhasil disimpan');
		redirect(base_url('teknisis'));
	}

	// Edit User
	public function edit_jadtek($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["jadwal_tek"] = $this->M_JadwalTeknisi->getID($id);
		$this->load->view("component/_editBrosur", $data);
	}

	// Update User
	public function update_jadtek()
	{
		$id = array(
			'id_produk' => $this->input->post('id_produk')
		);

		$data = array(
			'kode_produk'	    => $this->input->post('kode_produk'),
			'nama_produk'	    => $this->input->post('nama_produk'),
			'jenis_produk'	    => $this->input->post('jenis_produk'),
			'harga_produk'	    => $this->input->post('harga_produk'),
			'quantity_produk'   => $this->input->post('quantity_produk')
		);
		$this->M_JadwalTeknisi->update_jadtek($data, $id);
		$this->session->set_flashdata('notif', 'Jadwal berhasil diupdate');
		redirect(base_url('teknisis'));
	}

	// Delete User akun
	public function delete_jadtek($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_JadwalTeknisi->del_jadtek($id)) {
			$this->session->set_flashdata('notif', 'Jadwal berhasil dihapus');
			redirect(base_url('teknisis'));
		}
	}
}
