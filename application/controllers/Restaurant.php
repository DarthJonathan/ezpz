<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurant extends CI_Controller{

		public function cuisine($cuisine = ''){
				$cuisine_name = str_replace('%20', ' ', $cuisine);
				$data['cuisine_name'] = $cuisine_name;
				$data['page_title']	= 'Restaurants';
				$data['restaurants']=$this->db->get_where('restaurants',array('cuisine' => $cuisine_name) )->result();
				$this->load->view('template/header', $data);
				$this->load->view('restaurant/restaurant_list.php', $data);
				$this->load->view('template/footer');
		}
		

		public function detail($name = ''){

			$restaurant_name = str_replace('%20', ' ', $name);
			$data['page_title']	= $restaurant_name;
			$data['restaurant'] = $this->db->get_where('restaurants', array('username' => $restaurant_name))->row();
			$this->load->view('template/header', $data);
			$this->load->view('restaurant/restaurant_details.php', $data);
			$this->load->view('template/footer');

		}

		public function update_location($lat,$lng){

			$data = array(
				 'latitude' => urldecode($lat),
				 'longitude' => urldecode($lng)
				);
			$this->db->update('restaurants',$data, array('id' => $this->session->userdata('user_id')) );
		}
	}

 ?>