<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_model extends CI_Model{

		public function create_new_client($data)
		{
			$pass = substr(md5(microtime()),rand(0,26),5);

		}
		
	}
 ?>