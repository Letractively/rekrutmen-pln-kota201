<?php 
class Mlowongan extends Model {
  function __construct (){
    parent::Model();
  }
  
  function getBidangDibuka(){
  	$qry = 
		"SELECT rk.NAMA_REKRUTMEN, date_format(rk.TGL_BUKA,'%d %M %Y') as TGL_BUKA, date_format(rk.TGL_TUTUP,'%d %M %Y')as TGL_TUTUP, a.ID_REKRUTMEN, a.ID_BID, bd.NAMA_BID, bd.KODE_BID, lok.NAMA_LOKASI
		FROM bidangjabatandibuka a
		INNER JOIN rekrutmen rk on rk.ID_REKRUTMEN = a.ID_REKRUTMEN 
		INNER JOIN jenisrekrutmen jr on rk.ID_JENIS_REKRUT = jr.ID_JENIS_REKRUT AND jr.KODE_JENIS_REKRUT = 'JF'
		INNER JOIN bidangjabatan bd on bd.ID_BID = a.ID_BID
		INNER JOIN lokasi lok on lok.ID_LOKASI = rk.ID_LOKASI
		AND a.ID_REKRUTMEN IN 
		(SELECT b.ID_REKRUTMEN
		FROM rekrutmen b
		WHERE b.TGL_TUTUP > now( ))";
  	$result = $this->db->query($qry);
//  	$i = 1;
//  	foreach($array_keys_values->result() as $row()){
//  		$result[$i] = $row->ID_REKRUTMEN;
//  		$result[$i] = $row->NAMA_REKRUTMEN;
//  		$result[$i] = $row->TGL_BUKA;
//  		$result[$i] = $row->TGL_TUTUP;
//  		$result[$i] = $row->ID_BID;
//  		$result[$i] = $row->NAMA_BID;
//  		$result[$i] = $row->KODE_BID;
//  		$result[$i] = $row->NAMA_LOKASI;
//  	}
  	return $result;
  }
  
  function getDetailBidang($idRekrut, $idBdg){
  	$qry = 
  		"select a.ID_BID, bj.KODE_BID, bj. NAMA_BID, bj.DESKRIPSI, ps.NAMA_PS, bu.USIA_PELAMAR_MAX, tp.NAMA_TINGKAT, js.NAMA_JS, js.MIN_IPK from bidangjabatandibuka a 
		inner join bidangjabatan bj on bj.ID_BID = a.ID_BID
		inner join programstudiperbidang psb on psb.ID_BID = a.ID_BID
		inner join programstudi ps on ps.ID_PS = psb.ID_PS
		inner join batasusia bu on bj.ID_TINGKAT = bu.ID_TINGKAT and bu.ID_REKRUTMEN = '$idRekrut'
		inner join tingkatpendidikan tp on tp.ID_TINGKAT = bj.ID_TINGKAT
		inner join jenisstudi js on js.ID_JS = bj.ID_JS
		where a.ID_BID = '$idBdg' AND a.ID_REKRUTMEN = '$idRekrut'";
  	$result = $this->db->query($qry);
  	return $result;
  }
  
  function cekProgramStudi($idPel, $rekrut, $bid){
        $query = 
        	$this->db->query(
        		"select count(a.ID_PS) as dupe from pendidikanformalpt a 
				where a.ID_PEL = '$idPel' and 
				EXISTS 
				( select * from programstudiperbidang b 
				where b.ID_PS = a.ID_PS AND b.ID_REKRUTMEN = '$rekrut' AND b.ID_BID = '$bid');");
        $row = $query->row();
        return ($row->dupe > 0) ? TRUE : FALSE;
  }
  
//  function addPeserta($idPel, $rekrut, $bid){
//  	$data = array(
//  		'ID_REKRUTMEN'	=> $rekrut,
//  		'ID_PEL'		=> $idPel,
//  		'ID_BID'		=> $bid,
//  		'TGL_DAFTAR'	=> date('Y-m-d')
//  	);
//  	
//  	$this->db->insert('peserta', $data);
//  	
//  }
  
  
 }?>