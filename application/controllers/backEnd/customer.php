<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer extends CI_Controller {


	public function loadpage($value)
	{
		$this->load->view('backEnd/Template/Header');
		$this->load->view('backEnd/Template/Sidebar');
		$this->load->view($value['views'],$value['result']);
    // $this->load->view('backEnd/Template/Footer');

	}

	public function index()
	{
		 $query = $this->customerModel->read_db();

		$value = array(
			'result' => array(
				'data' => $query
			),
			'views' => 'backEnd/customer'
		);
		$this->loadpage($value);
	}

	public function del()
	{
		$del = $this->uri->segment(4);
		$this->customerModel->del($del);
		redirect('backEnd/customer');


	}


}