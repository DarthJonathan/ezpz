<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		public function index(){
			$this->load->view('template/header');

				if(!$this->session->userdata('user_id'))
				{
					$this->load->view('logins/login_user');
				}else
				{
					redirect('dashboard');
				}

			$this->load->view('template/footer');
		}

		public function signup($mode = 'user')
		{
			$this->load->view('template/header');

				if(!$this->session->userdata('user_id'))
				{
					if($mode == 'user')
					{
						$this->load->view('logins/signup_form');
					}
						else if($mode == 'driver')
					{
						$this->load->view('logins/signup_form_driver');
					}
				}else
				{
					redirect('dashboard');
				}
			$this->load->view('template/footer');
		}

		public function signup_submit(){
			
			if($this->input->post('submit'))
			{
					// //configuration
					// $config['upload_path'] 		= './uploads/';
					// $config['file_name']		= 'profile_picture.jpg';
					// $config['allowed_types'] 	= 'jpg';
					// $config['max_size'] 		= 5000;
					
					// //initialization
					// $this->upload->initialize($config);

					// //upload
					// if($this->upload->do_upload('image')){
						
					// 	$photo_link = $config['upload_path'] . $config['file_name'];

					// }else
					// {
					// 	$error = array('error' => $this->upload->display_errors());
					// 	$this->session->set_flashdata('error', $error);
					// }

					$data = array(

						'username' 			=> $this->input->post('username'),
						'password' 			=> password_hash($this->input->post('password'),PASSWORD_BCRYPT),
						'email' 			=> $this->input->post('email'),
						'telephone' 		=> $this->input->post('telephone'),
						'address' 			=> $this->input->post('address')

						);

					$this->load->model('login_model');

					//Check if The Username is unique
					if(!$this->login_model->insert_data_new_user($data))
					{
						$this->session->set_flashdata('error', 'Username has been Registered');
						redirect('main');
					}else
					{
						$this->session->set_flashdata('success', 'User has been added');
						redirect('main');
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
						$session_user 	= array (

							'username'		=> $username,
							'user_id'		=> $data_user->id,
							'isLogged'		=> TRUE
							
						);
						$this->session->set_userdata($session_user);

						redirect('/dashboard');
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