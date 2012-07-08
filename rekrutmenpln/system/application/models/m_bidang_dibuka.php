<?php
class m_bidang_dibuka extends Model {

	function m_bidang_dibuka() {
		parent::Model();
		$this->CI =& get_instance();
	}
	
	function getBidang(){
		$result = array();
		$this->db->select('*');
		$this->db->from('bidangjabatan');
//		$this->db->order_by('NAMA_AGAMA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Bidang-';
            $result[$row->ID_BID]= $row->NAMA_BID;
        }
        
        return $result;
	}
	function getProdi(){
		$data = $this->db->get('programstudi');
		$result = array();
		$i=0;
		foreach($data->result() as $rows){
			$result[$i] = $rows;
			$i++;
		}
		return $result;
	}
	function getBidangJabatanDibuka($idrekrutmen,$idbidang) {
		$result = array();
		$this->db->select('*');
		$this->db->from('bidangjabatandibuka');
		$this->db->where('ID_REKRUTMEN', $idrekrutmen);
		$this->db->where('ID_BID', $idbidang);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
        	$result['rekrutmen']= $row->ID_REKRUTMEN;
            $result['bidang']= $row->ID_BID;
            $result['quota']= $row->QUOTA;
        }
        
        return $result;
	}
	
	
	function getTotalBidangDibuka(){
		$query = $this->db->query("SELECT COUNT(*) AS dupe FROM bidangjabatandibuka,programstudiperbidang WHERE bidangjabatandibuka.ID_BID = programstudiperbidang.ID_BID AND bidangjabatandibuka.ID_REKRUTMEN = programstudiperbidang.ID_REKRUTMEN" );
        $row = $query->row();
        return $row->dupe;
	}

	function getListBidangJabatanDibuka() {
		
		$data = $this->db->query('select bidangjabatandibuka.*,bidangjabatan.*,programstudiperbidang.*,programstudi.nama_ps,rekrutmen.nama_rekrutmen,rekrutmen.tgl_buka,rekrutmen.tgl_tutup,lokasi.nama_lokasi 
								 from    bidangjabatandibuka,bidangjabatan,programstudiperbidang,programstudi,rekrutmen, lokasi
								 where   bidangjabatandibuka.id_bid = bidangjabatan.id_bid and
								 		 programstudiperbidang.ID_REKRUTMEN =  bidangjabatandibuka.ID_REKRUTMEN and
									     bidangjabatandibuka.id_bid = programstudiperbidang.id_bid and
									     programstudi.id_ps = programstudiperbidang.id_ps  and 
									     rekrutmen.id_rekrutmen = bidangjabatandibuka.id_rekrutmen and 
									     rekrutmen.id_lokasi = lokasi.id_lokasi');
//		$data = $this->db->from('bidangjabatandibuka,lokasi,rekrutmen');
//		$data = $this->db->join('bidangjabatan','bidangjabatan.ID_BID = bidangjabatandibuka.ID_BID');
//		$data = $this->db->join('rekrutmen','rekrutmen.ID_REKRUTMEN = bidangjabatandibuka.ID_REKRUTMEN');
//		$data = $this->db->join('rekrutmen','rekrutmen.ID_LOKASI = lokasi.ID_LOKASI');
//		$data = $this->db->join('programstudiperbidang','programstudiperbidang.ID_REKRUTMEN = bidangjabatandibuka.ID_REKRUTMEN AND programstudiperbidang.ID_BID = bidangjabatandibuka.ID_BID');
//		//$data = $this->db->join('programstudiperbidang','programstudiperbidang.ID_TINGKAT = tingkatpendidikan.ID_TINGKAT');
//		$data = $this->db->get();
		return $data->result();
	}
	

	
	function countDataProdi($idrekrutmen,$idbidang){
		$query = $this->db->query("SELECT COUNT(*) AS dupe FROM programstudiperbidang WHERE ID_REKRUTMEN = '$idrekrutmen' AND ID_BID = '$idbidang'");
        $row = $query->row();
        return $row->dupe;
	}
	function totalProdi(){
		$query = $this->db->query("SELECT COUNT(*) AS dupe FROM programstudi");
        $row = $query->row();
        return $row->dupe;
	}
	
	
	function update($idrekrutmen,$idbidang){
		$this->db->where('ID_REKRUTMEN', $idrekrutmen);
		$this->db->where('ID_BID', $idbidang);
		$this->db->delete('programstudiperbidang');
		
		$data = array(
			        'ID_REKRUTMEN'      	=> $this->input->post('rekrutmen'),
			        'ID_BID'  				=> $this->input->post('bidang'),
			        'QUOTA'     			=> $this->input->post('quota'),
			     );
		$this->db->update('bidangjabatandibuka', $data);
		
		foreach($this->input->post('program_studi') as $rows){
				$data = array( 'ID_REKRUTMEN'		=> $this->input->post('rekrutmen'),
					 		   'ID_BID' 			=>$this->input->post('bidang'),
					 		   'ID_PS'	=> $rows
				);
			$this->db->insert('programstudiperbidang', $data);
		}
		
	}
	function getDataExisting($idrekrutmen,$idbidang){
		$result = array();
		$data = $this->db->where('ID_REKRUTMEN',$idrekrutmen);
		$data = $this->db->where('ID_BID',$idbidang);
		$data = $this->db->get('programstudiperbidang');
		$i=0;
		foreach($data->result() as $row){
			$result[$i]= $row;
			$i++;
		}
		return $result;
	}
	function insert() {
//			
		$data = array(
					'ID_REKRUTMEN'		=> $this->input->post('rekrutmen'),
			        'ID_BID'      		=> $this->input->post('bidang'),
			        'QUOTA'  			=> $this->input->post('quota')
			);
		$this->db->insert('bidangjabatandibuka', $data);
		foreach($this->input->post('program_studi') as $rows){
				$data = array( 'ID_REKRUTMEN'		=> $this->input->post('rekrutmen'),
					 		   'ID_BID' 			=>$this->input->post('bidang'),
					 		   'ID_PS'	=> $rows
				);
			$this->db->insert('programstudiperbidang', $data);
		}
	}
	
	function delete($idrekrutmen,$idbidang,$idtingkat){
	
	
	$query = $this->db->query("SELECT COUNT(*) AS dupe FROM programstudiperbidang WHERE ID_REKRUTMEN = '$idrekrutmen' AND ID_BID = '$idbidang'");
        $row = $query->row();
        $total = $row->dupe;
       if($total==1){
       		$this->db->where('ID_REKRUTMEN',$idrekrutmen);
			$this->db->where('ID_BID',$idbidang);
			$this->db->delete('bidangjabatandibuka');
       }else{
       	$this->db->where('ID_REKRUTMEN',$idrekrutmen);
		$this->db->where('ID_BID',$idbidang);
		$this->db->where('ID_PS',$idtingkat);
		$this->db->delete('programstudiperbidang');
       }
	}
}
?>