<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller{

		public function index(){

				if(!$this->session->userdata('user_id'))
				{
					redirect(base_url());
				}else
				{
					$data['page_title']	= 'Dashboard';
					$this->load->view('dashboard/template/header', $data);
					$this->load->view('dashboard/dashboard.php');
				}

			$this->load->view('dashboard/template/footer');
		}

		public function logout ()
		{
			session_destroy();
			redirect('main');
		}

		public function complete_data ($param1 = '', $type = 'user')
		{
			if($param1 == 'submit')
			{
				if($this->input->post())
				{
		            $config['allowed_types']        = 'jpg';
		            $config['max_size']             = 5000;
		            // $config['max_width']            = 1000;
		            // $config['max_height']           = 768;

		            $this->load->library('upload', $config);
					
					if($type == 'user')
					{
						$firstname = $this->input->post('firstname');
						$lastname = $this->input->post('lastname');

						$config['upload_path']          = 'uploads/user/' . $this->session->userdata('user_id');
						$config['overwrite']			= True;
						$config['file_name']			= 'photo.jpg';
						$this->upload->initialize($config);

						//Check if the folder for the upload existed
						if(!file_exists($config['upload_path']))
						{
							//if not make the folder so the upload is possible
							mkdir($config['upload_path'], 0777, true);
						}

		                if ( ! $this->upload->do_upload('photo'))
		                {
		                        $error = array('error' => $this->upload->display_errors());
		                        $this->session->set_flashdata('error', $error['error']);

		                        redirect('dashboard/complete_data');
		                }
		                else
		                {
		                	//Get the link for the database
		                    $photo = $config ['upload_path'] . '/' . $config ['file_name'];
		                }

		                $data = array (

		                	'firstname'		=> $firstname,
		                	'lastname'		=> $lastname,
		                	'photo'			=> $photo	

		                	);

		                $this->load->model('login_model');
		                if($this->login_model->updateUserdata($type, $data))
		                {
		                	$this->session->set_flashdata('success', 'Updating Data Success!');
		                	redirect('dashboard/');
		                }

					}else if($type == 'driver')
					{ 

						$firstname = $this->input->post('firstname');
						$lastname = $this->input->post('lastname');

						$config['upload_path']          = 'uploads/driver/' . $this->session->userdata('user_id');
						$config['overwrite']			= True;
						$config['file_name']			= 'photo_front.jpg';
						$this->upload->initialize($config);

						//Check if the folder for the upload existed
						if(!file_exists($config['upload_path']))
						{
							//if not make the folder so the upload is possible
							mkdir($config['upload_path'], 0777, true);
						}

		                //Driver Licence Front
		                if ( ! $this->upload->do_upload('photo_front'))
		                {
		                        $error = array('error' => $this->upload->display_errors());
		                        $this->session->set_flashdata('error', $error['error'] . ' Front Photo');

		                        redirect('dashboard/complete_data');
		                }
		                else
		                {
		                	//Get the link for the database
		                    $photo_front = $config ['upload_path'] . '/' . $config ['file_name'];
		                }

		                //Driver Licence Behind
		                $config['file_name']			= 'photo_back.jpg';
						$this->upload->initialize($config);

		                if ( ! $this->upload->do_upload('photo_back'))
		                {
		                        $error = array('error' => $this->upload->display_errors());
		                        $this->session->set_flashdata('error', $error['error'] . ' Back Photo');

		                        redirect('dashboard/complete_data');
		                }
		                else
		                {
		                	//Get the link for the database
		                    $photo_back = $config ['upload_path'] . '/' . $config ['file_name'];
		                }

		                //Driver Profile Photo
		                $config['file_name']			= 'photo.jpg';
						$this->upload->initialize($config);

		                if ( ! $this->upload->do_upload('photo'))
		                {
		                        $error = array('error' => $this->upload->display_errors());
		                        $this->session->set_flashdata('error', $error['error'] . ' Profile Photo');

		                        redirect('dashboard/complete_data');
		                }
		                else
		                {
		                	//Get the link for the database
		                    $photo = $config ['upload_path'] . '/' . $config ['file_name'];
		                }

		                $data = array (

		                	'firstname'				=> $firstname,
		                	'lastname'				=> $lastname,
		                	'photo_front'			=> $photo_front,
		                	'photo_back'			=> $photo_back,
		                	'photo'					=> $photo	

		                	);

		                $this->load->model('login_model');
		                if($this->login_model->updateUserdata($type, $data))
		                {
		                	$this->session->set_flashdata('success', 'Updating Data Success!');
		                	redirect('dashboard/');
		                }

					}else
					{
						redirect('main');
					}

				}else
				{
					$this->session->set_flashdata('error', 'Please Fill All The Forms!');
					redirect('main');	
				}
			}else
			{
				if($this->session->userdata('type') == 'user')
				{
					$data['page_title'] = 'Update Data User';
					$this->load->view('template/header', $data);
					$this->load->view('dashboard/update_form_user', $data);
				}else
				{
					$data['page_title'] = 'Update Driver Data';
					$this->load->view('template/header', $data);
					$this->load->view('dashboard/update_form_driver', $data);
				}

				$this->load->view('template/footer');
			}
		
		}

		public function change_password ($param1 = '')
		{	
			if($this->input->post() && $param1 == 'submit')
			{
				$password = $this->input->post('old_password');
				$newpass  = $this->input->post('new_password');
				$confpass  = $this->input->post('conf_password');

				if($newpass != $confpass)
				{
					$this->session->set_flashdata('error', 'Confirmation password and new password is not the same');
					redirect('dashboard/complete_data');
					exit();
				}

				$this->load->model('login_model');
				$data_username = array('username'  => $this->session->userdata('username'));
				$data_user = $this->login_model->getUserdata($data_username);

				if(password_verify($password, password_hash($data_user->password, PASSWORD_BCRYPT)))
				{
					$new_data = array('password' => $newpass);

					if($this->login_model->updateUserdata($this->session->set('type'), $new_data))
		            {
		                $this->session->set_flashdata('success', 'Updating Password Success!');
		                $this->login_model->email('new_password', $data_user->email, $new_data);
		                redirect('dashboard/');
		            }

				}else
				{
					$this->session->set_flashdata('error', 'Old Password is not correct');
					redirect('dashboard/complete_data');
					exit();
				}
			}else
			{
				redirect('dashboard/');
			}
		}

	}

 ?>