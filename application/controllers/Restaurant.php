<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurant extends CI_Controller{

		public function index($name = '', $dish = ''){

			if($name == '')
			{
				redirect('main/');
			}else
			{
				$data['page_title'] = '';
				$this->load->view('template/header', $data);
				$this->load->view('home', $data);	
				$this->load->view('template/footer');
			}
		}


		public function restaurants(){
			if(!$this->session->userdata('user_id'))
				{
					redirect(base_url());
				}else
				{
					$data['page_title']	= 'Restaurants';
					$this->load->view('dashboard/template/header', $data);
					$this->load->view('restaurant/restaurant_list.php');
				}

			$this->load->view('dashboard/template/footer');
		}
	}

 ?>