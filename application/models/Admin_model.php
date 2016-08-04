<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_model extends CI_Model{

		public function getUserdata($data)
		{
			return $this->db->get_where('admin', $data)->row();
		}

		public function newAdmin ($data)
		{
			return $this->db->insert('admin', $data);
		}

		public function createNewClient($data)
		{
			$pass = substr(md5(microtime()),rand(0,26),5);

		}
		
	}
 ?>