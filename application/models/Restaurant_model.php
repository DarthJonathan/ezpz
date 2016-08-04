<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurant_model extends CI_Model{

		public function get_restaurant_data($name)
		{
			return 	$this->db->get_where('restaurants', array('name' => $name))->row();
		}

		public function get_dish_data()
		{
			return 	$this->db->get_where('dishes', array('name' => $name))->row();
		}
		
	}
 ?>