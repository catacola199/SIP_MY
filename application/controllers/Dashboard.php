<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		if($this->All_model->isNotLogin()) redirect(site_url(''));
	}

	public function index()
	{
		// $data["usertotal"] = $this->All_model->getCountUsers();
		// $this->session->set_flashdata('notif', $data['pengguna']['nama_pengguna']);
		$this->load->view('dashboard/index');
	}
}
