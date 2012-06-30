<?php
class MPelamar extends Model{
	function __construct(){
		parent::Model();
	}
	
	function getPropinsiList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('provinsi');
		$this->db->order_by('NAMA_PROV','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Propinsi-';
            $result[$row->ID_PROV]= $row->NAMA_PROV;
        }
        
        return $result;
	}

	function getKotaList($propinsi_id){

		$result = array();
		$this->db->select('*');
		$this->db->from('kotakabupaten');
		$this->db->where('ID_PROV',$propinsi_id);
		$this->db->order_by('NAMA_KOTA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kota / Kabupaten-';
            $result[$row->ID_KOTA]= $row->NAMA_KOTA;
        }
        
        return $result;
	}
	
	function getAgama(){
		$result = array();
		$this->db->select('*');
		$this->db->from('agama');
//		$this->db->order_by('NAMA_AGAMA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Agama-';
            $result[$row->ID_AGAMA]= $row->NAMA_AGAMA;
        }
        
        return $result;
	}
	
	function getPernikahan(){
		$result = array();
		$this->db->select('*');
		$this->db->from('statuspernikahan');
//		$this->db->order_by('NAMA_AGAMA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Status Pernikahan-';
            $result[$row->ID_PERNIKAHAN]= $row->NAMA_PERNIKAHAN;
        }
        
        return $result;
	}
	
	function addPelamar($akun){
		
		if ($this->input->post('idem') == 'on'){
			$almt2 = $this->input->post('alamat');
			$kota2 = $this->input->post('kota_id');
			$kodepos2 = $this->input->post('kodepos');
			$provinsi2 = $this->input->post('provinsi_id');
		}else {
			$almt2 = $this->input->post('alamat2');
			$kota2 = $this->input->post('kota_id2');
			$kodepos2 = $this->input->post('kodepos2'); 
			$provinsi2 = $this->input->post('provinsi_id2');
		}
		
		$data = array(
				'ID_PEL'			=> NULL,
		        'ID_AGAMA'      	=> $this->input->post('agama'),
		        'ID_PERNIKAHAN'  	=> $this->input->post('nikah'),
		        'ID_KOTA'     	=> $this->input->post('kota_id'),
		        'KOT_ID_KOTA'     => $kota2,
		        'ID_AKUN' 			=> $akun['id_akun'],
		        'ID_PROV'  	=> $this->input->post('provinsi_id'),
		        'PRO_ID_PROV'	=> $provinsi2,
				'NAMA_PEL'			=> $this->input->post('nama'),
				'JK'				=> $this->input->post('jk'),
				'TEMPAT_LAHIR'		=> $this->input->post('kotaLahir'),
				'TGL_LAHIR'			=> $this->input->post('tglLahir'),
				'ALAMAT_KTP'		=> $this->input->post('alamat'),
				'ALAMAT_SURAT'		=> $almt2,
				'KODEPOS_KTP'		=> $this->input->post('kodepos'),
				'KODEPOS_SURAT'		=> $kodepos2,
				'EMAIL'				=> $akun['email'],
				'NO_TELP'			=> $this->input->post('noTelp'),
				'NO_HP'				=> $this->input->post('noHp'),
				'PENGHASILAN_DIINGINKAN'	=> 0,
				'KESEDIAAN_PENEMPATAN'		=> 0,
				'BERKAS_KTP'		=> NULL,
				'BERKAS_AKTE'		=> NULL,
				'STATUS_DAFTAR'		=> 0,
				'JML_DAFTAR'		=> 0
		);
		$this->db->insert('pelamar', $data);
	}
	
	function editPelamar($akun){
		
		if ($this->input->post('idem') == 'on'){
			$almt2 = $this->input->post('alamat');
			$kota2 = $this->input->post('kota_id');
			$kodepos2 = $this->input->post('kodepos');
			$provinsi2 = $this->input->post('provinsi_id');
		}else {
			$almt2 = $this->input->post('alamat2');
			$kota2 = $this->input->post('kota_id2');
			$kodepos2 = $this->input->post('kodepos2'); 
			$provinsi2 = $this->input->post('provinsi_id2');
		}
		$where = array(
				'email'		=> $akun['email'],
				'ID_AKUN'	=> $akun['id_akun']
		);
		$data = array(
				'ID_PEL'			=> NULL,
		        'ID_AGAMA'      	=> $this->input->post('agama'),
		        'ID_PERNIKAHAN'  	=> $this->input->post('nikah'),
		        'ID_KOTA'     		=> $this->input->post('kota_id'),
		        'KOT_ID_KOTA'     	=> $kota2,
		        'ID_PROV'  	=> $this->input->post('provinsi_id'),
		        'PRO_ID_PROV'	=> $provinsi2,
				'NAMA_PEL'			=> $this->input->post('nama'),
				'JK'				=> $this->input->post('jk'),
				'TEMPAT_LAHIR'		=> $this->input->post('kotaLahir'),
				'TGL_LAHIR'			=> $this->input->post('tglLahir'),
				'ALAMAT_KTP'		=> $this->input->post('alamat'),
				'ALAMAT_SURAT'		=> $almt2,
				'KODEPOS_KTP'		=> $this->input->post('kodepos'),
				'KODEPOS_SURAT'		=> $kodepos2,
				'NO_TELP'			=> $this->input->post('noTelp'),
				'NO_HP'				=> $this->input->post('noHp'),
		);
		$this->db->where($where);
		$this->db->update('pelamar', $data);
	}
	function getPelamar($id){
		$result = array();
		$this->db->select('*');
		$this->db->from('pelamar');
		$this->db->where('ID_AKUN', $id);
//		$this->db->order_by('NAMA_AGAMA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result['agama']= $row->ID_AGAMA;
            $result['nikah']= $row->ID_PERNIKAHAN;
            $result['provinsi']= $row->ID_PROV;
            $result['provinsi2']= $row->PRO_ID_PROV;
            $result['kota']= $row->ID_KOTA;
            $result['kota2']= $row->KOT_ID_KOTA;
            $result['nama']= $row->NAMA_PEL;
            $result['jk']= $row->JK;
            $result['kotaLahir']= $row->TEMPAT_LAHIR;
            $result['tglLahir']= $row->TGL_LAHIR;
            $result['alamat']= $row->ALAMAT_KTP;
            $result['alamat2']= $row->ALAMAT_SURAT;
            $result['kodepos']= $row->KODEPOS_KTP;
            $result['kodepos2']= $row->KODEPOS_SURAT;
            $result['noTelp']= $row->NO_TELP;
            $result['noHp']= $row->NO_HP;
        }
        return $result;
	}
	
	function getIdPelamar($idakun){
//		$result = array();
		$this->db->select('ID_PEL');
		$this->db->from('pelamar');
		$this->db->where('ID_AKUN',$idakun);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result['idpel']= $row->ID_PEL;
        }
        return $result;
	}
	
	function getAllPengalaman($id){
		$this->db->select('*');
		$this->db->from('pengalamankerja');
		$this->db->where('ID_PEL', $id);
		$array_keys_values = $this->db->get();
        return $array_keys_values;
	}
	
	function getPengalaman($id){
		$result = array();
		$this->db->select('*');
		$this->db->from('pengalamankerja');
		$this->db->where('ID_KERJA', $id);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
        	$result['idkerja']= $row->ID_KERJA;
            $result['nama']= $row->NAMA_PERUSAHAAN;
            $result['jabatan']= $row->JABATAN;
            $result['tglMasuk']= $row->TGL_MASUK;
            $result['tglKeluar']= $row->TGL_KELUAR;
            $result['penghasilan']= $row->PENGHASILAN;
            $result['website']= $row->WEBSITE_PERUSAHAAN;
        }
        return $result;
	}
	
	function addPengalaman($pel){
		
		$data = array(
				'ID_KERJA'			=> NULL,
				'ID_PEL'			=> $pel,
		        'NAMA_PERUSAHAAN'   => $this->input->post('nama'),
		        'JABATAN'  			=> $this->input->post('jabatan'),
		        'TGL_MASUK'     => $this->input->post('tglMasuk'),
		        'TGL_KELUAR' 	=> $this->input->post('tglKeluar'),
				'PENGHASILAN' 		=> $this->input->post('penghasilan'),
				'WEBSITE_PERUSAHAAN' 	=> $this->input->post('website')
		);
		$this->db->insert('pengalamankerja', $data);
	}
	function editPengalaman($idkerja){
		
		$data = array(
		        'NAMA_PERUSAHAAN'   => $this->input->post('nama'),
		        'JABATAN'  			=> $this->input->post('jabatan'),
		        'TGL_MASUK'     => $this->input->post('tglMasuk'),
		        'TGL_KELUAR' 	=> $this->input->post('tglKeluar'),
				'PENGHASILAN' 		=> $this->input->post('penghasilan'),
				'WEBSITE_PERUSAHAAN' 	=> $this->input->post('website')
		);
		$this->db->where('ID_KERJA',$idkerja);
		$this->db->update('pengalamankerja', $data);
	}
	
	function delPengalaman($idkerja){
		$this->db->where('ID_KERJA', $idkerja);
		$this->db->delete('pengalamankerja');
	}
	function getAllKursus($id){
		$this->db->select('*');
		$this->db->from('kursus');
		$this->db->where('ID_PEL', $id);
		$array_keys_values = $this->db->get();
        return $array_keys_values;
	}
	
	function getKursus($id){
		$result = array();
		$this->db->select('*');
		$this->db->from('kursus');
		$this->db->where('ID_KURSUS', $id);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
        	$result['idkursus']= $row->ID_KURSUS;
            $result['nama']= $row->NAMAPENDIDIKANINFORMAL;
            $result['instansi']= $row->NAMA_INSTANSI;
            $result['tahun']= $row->TAHUN_SERTIFIKAT;
            $result['berkas']= $row->BERKAS_SERTIFIKAT;
        }
        return $result;
	}
	
	function addKursus($pel){
		
		$data = array(
				'ID_KURSUS'					=> NULL,
				'ID_PEL'					=> $pel,
		        'NAMAPENDIDIKANINFORMAL'    => $this->input->post('nama'),
		        'NAMA_INSTANSI'  			=> $this->input->post('instansi'),
		        'TAHUN_SERTIFIKAT'     		=> $this->input->post('tahun'),
		        'BERKAS_SERTIFIKAT' 		=> $this->input->post('berkas')
		);
		$this->db->insert('kursus', $data);
	}
	
	function editKursus($idkursus){
		
		$data = array(
		        'NAMAPENDIDIKANINFORMAL'    => $this->input->post('nama'),
		        'NAMA_INSTANSI'  			=> $this->input->post('instansi'),
		        'TAHUN_SERTIFIKAT'     		=> $this->input->post('tahun'),
		        'BERKAS_SERTIFIKAT' 		=> $this->input->post('berkas')
		);
		$this->db->where('ID_KURSUS', $idkursus);
		$this->db->update('kursus', $data);
	}
	
	function delKursus($idkursus){
		$this->db->where('ID_KURSUS', $idkursus);
		$this->db->delete('kursus');
	}
}
?>
