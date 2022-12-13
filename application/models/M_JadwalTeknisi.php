<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_JadwalTeknisi extends CI_Model
{
    private $_table = "jadwal_teknisi";

    public function getProdukperPermohonan()
    {
        $this->db->select('teknisi_nopermohonan.`no_permohonan`, produk.`id_produk`, produk.`nama_produk`,produk.`tipe_produk`, produk.`jenis_produk`');
        $this->db->from('teknisi_nopermohonan');
        $this->db->join('produk', 'produk.id_produk = teknisi_nopermohonan.id_produk');
        $query = $this->db->get();
        return  $query->result();
    }

    public function getJadwal()
    {
        $this->db->select('id_permohonan,no_permohonan, kategori, nama_rs, pic_name,status');
        $this->db->from('teknisi_nopermohonan');
        $this->db->group_by('no_permohonan');
        $query = $this->db->get();
        return  $query->result();
    }

    public function getDetails()
    {
        $this->db->select('teknisi_nopermohonan.`id_permohonan`,teknisi_nopermohonan.`no_permohonan`, teknisi_nopermohonan.`kategori`, teknisi_nopermohonan.`nama_rs`, teknisi_nopermohonan.`alamat_rs`,
        teknisi_nopermohonan.`pic_name`, teknisi_nopermohonan.`pic_phone`, teknisi_nopermohonan.`status`, pengguna.`nama_pengguna`, teknisi_terjadwal.`nama_driver`,
        teknisi_terjadwal.`tgl_jadwal`, teknisi_terjadwal.`file_invoice`, teknisi_selesai.`metode_bayar`, teknisi_selesai.`bukti_bayar`, teknisi_selesai.`keterangan`');
        $this->db->from('teknisi_nopermohonan');
        $this->db->join('teknisi_terjadwal', 'teknisi_terjadwal.no_permohonan = teknisi_nopermohonan.no_permohonan','left');
        $this->db->join('pengguna', 'teknisi_terjadwal.id_pengguna = pengguna.id_pengguna','left');
        $this->db->join('teknisi_selesai', 'teknisi_selesai.no_permohonan = teknisi_nopermohonan.no_permohonan','left');
        $query = $this->db->get();
        return  $query->result();
    } 

    public function getTeknisi()
    {
        // return $this->db->query("SELECT pengguna.`id_pengguna`,pengguna.`foto_pengguna`,pengguna.`nama_pengguna` FROM pengguna
        // WHERE pengguna.`id_role` = 4")->result();
        $this->db->select('id_pengguna,nama_pengguna,instansi_pengguna');
        $this->db->from('pengguna');
        $this->db->where('id_role', 4);
        $query = $this->db->get();
        return  $query->result_array();
    }

    public function simpandatajadtek($data)
    {
		$this->db->insert_batch('teknisi_nopermohonan', $data);
        return TRUE;
    }
    
    public function simpandataterjadwal($data)
    {
        $this->db->insert('teknisi_terjadwal', $data);
        return TRUE;
    }
    public function simpandataselesai($data)
    {
        $this->db->insert('teknisi_selesai', $data);
        return TRUE;
    }

    public function _uploadFileInvoice()
    {
        $config['upload_path']          = './upload/teknisi/file_invoice/';
		$config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_invoice')) {
            return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }
    public function _uploadFileBuktiBayar()
    {
        $config1['upload_path']          = './upload/teknisi/bukti_bayar/';
		$config1['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config1['encrypt_name']         = false;
        $config1['overwrite']            = true;
        $config1['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config1);

        if ($this->upload->do_upload('bukti_bayar')) {
            return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }
    

    public function getID($id)
    {
        return $this->db->get_where('teknisi_nopermohonan', ['id' => $id])->row();
    }

   
    public function del_all($id)
    {
        $this->db->delete('teknisi_nopermohonan', array("id_jadwal" => $id));
        $this->db->delete('teknisi_terjadwal', array("id_jadwal" => $id));
        $this->db->delete('teknisi_selesai', array("id_jadwal" => $id));
        return TRUE;
    }

   

    public function update_jadtek($data, $id)
    {
        $this->db->update('teknisi_nopermohonan', $data, $id);
        return TRUE;
    }
}