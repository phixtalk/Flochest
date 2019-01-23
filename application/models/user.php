<?php

class User extends CI_Model {

    function __construct(){
        parent::__construct();
    }
	public function get_login_user($email,$password){
		$field = "email";
		if(is_numeric($email)){
			$field = "phone";
		}
		$sql = "SELECT a.*
				FROM userbase a 
				WHERE a.".$field." = ? AND a.pass = ? 
				LIMIT 1";
		$query = $this->db->query($sql,array($email,$password)); 
		return $query->result();	
	}
}
/* End of file entity.php */
?>