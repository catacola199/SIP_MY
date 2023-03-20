	<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Produk extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('All_model');
			$this->load->model('M_Produk');
			if ($this->All_model->isNotLogin()) redirect(site_url(''));
			$this->load->helper('url');
		}

		public function index()
		{
			$data["role"] = $this->All_model->getAllRole();
			$data["produk"] = $this->M_Produk->getAllproduk();
			$this->load->view("dashboard/produk", $data);
		}

		// Get Save User
		public function save_produk()
		{
			$data = array(
				
				'nama_produk'	    => $this->input->post('nama_produk'),
				'merk_produk'	    => $this->input->post('merk_produk'),
				'tipe_produk'	    => $this->input->post('tipe_produk')

			);
			$this->M_Produk->simpandataproduk($data);
			$this->session->set_flashdata('notif', 'Data berhasil disimpan');
			redirect(base_url('produks'));
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
