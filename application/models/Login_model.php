<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model{

		public function insert_data_new_user($data = array())
		{
			//Check if the same username is present
			$this->db->where('username', $data['username']);

			if($this->db->get('user')->num_rows() == 0)
			{
				$this->db->insert('user', $data);
			}else
			{
				return false;
			}
		}

		public function getUserdata ($username = '')
		{
			$this->db->where('username', $username);
			if($this->db->get('user')->num_rows() > 0)
			{
				return $this->db->get('user')->row();
			}else
			{
				return false;
			}
		}
		
	}
 ?>