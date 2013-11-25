<?php

class Catalog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('cart', 'form_validation', 'session'));//load the cart library
		$this->load->helper(array('form', 'url', 'date'));//load the form helper
		$this->load->model('catalog_model');

	}

	public function index()
	{
		$data['products'] = $this->catalog_model->getProducts();
		$data['title'] = 'Catalog';

		$this->load->view('templates/header', $data);
		$this->load->view('pages/catalog_page', $data);
		$this->load->view('templates/footer');
	}

	public function admin()
	{
		$data['products'] = $this->catalog_model->getProducts();
		$data['title'] = 'Catalog Admin';

		$this->load->view('templates/header', $data);
		$this->load->view('pages/catalog_admin', $data);
		$this->load->view('templates/footer');
	}

	public function updateInv()
	{
		$datestring = "%Y-%m-%d - %h:%i";
		$time = time();
		$this->catalog_model->update($this->input->post('sku'), $this->input->post('name'), $this->input->post('price'), $this->input->post('qty'), $this->input->post('id'), mdate($datestring, $time));
		redirect(base_url() . 'index.php/catalog_admin', 'location', 302);
	}

	public function addInv()
	{
		$this->catalog_model->insert($this->input->post('sku'), $this->input->post('name'), $this->input->post('price'), $this->input->post('qty'));
		redirect(base_url() . 'index.php/catalog_admin', 'location', 302);
	}
}