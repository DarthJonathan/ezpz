<?php 

class Order_model extends CI_Model{

	public function new_order ($cart)
	{
		$orders = array(

			'status'			=> 0,
			'total_product'		=> count($cart),
			'total_qty'			=> $this->cart->total_items(),
			'total_price'		=> $this->cart->total(),
			'user_id'			=> $this->session->userdata('user_id'),
			'code'				=> substr(md5(microtime()),rand(0,26),5)

			); 

		//Put into order_history
		$this->db->insert('order_history', $orders);

		//Get order ID
		$order_id = $this->db->get_where('order_history', array('code' => $orders['code']))->row()->id;

		//Put into order_detail
		foreach ($cart as $item)
		{		
			$data = array (

				'order_id' 		=> $order_id,
				'product_id'	=> $item['id'],
				'options'		=> $item['options'],
				'qty'			=> $item['qty'],
				'sub_total'		=> $item['qty'] * $item['price'],

				);

			//Put into order_history
			$this->db->insert('order_detail', $data);
		}


	}


}