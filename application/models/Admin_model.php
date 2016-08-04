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
			$email = $data['email'];

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
				echo 'INII';
				exit();
			}

			$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

			return $this->db->insert('restaurants', $data);
		}

		public function getUsers ($table)
		{
			
		}
		
	}
 ?>