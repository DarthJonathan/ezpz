<?php 

class Order extends CI_Controller{

	public function __construct ()
	{
		parent::__construct();

		if($this->session->userdata('isLogged') == False || $this->session->userdata('type') != 'user')
		{
			redirect('main');
		}
	}

	public function search_driver ()
	{
		//Put Orders Into Database
		$this->load->model('order_model');
		$this->order_model->new_order($this->cart->contents());

		//Email Drivers
		$drivers  = $this->crud_model->get_data('drivers')->result();

		foreach ($drivers as $driver)
		{
			$emails[] = $driver->email;
		}

		$to = implode (", ", $emails); 
	}

}

?>