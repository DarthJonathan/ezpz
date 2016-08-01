<?php 


	class Main extends CI_Controller{

		public function index(){
			$this->load->view('logins/login_user');
		}

		public function signup(){
			$this->load->view('logins/signup_form');
		}

		public function signup_submit(){
				if($this->input->post('submit')){
				//configuration
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '3000';
				$config['max_width'] = '2000';
				$config['max_height'] = '1500';
				
				//initialization
				$this->upload->initialize($config);

				//upload
				if($this->upload->do_upload('image')){
					$image = $this->upload->data();
				}

				$username = $this->input->post('username');
				$password = password_hash($this->input->post('password'),PASSWORD_BCRYPT);
				$email = $this->input->post('email');
				$telephone = $this->input->post('telephone');
				$address = $this->input->post('address');

				$data = array(

					'username' => $username,
					'password' => $password,
					'email' => $email,
					'telephone' => $telephone,
					'address' => $address,
					'photo' => $image['file_name']

					);

				$this->login_model->insert_data('user',$data);

				$this->session->setflashdata('success', 'User has been added');

				redirect('main');
			}
		}

	}

 ?>