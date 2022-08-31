<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_model{

	// TUGAS 01

	public function getAllNasabah(){
		return $this->db->get('nasabah')->result_array();
	}

	public function addNasabah(){
		$this->db->insert('nasabah', ['name' => $this->input->post('name')]);
	}

	public function getNasabahById($id){
		return $this->db->get_where('nasabah', ['accountId' => $id])->row_array();
	}

	public function editNasabah($id){
		$data['name'] = $this->input->post('name');
		$this->db->where('accountId', $id);
		$this->db->update('nasabah', $data);
	}

	public function deleteNasabah($id){
		$this->db->where('accountId', $id);
		$this->db->delete('nasabah');
	}

	// TUGAS 02

	public function getAllTransaksi(){
		$query = "SELECT `transaksi`.*, `nasabah`.`name` AS `nasabah`
					FROM `transaksi` JOIN `nasabah`
					ON `transaksi`.`accountId`	= `nasabah`.`accountId`
		";
		return $this->db->query($query)->result_array();
	}

	public function addTransaksi(){
		$data = [
			'accountId' => $this->input->post('accountId'),
			'transactionDate' => $this->input->post('transactionDate'),
			'description' => $this->input->post('description'),
			'debitCreditStatus' => $this->input->post('debitCreditStatus'),
			'amount' => $this->input->post('amount')
		];
		$this->db->insert('transaksi', $data);
	}

	public function getTransaksiById($id){
		return $this->db->get_where('transaksi', ['id' => $id])->row_array();
	}

	public function editTransaksi($id){
		$data = [
			'accountId' => $this->input->post('accountId'),
			'transactionDate' => $this->input->post('transactionDate'),
			'description' => $this->input->post('description'),
			'debitCreditStatus' => $this->input->post('debitCreditStatus'),
			'amount' => $this->input->post('amount')
		];
		$this->db->where('id', $id);
		$this->db->update('transaksi', $data);
	}

	public function deletetransaksi($id){
		$this->db->where('id', $id);
		$this->db->delete('transaksi');
	}

	// TUGAS 03

	public function getAllPointNasabah(){
		$query = "SELECT `transaksi`.`accountId`, `nasabah`.`name`, `transaksi`.`description`, SUM(`transaksi`.`amount`) as totalAmount
					FROM `transaksi` JOIN `nasabah`
					ON `transaksi`.`accountId`	= `nasabah`.`accountId`
					WHERE `transaksi`.`description` = 'Beli Pulsa' or `transaksi`.`description` = 'Bayar Listrik'
					GROUP BY `transaksi`.`accountId`, `transaksi`.`description`
		";
		$result = $this->db->query($query)->result_array();

		foreach($result as $key => $r) {
			$hitungPoint = 0;
			if($r['description'] == 'Bayar Listrik') {
				if($r['totalAmount'] >= 50001) {
					if($r['totalAmount'] <= 100000) {
						$hitungPoint = $hitungPoint + (($r['totalAmount']-50000) / 2000);
					} else {
						$hitungPoint = $hitungPoint + (50000 / 2000);
					}			
				}
				if($r['totalAmount'] > 100000) {
					$hitungPoint = $hitungPoint + ((($r['totalAmount']-100000) / 2000) * 2);	
				}
			}
			if($r['description'] == 'Beli Pulsa') {
				if($r['totalAmount'] >= 10001) {
					if($r['totalAmount'] <= 30000) {
						$hitungPoint = $hitungPoint + (($r['totalAmount']-10000) / 1000);
					} else {
						$hitungPoint = $hitungPoint + (20000 / 1000);
					}			
				}
				if($r['totalAmount'] > 30000) {
					$hitungPoint = $hitungPoint + ((($r['totalAmount']-30000) / 1000) * 2);	
				}
			}
			$result[$key]['point'] = $hitungPoint;			
		}

		$nasabah = $this->db->get('nasabah')->result_array();
		foreach($nasabah as $key => $n) {
			$totalPoint = 0;
			foreach($result as $item) {
				if($item['accountId'] == $n['accountId']) {
					$totalPoint = $totalPoint + $item['point'];
				}						
			}	
			$nasabah[$key]['totalPoint'] = $totalPoint;
		}

		return $nasabah;

		// echo '<pre>';
		// print_r($nasabah);
		// echo '</pre>';
		// die();
	}

	// TUGAS 04

	public function getAllReport(){
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		$accountId = $this->input->post('accountId');

		if(!$accountId) {
			return [];
		}

		if(!$startDate && !$endDate) {
			return $this->db->get_where('transaksi', ['accountId' => $accountId])->result_array();
		}

		if($startDate && !$endDate) {
			$this->db->where('accountId', $accountId);
			$this->db->where('transactionDate >=', $startDate);
			return $this->db->get('transaksi')->result_array();
		}

		if(!$startDate && $endDate) {
			$this->db->where('accountId', $accountId);
			$this->db->where('transactionDate <=', $endDate);
			return $this->db->get('transaksi')->result_array();
		}

		$this->db->where('accountId', $accountId);
		$this->db->where('transactionDate >=', $startDate);
		$this->db->where('transactionDate <=', $endDate);
		return $this->db->get('transaksi')->result_array();
	}
}