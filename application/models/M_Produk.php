<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Produk extends CI_Model
{
    private $_table = "produk";

    public function getAllproduk()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getAllprodukshow()
    {
        $query = $this->db->get('produk');
        return $query->result_array();
    }

    public function simpandataproduk($data)
    {
        $this->db->insert('produk', $data);
        return TRUE;
    }


    public function getID($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row();
    }


    public function del_produk($id)
    {
        return $this->db->delete('produk', array("id_produk" => $id));
    }

    public function updatedataproduk($data, $id)
    {
        $this->db->update('produk', $data, $id);
        return TRUE;
    }
}
