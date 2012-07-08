<?php
class m_rekrutmen extends Model {

	function m_rekrutmen() {
		parent::Model();
		$this->CI =& get_instance();
		$this->load->helper('date');
	}
	function getRekrutmen($id) {
		$result = array();
		$this->db->select('*');
		$this->db->from('rekrutmen');
		$this->db->where('ID_REKRUTMEN', $id);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
        	$result['idrekrutmen']= $row->ID_REKRUTMEN;
            $result['lokasi']= $row->ID_LOKASI;
            $result['jenis_rekrutmen']= $row->ID_JENIS_REKRUT;
            $result['pelaksana']= $row->ID_PELAKSANA;
            $result['nama_rekrutmen']= $row->NAMA_REKRUTMEN;
            $result['tgl_buka']= $row->TGL_BUKA;
            $result['tgl_tutup']= $row->TGL_TUTUP;
        }
        //mengambil nilai batas usia maximal
        $this->db->select('*');
		$this->db->from('batasusia');
		$this->db->where('ID_REKRUTMEN',$id);
		$array_keys_values = $this->db->get();
		$i=1;
		$data[1]= "batas1";
		$data[2]= "batas2";
        foreach ($array_keys_values->result() as $row)
        { 
        	$result[$data[$i]]= $row->USIA_PELAMAR_MAX;
        	$i++;
        }
        return $result;
	}
	function getListBatasUsia(){
		$data = $this->db->select('*');
		$data = $this->db->from('rekrutmen');
		$data = $this->db->join('batasusia','batasusia.ID_REKRUTMEN = rekrutmen.ID_REKRUTMEN');
	    $data = $this->db->join('tingkatpendidikan','batasusia.ID_TINGKAT = tingkatpendidikan.ID_TINGKAT');
		$data = $this->db->get();
		return $data->result();
	}
	
	function getTotalRekrutmen(){
		$query = $this->db->query("SELECT COUNT(*) AS dupe FROM rekrutmen,batasusia WHERE rekrutmen.ID_REKRUTMEN = batasusia.ID_REKRUTMEN");
        $row = $query->row();
        return $row->dupe;
	}
	function getAllRekrutmen(){
		
		$result = array();
		$this->db->select('*');
		$this->db->where('STATUS_REKRUTMEN',1);
		$this->db->from('rekrutmen');
//		$this->db->order_by('NAMA_AGAMA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Rekrutmen-';
            $result[$row->ID_REKRUTMEN]= $row->NAMA_REKRUTMEN;
        }
        
        
        return $result;
	}
	function getBidang(){
		$data = $this->db->get('bidangjabatan');
		return $data->result();
	}

	function getListRekrutmen() {
		$data = $this->db->select('*');
		$data = $this->db->from('rekrutmen');
		$data = $this->db->join('batasusia','batasusia.ID_REKRUTMEN = rekrutmen.ID_REKRUTMEN');
		$data = $this->db->join('lokasi','lokasi.ID_LOKASI = rekrutmen.ID_LOKASI');
		$data = $this->db->join('jenisrekrutmen','jenisrekrutmen.ID_JENIS_REKRUT = rekrutmen.ID_JENIS_REKRUT');
		$data = $this->db->join('Pelaksana','pelaksana.ID_PELAKSANA = rekrutmen.ID_PELAKSANA');
		$data = $this->db->get();
		return $data->result();
	}
	
	function getRekrutmenSeleksi(){
		$data = $this->db->select('*');
		$data = $this->db->from('rekrutmen');
		$data = $this->db->join('lokasi','lokasi.ID_LOKASI = rekrutmen.ID_LOKASI');
		$data = $this->db->join('jenisrekrutmen','jenisrekrutmen.ID_JENIS_REKRUT = rekrutmen.ID_JENIS_REKRUT');
		$data = $this->db->join('Pelaksana','pelaksana.ID_PELAKSANA = rekrutmen.ID_PELAKSANA');
		$data = $this->db->where('TGL_TUTUP <', date("Y-m-d", strtotime("now")));
		$data = $this->db->get();
		return $data->result();
	}
	function getLokasi() {
		$result = array();
		$this->db->select('*');
		$this->db->from('lokasi');
//		$this->db->order_by('NAMA_AGAMA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Lokasi-';
            $result[$row->ID_LOKASI]= $row->NAMA_LOKASI;
        }
        
        return $result;	
	}
	function getJenisRekrut() {
		$result = array();
		$this->db->select('*');
		$this->db->from('jenisrekrutmen');
//		$this->db->order_by('NAMA_AGAMA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Jenis Rekrutmen-';
            $result[$row->ID_JENIS_REKRUT]= $row->NAMA_JENIS_REKRUT;
        }
        
        return $result;
	}
	function getPelaksana() {
		$result = array();
		$this->db->select('*');
		$this->db->from('pelaksana');
//		$this->db->order_by('NAMA_AGAMA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Pelaksana-';
            $result[$row->ID_PELAKSANA]= $row->NAMA_PELAKSANA;
        }
        
        return $result;	
	}
	function getPeserta($idRekrut){
		$data = $this->db->where('ID_REKRUTMEN',$idRekrut);
		$data = $this->db->get('peserta');
		return $data->result();
	}
	function getTingkat() {
	$data = $this->db->where('STATUS_PT',1);
	$data = $this->db->get('tingkatpendidikan');
	return $data->result();
	}
	
	function update($id){
	$data = array(
			        'ID_LOKASI'      	=> $this->input->post('lokasi'),
			        'ID_JENIS_REKRUT'  	=> $this->input->post('jenis_rekrutmen'),
			        'ID_PELAKSANA'     	=> $this->input->post('pelaksana'),
			        'NAMA_REKRUTMEN'    => $this->input->post('nama_rekrutmen'),
			        'TGL_BUKA' 			=> $this->input->post('tgl_buka'),
			        'TGL_TUTUP' 	        => $this->input->post('tgl_tutup')
			);
		$this->db->where('ID_REKRUTMEN', $id);
		$this->db->update('rekrutmen', $data);
  		
		$data = array('USIA_PELAMAR_MAX' => $this->input->post('batas1'));
		$this->db->where('ID_REKRUTMEN',$id);
		$this->db->where('ID_TINGKAT',$this->input->post('tingkat1'));
		$this->db->update('batasusia', $data);
		
		$data = array('USIA_PELAMAR_MAX'	=>$this->input->post('batas2'));
		$this->db->where('ID_REKRUTMEN',$id);
		$this->db->where('ID_TINGKAT',$this->input->post('tingkat2'));
		$this->db->update('batasusia', $data);
		
	}
		
	
	function insert() {
//			
		$data = array(
					'ID_REKRUTMEN'		=> NULL,
			        'ID_LOKASI'      	=> $this->input->post('lokasi'),
			        'ID_JENIS_REKRUT'  	=> $this->input->post('jenis_rekrutmen'),
			        'ID_PELAKSANA'     	=> $this->input->post('pelaksana'),
			        'NAMA_REKRUTMEN'    => $this->input->post('nama_rekrutmen'),
			        'TGL_BUKA' 			=> $this->input->post('tgl_buka'),
			        'TGL_TUTUP' 	    => $this->input->post('tgl_tutup'),
					'STATUS_REKRUTMEN'  => 1,
			);
		$this->db->insert('rekrutmen', $data);
		$query = $this->db->query('SELECT LAST_INSERT_ID()');
  		$row = $query->row_array();
  		$id=$row['LAST_INSERT_ID()'];
  		
		$data = array(
					 'ID_REKRUTMEN'		=> $id,
					 'ID_TINGKAT' 		=>$this->input->post('tingkat1'),
					 'USIA_PELAMAR_MAX'	=>$this->input->post('batas1')
			);
			$this->db->insert('batasusia', $data);
		$data = array(
					 'ID_REKRUTMEN'		=> $id,
					 'ID_TINGKAT' 		=>$this->input->post('tingkat2'),
					 'USIA_PELAMAR_MAX'	=>$this->input->post('batas2')
			);
		$this->db->insert('batasusia', $data);
		
	}
	
	function delete($id){
	$this->db->where('ID_REKRUTMEN',$id);
	$this->db->delete('rekrutmen');	
	}
	function close($id){
		$data = array('STATUS_REKRUTMEN'	=> 0);
		$this->db->where('ID_REKRUTMEN',$id);
		$this->db->update('rekrutmen', $data);
	}
}
?>