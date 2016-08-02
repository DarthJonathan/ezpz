<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model{

		public function insert_data_new_user($table, $data = array())
		{
			$flag = 0;

			//Check if the same username is present
			$check = array('username' => $data['username']);

			//Check On The User Database
			if($this->db->get_where('user', $check)->num_rows() > 0)
			{
				$flag++;
			}
			
			//Check On The Driver Database
			if ($this->db->get_where('driver', $check)->num_rows() > 0)
			{
				$flag++;
			}

			if($flag != 0)
			{
				return false;
			}else
			{
				return $this->db->insert($table, $data);
			}

		}

		public function getUserdata ($username = '')
		{
			$this->db->where('username', $username);
			if($this->db->get('user')->num_rows() > 0)
			{
				return $this->db->get('user')->row();
			}else if($this->db->get('driver')->num_rows() > 0)
			{
				return $this->db->get('driver')->row();
			}else
			{
				return false;
			}
		}
		
	}
 ?>