<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Accounts extends CI_Controller{

		public function index(){

				if(!$this->session->userdata('user_id'))
				{
					$data['page_title'] = 'Login';
					
					$this->template->load('default_login','logins/login_user', $data);
				}else
				{
					redirect('main');
				}	
		}

		public function signup($mode = 'user')
		{

				if(!$this->session->userdata('user_id'))
				{
					if($mode == 'user')
					{
						$data['page_title'] = 'Sign Up User';
						$this->template->load('default','logins/signup_form', $data);
					}
					else if($mode == 'driver')
					{
						$data['page_title'] = 'Sign Up Driver';
						$this->template->load('default','logins/signup_form_driver', $data);
					}
					else if($mode == 'client')
					{
						$data['page_title'] = 'Become a partner';
						$this->template->load('default','logins/add_partner', $data);
					}
				}else{
					redirect('main');
				}
			
		}

		public function signup_submit($mode = 'user'){
			
			if($this->input->post())
			{
				$verification_code = bin2hex(openssl_random_pseudo_bytes(32));
				
				if($mode == 'user')
				{
					$verification_string = $this->input->post('username') . '~' . $verification_code;
					$data = array(

						'username' 			=> $this->input->post('username'),
						'password' 			=> hash_password($this->input->post('password')),
						'email' 			=> $this->input->post('email'),
						'telephone' 		=> $this->input->post('telephone'),
						'address' 			=> $this->input->post('address'),
						'is_verified'		=> 0,
						'verification_code'	=> $verification_code,
						'created'			=> date('Y-m-d')

						);

					//Check if The Username is unique
					if(!$this->login_model->insert_data_new_user('users', $data))
					{
						$this->session->set_flashdata('error', 'Username or Email has been Registered');

						redirect('accounts/signup/user');
					}else
					{
						$this->login_model->email('verify_account', $data['email'], $verification_string);
						$this->session->set_flashdata('success', 'User has been added');

						redirect('accounts');
					}

				}else if($mode == 'driver')
				{
					$verification_string = $this->input->post('username') . '~' . $verification_code;
					$data = array(

						'username' 			=> $this->input->post('username'),
						'password' 			=> hash_password($this->input->post('password')),
						'email' 			=> $this->input->post('email'),
						'phone'		 		=> $this->input->post('telephone'),
						'address' 			=> $this->input->post('address'),
						'ird'	 			=> $this->input->post('ird_number'),
						'driver_licence' 	=> $this->input->post('driver_license'),
						'licence_type' 		=> $this->input->post('license_type'),
						'is_verified'		=> 0,
						'verification_code'	=> $verification_code,
						'created'			=> date('Y-m-d')

						);


					//Check if The Username is unique
					if(!$this->login_model->insert_data_new_user('drivers', $data))
					{
						$this->session->set_flashdata('error', 'Username or Email has been Registered');

						redirect('accounts/signup/driver');

					}else
					{
						$this->login_model->email('verify_account', $data['email'], $verification_string);
						$this->session->set_flashdata('success', 'User has been added');

						redirect('accounts');

					}
				}else if($mode == 'client')
				{
					$verification_string = $this->input->post('username') . '~' . $verification_code;
					
					
					$config['allowed_types']        = 'jpg|png';
		            $config['max_size']             = 5000;
		            // $config['max_width']            = 1000;
		            // $config['max_height']           = 768;

		            
										
					$config['upload_path']          = 'uploads/user/' . $this->input->post('name');
					$config['overwrite']			= True;
					$config['file_name']			= 'photo.jpg';
					$this->upload->initialize($config);

					//Check if the folder for the upload existed
					if(!file_exists($config['upload_path']))
					{
						//if not make the folder so the upload is possible
						mkdir($config['upload_path'], 0777, true);
					}

	                if ($this->upload->do_upload('photo'))
	                {
	                    //Get the link for the database
	                    $photo = $config ['upload_path'] . '/' . $config ['file_name'];
	                }

					$data = array(
						'username' => $this->input->post('name'),
						'name' => $this->input->post('name'),
						'address' => $this->input->post('address'),
						'cuisine' => implode(', ',$this->input->post('cuisine')),
						'opentime' => $this->input->post('opentime'),
						'closetime' => $this->input->post('closetime'),
						'opendays' => implode(', ',$this->input->post('opendays')),
						'photo' => $photo,
						'phone' => $this->input->post('phone'),
						'email' => $this->input->post('email'),
						'created' => date('Y-m-d')
					);

					

					

					//Check if The Username is unique
					if(!$this->login_model->insert_data_new_user('restaurants', $data))
					{
						$this->session->set_flashdata('error', 'Username or Email has been Registered');

						redirect('accounts/signup/client');
						

					}else
					{
						$this->login_model->email('verify_account', $data['email'], $verification_string);
						$this->session->set_flashdata('success', 'User has been added');

						redirect('accounts');
						
					}
				}
			}else
			{
				$this->session->set_flashdata('error', 'Please Fill All The Forms!');
				redirect('accounts/');
			}
		}

		
		public function login ()
		{
			if($this->input->post())
			{
				$username = $this->input->post('username');
				$password = hash_password($this->input->post('password'));
				
				if(!$data_user = $this->login_model->verifyUser($username,$password))
				{
					$this->session->set_flashdata('error', 'Username or Password is Wrong');
					redirect('accounts/');
				}else
				{
				
					$type = $this->login_model->getAccountType($username);

					if($type == 'drivers')
					{
						//Check if user have completed their data
						if($data_user->firstname == NULL && $data_user->lastname == NULL && $data_user->photo_front == NULL && $data_user->photo_back == NULL)
						{
							$complete = FALSE;
						}else
						{
							$complete = True;
						}

						//Set the session for login
						$session_user 	= array (

							'username'		=> $username,
							'name'			=> $data_user->firstname .' '. $data_user->lastname,
							'user_id'		=> $data_user->id,
							'data_complete'	=> $complete,
							'is_verified'	=> $data_user->is_verified,
							'isLogged'		=> TRUE,
							'type'			=> 'drivers'
							
						);
						$this->session->set_userdata($session_user);

						redirect('driver');
					}else if($type == 'clients')
					{

						if($data_user->is_verified == 0){
							redirect('accounts');
						}
						//Check if user have completed their data
						if($data_user->name == NULL && $data_user->address == NULL && $data_user->opentime == NULL && $data_user->closetime == NULL && $data_user->opendays == NULL && $data_user->longitude == NULL  && $data_user->latitude == NULL && $data_user->photo == NULL  && $data_user->phone == NULL)
						{
							$complete = FALSE;
						}else
						{
							$complete = True;
						}

						//Set the session for login
						$session_user 	= array (

							'username'		=> $username,
							'name'			=> $data_user->name,
							'user_id'		=> $data_user->id,
							'data_complete'	=> $complete,
							'is_verified'	=> $data_user->is_verified,
							'isLogged'		=> TRUE,
							'type'			=> 'clients'
							
						);
						$this->session->set_userdata($session_user);

						redirect('clients');
					}else
					{	
						//Check if user have completed their data
						if($data_user->firstname == NULL && $data_user->lastname == NULL && $data_user->photo == NULL)
						{
							$complete = False;
						}else
						{
							$complete = True;
						}

						//Set the session for login
						$session_user 	= array (

							'username'		=> $username,
							'name'			=> $data_user->firstname .' '. $data_user->lastname,
							'user_id'		=> $data_user->id,
							'data_complete'	=> $complete,
							'is_verified'	=> $data_user->is_verified,
							'isLogged'		=> TRUE,
							'type'			=> 'user'
							
						);
						$this->session->set_userdata($session_user);

						redirect('user');
					}
					
				}

			}
		}

		public function forget ($param1 = 'forget')
		{
			if($param1 == 'forget')
			{
				$data['page_title'] = 'Login';
				$this->template->load('default','logins/forget', $data);
			}else if($param1 == 'reset')
			{
				$email = $this->input->post('email');
				$new_pass = substr(md5(microtime()),rand(0,26),5);
				

				$user_data = array('email' => $email);

				if($this->login_model->getUserdata($user_data))
				{
					$data = array (

					'password'  => $new_pass

					);

					if($this->login_model->resetPassword($email, $data))
					{
						$this->session->set_flashdata('success', 'Reset Password Success! Please Check Your Email!');
						redirect('accounts/');
					}else
					{
						$this->session->set_flashdata('error', 'Email not sent!');
						redirect('accounts/');
					}
				}else
				{
					$this->session->set_flashdata('error', 'No Account Registered With That Email!');
					redirect('accounts/');
				}
			}
		}

		public function email_verify($md5 = '')
		{
			if($md5 == '')
			{
				redirect('accounts/');
			}else
			{
				
				if($this->login_model->verify_account($md5))
				{
					$this->session->set_flashdata('success', 'Account Verification is Successful!');
					redirect('main');
				}else
				{
					$this->session->set_flashdata('error', 'Account Verification is not Successful!');
					session_destroy();
					redirect('accounts/');
				}
			}

		}

		public function logout ()
		{
			if($this->session->userdata('admin_isLogged') == True)
			{
				$session_des = array('username', 'name', 'user_id', 'data_complete', 'is_verified', 'isLogged', 'type');	
				$this->session->unset_userdata($session_des);
				redirect('admin');
			}else
			{
				$this->session->sess_destroy();
				redirect('main');
			}
		}

	}

 ?>