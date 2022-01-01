<?php 
 
class DataWarga extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('Warga_model');
	}
 
	function index(){
        $data['judul'] = 'Data Warga';
		$data['role'] = $this->session->userdata('role');
		$data['warga'] = $this->Warga_model->getAllWarga();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('warga/datawarga', $data);
		$this->load->view('templates/footer');
	}

	function detail(){
        $data['judul'] = 'Detail Warga';
		$data['role'] = $this->session->userdata('role');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('warga/detailwarga');
		$this->load->view('templates/footer');
	}

	function tambah(){
		$data['nik'] = '';
		$data['nama'] = '';
		$data['jk'] = '';
		$data['tempat_lahir'] = '';
		$data['tanggal_lahir'] = '';
		$data['agama'] = '';
		$data['pendidikan'] = '';
		$data['jenis_pekerjaan'] = '';
		$data['status_pernikahan'] = '';
		$data['status_keluarga'] = '';
		$data['nama_ayah'] = '';
		$data['nama_ibu'] = '';
		$data['aksi'] = 'submit_tambah';
		$data['judul'] = 'Tambah Data Warga';
		$data['role'] = $this->session->userdata('role');		
		$data['data'] = $this->Warga_model->all();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('warga/tambaheditwarga', $data);
		$this->load->view('templates/footer');
	}

	function submit_tambah(){
		$data['nkk'] = $this->input->post('nkk');
		$data['nik'] = $this->input->post('nik');
		$data['nama'] = $this->input->post('nama');
		$data['jk'] = $this->input->post('jk');
		$data['tempat_lahir'] = $this->input->post('tempat_lahir');
		$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		$data['agama'] = $this->input->post('agama');
		$data['pendidikan'] = $this->input->post('pendidikan');
		$data['jenis_pekerjaan'] = $this->input->post('jenis_pekerjaan');
		$data['status_pernikahan'] = $this->input->post('status_pernikahan');
		$data['status_keluarga'] = $this->input->post('status_keluarga');
		$data['nama_ayah'] = $this->input->post('nama_ayah');
		$data['nama_ibu'] = $this->input->post('nama_ibu');

		$this->Warga_model->input_data('detail_warga', $data);

		redirect('datawarga', 'refresh');

	}

	function hapus(){
		$nik = $this->uri->segment('3');
		$this->Warga_model->hapus_data($nik);
		redirect('datawarga', 'refresh');
	}

	function edit(){
		$nik = $this->uri->segment('3');
		$data = $this->Warga_model->display_row($nik);
		$data['data'] = $this->Warga_model->all();
		$data['aksi'] = 'submit_edit';
		$data['judul'] = 'Edit Data Warga';
		$data['role'] = $this->session->userdata('role');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('warga/tambaheditwarga', $data);
		$this->load->view('templates/footer');
	}

	function submit_edit(){
		$id = $this->input->post('nik');
		$data['nkk'] = $this->input->post('nkk');
		$data['nama'] = $this->input->post('nama');
		$data['jk'] = $this->input->post('jk');
		$data['tempat_lahir'] = $this->input->post('tempat_lahir');
		$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		$data['agama'] = $this->input->post('agama');
		$data['pendidikan'] = $this->input->post('pendidikan');
		$data['jenis_pekerjaan'] = $this->input->post('jenis_pekerjaan');
		$data['status_pernikahan'] = $this->input->post('status_pernikahan');
		$data['status_keluarga'] = $this->input->post('status_keluarga');
		$data['nama_ayah'] = $this->input->post('nama_ayah');
		$data['nama_ibu'] = $this->input->post('nama_ibu');

		$this->Warga_model->updateWarga($data, $id);

		redirect('datawarga', 'refresh'); 
	}
}