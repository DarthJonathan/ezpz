<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller{

		public function index(){

				if(!$this->session->userdata('user_id'))
				{
					redirect(base_url());
				}else
				{
					$data['page_title']	= 'Dashboard';
					$this->load->view('dashboard/template/header', $data);
					$this->load->view('dashboard/dashboard.php');
				}

			$this->load->view('dashboard/template/footer');
		}

		public function restaurants(){
			if(!$this->session->userdata('user_id'))
				{
					redirect(base_url());
				}else
				{
					$data['page_title']	= 'Restaurants';
					$this->load->view('dashboard/template/header', $data);
					$this->load->view('dashboard/restaurant_list.php');
				}

			$this->load->view('dashboard/template/footer');
		}

		public function logout ()
		{
			session_destroy();
			redirect('main');
		}



	}

 ?>