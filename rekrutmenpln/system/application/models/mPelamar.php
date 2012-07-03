<?php
class MPelamar extends Model{
	var $gallerypath;
	var $gallery_path_url;
	
	function __construct(){
		parent::Model();
		$this->gallerypath = realpath(APPPATH.'/../../berkas');
		$this->gallery_path_url = base_url().'/berkas';
	}
	
	function do_upload($id,$type) {
		$konfigurasi = array(
			'allowed_types' =>'jpg|jpeg|gif|png|bmp',
			'upload_path' 	=> $this->gallerypath.'/'.$type,
			'file_name'		=> $id,
			'max_size'		=> 2000
		);
		
		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();
	
		$konfigurasi = array(
			'source_image' => $datafile['full_path'],
			'new_image' => $this->gallerypath .'/'.$type.'/thumbnails',
			'maintain_ration' => true,
			'width' => 480,
			'height' =>640
		);

		$this->load->library('image_lib', $konfigurasi);
		$this->image_lib->resize();
	}
	
	function getTingkatList($pt){
		$result = array();
		$this->db->select('*');
		$this->db->from('tingkatpendidikan');
		$this->db->where('STATUS_PT', $pt);
		$this->db->order_by('NAMA_TINGKAT','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Tingkat Pendidikan-';
            $result[$row->ID_TINGKAT]= $row->NAMA_TINGKAT;
        }
        
        return $result;
	}	
	
	function getPTList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('perguruantinggi');
//		$this->db->where('STATUS_PT', $pt);
		$this->db->order_by('NAMA_PT','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Perguruan Tinggi-';
            $result[$row->ID_PT]= $row->NAMA_PT;
        }
        
        return $result;
	}
	
	function getProgramStudiList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('programstudi');
