<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Kuis extends CI_Model
{
    private $_table = "kuis";

    public function getAllKuis()
    {
        $this->db->select('*');
        $this->db->from('penawaran');
        $this->db->join('produk', 'produk.id_produk = penawaran.id_produk');
        $this->db->join('pengguna', 'pengguna.id_pengguna = penawaran.id_pengguna');
        $query = $this->db->get();
        return  $query->result();
    }

    public function getvalid($id)
    {
        // return $this->db->query("SELECT * FROM penawaran JOIN produk ON produk.id_produk = penawaran.id_produk JOIN pengguna ON 
        // pengguna.id_pengguna = penawaran.id_pengguna WHERE penawaran.id_penawaran ='$id'")->row();
        $this->db->select('pengguna.instansi_pengguna');
        $this->db->from('pengguna, produk');
        $this->db->where('penawaran.id_pengguna = pengguna.id_pengguna');
        $this->db->where('produk.id_produk = penawaran.id_produk');
        $query = $this->db->get_where('penawaran', ['penawaran.id_penawaran' => $id]);
        return  $query->row();
    }

    public function getDataPerUser()
    {
        $this->db->select('`kuisioner`.`id_pengguna`,`kuisioner`.`judul_soal`, `kuisioner`.`min_score`, `kuisioner`.`jum_score`');
        $this->db->from('kuisioner');
        $this->db->join('pengguna', 'pengguna.id_pengguna = kuisioner.`id_pengguna`','left');
        $this->db->where('kuisioner.id_pengguna', $this->session->userdata('id_pengguna'));
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

    public function get_instansi()
    {
        $query = $this->db->get('pengguna');
        return $query->result_array();
    }

    public function get_produk()
    {
        $query = $this->db->get('produk');
        return $query->result_array();
    }
}
