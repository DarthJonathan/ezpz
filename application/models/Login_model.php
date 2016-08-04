<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model{

		public function insert_data_new_user($table, $data = array())
		{
			$flag = 0;

			//Check if the thing is present
			$check = array(

				'username' 	=> $data['username']

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

			//Check On The Clients Database
			if ($this->db->get_where('restaurants', $check)->num_rows() > 0)
			{
				$flag++;
			}

			//Check if the thing is present
			$check = array(

				'email' 	=> $data['email']

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

			//Check On The Clients Database
			if ($this->db->get_where('restaurants', $check)->num_rows() > 0)
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

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
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

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
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

			//Check On The Clients Database
			else if ($this->db->get_where('restaurants', $check)->num_rows() > 0)
			{
					$to = $email;
					$subject = "Your Reseted Password";
					$message = "Hello!
								Here is your reseted password\n
								
								Password :" . $data['password'] . "\n
								
								For Safety Please Quickly Change Your Password!";

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
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
			if($this->db->get_where('user', $data)->num_rows() > 0)
			{
				return $this->db->get_where('user', $data)->row();
			}else if($this->db->get_where('driver', $data)->num_rows() > 0)
			{
				return $this->db->get_where('driver', $data)->row();
			}else if($this->db->get_where('restaurants', $data)->num_rows() > 0)
			{
				return $this->db->get_where('restaurants', $data)->row();
			}else
			{
				return false;
			}
		}

		public function updateUserdata ($table, $data)
		{
			$this->db->set($data);
			$this->db->where('id', $this->session->userdata('user_id'));
			return $this->db->update($table);
		}

		public function email($type, $email, $data)
		{
			if($type == 'new_password')
			{
					$to = $email;
					$subject = "Your Reseted Password";
					$message = "Hello!
								Here is your reseted password\n
								
								Password :" . $data . "\n
								
								For Safety Please Quickly Change Your Password!";

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
								'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					
					if(!mail($to, $subject, $message, $headers))
					{
						return false;
					}
			}else if($type == 'verify_account')
			{
					$to = $email;
					$subject = "Your to Your New EZPZ Account!";
					$message = "Hello!
								Here is your link for account verification\n";
								
					$message .=	'<a href=' . '"' . $data . '">Click Here to Verify.</a>';
								
					$message .=	" Please Enjoy Our Services!";

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
								'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					
					if(!mail($to, $subject, $message, $headers))
					{
						return false;
					}
			}
		}

		public function verify_account($md5)
		{

				$seperated_code = explode('~', $md5);
				$data = array(

					'username' => $seperated_code[0], 
					'verification_code' => $seperated_code[1]

					);


				$set = array (
						
					'is_verified' 			=> 1,
					'verification_code'		=> NULL

					);

				if($this->db->get_where('user', $data)->num_rows() > 0)
				{

					$this->db->set($set);
					$this->db->where($data);
					return $this->db->update('user');

				}else if($this->db->get_where('driver', $data)->num_rows() > 0)
				{
					
					$this->db->set($set);
					$this->db->where($data);
					return $this->db->update('driver');

				}else
				{
					return false;
				}
		}
		
	}
 ?>