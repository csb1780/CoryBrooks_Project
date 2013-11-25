<?php

Class Checkout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('cart', 'form_validation', 'session'));//load the cart library
		$this->load->helper(array('form', 'url', 'date'));//load the form helper
		$this->load->model('checkout_model');

	}

	public function index()
	{
		
		$data['title'] = 'Checkout';

		$this->load->view('templates/header',$data);
		$this->load->view('pages/checkout');
		$this->load->view('templates/footer');
	}

	public function save()
	{

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('zip', 'Zip Code', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Checkout';

			$this->load->view('templates/header',$data);
			$this->load->view('pages/checkout');
			$this->load->view('templates/footer');
		}
		else
		{
			$orderid = $this->checkout_model->insertOrders();

			foreach($this->cart->contents() as $value)
			{
				$this->checkout_model->insertOrderItems($orderid, $value['id'], $value['qty'], $value['price']);
			}

			$items = $this->checkout_model->grabProds($orderid);
			$datestring = "%Y-%m-%d - %h:%i";
			$time = time();

			foreach($items as $value)
			{	
				$this->checkout_model->updateProds($value['sku'], $value['qty'], mdate($datestring, $time));
			}
			
			redirect(base_url() . 'index.php/catalog_page', 'location', 302);
		}
	}


}