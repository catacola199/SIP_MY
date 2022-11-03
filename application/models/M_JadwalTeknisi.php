<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_JadwalTeknisi extends CI_Model
{
    private $_table = "jadwal_teknisi";

    public function getAllJadtek()
    {
        $this->db->select('*');
        $this->db->from('jadwal_teknisi');
        $this->db->join('produk', 'produk.id_produk = jadwal_teknisi.id_produk');
        $query = $this->db->get();
        return  $query->result();
    }

    public function simpandatajadtek($data)
    {
        $this->db->insert('brosur', $data);
        return TRUE;
    }

    public function _uploadFileJadtek()
    {
        $config['upload_path']          = './upload/brosur/file_brosur/';
		$config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_jadwal_teknisi')) {
            return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }
    

    public function getID($id)
    {
        return $this->db->get_where('jadwal_teknisi', ['id' => $id])->row();
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
    public function del_jadtek($id)
    {
        $this->_deleteImage($id);
        $this->_deleteFile($id);
        return $this->db->delete('jadwal_teknisi', array("id" => $id));
    }

    public function update_jadtek($data, $id)
    {
        $this->db->update('jadwal_teknisi', $data, $id);
        return TRUE;
    }
}
