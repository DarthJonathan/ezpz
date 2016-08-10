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
				$this->load->library('cart');

				$dish = $this->crud_model->get_by_condition('dishes', array('id' => $this->input->post('dish_id'), 'restaurant_id' => $this->input->post('resto_id')))->row();

				$item  = array (

					'id' 	=> $dish->id,
					'qty'	=> $this->input->post('quantity'),
					'price'	=> $dish->price,
					'name'	=> $dish->name

					);

				$this->cart->insert($item);

				redirect($this->input->post('url'));

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
				'qty'			=> $this->input->post('qty')

					);

			for($i = 0; $i < count($this->cart->contents()); $i++){
				$data_update = array(
						'rowid' => $data['rowid'][$i],
						'qty' => $data['qty'][$i],
						'options' => array('color' => $data['color'][$i] )
					);
				$this->cart->update($data_update);
			}
					


				redirect('cart/overview');
			}else
			{
				redirect ('main');
			}
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