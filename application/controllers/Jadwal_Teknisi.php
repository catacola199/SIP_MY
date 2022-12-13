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
		$data["jadwal_tek"] = $this->M_JadwalTeknisi->getDetails();
		$data["jadwal_teknisi"] = $this->M_JadwalTeknisi->getJadwal();
		$data["teknisi"] = $this->M_JadwalTeknisi->getTeknisi();
		$data["produk"] = $this->M_Produk->getAllprodukshow();
		$data["jadwal_produk"] = $this->M_JadwalTeknisi->getProdukperPermohonan();
		$this->load->view("dashboard/jadwal_teknisi", $data);
	}

	// Save No Permohonan
	public function save_jadtek()
	{
		$result = array();
		foreach ($this->input->post('id_produk_baru') as $key => $val) {
			$result[] = array(
				'no_permohonan'	    => $this->input->post('no_permohonan'),
				'nama_rs' 			=> $this->input->post('nama_rs'),
				'alamat_rs' 		=> $this->input->post('alamat_rs'),
				'pic_name' 			=> $this->input->post('pic_name'),
				'pic_phone' 		=> $this->input->post('pic_phone'),
				'kategori'	    	=> $this->input->post('kategori_jadwal'),
				'id_produk'		    => $this->input->post('id_produk_baru')[$key],
				'pabrik_produk'   	=> $this->input->post('pabrik')[$key],
				'nama_rs' 			=> $this->input->post('nama_rs'),
				'alamat_rs' 		=> $this->input->post('alamat_rs'),
				'pic_name' 			=> $this->input->post('pic_name'),
				'pic_phone' 		=> $this->input->post('pic_phone')
			);
		}

		$this->M_JadwalTeknisi->simpandatajadtek($result);
		$this->session->set_flashdata('notif', 'Permohonan berhasil disimpan');
		redirect(base_url('teknisis'));
	}

	// Update Terjadwal
	public function update_terjadwal()
	{
		$id = array(
			'no_permohonan' => $this->input->post('no_permohonan')
		);
		$data = array(
			'no_permohonan' 	=> $this->input->post('no_permohonan'),
			'id_pengguna'	    => $this->input->post('id_pengguna'),
			'id_permohonan' 		=> $this->input->post('id_permohonan'),
			'nama_teknisi'	    => $this->input->post('nama_teknisi'),
			'nama_driver'	    => $this->input->post('nama_driver'),
			'tgl_jadwal'   		=> $this->input->post('tgl_jadwal'),
			'file_invoice'   	=> $this->M_JadwalTeknisi->_uploadFileInvoice()
		);

		$data1 = array(
			'status'			=> "Terjadwal"
		);
		//tambah data 
		$this->M_JadwalTeknisi->simpandataterjadwal($data);
		// update status
		$this->M_JadwalTeknisi->update_jadtek($data1, $id);

		$this->session->set_flashdata('notif', 'Jadwal berhasil diupdate');
		redirect(base_url('teknisis'));
	}

	// Update Selesai Jadwal
	public function update_selesai()
	{
		$id = array(
			'no_permohonan' => $this->input->post('no_permohonan')
		);
		$data = array(
			'no_permohonan'	    => $this->input->post('no_permohonan'),
			'metode_bayar'	    => $this->input->post('pembayaran'),
			'bukti_bayar'   	=> $this->M_JadwalTeknisi->_uploadFileBuktiBayar(),
			'keterangan'   		=> $this->input->post('keterangan')
		);

		$data1 = array(
			'status'			=> $this->input->post('status')
		);
		//tambah data 
		$this->M_JadwalTeknisi->simpandataselesai($data);
		// update status
		$this->M_JadwalTeknisi->update_jadtek($data1, $id);

		$this->session->set_flashdata('notif', 'Jadwal berhasil diupdate');
		redirect(base_url('teknisis'));
	}
	// Update User
	public function update_baru()
	{
		$id = array(
			'id_permohonan' => $this->input->post('id_permohonan')
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

	// Delete jadwal
	public function delete_jadtek($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_JadwalTeknisi->del_all($id)) {
			$this->session->set_flashdata('notif', 'Jadwal berhasil dihapus');
			redirect(base_url('teknisis'));
		}
	}

	// Edit User
	public function edit_jadtek($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["jadwal_tek"] = $this->M_JadwalTeknisi->getID($id);
		$this->load->view("component/_editBrosur", $data);
	}
}
