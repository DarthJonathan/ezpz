<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		public function index(){
			$data['page_title'] = 'Home';
			$data['cuisines']	= array('Apel', 'Udang', 'kentang', 'Irvan', ' Jonathan', 'setyawan', 'felita');
			$this->load->view('template/header', $data);
			$this->load->view('home', $data);	
			$this->load->view('template/footer');
		}
	}

 ?>