<?php
class m_test extends Model {

	function m_test() {
		parent::Model();
		$this->CI =& get_instance();
	}
	
	function countAkademik($data){
		
		$i=0;
		foreach($data['rekrutmen'] as $rows){
			$this->db->where('ID_REKRUTMEN',$rows->ID_REKRUTMEN);
			$num[$i] = $this->db->count_all_results('testakademik');
			$i++;
		}
		return $num;
	}
	function countPsikotest($data){
		
		$i=0;
		foreach($data['rekrutmen'] as $rows){
			$this->db->where('ID_REKRUTMEN',$rows->ID_REKRUTMEN);
			$num[$i] = $this->db->count_all_results('psikotest');
			$i++;
		}
		return $num;
	}
	function countKesehatan($data){
		
		$i=0;
		foreach($data['rekrutmen'] as $rows){
			$this->db->where('ID_REKRUTMEN',$rows->ID_REKRUTMEN);
			$num[$i] = $this->db->count_all_results('testkesehatan');
			$i++;
		}
		return $num;
	}
	function countGat($data){
		
		$i=0;
		foreach($data['rekrutmen'] as $rows){
			$this->db->where('ID_REKRUTMEN',$rows->ID_REKRUTMEN);
			$num[$i] = $this->db->count_all_results('testgat');
			$i++;
		}
		return $num;
	}
	
	function countwawancara($data){
		
		$i=0;
		foreach($data['rekrutmen'] as $rows){
			$this->db->where('ID_REKRUTMEN',$rows->ID_REKRUTMEN);
			$num[$i] = $this->db->count_all_results('wawancara');
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