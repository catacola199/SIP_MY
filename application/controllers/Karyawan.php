<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_Produk');
		$this->load->model('M_Karyawan');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["karyawan"] = $this->M_Karyawan->getAllKaryawan();
		$this->load->view("dashboard/karyawan", $data);
	}
	function getUser()
	{
		$data = $this->M_Karyawan->getAllKaryawan();
		echo json_encode(array("data" => $data));
	}
	// Get Save User
	public function simpanData()
	{
		$lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
		$masuk =  date("Y-m-d", strtotime($this->input->post('tgl_masuk')));
		$karyawan = array(
			'karyawan_nip'	=> $this->security->xss_clean($this->input->post('nip')),
			'karyawan_nik'	=> $this->security->xss_clean($this->input->post('nip')),
			'karyawan_nama'	=> $this->security->xss_clean($this->input->post('nama')),
			'karyawan_npwp'	=> $this->security->xss_clean($this->input->post('npwp')),
			'provinsi_id'	=> $this->security->xss_clean($this->input->post('provinsi')),
			'kabupaten_id'	=> $this->security->xss_clean($this->input->post('kabupaten')),
			'kecamatan_id'	=> $this->security->xss_clean($this->input->post('kecamatan')),
			'desa_id'		=> $this->security->xss_clean($this->input->post('desa')),
			'karyawan_alamat'	=> $this->security->xss_clean($this->input->post('alamat_lengkap')),
			'karyawan_tmplahir'	=> $this->security->xss_clean($this->input->post('tempat_lahir')),
			'karyawan_tgllahir'	=> $this->security->xss_clean($lahir),
			'karyawan_goldar'	=> $this->security->xss_clean($this->input->post('goldar')),
			'karyawan_email'	=> $this->security->xss_clean($this->input->post('email')),
			'karyawan_tglmasuk'	=> $this->security->xss_clean($masuk)
		);

		$user = array(
			'karyawan_nip'	=> $this->security->xss_clean($this->input->post('nip')),
			'user_roleid'	=> $this->security->xss_clean($this->input->post('role')),
			'user_image'	=> $this->security->xss_clean($this->input->post('formFile'))
		);
		$this->M_Karyawan->SimpanDataKaryawan($karyawan);
	}

	// Edit User
	public function edit_produk($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["produk"] = $this->M_Produk->getID($id);
		$this->load->view("component/_editProduk", $data);
	}

	// Update User
	public function update_produk()
	{
		$id = array(
			'id_produk' => $this->input->post('id_produk')
		);

		$data = array(

			'nama_produk'	    => $this->input->post('nama_produk'),
			'jenis_produk'	    => $this->input->post('jenis_produk'),
			'merk_produk'	    => $this->input->post('merk_produk'),
			'tipe_produk'	    => $this->input->post('tipe_produk')

		);
		$this->M_Produk->updatedataproduk($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('produks'));
	}

	// Delete User akun
	public function deleteproduk($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Produk->del_produk($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('produks'));
		}
	}
}
