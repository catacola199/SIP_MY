<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_alamat');
    }

    public function showProvinsi(){
        $provinsi=$this->m_alamat->get_all_provinsi();
        echo json_encode($provinsi);
    }

    public function get_kabupaten()
    {
        $provinsiID = $this->input->post('provinsi_id');
        $kabupaten = $this->m_alamat->get_kabupaten_by_provinsi($provinsiID);
        echo json_encode($kabupaten);
        // foreach($kabupaten as $row){
        //     echo '<option value="'.$row['id'].'" class="new">'.$row['name'].'</option>';
        // }
    }

    public function get_kecamatan()
    {
        $kabupatenID = $this->input->post('kabupaten_id');
        $kecamatan = $this->m_alamat->get_kecamatan_by_kabupaten($kabupatenID);
        echo json_encode($kecamatan);

        // foreach($kecamatan as $row){
        //     echo '<option value="'.$row['id'].'" class="new">'.$row['name'].'</option>';
        // }
    }

    public function get_desa()
    {
        $kecamatanID = $this->input->post('kecamatan_id');
        $desa = $this->m_alamat->get_desa_by_kecamatan($kecamatanID);
        echo json_encode($desa);

        // foreach($desa as $row){
        //     echo '<option value="'.$row['id'].'" class="new">'.$row['name'].'</option>';
        // }
    }

}
