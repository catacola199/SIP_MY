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
		if ($this->All_model->rolePengguna()) redirect(site_url('404_override'));

		$data["role"] = $this->All_model->getAllRole();
		$data["jadwal_tek"] = $this->M_JadwalTeknisi->getDetails();
		$data["jadwal_teknisi"] = $this->M_JadwalTeknisi->getJadwal();
		$data["teknisi"] = $this->M_JadwalTeknisi->getTeknisi();
		$data["produk"] = $this->M_Produk->getAllprodukshow();
		$data["jadwal_produk"] = $this->M_JadwalTeknisi->getProdukperPermohonan();
		$data["bap_tertunda"] = $this->M_JadwalTeknisi->getBapTertundaperID();
		$this->load->view("dashboard/jadwal_teknisi_admin", $data);
	}

	public function usertek()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["jadwal_tek"] = $this->M_JadwalTeknisi->getDetails();
		$data["jadwal_teknisi"] = $this->M_JadwalTeknisi->getJadwalperTeknisi();
		$data["teknisi"] = $this->M_JadwalTeknisi->getTeknisi();
		$data["produk"] = $this->M_Produk->getAllprodukshow();
		$data["jadwal_produk"] = $this->M_JadwalTeknisi->getProdukperPermohonan();
		$data["bap_tertunda"] = $this->M_JadwalTeknisi->getBapTertundaperID();
		$this->load->view("dashboard/user_teknisi", $data);
	}

	// Save No Permohonan
	public function save_jadtek()
	{
		$checkboxes = $this->input->post('check_list');
		$kategori = implode(",", $checkboxes);
		$result = array();
		$no_permohonan = $this->input->post('no_permohonan_a') . $this->input->post('no_permohonan_b') . $this->input->post('no_permohonan_c');
		foreach ($this->input->post('id_produk_baru') as $key => $val) {
			$result[] = array(
				'no_permohonan'	    => $no_permohonan,
				'nama_rs' 			=> $this->input->post('nama_rs'),
				'alamat_rs' 		=> $this->input->post('alamat_rs'),
				'pic_name' 			=> $this->input->post('pic_name'),
				'pic_phone' 		=> $this->input->post('pic_phone'),
				'kategori'	    	=> $kategori,
				'id_produk'		    => $this->input->post('id_produk_baru')[$key],
				'pabrik_produk'   	=> $this->input->post('pabrik')[$key],
				'nama_rs' 			=> $this->input->post('nama_rs'),
				'alamat_rs' 		=> $this->input->post('alamat_rs'),
				'pic_name' 			=> $this->input->post('pic_name'),
				'pic_phone' 		=> $this->input->post('pic_phone')
			);
		}

		$data = array(
			'no_permohonan' 	=> $no_permohonan,
			'id_pengguna'	    => $this->input->post('id_pengguna'),
			'file_st' 			=> $this->M_JadwalTeknisi->_uploadFileSuratTugas(),
			'nama_driver'	    => $this->input->post('nama_driver'),
			'tgl_jadwal'   		=> $this->input->post('tgl_jadwal'),
			'insentif'   		=> $this->input->post('insentif'),
			'file_penawaran'   	=> $this->M_JadwalTeknisi->_uploadFileterjadwal()
		);

		$this->M_JadwalTeknisi->simpandatajadtek($result);
		$this->M_JadwalTeknisi->simpandataterjadwal($data);
		$this->session->set_flashdata('notif', 'Jadwal berhasil disimpan');
		redirect(base_url('teknisii'));
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
			'nama_driver'	    => $this->input->post('nama_driver'),
			'tgl_jadwal'   		=> $this->input->post('tgl_jadwal'),
			'file_penawaran'   	=> $this->M_JadwalTeknisi->_uploadFileterjadwal()
		);

		$data1 = array(
			'status'			=> "TERJADWAL"
		);
		//tambah data 
		$this->M_JadwalTeknisi->simpandataterjadwal($data);
		// update status
		$this->M_JadwalTeknisi->update_jadtek($data1, $id);

		$this->session->set_flashdata('notif', 'Jadwal berhasil diupdate');
		redirect(base_url('teknisii'));
	}



	public function update_tertunda()
	{
		$id = array(
			'no_permohonan' => $this->input->post('no_permohonan')
		);
		// $data = array(
		// 	'no_permohonan'	    => $this->input->post('no_permohonan'),
		// 	'ket_tertunda'	    	=> $this->input->post('ket_tunda')
		// );

		$data1 = array(
			'status'			=> "TERTUNDA"
		);
		//tambah data 
		$this->M_JadwalTeknisi->uploadFileBap_tertunda();
		// update status
		$this->M_JadwalTeknisi->update_jadtek($data1, $id);

		$this->session->set_flashdata('notif', 'Jadwal berhasil diupdate');
		redirect(base_url('usertek'));
	}

	public function update_uploadDoc()
	{
		$id = $this->input->post('no_permohonan');
		$idpermohonan = array(
			'no_permohonan' => $this->input->post('no_permohonan')
		);
		$data1 = array(
			'status'			=> "TERUNGGAH"
		);
		$data2 = array(
			'file_kuisioner'   	=> $this->M_JadwalTeknisi->_uploadFileKuisioner(),
			'file_sj'   	=> $this->M_JadwalTeknisi->_uploadFileSuratJalan()
		);

		//Update Terjadwal
		
		$this->M_JadwalTeknisi->update_filePenawaran($data2, $idpermohonan);
		//Upload Dokumen
		$this->M_JadwalTeknisi->_uploadFileBap();
		// update status
		$this->M_JadwalTeknisi->update_jadtek($data1, $idpermohonan);

		$this->session->set_flashdata('notif', 'Jadwal berhasil diupdate');
		redirect(base_url('usertek'));
	}

	public function update_file_tek()
	{	
		$jumlah_berkas = count($_FILES['file_bap']['name']);
        for ($i = 0; $i < $jumlah_berkas; $i++) {
			if (!empty($_FILES['file_bap']['name'][$i])) {
				$data = array(
					'dokumen_bap'   	=> $_FILES['file_bap']['name'][$i]
				);
				$id = array(
					'id_dokumen' => $this->input->post('id_dokumen')[$i]
				);
				$id_dokumen = $this->input->post('id_dokumen')[$i];
				$this->M_JadwalTeknisi->update_dokumen($data, $id);
				// $this->M_JadwalTeknisi->_deleteFileBAP($id_dokumen);

			}
		}

		$this->M_JadwalTeknisi->gantiFileBAP();
		$this->session->set_flashdata('notif', 'Jadwal berhasil diupdate');
		redirect(base_url('usertek'));
	}

	public function update_jadwal()
	{
		$idpermohonan = $this->input->post('no_permohonan');
		$id = array(
			'no_permohonan' => $this->input->post('no_permohonan')
		);
		
		if (!empty($_FILES["file_st"]["name"])) {
			$data = array(
				'id_pengguna'	    => $this->input->post('id_pengguna'),
				'tgl_jadwal'   		=> $this->input->post('tgl_jadwal'),
				'file_st' 			=> $this->M_JadwalTeknisi->_uploadFileSuratTugas()
			);
			$this->M_JadwalTeknisi->_deleteFileSuratTugas($idpermohonan);
		} else {
			$data = array(
				'id_pengguna'	    => $this->input->post('id_pengguna'),
				'tgl_jadwal'   		=> $this->input->post('tgl_jadwal'),
				
			);
		}
		//tambah data 
		$this->M_JadwalTeknisi->update_filePenawaran($data, $id);
		$this->session->set_flashdata('notif', 'Jadwal berhasil diupdate');
		redirect(base_url('teknisii'));
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
			'file_buktibayar'  	=> $this->M_JadwalTeknisi->_uploadFileBuktiBayar(),
			'file_invoice'  	=> $this->M_JadwalTeknisi->_uploadFileInvoice(),
			'keterangan'   		=> $this->input->post('keterangan')
		);

		$data1 = array(
			'status'			=> $this->input->post('status')
		);

		$data2 = array(
			'file_penawaran_akhir' 	=> $this->M_JadwalTeknisi->_uploadFilePenawaranAkhir()
		);

		//update penawaran
		$this->M_JadwalTeknisi->update_filePenawaran($data2, $id);
		//tambah data 
		$this->M_JadwalTeknisi->simpandataselesai($data);
		// update status
		$this->M_JadwalTeknisi->update_jadtek($data1, $id);

		$this->session->set_flashdata('notif', 'data selesai');
		redirect(base_url('teknisii'));
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
		redirect(base_url('teknisii'));
	}

	// Delete jadwal
	public function delete_jadtek($id = null)
	{
		$query = $this->db->get('teknisi_nopermohonan')->result();
		foreach ($query as $data) {
			if (md5($data->no_permohonan) === $id) {
				$no = $data->no_permohonan;
			}
		}
		if (!isset($id)) show_404();

		if ($this->M_JadwalTeknisi->del_all($no)) {
			$this->session->set_flashdata('notif', 'Jadwal berhasil dihapus');
			redirect(base_url('teknisii'));
		}
	}

	// Edit User
	public function edit_jadtek($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["jadwal_tek"] = $this->M_JadwalTeknisi->getID($id);
		$this->load->view("component/_editBrosur", $data);
	}

	// Verif User Teknisi
	

	public function veriftidakselesai($id = null)
	{
		$query = $this->db->get('teknisi_nopermohonan')->result();
		foreach ($query as $data) {
			if (md5($data->no_permohonan) === $id) {
				$no = $data->no_permohonan;
			}
		}
		$idp = array(
			'no_permohonan' => $no
		);
		$nama = $this->db->get_where('teknisi_nopermohonan', ["no_permohonan" => $no])->row()->nama_rs;
		$data = array(
			'status'			=> "TIDAK SELESAI"
		);
		$this->M_JadwalTeknisi->verif_teknisi($data, $idp);
		$this->session->set_flashdata('notif', 'Permohonan dengan nomor ' . $no . ' pada ' . ucfirst($nama) . ' Tidak Selesai');
		redirect(base_url('usertek'));
	}

	

	public function viewInvoice($id)
	{
		$file = $this->db->get_where('teknisi_selesai', ["no_permohonan" => $id])->row()->file_invoice;
		$filename = 'upload/invoice/' . $file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}
	public function viewBukti($id)
	{
		$file = $this->db->get_where('teknisi_selesai', ["no_permohonan" => $id])->row()->file_buktibayar;
		$filename = 'upload/bukti_bayar/' . $file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}
	public function viewBap($id)
	{
		$file = $this->db->get_where('teknisi_selesai', ["no_permohonan" => $id])->row()->file_invoice;
		$filename = 'upload/invoice/' . $file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}
	public function viewPenawaran($id)
	{
		$file = $this->db->get_where('teknisi_terjadwal', ["no_permohonan" => $id])->row()->file_penawaran;
		$filename = 'upload/penawaran/' . $file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}
}
