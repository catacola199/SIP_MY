<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Brosur extends CI_Model
{
    private $_table = "brosur";

    public function getAllBrosur()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAllPreTraining()
    {
        $this->db->select('*');
        $this->db->from('brosur');
        $this->db->where('jenis_brosur', 'pretraining');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllPreProduk()
    {
        $this->db->select('*');
        $this->db->from('brosur');
        $this->db->where('jenis_brosur', 'preproduk');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpandatabrosur($data)
    {
        $this->db->insert('brosur', $data);
        return TRUE;
    }

    public function _uploadFileBrosur()
    {
        $config = array();
        $config['upload_path']          = './upload/brosur/file';
        $config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'uploadFileBrosur');
        $this->uploadFileBrosur->initialize($config);

        if ($this->uploadFileBrosur->do_upload('file_brosur')) {
            return $this->uploadFileBrosur->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }
    public function _uploadImageBrosur()
    {
        $config = array();
        $config['upload_path']          = './upload/brosur/thumbnail';
        $config['allowed_types']        = 'png|jpg|jpeg';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'uploadImageBrosur');
        $this->uploadImageBrosur->initialize($config);

        if ($this->uploadImageBrosur->do_upload('thumb_brosur')) {
            return $this->uploadImageBrosur->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.png";
    }

    public function getID($id)
    {
        return $this->db->get_where('brosur', ['id' => $id])->row();
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
    public function del_brosur($id)
    {
        $this->_deleteImage($id);
        $this->_deleteFile($id);
        return $this->db->delete('brosur', array("id" => $id));
    }

    public function updatedatabrosur($data, $id)
    {
        $this->db->update('brosur', $data, $id);
        return TRUE;
    }
}
