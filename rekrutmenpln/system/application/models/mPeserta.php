<?php 
class MPeserta extends Model{
	
	function MTest(){
		parent::Model();
	}
	
  function addPeserta($idPel, $rekrut, $bid, $test){
  	$data = array(
  		'ID_REKRUTMEN'	=> $rekrut,
  		'ID_PEL'		=> $idPel,
  		'ID_BID'		=> $bid,
  		'TGL_DAFTAR'	=> date('Y-m-d'),
  		'NO_TEST'		=> $test
  		
  	);
  	
  	$this->db->insert('peserta', $data);
  }
  
  function addPesertaTidakLulus($idPel, $rekrut, $bid, $test, $ket){
  	$data = array(
  		'ID_REKRUTMEN'	=> $rekrut,
  		'ID_PEL'		=> $idPel,
  		'ID_BID'		=> $bid,
  		'TGL_DAFTAR'	=> date('Y-m-d'),
  		'NO_TEST'		=> $test,
  		'KETERANGAN'	=> $ket
  		
  	);
  	
  	$this->db->insert('peserta', $data);
  }
  
  function pesertaCount($idrekrut)
  {
        $query = $this->db->query("SELECT COUNT(*) AS dupe FROM peserta WHERE ID_REKRUTMEN = '$idrekrut'");
        $row = $query->row();
        return $row->dupe;
  }
  
  function jmlPesertaGagal($idpel){
        $query = $this->db->query("SELECT COUNT(*) AS dupe FROM pesertatidaklulus WHERE ID_PEL = '$idpel'");
        $row = $query->row();
        return $row->dupe;  	
  }
  
  function generateNoTest($idpel,$rekrut,$idbid){
  	$noTest = '';
  	$number = $this->pesertaCount($rekrut)+1;
  	$query = "select bj.KODE_BID, substr(tp.NAMA_TINGKAT,1,2) as TINGKAT, date_format(rek.TGL_TUTUP,'%Y')as TAHUN, lok.KODE_LOKASI, jr.KODE_JENIS_REKRUT from bidangjabatandibuka a 
			inner join bidangjabatan bj on a.ID_BID = bj.ID_BID
			inner join tingkatpendidikan tp on bj.ID_TINGKAT = tp.ID_TINGKAT
			inner join rekrutmen rek on rek.ID_REKRUTMEN = a.ID_REKRUTMEN
			inner join jenisrekrutmen jr on rek.ID_JENIS_REKRUT = jr.ID_JENIS_REKRUT
			inner join lokasi lok on lok.ID_LOKASI = rek.ID_LOKASI
			where a.ID_BID = '$idbid' and a.ID_REKRUTMEN = '$rekrut'";
  	$result = $this->db->query($query);
  	foreach($result->result() as $row){
  		$noTest = $row->KODE_LOKASI.$row->TAHUN.'/'.$row->TINGKAT.'/'.$row->KODE_BID.'/'.$number;
  	}
  	return $noTest;
  }
  
//  function insertPesertaLulus(idPel, $rekrut, $bid)
//  
//
}

?>