<?php defined('BASEPATH') OR exit('No direct script access allowed');

class All_model extends CI_Model
{
    // Model get data pengajar
    private $_table = "pengajar";
    private $_tablepeserta = "peserta_didik";
    private $_tableabsensi = "absensi";
    private $_tablejadwal = "jadwal";
    private $_user = "pengguna";
    private $_kelas = "kelas";
    private $_mapel = "mapel";
    private $_prodi = "prodi_jurusan";
    private $_role = "role_pengguna";
    private $_ketabsensi = "ket_absensi";
    private $_absensipengajar = "absensi_pengajar";

    // View Tables
    private $_totaluser = "usertotal";
    private $_totalpengajar = "totalpengajar";
    private $_totalpeserta = "totalpeserta";
    private $_totalabsensi = "totalabsensi";

    function __construct()
    {
        parent::__construct();
    }

    public function getAllUser()
    {
        return $this->db->get($this->_user)->result();
    }

    // User
    public function isNotLogin(){
        return $this->session->userdata('id_pengguna') === null;
    }
    // private function _updateLastLogin($user_id){
    //     $sql = "UPDATE {$this->_user} SET last_login=now() WHERE user_id={$user_id}";
    //     $this->db->query($sql);
    // }
    // end user

    public function getAllPengajar()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAllPesertadidik()
    {
        return $this->db->get($this->_tablepeserta)->result();
    }

    public function getAllAbsensi()
    {
        return $this->db->get($this->_tableabsensi)->result();
    }

    public function getAllJadwal()
    {
        return $this->db->get($this->_tablejadwal)->result();
    }

    public function getAllMapel()
    {
        return $this->db->get($this->_mapel)->result();
    }

    public function getAllProdi()
    {
        return $this->db->get($this->_prodi)->result();
    }

    public function getAllRole()
    {
        return $this->db->get($this->_role)->result();
    }

    public function getAllProdiJurusan()
    {
        return $this->db->get($this->_prodi)->result();
    }

    public function getAllKelas()
    {
        return $this->db->get($this->_kelas)->result();
    }

    public function getAllKetAbsensi()
    {
        return $this->db->get($this->_ketabsensi)->result();
    }

    public function getAllAbsensiGuru()
    {
        return $this->db->get($this->_absensipengajar)->result();
    }

    // Model Add User
    public function simpandatauser($data)
    {
        $this->db->insert('user', $data);
        return TRUE;
    }

    public function updatedatauser($data, $id)
    {
        $this->db->update('user', $data, $id);
        return TRUE;
    }

    // Model Add Pengajar
    public function simpandatapengajar($data)
    {
        $this->db->insert('pengajar', $data);
        return TRUE;
    }

    public function updatedatapengajar($data, $id)
    {
        $this->db->update('pengajar', $data, $id);
        return TRUE;
    }

    public function updatedatapesertadidik($data, $id)
    {
        $this->db->update('peserta_didik', $data, $id);
        return TRUE;
    }

    public function updatedataabsensi($data, $id)
    {
        $this->db->update('absensi', $data, $id);
        return TRUE;
    }

    public function updatedataabsensiguru($data, $id)
    {
        $this->db->update('absensi_pengajar', $data, $id);
        return TRUE;
    }

    // Model Add Mapel
    public function simpandatamapel($data)
    {
        $this->db->insert('mapel', $data);
        return TRUE;
    }

    // Model Add Peserta Didik
    public function simpandatapeserta($data)
    {
        $this->db->insert('peserta_didik', $data);
        return TRUE;
    }

    // Model Add Pesertadidik
    public function simpandataabsensi($data)
    {
        $this->db->insert('absensi', $data);
        return TRUE;
    }

    // Model Add Pengajar/Guru
    public function simpanedataabsensi_pengajar($data)
    {
        $this->db->insert('absensi_pengajar', $data);
        return TRUE;
    }

    // Dashboard
    public function getCountUsers()
    {
        // $sql = "select * from usertotal";
        // $query = $this->db->query($sql)->result();
        return $this->db->get($this->_user)->result();
    }

    public function getCountPengajar()
    {
        return $this->db->get($this->_totalpengajar)->result();
    }

    public function getCountPesertadik()
    {
        return $this->db->get($this->_totalpeserta)->result();
    }

    public function getCountAbsensi()
    {
        return $this->db->get($this->_totalabsensi)->result();
    }

    // ***** Model Pengajar

    // Rules Add
    public function rules()
    {
        return [
            [
                'field' => 'nik_nip',
                'label' => 'nik_nip',
                'rules' => 'required'
            ],

            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'numeric'
            ],

            [
                'field' => 'guru_mapel',
                'label' => 'guru_mapel',
                'rules' => 'required'
            ],

            [
                'field' => 'kontak',
                'label' => 'kontak',
                'rules' => 'required'
            ],

            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ]
        ];
    }

    // Delete Pengajar
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pengajar" => $id])->row();
    }

    public function del_pengajar($id)
    {
        return $this->db->delete($this->_table, array("id_pengajar" => $id));
    }

    // **** End Model Pengajar ****

    // Delete User
    public function getById_user($id)
    {
        return $this->db->get_where($this->_user, ["id_user" => $id])->row();
    }

    public function del_user($id)
    {
        return $this->db->delete($this->_user, array("id_user" => $id));
    }

    // Get Edit Peserta Didik
    public function getById_peserta($id)
    {
        return $this->db->get_where($this->_tablepeserta, ["nisn" => $id])->row();
    }

    // Get Edit Peserta Didik
    public function getById_absensipeserta($id)
    {
        return $this->db->get_where($this->_tableabsensi, ["id" => $id])->row();
    }

    // Get Edit Pengajar
    public function getById_absensipengajar($id)
    {
        return $this->db->get_where($this->_absensipengajar, ["id_absensi" => $id])->row();
    }

    


}