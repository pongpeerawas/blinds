<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product extends CI_Controller {

	public function index()
	{
		 $query = $this->productModel->read_db();

		$value = array(
			'result' => array(
				'data' => $query
			),
			'views' => 'backEnd/Product/product'
		);
		$this->loadpage($value);
	}

	public function loadpage($value)
	{
		$this->load->view('backEnd/Template/header');
		$this->load->view('backEnd/Template/sidebar');
		$this->load->view($value['views'],$value['result']);
		$this->load->view('backEnd/Template/footer');
	}
// 
//
// public function showProduct()
// {
// 	$this->load->view('backEnd/product');
// }
//
// public function getProduct()
// {
// 	$query = $this->productModel->read_db();
// 	$value = array(
// 		'data'=>$query
// 	);
// 	$this->load->view('product',$value);
// 	//print_r($value);
// }


public function insertform()
{
	$product = $this->productModel->read_category();
	$value = array(
		'result' => array(
		'product' =>$product
		),
		'views' => 'backEnd/Product/addProduct'
	);
	$this->loadpage($value);
}

public function insert()
{
	$input = $this->input->post();
	$pathinfo = pathinfo($_FILES['Pro_Pic']['name'],PATHINFO_EXTENSION);
	$new_file = date('YmdHis').".".$pathinfo;
	move_uploaded_file($_FILES['Pro_Pic']['tmp_name'],"assetAdmin/img/".$new_file);

	$input['Pro_Pic']=$new_file;
	$this->productModel->insert($input);
	redirect('backEnd/product');

}

public function del()
{
	$del = $this->uri->segment(4);
	$this->productModel->del($del);
	redirect('backEnd/product');


}


public function updateform()
{
	$read = $this->uri->segment(4);
	$query = $this->productModel->read_one($read);
	$product = $this->productModel->read_category();
	$value = array(
		'result' => array(
			'data' => $query,
			'product' => $product
		),
		'views' => 'backEnd/Product/editProduct'
	);
	$this->loadpage($value);
}



public function update()
{
	$update = $this->input->post();
	if (!empty($_FILES['Pro_Pic']['name'])) {
	 $pathinfo = pathinfo($_FILES['Pro_Pic']['name'],PATHINFO_EXTENSION);
	 $new_file = date('YmdHis').".".$pathinfo;

	 move_uploaded_file($_FILES['Pro_Pic']['tmp_name'],"assetAdmin/img/".$new_file);
	$update['Pro_Pic']=$new_file;
}
	$this->productModel->update($update);
	redirect('backEnd/product');
}


}
