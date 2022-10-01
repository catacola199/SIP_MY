<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Penawaran extends CI_Model
{
    private $_table = "penawaran";

    public function getAllpenawaran()
    {
        $this->db->select('*');
        $this->db->from('penawaran');
        $this->db->join('produk', 'produk.id_produk = penawaran.id_produk');
        $query = $this->db->get();
        return  $query->result();
    }

    public function simpandatapenawaran($data)
    {
        $this->db->insert('penawaran', $data);
        return TRUE;
    }


    public function getID($id)
    {
        return $this->db->get_where('penawaran', ['id_penawaran' => $id])->row();
    }


    public function del_penawaran($id)
    {
        return $this->db->delete('penawaran', array("id_ppenawaran" => $id));
    }

    public function updatedatapenawaran($data, $id)
    {
        $this->db->update('penawaran', $data, $id);
        return TRUE;
    }
}