<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model{

		public function insert_data_new_user($table, $data = array())
		{
			$flag = 0;

			//Check if the thing is present
			$check = array(

				'username' 	=> $data['username'],
				'email'		=> $data['email']

				);

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

		public function resetPassword($email,  $data = array())
		{
			//Check if the thing is present
			$check = array(

				'email'		=> $email
				
				);

			//Check On The User Database
			if($this->db->get_where('user', $check)->num_rows() > 0)
			{
					$to = $email;
					$subject = "Your Reseted Password";
					$message = "Hello!
								Here is your reseted password\n
								
								Password :" . $data['password'] . "\n
								
								For Safety Please Quickly Change Your Password!";
					$headers = 'From: noreply@ezpz.com' . "\r\n" .
								'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					
					if(!mail($to, $subject, $message, $headers))
					{
						return false;
					}

				$new_data = array('password' => password_hash($data['password'], PASSWORD_BCRYPT));

				$this->db->set($new_data);
				$this->db->where($check);
				return $this->db->update('user');
			}
			
			//Check On The Driver Database
			else if ($this->db->get_where('driver', $check)->num_rows() > 0)
			{
					$to = $email;
					$subject = "Your Reseted Password";
					$message = "Hello!
								Here is your reseted password\n
								
								Password :" . $data['password'] . "\n
								
								For Safety Please Quickly Change Your Password!";
					$headers = 'From: noreply@ezpz.com' . "\r\n" .
								'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					
					if(!mail($to, $subject, $message, $headers))
					{
						return false;
					}

				$new_data = array('password' => password_hash($data['password'], PASSWORD_BCRYPT));

				$this->db->set($new_data);
				$this->db->where($check);
				return $this->db->update('driver');
			}

			else
			{
				return false;
			}

		}

		public function getUserdata ($data = '')
		{
			$this->db->where($data);
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