//		$this->db->where('STATUS_PT', $pt);
		$this->db->order_by('NAMA_PS','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Program Studi-';
            $result[$row->ID_PS]= $row->NAMA_PS;
        }
        
        return $result;
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
		        'ID_PROV'  		=> $this->input->post('provinsi_id'),
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
	
	function getAllPendidikanNonPT($id){
		$this->db->select('*');
		$this->db->from('pendidikanformalnonpt');
		$this->db->join('tingkatpendidikan','tingkatpendidikan.ID_TINGKAT = pendidikanformalnonpt.ID_TINGKAT');
		$this->db->where('ID_PEL', $id);
		$array_keys_values = $this->db->get();
        return $array_keys_values;
	}	
	
	function getPendidikanNonPT($id){
		$result = array();
		$this->db->select('*');
		$this->db->from('pendidikanformalnonpt');
		$this->db->where('ID_PENDIDIKAN', $id);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
        	$result['idPend']= $row->ID_PENDIDIKAN;
        	$result['tingkat']= $row->ID_TINGKAT;
            $result['nama']= $row->NAMA_INSTITUSI;
            $result['tempat']= $row->TEMPAT_INSTITUSI;
            $result['thnMasuk']= $row->TAHUN_MASUK;
            $result['thnLulus']= $row->TAHUN_LULUS;
            $result['berkas']= $row->BERKAS_IJAZAH;
        }
        return $result;
	}
	
	function addPendidikanNonPT($pel){	
		$data = array(
				'ID_PENDIDIKAN'	=> NULL,
				'ID_PEL'			=> $pel,
				'ID_TINGKAT'		=> $this->input->post('tingkat'),
		        'TAHUN_MASUK'  		=> $this->input->post('thnMasuk'),
		        'TAHUN_LULUS'    	=> $this->input->post('thnLulus'),
		        'NAMA_INSTITUSI' 	=> $this->input->post('nama'),
				'TEMPAT_INSTITUSI' 	=> $this->input->post('tempat'),
				'BERKAS_IJAZAH' 	=> $this->input->post('berkas')
		);
		$this->db->insert('pendidikanformalnonpt', $data);
	}
	
	function editPendidikanNonPT($idPend){	
		$data = array(
				'ID_TINGKAT'		=> $this->input->post('tingkat'),
		        'TAHUN_MASUK'  		=> $this->input->post('thnMasuk'),
		        'TAHUN_LULUS'    	=> $this->input->post('thnLulus'),
		        'NAMA_INSTITUSI' 	=> $this->input->post('nama'),
				'TEMPAT_INSTITUSI' 	=> $this->input->post('tempat'),
				'BERKAS_IJAZAH' 	=> $this->input->post('berkas')
		);
		$this->db->where('ID_PENDIDIKAN', $idPend);
		$this->db->update('pendidikanformalnonpt', $data);
	}
	
	function delPendidikanNonPT($idPend){
		$this->db->where('ID_PENDIDIKAN', $idPend);
		$this->db->delete('pendidikanformalnonpt');
	}
	
	function getAllPendidikanPT($id){
		$this->db->select('*');
		$this->db->from('pendidikanformalpt');
		$this->db->join('tingkatpendidikan','tingkatpendidikan.ID_TINGKAT = pendidikanformalpt.ID_TINGKAT');
		$this->db->join('programstudi','programstudi.ID_PS = pendidikanformalpt.ID_PS');
		$this->db->join('perguruantinggi','perguruantinggi.ID_PT = pendidikanformalpt.ID_PT');
		$this->db->where('ID_PEL', $id);
		$array_keys_values = $this->db->get();
        return $array_keys_values;
	}
	
	function getPendidikanPT($id){
		$result = array();
		$this->db->select('*');
		$this->db->from('pendidikanformalpt');
		$this->db->where('ID_PENDIDIKAN_PT', $id);
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
        	$result['idPend']= $row->ID_PENDIDIKAN_PT;
        	$result['tingkat']= $row->ID_TINGKAT;
            $result['pt']= $row->ID_PT;
            $result['ps']= $row->ID_PS;
            $result['thnMasuk']= $row->TAHUN_MASUK;
            $result['thnLulus']= $row->TAHUN_LULUS;
            $result['konsen']= $row->KONSENTRASI;
            $result['ipk']= $row->IPK;
            $result['gelar']= $row->GELAR;
            $result['berkas']= $row->BERKAS_IJAZAH;
        }
        return $result;
	}
	
	function addPendidikanPT($pel){	
		$data = array(
				'ID_PENDIDIKAN_PT'	=> NULL,
				'ID_PEL'			=> $pel,
				'ID_TINGKAT'		=> $this->input->post('tingkat'),
				'ID_PT'				=> $this->input->post('pt'),
		        'ID_PS'   			=> $this->input->post('ps'),
		        'TAHUN_MASUK'  		=> $this->input->post('thnMasuk'),
		        'TAHUN_LULUS'    	=> $this->input->post('thnLulus'),
		        'KONSENTRASI' 		=> $this->input->post('konsen'),
				'IPK' 				=> $this->input->post('ipk'),
				'GELAR' 			=> $this->input->post('gelar'),
				'BERKAS_IJAZAH' 	=> $pel
		);
		if($this->db->insert('pendidikanformalpt', $data)){
			$this->do_upload($pel,'ijazahPT');
		}
	}
	
	function editPendidikanPT($idPend){	
		$data = array(
				'ID_TINGKAT'		=> $this->input->post('tingkat'),
				'ID_PT'				=> $this->input->post('pt'),
		        'ID_PS'   			=> $this->input->post('ps'),
		        'TAHUN_MASUK'  		=> $this->input->post('thnMasuk'),
		        'TAHUN_LULUS'    	=> $this->input->post('thnLulus'),
		        'KONSENTRASI' 		=> $this->input->post('konsen'),
				'IPK' 				=> $this->input->post('ipk'),
				'GELAR' 			=> $this->input->post('gelar'),
				'BERKAS_IJAZAH' 	=> $this->input->post('berkas')
		);
		$this->db->where('ID_PENDIDIKAN_PT', $idPend);
		$this->db->update('pendidikanformalpt', $data);
	}
	
	function delPendidikanPT($idPend){
		$this->db->where('ID_PENDIDIKAN_PT', $idPend);
		$this->db->delete('pendidikanformalpt');
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
