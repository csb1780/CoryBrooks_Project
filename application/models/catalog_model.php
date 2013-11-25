<?php
class Catalog_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getProducts()
	{
		$query = $this->db->get_where('products', array('qty >' => 0));
		return $query->result_array();
	}

	public function update($sku, $name, $price, $qty, $id, $date)
	{
		$data = array(
				'sku' => $sku,
				'name' => $name,
				'price' => $price,
        		'qty' => $qty,
        		'lastUpdated' => $date
            );

		$this->db->where('sku', $id);
		return $this->db->update('products', $data);
	}

	public function insert($sku, $name, $price, $qty)
	{
		$data = array(
				'sku' => $sku,
				'name' => $name,
				'price' => $price,
        		'qty' => $qty
            );
		return $this->db->insert('products', $data);
	}

}