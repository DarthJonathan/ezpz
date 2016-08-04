<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurant extends CI_Controller{

		public function index($name = '', $dish = ''){

			if($name == '')
			{
					$data['page_title']	= 'Restaurants';
					$this->load->view('template/header', $data);
					$this->load->view('restaurant/restaurant_list.php', $data);
			}else
			{
				$data['page_title'] = '';
				$this->load->view('template/header', $data);
				$this->load->view('home', $data);	
			}

			$this->load->view('template/footer');
		}

	}

 ?>