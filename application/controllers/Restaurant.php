<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurant extends CI_Controller{

		public function cuisine($cuisine = ''){

			if($cuisine != ''){
				$cuisine_name = str_replace('%20', ' ', $cuisine);
				$data['cuisine_name'] = $cuisine_name;
				$data['page_title']	= 'Restaurants';
				$data['restaurants']=$this->db->get_where('restaurants',array('cuisine' => $cuisine_name,'is_approved' => 1) )->result();

			}else{
				$data['cuisine_name'] = "All Restaurants";
				$data['page_title']	= 'Restaurants';
				$data['restaurants']=$this->db->get_where('restaurants',array('is_verified' => 1))->result();
			}

				$this->template->load('default','restaurant/restaurant_list' ,$data);	
		}
		

		public function detail($name = ''){



			if($this->input->post('restaurant-search') != ''){
				$name = $this->input->post('restaurant-search');
			}
			elseif($this->input->post('restaurant-search') == '' && $name ==''){
				redirect('main');
			}

			$restaurant_name = str_replace('%20', ' ', $name);
			$data['page_title']	= $restaurant_name;
			$data['restaurant'] = $this->db->get_where('restaurants', array('username' => $restaurant_name))->row();
			$restaurant_id = $this->db->get_where('restaurants', array('username' => $restaurant_name))->row('id');
			$data['dishes'] = $this->crud_model->get_by_condition('dishes', array('restaurant_id' => $restaurant_id))->result();
			$this->template->load('default','restaurant/restaurant_details' ,$data);	

		}

		
	}

 ?>