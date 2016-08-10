<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cart_model extends CI_Model{

		
		public function add ()
		{
			$this->load->library('cart');

			$dish = $this->crud_model->get_by_condition('dishes', array('id' => $this->input->post('dish_id'), 'restaurant_id' => $this->input->post('resto_id')))->row();

			$item  = array (

				'id' 	=> $dish->id,
				'qty'	=> $this->input->post('quantity'),
				'price'	=> $dish->price,
				'name'	=> $dish->name

				);

			return $this->cart->insert($item);
		}

		public function update ($data)
		{
			for($i = 0; $i < count($this->cart->contents()); $i++){
				$data_update = array(
						'rowid' => $data['rowid'][$i],
						'qty' => $data['qty'][$i],
						'options' => array('color' => $data['color'][$i] )
					);
				$this->cart->update($data_update);
			}

			return true;
		}


		
	}
 ?>