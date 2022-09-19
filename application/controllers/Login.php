<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_User');
		$this->load->model('All_model');
		$this->load->view('dashboard/_login');
	}

	public function logout(){
		// $this->session->unset_userdata('username_pengguna');	
		// $this->session->unset_userdata('password_pengguna');	
		$this->session->sess_destroy();	
		// $this->session->set_flashdata('notif-logout', 'Akun berhasil log out');
		redirect(site_url(''));
	}

	public function index()
	{
		$username = $this->input->post('username_pengguna');
		$password = $this->input->post('password_pengguna');

		$user = $this->db->get_where('pengguna', ['username_pengguna' => $username])->row_array();
		
		if($username == null || $password == null){
			$this->session->set_flashdata('notif', 'Inputan kosong');
			redirect(site_url(''));
		}
		if ($user) {
			//usernya ada
			if ($user['terverifikasi'] == 1) {
				//cek password
				if (sha1(sha1($password))== $user['password_pengguna']) {
				// if (password_verify($password, $user['password_pengguna'])) {
					$data = [
						'id_pengguna' => $user['id_pengguna'],
						'id_role' => $user['id_role']
					];
					$this->session->set_userdata($data);
					redirect('dashboard');
					// $this->load->view("dashboard/index");
				} else {
					$this->session->set_flashdata('notif', 'Maaf kata sandi yang dimasukan salah, mohon periksa kembali');
					redirect(site_url(''));
				}
			} else {
				$this->session->set_flashdata('notif', 'Akun belum terverifikasi');
				redirect(site_url(''));
			}
		} else {
			$this->session->set_flashdata('notif', 'Akun tidak teregristrasi pada sistem');
			redirect(site_url(''));
		}
	}
	
	// public function index() {

    //     $post = $this->input->post(null, TRUE);
    //     if(isset($post['login'])) {
    //         $this->load->model('M_User');
    //         $query = $this->M_User->login($post);
    //         if($query->num_rows() > 0) {
    //             $row = $query->row();
    //             $params = array(
    //                 'id_pengguna' => $row->id_pengguna,
    //                 'id_role' => $row->id_role
    //             );
    //             $this->session->set_userdata($params);
    //             redirect('dashboard');
    //         }else {
    //             $this->session->set_flashdata('notif', 'Oopsie woopsie something wrong, try checking your username or password again');
	// 			redirect(site_url(''));		
    //         }
    //     }else{
	// 		$this->session->set_flashdata('notif', 'Inputan kosong');
	// 		redirect(site_url(''));		
	// 	} 
    // }
}
