<?php
class Mlogin extends Model {
  function __construct (){
    parent::Model();
  }
	function cekdb() {
		$username = $this->input->post('username');
		$qry = $this->db->select('EMAIL, PASSWORD, SALT')
                        ->where('EMAIL', $username)
                        ->where('STATUS_PENGGUNA', 1)
                        ->get('akunpelamar');
		
		
//		$pass = $this->input->post('pass');
//		$this->db->where('EMAIL', $username);
//		$this->db->where('PASSWORD', $pass);
//		$this->db->where('STATUS_PENGGUNA', 1);
//		$query = $this->db->get('akunpelamar');
		return $qry->result();
	}
} ?>