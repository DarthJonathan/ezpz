<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cart extends CI_Controller{

		public function index(){
			
			parent::__construct();

			if($this->session->userdata('isLogged') == False)
			{
				redirect('main');
			}
			
		}

		//Add Item To Basket
		public function add()
		{
			if($this->input->post())
			{
				if($this->cart_model->add())
				{
					$this->session->set_flashdata('success', ' Updating Cart Success!');
					redirect($this->input->post('url'));
				}else
				{
					$this->session->set_flashdata('failed', ' Updating Cart Failed!');
					redirect($this->input->post('url'));
				}
			}else
			{
				redirect ('main');
			}
		}

		//Cart update link
		public function update()
		{
			if($this->input->post())
			{
				$data = array (
					
				'rowid' 		=> $this->input->post('rowid'),
				'qty'			=> $this->input->post('quantity')

					);

				if($this->cart_model->update($data))
				{
					$this->session->set_flashdata('success', ' Updating Cart Success!');
					redirect('cart/overview');
				}
				else
				{
					$this->session->set_flashdata('failed', ' Updating Cart Failed!');
					redirect('cart/overview');
				}

			}else
			{
				redirect ('main');
			}
		}

		//Checkout
		public function checkout ()
		{
			echo '<pre>';
			print_r($this->cart->contents());
			echo '</pre>';
			exit;
		}

		//Cart Overview and Check out
		public function overview()
		{
			$data['page_title'] = 'Your Shopping Cart';

			$data['items'] =$this->cart->contents() ;
					
			$this->template->load('default','cart/overview', $data);
		}

	}
?>