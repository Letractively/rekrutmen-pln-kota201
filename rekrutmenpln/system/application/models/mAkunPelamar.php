<?php
class MAkunPelamar extends Model{
		
	function addAkun($ktp, $email, $pass, $salt, $aktivasi){
		$data = array(
				'ID_AKUN'		=> NULL,
		        'NO_KTP'      	=> $ktp,
		        'EMAIL'  	    => $email,
		        'PASSWORD'      => $pass,
		        'SALT'          => $salt,
		        'STATUS_PENGGUNA' => 0,
				'KODE_AKTIFASI'	=> $aktivasi
		);
		$this->db->insert('akunpelamar', $data);
	}
	
	function getAkun($data){
		$this->db->where('NO_KTP', $data);
		return $this->db->get('akunpelamar');
	}
	
	function updateStatus($str){
		$data = array( 'STATUS_PENGGUNA' => 1);
		$this->db->where('NO_KTP', $str);
		$this->db->update('akunpelamar', $data);
	}
}