<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Konten extends CI_Model
{
    private $_table = "produk_detail";

    public function getAllKonten()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAlldata()
    {
        $this->db->select('`produk_detail`.`id_detailproduk`,`produk_detail`.`konten_id`,`produk_detail`.`nama_produk`, `produk_detail`.`informasi_produk`, `produk_detail`.`tagline_produk`, `produk_detail`.`kode_produk`,
        `produk_detail`.`feature_produk`, `produk_detail`.`file_produk`, `produk_detail_kategori`.`nama_kategori`,`produk_detail_gambar`.`gambar_produk`');
        $this->db->from('produk_detail');
        $this->db->join('produk_detail_kategori', 'produk_detail_kategori.konten_id = produk_detail.konten_id', 'left');
        $this->db->join('produk_detail_gambar', 'produk_detail_gambar.konten_id = produk_detail.konten_id', 'left');
        $this->db->group_by('`produk_detail`.`konten_id`');
        $query = $this->db->get();
        return  $query->result();
    }

    public function getAllPreTraining()
    {
        $this->db->select('*');
        $this->db->from('brosur');
        $this->db->where('jenis_brosur', 'pretraining');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKategori(){
        return $this->db->get("produk_detail_kategori")->result();
    }


    public function simpandatakonten($data)
    {
        $this->db->insert('produk_detail', $data);
        return TRUE;
    }

    public function getDistributor()
    {
        // return $this->db->query("SELECT pengguna.`id_pengguna`,pengguna.`foto_pengguna`,pengguna.`nama_pengguna` FROM pengguna
        // WHERE pengguna.`id_role` = 4")->result();
        $this->db->select('id_pengguna,nama_pengguna,instansi_pengguna');
        $this->db->from('pengguna');
        $this->db->where('id_role', 5);
        $query = $this->db->get();
        return  $query->result_array();
    }

    public function _uploadFilekonten()
    {
        $config = array();
        $config['upload_path']          = './upload/konten/file';
        $config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'uploadFileBrosur');
        $this->uploadFileBrosur->initialize($config);

        if ($this->uploadFileBrosur->do_upload('file_produk')) {
            return $this->uploadFileBrosur->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }
    
    public function _uploadInformasiKonten()
    {
        $config = array();
        $config['upload_path']          = './upload/konten/info';
        $config['allowed_types']        = 'png|jpg|jpeg';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'uploadImageBrosur');
        $this->uploadImageBrosur->initialize($config);

        if ($this->uploadImageBrosur->do_upload('informasi_produk')) {
            return $this->uploadImageBrosur->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.png";
    }

    public function getID($id)
    {
        return $this->db->get_where('jual_distributor', ['id' => $id_penjualan])->row();
    }

    public function _deleteImage($id)
    {
        $brosur = $this->getID($id);

        if ($brosur->thumb_brosur != "default.png") {
            $filename = explode(".", $brosur->thumb_brosur)[0];
            return array_map('unlink', glob(FCPATH . "upload/brosur/thumbnail/$filename.*"));
        }
    }

    public function _deleteFile($id)
    {
        $brosur = $this->getID($id);

        if ($brosur->file_brosur != "default.pdf") {
            $filename = explode(".", $brosur->file_brosur)[0];
            return array_map('unlink', glob(FCPATH . "upload/brosur/file/$filename.*"));
        }
    }

    public function _deleteInformasi($id)
    {
        $brosur = $this->getID($id);

        if ($brosur->thumb_brosur != "default.png") {
            $filename = explode(".", $brosur->thumb_brosur)[0];
            return array_map('unlink', glob(FCPATH . "upload/brosur/thumbnail/$filename.*"));
        }
    }

    public function del_dst($id)
    {
        $this->_deleteImage($id);
        $this->_deleteFile($id);
        return $this->db->delete('jual_distributor', array("id" => $id_penjualan));
    }

    public function updatedatadst($data, $id)
    {
        $this->db->update('jual_distributor', $data, $id_penjualan);
        return TRUE;
    }
}
