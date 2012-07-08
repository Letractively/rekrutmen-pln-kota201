<?php 
class MTest extends Model{
	
	function MTest(){
		parent::Model();
	}
	
	function insertPsikotest(){
		
		
		
		
	}
	
//	function getPassingGrade($id){
//		$pg = 0;
//		$this->db->select('*');
//		$this->db->from('passinggrade');
//		$this->db->where('ID_PG', $id);
//		$result = $this->db->get();
//		$i=1;
//		foreach ($result->result() as $row){
//			$pg = $row->NILAI; 
//		}		
//		return $pg;
//	}
  
	function getPassingGrade($id){
        $query = $this->db->query("SELECT NILAI AS dupe FROM passinggrade WHERE ID_PG = '$id'");
        $row = $query->row();
        return $row->dupe;  	
  }
	

	
}

?>