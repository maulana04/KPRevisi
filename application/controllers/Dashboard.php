<?php 
 
class Dashboard extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	}
 
	function index(){
		$data['role'] = $this->session->userdata('role');
        $data['judul'] = 'Welcome to SIRT';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}
}