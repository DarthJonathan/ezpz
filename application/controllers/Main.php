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
						$this->session->set_flashdata('error', 'Username has been Registered 1');
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
						$this->session->set_flashdata('error', 'Username has been Registered 2');
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
				if(!$data_user = $this->login_model->getUserdata($username))
				{
					$this->session->set_flashdata('error', 'Username or Password is Wrong (debug 1)');
					redirect('main');
				}else
				{
					if(password_verify($password, $data_user->password))
					{
						if($data_user->driver_licence == NULL)
						{
							$session_user 	= array (

								'username'		=> $username,
								'user_id'		=> $data_user->id,
								'isLogged'		=> TRUE,
								'type'			=> 'user'
								
							);
							$this->session->set_userdata($session_user);

							redirect('/dashboard');
						}else
						{
							$session_user 	= array (

								'username'		=> $username,
								'user_id'		=> $data_user->id,
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

	}

 ?>