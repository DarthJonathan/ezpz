<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

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
				if($mode == 'user')
				{

					$data = array(

						'username' 			=> $this->input->post('username'),
						'password' 			=> password_hash($this->input->post('password'),PASSWORD_BCRYPT),
						'email' 			=> $this->input->post('email'),
						'telephone' 		=> $this->input->post('telephone'),
						'address' 			=> $this->input->post('address')

						);

					$this->load->model('login_model');

					//Check if The Username is unique
					if(!$this->login_model->insert_data_new_user('user', $data))
					{
						$this->session->set_flashdata('error', 'Username or Email has been Registered');
						redirect('main');
					}else
					{
						$this->session->set_flashdata('success', 'User has been added');
						redirect('main');
					}

				}else if($mode == 'driver')
				{
					$data = array(

						'username' 			=> $this->input->post('username'),
						'password' 			=> password_hash($this->input->post('password'),PASSWORD_BCRYPT),
						'email' 			=> $this->input->post('email'),
						'phone'		 		=> $this->input->post('telephone'),
						'address' 			=> $this->input->post('address'),
						'ird'	 			=> $this->input->post('ird_number'),
						'driver_licence' 	=> $this->input->post('driver_license'),
						'licence_type' 		=> $this->input->post('license_type')

						);

					$this->load->model('login_model');

					//Check if The Username is unique
					if(!$this->login_model->insert_data_new_user('driver', $data))
					{
						$this->session->set_flashdata('error', 'Username or Email has been Registered');
						redirect('main');
					}else
					{
						$this->session->set_flashdata('success', 'User has been added');
						redirect('main');
					}
				}
			}else
			{
				$this->session->set_flashdata('error', 'Please Fill All The Forms!');
				redirect('main');
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
					redirect('main');
				}else
				{
					if(password_verify($password, $data_user->password))
					{
						if($data_user->driver_licence == NULL)
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
								'isLogged'		=> TRUE,
								'type'			=> 'user'
								
							);
							$this->session->set_userdata($session_user);

							redirect('/dashboard');
						}else
						{	//Check if user have completed their data
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
								'isLogged'		=> TRUE,
								'type'			=> 'driver'
								
							);
							$this->session->set_userdata($session_user);

							redirect('/dashboard');
						}
					}else
					{
						$this->session->set_flashdata('error', 'Username or Password is Wrong (debug 2)');
						redirect('main');
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
						redirect('main');
					}
				}else
				{
					$this->session->set_flashdata('error', 'No Account Registered With That Email!');
					redirect('main');
				}
			}
		}

	}

 ?>