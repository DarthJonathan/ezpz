<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		public function index(){
			$data['page_title'] = 'Home';
			$data['cuisines']	= array('Asian', 'Udang', 'kentang', 'Irvan', ' Jonathan', 'setyawan', 'felita','Other');
			$this->load->view('template/header', $data);
			$this->load->view('home', $data);	
			$this->load->view('template/footer');
		}

		public function about(){
			$data['page_title'] = 'About';
			$this->load->view('template/header',$data);
			$this->load->view('about');
			$this->load->view('template/footer');
		}

		public function add_partner($param1 = ''){
			if($param1 == '')
			{
				$data['page_title'] = 'Partner Registration';
				$this->load->view('template/header',$data);
				$this->load->view('add_partner');
				$this->load->view('template/footer');
			}else if($param1 == 'submit')
			{
				$new_pass = substr(md5(microtime()),rand(0,26),5);

				$data = array(
					'username' => $this->input->post('name'),
					'password' => $new_pass,
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'cuisine' => $this->input->post('cuisine'),
					'opentime' => $this->input->post('opentime'),
					'closetime' => $this->input->post('closetime'),
					'opendays' => $this->input->post('opendays'),
					'photo' => $this->input->post('photo'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'created' => date('Y-m-d')
					);

				
			}
			
		}



	}
?>