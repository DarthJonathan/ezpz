<?php 

	class Login_model extends CI_Model{

		public function insert_data($table, $data = array() ){
			$this->db->insert($table,$data);
		}


		
	}




 ?>