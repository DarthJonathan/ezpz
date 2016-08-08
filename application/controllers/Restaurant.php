<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurant extends CI_Controller{

		public function cuisine($cuisine = ''){

			if($cuisine != ''){
				$cuisine_name = str_replace('%20', ' ', $cuisine);
				$data['cuisine_name'] = $cuisine_name;
				$data['page_title']	= 'Restaurants';
				$data['restaurants']=$this->db->get_where('restaurants',array('cuisine' => $cuisine_name) )->result();

			}else{
				$data['cuisine_name'] = "All Restaurants";
				$data['page_title']	= 'Restaurants';
				$data['restaurants']=$this->db->get('restaurants')->result();
			}

				$this->template->load('default','restaurant/restaurant_list' ,$data);	
		}
		

		public function detail($name = ''){

			if($this->input->post()){
				$name = $this->input->post('restaurant-search');
			}

			$restaurant_name = str_replace('%20', ' ', $name);
			$data['page_title']	= $restaurant_name;
			$data['restaurant'] = $this->db->get_where('restaurants', array('username' => $restaurant_name))->row();
			$data['dishes'] = $this->crud_model->get_by_condition('dishes', array('restaurant_id' => $this->session->userdata('user_id')))->result();
			$this->template->load('default','restaurant/restaurant_details' ,$data);	

		}

		
	}

 ?>