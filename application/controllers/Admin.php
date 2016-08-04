<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller{

		public function index(){

				if(!$this->session->userdata('admin_isLogged'))
				{
					$data['page_title'] = 'Login Admin';
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/login', $data);
				}else
				{
					$data['page_title'] = 'Admin Dashboard';
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/dashboard', $data);
				}

			$this->load->view('admin/template/footer');
		}
		
		public function login ()
		{
			if($this->input->post())
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->model('admin_model');
				$data_username = array('username'  => $username);
				if(!$data_user = $this->admin_model->getUserdata($data_username))
				{
					$this->session->set_flashdata('error', 'Username or Password is Wrong (debug 1)');
					redirect('admin/');
				}else
				{
					if(password_verify($password, $data_user->password))
					{
						$session_user = array (

							'admin_isLogged'		=> True,
							'admin_username'		=> $username

							);

						$this->session->set_userdata($session_user);

						redirect('admin/');
					}else
					{
						$this->session->set_flashdata('error', 'Username or Password is Wrong (debug 2)');
						redirect('admin/');
					}
				}

			}else
			{
				redirect('admin/');
			}
		}

		public function forget ($param1 = 'forget')
		{
			if($param1 == 'forget')
			{
				$data['page_title'] = 'Reset Admin Password';
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/forget', $data);
				$this->load->view('admin/template/footer', $data);
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
						redirect('admin/');
					}else
					{
						$this->session->set_flashdata('error', 'Email not sent!');
						redirect('admin/');
					}
				}else
				{
					$this->session->set_flashdata('error', 'No Account Registered With That Email!');
					redirect('admin/');
				}
			}
		}

		public function clients($param1 = 'new')
		{
			if(!$this->session->userdata('admin_isLogged'))
				{
					redirect('admin/');
				}

			if($param1 == 'new')
			{
				$data['page_title'] = 'New Client Account';
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/new_client', $data);
				$this->load->view('admin/template/footer', $data);
			}else if($param1 == 'submit')
			{
				if($this->input->post())
				{
					$username 	= $this->input->post('username');
					$email 		= $this->input->post('email');
					$password 	= substr(md5(microtime()),rand(0,26),5);

					$data 		= array (

						'username'	=> $username,
						'email'		=> $email,
						'password'	=> $password

						);

					$this->load->model('admin_model');
					if($this->admin_model->createNewClient($data))
					{
						$this->session->set_flashdata('success', 'Create New Client Succeded!');
						redirect('admin/');
					}else
					{
						$this->session->set_flashdata('error', 'Create New Client Failed!');
						redirect('admin/');
					}

				}else
				{
					redirect('admin/');
				}
			}else
			{
				redirect('admin/');
			}
		}

		public function see_as($param1 = '')
		{
			if(!$this->session->userdata('admin_isLogged'))
				{
					redirect('admin/');
				}

		}

		public function logout()
		{
			session_destroy();
			redirect('main');
		}

		//For Creating a new Admin
		public function create_new ($param1 ='')
		{
			if($param1 == '')
			{
				$data['page_title'] = 'Create New Admin';
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/new', $data);
				$this->load->view('admin/template/footer', $data);
			}else if($param1 == 'submit')
			{
				if($this->input->post())
				{
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$email = $this->input->post('email');

					$data = array (

						'username'		=> $username,
						'password'		=> password_hash($password, PASSWORD_BCRYPT),
						'email'			=> $email,
						'created'		=> date()

						);

					$this->load->model('admin_model');
					if($this->admin_model->newAdmin($data))
					{
						$this->session->set_flashdata('success', 'Create Success!');
						redirect('admin/');
					}else
					{
						$this->session->set_flashdata('error', 'Create error!');
						redirect('admin/');
					}

				}else
				{
					redirect('admin/');
				}
			}else
			{
				redirect('/admin');
			}
		}

	}

 ?>