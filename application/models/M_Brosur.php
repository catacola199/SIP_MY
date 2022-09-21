<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Brosur extends CI_Model
{
    private $_table = "brosur";

    public function simpandatauser($data)
    {
        $this->db->insert('brosur', $data);
        return TRUE;
    }

    public function _uploadFileBrosur()
    {
        $config['upload_path']          = './upload/brosur/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('pdf')) {
            return $this->upload->data("file_name");
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
        $pengguna = $this->getID($id);

        if ($pengguna->foto_pengguna != "default.png") {
            $filename = explode(".", $pengguna->file_brosur)[0];
            return array_map('unlink', glob(FCPATH . "upload/brosur/$filename.*"));
        }
    }

    public function del_user($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete('brosur', array("id" => $id));
    }

    public function updatedatauser($data, $id)
    {
        $this->db->update('brosur', $data, $id);
        return TRUE;
    }
}
