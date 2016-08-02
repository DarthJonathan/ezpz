<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller{

		public function index(){
			$this->load->view('template/header');

				if(!$this->session->userdata('user_id'))
				{
					redirect(base_url());
				}else
				{
					echo 'logged_in';
				}

			$this->load->view('template/footer');
		}

		public function logout ()
		{
			session_destroy();
			redirect('main');
		}

		

	}

 ?>