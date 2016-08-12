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
		//Put Orders Into Database & Email The Drivers *Look Inside Order_model*
		$this->load->model('order_model');
		// $order_id = $this->order_model->new_order($this->cart->contents());
		$order_id = 25;
		$data['order_id'] = $order_id;
		$data['page_title'] = 'order';
		$data['order'] = $this->db->get_where('order_history', array('id' => $order_id))->row();


		$this->template->load('default','users/find_driver', $data);
	}

	public function tracking ($order_id)
	{
		$status = $this->db->get_where('order_history', array('id' => $order_id))->row()->status;

		echo $status;
	}

}

?>