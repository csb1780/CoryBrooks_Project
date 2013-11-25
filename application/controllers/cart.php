<?php

class Cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('cart', 'form_validation', 'session'));//load the cart library
		$this->load->helper(array('form', 'url', 'date'));//load the form helper

	}

	public function index()
	{
		return;
	}

	public function addItems()
	{

		if($rowid = $this->checkItem($this->cart->contents(), $this->input->post('id')))
		{
			$this->updateItems($rowid['rowid'], $this->input->post('qty') + $rowid['qty']);//Run the update function with the new quantity
			redirect(base_url() . 'index.php/cart', 'location', 302);
			exit;
		}

		$data = array(
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('price'),
			'name' => $this->input->post('name')
		);
		$this->cart->insert($data);

		redirect(base_url() . 'index.php/cart', 'location', 302);
	}

	public function update()
	{
		if($rowid = $this->checkItem($this->cart->contents(), $this->input->post('id')))
		{
			$this->updateItems($rowid['rowid'], $this->input->post('qty'));
		}
		
		redirect(base_url() . 'index.php/cart', 'location', 302);
	}

	public function delete()
	{
		if($rowid = $this->checkItem($this->cart->contents(), $this->input->post('id')))
		{
			$this->updateItems($rowid['rowid'], 0);
		}

		redirect(base_url() . 'index.php/cart', 'location', 302);
	}

	private function checkItem($cart, $id)
	{
		foreach($cart as $item)//Loop through the cart and see if the product exists
		{
			if($item['id'] == $id)//If it does exist set the rowid and qty for the update function
			{
				return array(
					'rowid' => $item['rowid'],
					'qty' => $item['qty']
				);
			}
		}

		return false;
	}

	private function updateItems($rowid, $qty)
	{
		
		$data = array(
			'rowid' => $rowid,
			'qty' => $qty
		);
		$this->cart->update($data);

		return true;
	}

	public function shopping_cart()
	{
		$data['title'] = 'Cart';
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/cart', $data);
		$this->load->view('templates/footer');
	}
}