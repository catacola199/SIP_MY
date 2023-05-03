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
		$data["kategori"] = $this->M_Konten->getKategori();
		$data["konten"] = $this->M_Konten->getAlldata();
		$this->load->view("dashboard/konten", $data);
	}

	// Get Save User
	public function simpan_konten()
	{
		$data = array(
			'nama_produk'	        => $this->input->post('nama_produk'),
			'konten_id'	        	=> $this->input->post('konten_id'),
			'informasi_produk'	 	=> $this->M_Konten->_uploadInformasiKonten(),
			'tagline_produk'	    => $this->input->post('tagline_produk'),
			'jenis_kode_produk'	    => $this->input->post('jenis_kode_produk'),
			'kode_produk'	    	=> $this->input->post('kode_produk'),
			'feature_produk'	 	=> $this->input->post('feature_produk'),
			'file_produk'	  		=> $this->M_Konten->_uploadFilekonten()
		);
		$this->M_Konten->simpandatakonten($data);
		$this->upload_gambar();
		$this->kategori();
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('kontens'));
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
	public function deletekonten($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Konten->del_brosur($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('dst'));
		}
	}

	public function upload_gambar(){
		// Konfigurasi upload
		$config = array();
		$config['upload_path'] = './upload/konten/gambar'; // Folder tempat menyimpan gambar
		$config['allowed_types'] = 'jpg|jpeg|png|gif'; // Tipe file yang diperbolehkan
		$config['max_size'] = 5000; // Ukuran file maksimal (dalam kilobyte)

		$this->load->library('upload', $config,'uploadGambarproduk');
		$this->uploadGambarproduk->initialize($config);

		// Looping untuk mengupload multiple gambar
		foreach ($_FILES['gambar_produk']['name'] as $key => $value) {
			$_FILES['file']['name'] = $_FILES['gambar_produk']['name'][$key];
			$_FILES['file']['type'] = $_FILES['gambar_produk']['type'][$key];
			$_FILES['file']['tmp_name'] = $_FILES['gambar_produk']['tmp_name'][$key];
			$_FILES['file']['error'] = $_FILES['gambar_produk']['error'][$key];
			$_FILES['file']['size'] = $_FILES['gambar_produk']['size'][$key];

			// Upload gambar
			if ($this->uploadGambarproduk->do_upload('file')) {
				$uploadData = $this->uploadGambarproduk->data();
				$fullPath = base_url() .'upload/konten/gambar/'. $uploadData['file_name'];
				// Menyimpan informasi gambar ke database
				$data = array(
					'konten_id'  	=> $this->input->post('konten_id'),
					'gambar_produk'	 	=> $fullPath,
				);
				$this->db->insert('produk_detail_gambar', $data);
			} else {
				// Jika upload gagal, tangani error sesuai kebutuhan Anda
				$error = $this->uploadGambarproduk->display_errors();
			}
		}
	}

	public function kategori(){
		$pilihan = $this->input->post('check_list'); // Ambil data checkbox dari form
		$data = array(); // Buat array kosong untuk menyimpan data yang akan diupload

		// Looping untuk mengambil data checkbox
		foreach ($pilihan as $value) {
			$data[] = array(
				'konten_id'  	=> $this->input->post('konten_id'),
				'nama_kategori' => $value,
			);
		}

		// Menyimpan data checkbox ke database
		if (!empty($data)) {
			$this->db->insert_batch('produk_detail_kategori', $data);
		}
	}


}
