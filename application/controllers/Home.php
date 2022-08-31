<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Home_model');
	}

	// TUGAS 01

	public function index(){
		$data['title'] = 'Padepokan79';
		$data['nasabah'] = $this->Home_model->getAllNasabah();

		$this->form_validation->set_rules('name', 'Name', 'required');

		if($this->form_validation->run() == false){
			$this->load->view('_layouts/header', $data);	
			$this->load->view('home/tugas1', $data);	
			$this->load->view('_layouts/footer', $data);
		} else {
			$this->Home_model->addNasabah();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New nasabah added.</div>');
			redirect('home');
		}				
	}

	public function deleteNasabah($id=0){
		if ($id == 0 || !$id) {
			redirect('home');
		}		
		
		$data['nasabah'] = $this->Home_model->getNasabahById($id);
		if (!$data['nasabah']) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data not found.</div>');
			redirect('home');
		}		

		$this->Home_model->deleteNasabah($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete nasabah success.</div>');
		redirect('home');
	}

	public function editNasabah(){		
		$data['nasabah'] = $this->Home_model->getNasabahById($this->input->post('accountId'));
		if (!$data['nasabah']) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data not found.</div>');
			redirect('home');
		}	

		$this->form_validation->set_rules('name', 'Name', 'required');

		if($this->form_validation->run() == false){
			$this->load->view('_layouts/header', $data);	
			$this->load->view('home/tugas1', $data);	
			$this->load->view('_layouts/footer', $data);
		} else {
			$this->Home_model->editNasabah($this->input->post('accountId'));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit nasabah success.</div>');
			redirect('home');
		}
	}

	// TUGAS 02

	public function tugas2(){
		$data['title'] = 'Padepokan79';
		$data['nasabah'] = $this->Home_model->getAllNasabah();
		$data['transaksi'] = $this->Home_model->getAllTransaksi();

		$this->form_validation->set_rules('accountId', 'Account Id', 'required');
		$this->form_validation->set_rules('transactionDate', 'Transaction Date', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('debitCreditStatus', 'Debit Credit', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');

		if($this->form_validation->run() == false){
			$this->load->view('_layouts/header', $data);	
			$this->load->view('home/tugas2', $data);	
			$this->load->view('_layouts/footer', $data);
		} else {
			$this->Home_model->addTransaksi();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New transaksi added.</div>');
			redirect('home/tugas2');
		}				
	}

	public function deleteTransaksi($id=0){
		if ($id == 0 || !$id) {
			redirect('home/tugas2');
		}		
		
		$data['transaksi'] = $this->Home_model->getTransaksiById($id);
		if (!$data['transaksi']) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data not found.</div>');
			redirect('home/tugas2');
		}		

		$this->Home_model->deleteTransaksi($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete transaksi success.</div>');
		redirect('home/tugas2');
	}

	public function transaksiById(){
		$data['transaksi'] = $this->Home_model->getTransaksiById($this->input->post('id'));
		echo json_encode($data['transaksi']);
	}

	public function editTransaksi(){		
		$data['transaksi'] = $this->Home_model->getTransaksiById($this->input->post('id'));
		if (!$data['transaksi']) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data not found.</div>');
			redirect('home');
		}	

		$this->form_validation->set_rules('accountId', 'Account Id', 'required');
		$this->form_validation->set_rules('transactionDate', 'Transaction Date', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('debitCreditStatus', 'Debit Credit', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');

		if($this->form_validation->run() == false){
			$this->load->view('_layouts/header', $data);	
			$this->load->view('home/tugas2', $data);	
			$this->load->view('_layouts/footer', $data);
		} else {
			$this->Home_model->editTransaksi($this->input->post('id'));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit transaksi success.</div>');
			redirect('home/tugas2');
		}
	}

	// TUGAS 03

	public function tugas3(){
		$data['title'] = 'Padepokan79';
		$data['nasabah'] = $this->Home_model->getAllPointNasabah();

		$this->load->view('_layouts/header', $data);
		$this->load->view('home/tugas3', $data);	
		$this->load->view('_layouts/footer', $data);			
	}

	// TUGAS 04

	public function tugas4(){
		$data['title'] = 'Padepokan79';
		$data['nasabah'] = $this->Home_model->getAllNasabah();
		$data['transaksi'] = $this->Home_model->getAllReport();

		if($this->input->post('accountId')) {
			$filter = $this->Home_model->getNasabahById($this->input->post('accountId'));
			$data['name'] = $filter['name'];
		} else {
			$data['name'] = '-';
		}
		if($this->input->post('startDate')) {
			$data['startDate'] = date('Y-m-d', strtotime($this->input->post('startDate')));
		} else {
			$data['startDate'] = '-';
		}
		if($this->input->post('endDate')) {
			$data['endDate'] = date('Y-m-d', strtotime($this->input->post('endDate')));
		} else {
			$data['endDate'] = '-';
		}

		$this->load->view('_layouts/header', $data);	
		$this->load->view('home/tugas4', $data);	
		$this->load->view('_layouts/footer', $data);			
	}
}