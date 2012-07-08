<?php
class m_test extends Model {

	function m_test() {
		parent::Model();
		$this->CI =& get_instance();
	}
	
	function countTest($data,$table){
		
		$i=0;
		$num = array();
		foreach($data['rekrutmen'] as $rows){
			$this->db->where('ID_REKRUTMEN',$rows->ID_REKRUTMEN);
			$num[$i] = $this->db->count_all_results($table);
			$i++;
		}
		return $num;
	}
	
	function getPeserta($id){
		$data = $this->db->select('*');
		$data = $this->db->from('pesertalulus');
		$data = $this->db->join('pelamar','pelamar.ID_PEL = pesertalulus.ID_PEL');
		$data = $this->db->where('ID_REKRUTMEN',$id);
		$data = $this->db->get();
		return $data->result();
	}
}
?>