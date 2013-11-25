<?php
class Checkout_model extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insertOrders()
	{
		$data = array(
		'fname' => $this->input->post('fname'),
		'lname' => $this->input->post('lname'),
		'address' => $this->input->post('address'),
		'city' => $this->input->post('city'),
		'state' => $this->input->post('state'),
		'zip' => $this->input->post('zip'),
		'total' => $this->input->post('total')
	);

	$this->db->insert('Orders', $data);

	return $this->db->insert_id();
	}

	public function insertOrderItems($orderid, $id, $qty, $price)
	{
		
			$data = array(
				'orderid' => $orderid,
				'sku' => $id,
				'qty' => $qty,
				'price' => $price
			);

			$this->db->insert('Order_Items', $data);
		
		return;
	}

	public function grabProds($id)
	{
		$query = $this->db->get_where('Order_Items', array('orderid' => $id));
		return $query->result_array();
	}

	public function updateProds($sku, $qty, $date)
	{
		$this->db->select('qty'); 
    	$this->db->from('products');   
    	$this->db->where('sku', $sku);
    	$newQty = $this->db->get()->row_array();
    	$newQty = $newQty['qty'] - $qty;

		$data = array(
               'qty' => $newQty,
               'lastUpdated' => $date
            );

		$this->db->where('sku', $sku);
		$this->db->update('products', $data); 
	}
	
}