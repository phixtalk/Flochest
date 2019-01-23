<?php

class Entity extends CI_Model {

    function __construct(){
        parent::__construct();
    }

	public function get_entity_by_id($table,$id,$branchid=0){
		$sql = "SELECT a.*, c.username as 'addedby',
				e.username as 'updatedby'
				FROM ".$table." a, users b, employee c,
				users d, employee e 
				WHERE a.id = ? AND a.createdby = b.id 
				AND b.employeeid=c.id
				AND a.modifiedby = d.id 
				AND d.employeeid=e.id 
				".($branchid!=0?" AND a.branchid='".
				$this->db->escape_like_str($branchid)."' 
				":""). " LIMIT 1";
		$query = $this->db->query($sql,array($id));
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	public function get_entity($table,$branchid=0){
		$sql = "SELECT a.*, c.username as 'addedby',
				e.username as 'updatedby'
				FROM ".$table." a, users b, employee c,
				users d, employee e 
				WHERE a.createdby = b.id 
				AND b.employeeid=c.id
				AND a.modifiedby = d.id 
				AND d.employeeid=e.id 
				".($branchid!=0?" AND a.branchid='".
				$this->db->escape_like_str($branchid)."' 
				":""). " ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return array();
		}
	}

	
}
/* End of file entity.php */
?>