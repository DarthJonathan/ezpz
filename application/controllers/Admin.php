<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller{

		public function index(){

				if(!$this->session->userdata('admin_isLogged'))
				{
					$data['page_title'] = 'Login Admin';
					$this->template->load('default_admin', 'admin/login', $data);
				}else
				{
					$data['page_title'] = 'Admin Dashboard';
				
					$this->template->load('default_admin', 'admin/dashboard', $data);
				}

		
		}
		
		public function login ()
		{
			if($this->input->post())
			{
				$username = $this->input->post('username');
				$password = hash_password($this->input->post('password'));

				
				if(!$data_user = $this->admin_model->verifyUser($username,$password))
				{
					$this->session->set_flashdata('error', 'Username or Password is Wrong');
					redirect('admin/');
				}else
				{
					
					$session_user = array (

						'admin_isLogged'		=> True,
						'admin_username'		=> $username

						);

					$this->session->set_userdata($session_user);

					redirect('admin/');
					
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
				
					$this->template->load('default_admin', 'admin/forget', $data);
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

		public function users ($type = '')
		{
			$this->load->model('admin_model');

			switch ($type)
			{
				case 'user':
				{
						$users = $this->admin_model->getUsers('users');
						$data['users'] = $users;
						$data['type']= $type;
						$data['page_title'] = 'All Users Accounts';
						
						$this->template->load('default_admin', 'admin/view_users', $data);
				}break;

				case 'driver':
				{
						$users = $this->admin_model->getUsers('drivers');
						$data['users'] = $users;
						$data['type']= $type;
						$data['page_title'] = 'All Driver Accounts';
					
						$this->template->load('default_admin', 'admin/view_users', $data);
				}break;

				case 'client':
				{
						$users = $this->admin_model->getClients('1');
						$data['users'] = $users;
						$data['type']= $type;
						$data['page_title'] = 'All Client Accounts';
					
					$this->template->load('default_admin', 'admin/view_users', $data);
				}break;

				default:
				{
					redirect('/admin');
				}break;
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
				
					$this->template->load('default_admin', 'admin/new_client', $data);
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
						'password'	=> $password,
						'created'	=> date('Y-m-d')

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

		//Method for login as anyone *TUGAS MULIA*
		public function loginEverywhere ($type = '', $id = '')
		{
			switch ($type)
			{	
				case 'user':
				{
					if($id == '')
					{
						redirect('admin');
					}else
					{
						$data_user = $this->admin_model->getUsers($type, $id);

						//Check if user have completed their data
							if($data_user->firstname == NULL && $data_user->lastname == NULL && $data_user->photo == NULL)
							{
								$complete = False;
							}else
							{
								$complete = True;
							}

						$session_user 	= array (

								'username'		=> $data_user->username,
								'name'			=> $data_user->firstname .' '. $data_user->lastname,
								'user_id'		=> $data_user->id,
								'data_complete'	=> $complete,
								'is_verified'	=> $data_user->is_verified,
								'isLogged'		=> TRUE,
								'type'			=> 'driver'
								
							);
						$this->session->set_userdata($session_user);
						redirect('main');
					}
				}break;

				case 'driver':
				{
					if($id == '')
					{
						redirect('admin');
					}else
					{
						$data_user  = $this->admin_model->getUsers($type, $id);
						
						//Check if user have completed their data
							if($data_user->firstname == NULL && $data_user->lastname == NULL && $data_user->photo_front == NULL && $data_user->photo_back == NULL)
							{
								$complete = FALSE;
							}else
							{
								$complete = True;
							}

						$session_user 	= array (

								'username'		=> $data_user->username,
								'name'			=> $data_user->firstname .' '. $data_user->lastname,
								'user_id'		=> $data_user->id,
								'data_complete'	=> $complete,
								'is_verified'	=> $data_user->is_verified,
								'isLogged'		=> TRUE,
								'type'			=> 'user'
								
							);
						$this->session->set_userdata($session_user);
						redirect('main/');
					}
				}break;

				case 'client':
				{
					if($id == '')
					{
						redirect('admin');
					}else
					{
						$data_user = $this->admin_model->getUsers('restaurants', $id);

						//Check if user have completed their data
							if($data_user->name == NULL && $data_user->address == NULL && $data_user->opentime == NULL && $data_user->closetime == NULL && $data_user->opendays == NULL && $data_user->longitude == NULL  && $data_user->latitude == NULL && $data_user->photo == NULL  && $data_user->phone == NULL)
							{
								$complete = FALSE;
							}else
							{
								$complete = True;
							}

						$session_user 	= array (

								'username'		=> $data_user->username,
								'name'			=> $data_user->name,
								'user_id'		=> $data_user->id,
								'data_complete'	=> $complete,
								'isLogged'		=> TRUE,
								'type'			=> 'clients'
								
							);
						$this->session->set_userdata($session_user);
						redirect('main/');
					}
				}break;

				default :
				{
					redirect ('admin');
				}
			}
		}

		public function logout()
		{
			session_destroy();
			redirect('admin');
		}

		//For Creating a new Admin
		public function create_new ($param1 ='')
		{
			if($param1 == '')
			{
				$data['page_title'] = 'Create New Admin';
				
					$this->template->load('default_admin', 'admin/new', $data);
			}else if($param1 == 'submit')
			{
				if($this->input->post())
				{
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$email = $this->input->post('email');

					$data = array (

						'username'		=> $username,
						'password'		=> hash_password($password),
						'email'			=> $email,
						'created'		=> date('Y-m-d')

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