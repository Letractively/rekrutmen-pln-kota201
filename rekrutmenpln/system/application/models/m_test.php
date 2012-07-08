<?php
class m_test extends Model {

	function m_test() {
		parent::Model();
		$this->CI =& get_instance();
	}
	
	function getHasilTestPsikotest($rekrutmen,$test,$status){
		$data = $this->db->query("select pelamar.nama_pel, peserta.no_test, bidangjabatan.kode_bid, lokasi.nama_lokasi, rekrutmen.nama_rekrutmen
								  from  psikotest,pelamar,peserta,bidangjabatan,rekrutmen,lokasi
								  where psikotest.id_pel = pelamar.id_pel and
								        psikotest.id_pel = peserta.id_pel and 
								        psikotest.id_bid = bidangjabatan.id_bid and
								        rekrutmen.id_rekrutmen = '$rekrutmen' and
								        lokasi.id_lokasi = rekrutmen.id_lokasi and 
								        psikotest.statuslulus = '$status' and 
								        psikotest.id_rekrutmen ='$rekrutmen' ");
		return $data->result();
	}
	
	function getHasilTestAkademik($rekrutmen,$test,$status){
		$data = $this->db->query("select pelamar.nama_pel, peserta.no_test, bidangjabatan.kode_bid, lokasi.nama_lokasi, rekrutmen.nama_rekrutmen
								  from  testakademik,pelamar,peserta,bidangjabatan,rekrutmen,lokasi
								  where testakademik.id_pel = pelamar.id_pel and
								        testakademik.id_pel = peserta.id_pel and 
								        testakademik.id_bid = bidangjabatan.id_bid and
								        rekrutmen.id_rekrutmen = '$rekrutmen' and
								        lokasi.id_lokasi = rekrutmen.id_lokasi and 
								        testakademik.statuslulus = '$status' and 
								        testakademik.id_rekrutmen ='$rekrutmen' ");
		return $data->result();
	}
	
	function getHasilTestGat($rekrutmen,$test,$status){
		$data = $this->db->query("select pelamar.nama_pel, peserta.no_test, bidangjabatan.kode_bid, lokasi.nama_lokasi, rekrutmen.nama_rekrutmen
								  from  testgat,pelamar,peserta,bidangjabatan,rekrutmen,lokasi
								  where testgat.id_pel = pelamar.id_pel and
								        testgat.id_pel = peserta.id_pel and 
								        testgat.id_bid = bidangjabatan.id_bid and
								        testgat.id_rekrutmen = '$rekrutmen' and
								        lokasi.id_lokasi = rekrutmen.id_lokasi and 
								        testgat.statuslulus = '$status' and 
								        testgat.id_rekrutmen ='$rekrutmen' ");
		return $data->result();
	}
	function getHasilTestKesehatan($rekrutmen,$test,$status){
		$data = $this->db->query("select pelamar.nama_pel, peserta.no_test, bidangjabatan.kode_bid, lokasi.nama_lokasi, rekrutmen.nama_rekrutmen
								  from  testkesehatan,pelamar,peserta,bidangjabatan,rekrutmen,lokasi
								  where testkesehatan.id_pel = pelamar.id_pel and
								        testkesehatan.id_pel = peserta.id_pel and 
								        testkesehatan.id_bid = bidangjabatan.id_bid and
								        testkesehatan.id_rekrutmen = '$rekrutmen' and
								        lokasi.id_lokasi = rekrutmen.id_lokasi and 
								        testkesehatan.statuslulus = '$status' and 
								        testkesehatan.id_rekrutmen ='$rekrutmen' ");
		return $data->result();
	}
	function getHasilTestWawancara($rekrutmen,$test,$status){
		$data = $this->db->query("select pelamar.nama_pel, peserta.no_test, bidangjabatan.kode_bid, lokasi.nama_lokasi, rekrutmen.nama_rekrutmen
								  from  wawancara,pelamar,peserta,bidangjabatan,rekrutmen,lokasi
								  where wawancara.id_pel = pelamar.id_pel and
								        wawancara.id_pel = peserta.id_pel and 
								        wawancara.id_bid = bidangjabatan.id_bid and
								        wawancara.id_rekrutmen = '$rekrutmen' and
								        lokasi.id_lokasi = rekrutmen.id_lokasi and 
								        wawancara.statuslulus = '$status' and 
								        wawancara.id_rekrutmen ='$rekrutmen' ");
		return $data->result();
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