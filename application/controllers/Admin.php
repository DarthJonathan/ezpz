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

							);
						
						$this->session->set_userdata($session_user);

						redirect('/admin');
						}
					}else
					{
						$this->session->set_flashdata('error', 'Username or Password is Wrong (debug 2)');
						redirect('admin/');
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