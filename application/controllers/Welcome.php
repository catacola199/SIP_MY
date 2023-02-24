<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('dashboard/login_new');
	}

	public function notfound()
	{
		$this->load->view('404');
	}
}
