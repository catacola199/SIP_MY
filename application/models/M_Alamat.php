<?php
class M_Alamat extends CI_Model
{
    public function get_all_provinsi()
    {
        return $this->db->get('tbl_alamat_provinsi')->result_array();
    }

    public function get_kabupaten_by_provinsi($id_provinsi)
    {
        $this->db->where('province_id', $id_provinsi);
        $this->db->order_by('name', 'asc');
        return $this->db->get('tbl_alamat_kabupaten')->result_array();
    }

    public function get_kecamatan_by_kabupaten($id_kabupaten)
    {
        $this->db->where('regency_id', $id_kabupaten);
        $this->db->order_by('name', 'asc');
        return $this->db->get('tbl_alamat_kecamatan')->result_array();
    }

    public function get_desa_by_kecamatan($id_kecamatan)
    {
        $this->db->where('district_id', $id_kecamatan);
        $this->db->order_by('name', 'asc');
        return $this->db->get('tbl_alamat_desa')->result_array();
    }
    
    public function getNameProv($id){
        $this->db->select('name as provinsi_name');
        $this->db->from('tbl_alamat_provinsi');
        $this->db->where('id', $id);
        $query = $this->db->get();
		return  $query->row_array();
    }
    public function getNameKab($id){
        $this->db->select('name as kabupaten_name');
        $this->db->from('tbl_alamat_kabupaten');
        $this->db->where('id', $id);
        $query = $this->db->get();
		return  $query->row_array();
    }
    public function getNameKec($id){
        $this->db->select('name as kecamatan_name');
        $this->db->from('tbl_alamat_kecamatan');
        $this->db->where('id', $id);
        $query = $this->db->get();
		return  $query->row_array();
    }
    public function getNameDesa($id){
        $this->db->select('name as desa_name');
        $this->db->from('tbl_alamat_desa');
        $this->db->where('id', $id);
        $query = $this->db->get();
		return  $query->row_array();
    }
}
?>
