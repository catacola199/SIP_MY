<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model
{
    private $_table = "pengguna";

    
    public $nama_pengguna;
    public $foto_pengguna;


    public function simpandatauser($data)
    {
        $this->db->insert('pengguna', $data);
        return TRUE;
    }
    
    public function _uploadImage()
    {
        $config['upload_path']          = './upload/pengguna/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('nama_pengguna');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.png";
    }

    public function getID($id){
		return $this->db->get_where('pengguna', ['id_pengguna' => $id])->row();
	}

    public function _deleteImage($id)
    {
        $pengguna = $this->getID($id);

        if ($pengguna->foto_pengguna != "default.png") {
            $filename = explode(".", $pengguna->foto_pengguna)[0];
            return array_map('unlink', glob(FCPATH . "upload/pengguna/$filename.*"));
        }
    }

    public function del_user($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete('pengguna', array("id_pengguna" => $id));
    }

    public function verif_user($data, $id)
    {
        return $this->db->update('pengguna', $data, $id);
    }

    public function updatedatauser($data, $id)
    {
        $this->db->update('pengguna', $data, $id);
        return TRUE;
    }
}
?>