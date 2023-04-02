<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Distributor extends CI_Model
{
    private $_table = "jual_distributor";

    public function getAllDist()
    {
        return $this->db->get($this->_table)->result();
    }

        public function getAlldata()
    {
        $this->db->select('`jual_distributor`.`id_pengguna`, `jual_distributor`.`id_penjualan`,
            `jual_distributor`.`invoice`,`jual_distributor`.`jatuh_tempo`,
            `jual_distributor`.`nama_rs_dst`,`jual_distributor`.`tgl_invoice`, `pengguna`.`nama_pengguna`');
        $this->db->from('jual_distributor');
        $this->db->join('pengguna', 'pengguna.id_pengguna = jual_distributor.id_pengguna', 'left');
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



    public function simpandatadst($data)
    {
        $this->db->insert('jual_distributor', $data);
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

    public function _uploadFiledst()
    {
        $config = array();
        $config['upload_path']          = './upload/distributor/file';
        $config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'uploadFileBrosur');
        $this->uploadFileBrosur->initialize($config);

        if ($this->uploadFileBrosur->do_upload('file_dst')) {
            return $this->uploadFileBrosur->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }
   
    public function getID($id)
    {
        return $this->db->get_where('jual_distributor', ['id' => $id_penjualan])->row();
    }

    public function _deleteFile($id)
    {
        $brosur = $this->getID($id);

        if ($brosur->file_brosur != "default.pdf") {
            $filename = explode(".", $brosur->file_brosur)[0];
            return array_map('unlink', glob(FCPATH . "upload/brosur/file/$filename.*"));
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
