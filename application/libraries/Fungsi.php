<?php
class Fungsi{
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }
    function user_login() {
        $data= $this->ci->db->get_where('pengguna', ['id_pengguna' => 
        $this->ci->session->userdata('id_pengguna')])->row();
        return $data;
    }
}
?>