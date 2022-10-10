<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penawaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_Penawaran');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["instansi"] = $this->M_Penawaran->get_instansi();
		$data["penawaran"] = $this->M_Penawaran->getAllpenawaran();
		$data["produk"] = $this->M_Penawaran->get_produk();
		$this->load->view("dashboard/penawaran", $data);
	}

	// Get Save User
	public function save_penawaran()
	{
		$result = array();
		foreach ($this->input->post('id_produk') as $key => $val) {
			$result[] = array(
				'kode_penawaran'	=> $this->input->post('kode_penawaran'),
				'id_produk'		    => $this->input->post('id_produk')[$key],
				'id_pengguna'	    => $this->input->post('id_pengguna'),
				'qty_penawaran'	    => $this->input->post('qty')[$key],
				'tgl_penawaran'	    => $this->input->post('tgl_penawaran'),
			);
		}
		$this->db->insert_batch('penawaran', $result);
		// $this->M_Penawaran->simpandatapenawaran($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('penawarans'));
	}

	// Edit User
	public function edit_penawaran($id)
	{
		$data["all2"] = $this->M_Penawaran->getInstansi($id);
		$data["penawaran2"] = $this->M_Penawaran->getID($id);
		$this->load->view("component/_editpenawaran", $data);
	}

	// Update User
	public function update_penawaran()
	{
		$id = array(
			'id' => $this->input->post('id')
		);

		$data = array(
			'nama_brosur'	        => $this->input->post('nama_brosur'),
			'deskripsi_brosur'	    => $this->input->post('deskripsi_brosur'),
			'thumb_brosur'     		=> $this->M_Brosur->_uploadImageBrosur(),
			'file_brosur'	        => $this->M_Brosur->_uploadFileBrosur(),
			'link_youtube'	 	    => $this->input->post('link_youtube')
		);
		$this->M_Penawaran->updatedatapenawaran($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('penawarans'));
	}

	// Delete User akun
	public function deletepenawaran($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Penawaran->del_penawaran($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('penawarans'));
		}
	}
	public function __destruct()
	{
		$this->db->close();
	}
}
