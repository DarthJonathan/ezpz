<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Accounts extends CI_Controller{

		public function index(){

				if(!$this->session->userdata('user_id'))
				{
					$data['page_title'] = 'Login';
					$this->load->view('template/header', $data);
					$this->load->view('logins/login_user', $data);
				}else
				{
					redirect('dashboard');
				}

			$this->load->view('template/footer');
		}

		public function signup($mode = 'user')
		{

				if(!$this->session->userdata('user_id'))
				{
					if($mode == 'user')
					{
						$data['page_title'] = 'Sign Up User';
						$this->load->view('template/header', $data);
						$this->load->view('logins/signup_form', $data);
					}
						else if($mode == 'driver')
					{
						$data['page_title'] = 'Sign Up Driver';
						$this->load->view('template/header', $data);
						$this->load->view('logins/signup_form_driver', $data);
					}
				}else
				{
					redirect('dashboard');
				}
			$this->load->view('template/footer');
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
						'password' 			=> password_hash($this->input->post('password'),PASSWORD_BCRYPT),
						'email' 			=> $this->input->post('email'),
						'telephone' 		=> $this->input->post('telephone'),
						'address' 			=> $this->input->post('address'),
						'is_verified'		=> 0,
						'verification_code'	=> $verification_code,
						'created'			=> date('Y-m-d')

						);

					$this->load->model('login_model');

					//Check if The Username is unique
					if(!$this->login_model->insert_data_new_user('user', $data))
					{
						$this->session->set_flashdata('error', 'Username or Email has been Registered');

						redirect('accounts/');
					}else
					{
						$this->login_model->email('verify_account', $data['email'], $verification_string);
						$this->session->set_flashdata('success', 'User has been added');

						redirect('accounts/');
					}

				}else if($mode == 'driver')
				{
					$verification_string = $this->input->post('username') . '~' . $verification_code;
					$data = array(

						'username' 			=> $this->input->post('username'),
						'password' 			=> password_hash($this->input->post('password'),PASSWORD_BCRYPT),
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

					$this->load->model('login_model');

					//Check if The Username is unique
					if(!$this->login_model->insert_data_new_user('driver', $data))
					{
						$this->session->set_flashdata('error', 'Username or Email has been Registered');

						redirect('accounts/');

					}else
					{
						$this->login_model->email('verify_account', $data['email'], $verification_string);
						$this->session->set_flashdata('success', 'User has been added');

						redirect('accounts/');

					}
				}
			}else
			{
				$this->session->set_flashdata('error', 'Please Fill All The Forms!');
				redirect('accounts');
			}
		}

		
		public function login ()
		{
			if($this->input->post())
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->model('login_model');
				$data_username = array('username'  => $username);
				if(!$data_user = $this->login_model->getUserdata($data_username))
				{
					$this->session->set_flashdata('error', 'Username or Password is Wrong (debug 1)');
					redirect('accounts/');
				}else
				{
					if(password_verify($password, $data_user->password))
					{
						$type = $this->login_model->getAccountType($username);

						if($type == 'driver')
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
								'type'			=> 'driver'
								
							);
							$this->session->set_userdata($session_user);

							redirect('/dashboard');
						}else if($type == 'clients')
						{
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
								'isLogged'		=> TRUE,
								'type'			=> 'clients'
								
							);
							$this->session->set_userdata($session_user);

							redirect('/dashboard');
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

							redirect('/dashboard');
						}
					}else
					{
						$this->session->set_flashdata('error', 'Username or Password is Wrong (debug 2)');
						redirect('accounts/');
					}
				}

			}else
			{
				redirect('main');
			}
		}

		public function forget ($param1 = 'forget')
		{
			if($param1 == 'forget')
			{
				$data['page_title'] = 'Login';
				$this->load->view('template/header', $data);
				$this->load->view('logins/forget', $data);
				$this->load->view('template/footer', $data);
			}else if($param1 == 'reset')
			{
				$email = $this->input->post('email');
				$new_pass = substr(md5(microtime()),rand(0,26),5);
				$this->load->model('login_model');

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
				redirect('main');
			}else
			{
				$this->load->model('login_model');
				if($this->login_model->verify_account($md5))
				{
					$this->session->set_flashdata('success', 'Account Verification is Successful!');
					redirect('dashboard/');
				}else
				{
					$this->session->set_flashdata('error', 'Account Verification is not Successful!');
					session_destroy();
					redirect('accounts/');
				}
			}

		}

	}

 ?>