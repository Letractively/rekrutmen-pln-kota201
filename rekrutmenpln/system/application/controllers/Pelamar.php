<?php
include "basecontroller.php";
class Pelamar extends BaseController{

	function __construct(){
		parent::BaseController();
		$this->load->model('MPelamar');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
//		$this->output->enable_profiler(TRUE);
	}
	
	function index(){	
			
		$data = array(	'email' 			=> $this->session->userdata('email'),
	      				'id_akun' 			=> $this->session->userdata('id_akun'),
						'option_propinsi'	=> $this->MPelamar->getPropinsiList(),
						'option_agama'		=> $this->MPelamar->getAgama(),
						'option_nikah'		=> $this->MPelamar->getPernikahan()
		);
		$data['view'] = 'pelamar/v_isi_data';
		$data['title'] = 'Isi Data (CV)';
		if($this->pelamarIsExist($this->session->userdata('id_akun'))){
			$this->editData($data);
		} else {
			if($this->cekFieldKosong()){
				$uploaded = $this->MPelamar->do_upload($this->session->userdata('id_akun'),'foto');
	    		if($uploaded == 'kosong'){
		    		$this->MPelamar->addPelamar($data);
		    		redirect ('pelamar');
	    		} else {
	    			$data['berkas'] = $uploaded;
					$this->load->view('pelamar/main_pelamar', $data);
	    		}
				
			}else {
				$this->load->view('pelamar/main_pelamar', $data);
			}
		}
	}
	
	function editData($data){		
			$getData = $this->MPelamar->getPelamar($this->session->userdata('id_akun'));
			$data['form'] = $getData;
			$data['option_kota1'] = $this->MPelamar->getKotaList($getData['provinsi']);
			$data['option_kota2'] = $this->MPelamar->getKotaList($getData['provinsi2']);
			$idem = $this->input->post('idem');
			$data['view'] = 'pelamar/v_isi_data';
			$data['title'] = 'Isi Data (CV)';
			if($this->cekFieldKosong()){

				$uploaded = $this->MPelamar->do_upload($this->session->userdata('id_akun'),'foto');
	    		if($uploaded == 'kosong'){
		    		$this->MPelamar->editPelamar($data);
		    		redirect ('pelamar');
	    		} else {
	    			$data['berkas'] = $uploaded;
					$this->load->view('pelamar/main_pelamar', $data);
	    		}
			}else {
				$this->load->view('pelamar/main_pelamar', $data);
			}
	}
	
	function select_kota1(){
            if('IS_AJAX') {
            $propinsi_id = $this->input->post('propinsi_id');
        	$data['option_kota1'] = $this->MPelamar->getKotaList($propinsi_id);		
			$this->load->view('kota',$data);
            }
	}
	function select_kota2(){
            if('IS_AJAX') {
            $propinsi_id = $this->input->post('propinsi_id2');
        	$data['option_kota2'] = $this->MPelamar->getKotaList($propinsi_id);		
			$this->load->view('kota2',$data);
            }
		
	}
        
    function validasi($str)
    {
    	$this->form_validation->set_message('validasi', 'Data harus diisi dengan benar.');
    	if($str == 0){
    		return false;	
    	} else {
    		return true;
    	}
    }

	function cekFieldKosong(){
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('kotaLahir', 'Tempat/Kota Lahir', 'required');
		$this->form_validation->set_rules('tglLahir', 'Tanggal Lahir', 'trim,required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|callback_validasi');
		$this->form_validation->set_rules('agama', 'Agama', 'required|callback_validasi');
		$this->form_validation->set_rules('noTelp', 'Nomor Telepon', 'required|numeric');
		$this->form_validation->set_rules('noHp', 'Nomor HP', 'required|numeric');
		$this->form_validation->set_rules('nikah', 'Status Pernikahan', 'required|callback_validasi');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('provinsi_id', 'Provinsi', 'required|callback_validasi');
		$this->form_validation->set_rules('kota_id', 'Kota', 'required|callback_validasi');
		$this->form_validation->set_rules('kodepos', 'Kodepos', 'required|numeric');
		$this->form_validation->set_rules('penghasilan', 'Penghasilan Diinginkan', 'required|numeric');
		
		if($this->input->post('idem') !='on'){
		
		$this->form_validation->set_rules('alamat2', 'Alamat', 'required');
		$this->form_validation->set_rules('provinsi_id2', 'Provinsi', 'required|callback_validasi');
		$this->form_validation->set_rules('kota_id2', 'Kota', 'required|callback_validasi');
		$this->form_validation->set_rules('kodepos2', 'Kodepos', 'required|numeric');

		}

		if($this->form_validation->run()==FALSE){
			return false;
		}
		else {
			return true;
		}
	}    
    
	function cekValidasiKursus(){
    	
    	$this->form_validation->set_rules('nama', 'Nama Kursus', 'required');
    	$this->form_validation->set_rules('instansi', 'Nama Instansi', 'required');
    	$this->form_validation->set_rules('tahun', 'Tahun Sertifikat', 'required|numeric');
//    	$this->form_validation->set_rules('nama', 'Nama Kursus', 'required');
	
    	if($this->form_validation->run()==FALSE){
			return false;
		}
		else {
			return true;
		}
    }
    
    function cekValidasiPengalaman(){
    	
    	$this->form_validation->set_rules('nama', 'Nama Perusahaan', 'required');
    	$this->form_validation->set_rules('jabatan', 'Posisi/Jabatan', 'required');
    	$this->form_validation->set_rules('tglMasuk', 'Tanggal Masuk', 'required');
    	$this->form_validation->set_rules('tglKeluar', 'Tanggal Keluar', 'required');
    	$this->form_validation->set_rules('penghasilan', 'Penghasilan', 'numeric');
//    	$this->form_validation->set_rules('website', 'Website Perusahaan', 'required');
	
    	if($this->form_validation->run()==FALSE){
			return false;
		}
		else {
			return true;
		}
    }
    
   function cekValidasiPendidikanPT(){
    	
    	$this->form_validation->set_rules('tingkat', 'Tingkat Pendidikan', 'callback_validasi');
    	$this->form_validation->set_rules('pt', 'Perguruan Tinggi', 'callback_validasi');
    	$this->form_validation->set_rules('ps', 'Program Studi', 'callback_validasi');
//    	$this->form_validation->set_rules('konsen', 'Konsentrasi', 'required');
    	$this->form_validation->set_rules('ipk', 'IPK', 'required');
    	$this->form_validation->set_rules('thnMasuk', 'Tahun Masuk', 'callback_validasi');
    	$this->form_validation->set_rules('thnLulus', 'Tahun Lulus', 'callback_validasi');
//    	$this->form_validation->set_rules('gelar', 'Gelar', 'numeric');
//    	$this->form_validation->set_rules('userfile', 'Berkas Ijazah','callback_do_upload');
	
    	if($this->form_validation->run()==FALSE){
			return false;
		}
		else {
			return true;
		}
    }
    
   function cekValidasiPendidikanNonPT(){
    	
    	$this->form_validation->set_rules('tingkat', 'Tingkat Pendidikan', 'callback_validasi');
    	$this->form_validation->set_rules('nama', 'Nama Sekolah', 'required');
    	$this->form_validation->set_rules('tempat', 'Tempat/Alamat', 'required');
    	$this->form_validation->set_rules('thnMasuk', 'Tahun Masuk', 'callback_validasi');
    	$this->form_validation->set_rules('thnLulus', 'Tahun Lulus', 'callback_validasi');
//    	$this->form_validation->set_rules('berkas', 'Berkas', 'required');
	
    	if($this->form_validation->run()==FALSE){
			return false;
		}
		else {
			return true;
		}
    }

    function addPendidikan(){
    	$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
    	$data['pendPT'] = $this->MPelamar->getAllPendidikanPT($idpel['idpel']);
    	$data['pendNonPT'] = $this->MPelamar->getAllPendidikanNonPT($idpel['idpel']);
    	$data['view'] = 'pelamar/v_isi_data_pendidikan';
		$data['title'] = 'Riwayat Pendidikan';
		$this->load->view('pelamar/main_pelamar', $data);
    }
    
    function inputPendidikanNonPT(){
	    if($this->pelamarIsExist($this->session->userdata('id_akun'))){
			$data['option_year'] = $this->setOptionYear();
			$data['option_tingkat'] = $this->MPelamar->getTingkatList(false);
	    	$data['view'] = 'pelamar/v_input_pendidikan_nonpt';
			$data['title'] = 'Riwayat Pendidikan';
			$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
	    	if($this->cekValidasiPendidikanNonPT()){	
	    	    $uploaded = $this->MPelamar->do_upload(
    			$this->input->post('tingkat').
    			$this->input->post('thnMasuk').
    			$this->input->post('thnLulus'),'ijazahNonPT');
	    		if($uploaded == 'kosong'){
		    		$this->MPelamar->addPendidikanNonPT($idpel['idpel']);
		    		redirect ('pelamar/addPendidikan');
	    		} else {
	    			$data['berkas'] = $uploaded;
					$this->load->view('pelamar/main_pelamar', $data);
	    		}
		    } else {
				$this->load->view('pelamar/main_pelamar', $data);
	    	}
	    } else{
	    	redirect('pelamar');
	    }
    }
    
    function editPendidikanNonPT($idPend){
    	$data['option_year'] = $this->setOptionYear();
		$data['option_tingkat'] = $this->MPelamar->getTingkatList(false);
    	$data['form'] = $this->MPelamar->getPendidikanNonPT($idPend); 
    	$data['view'] = 'pelamar/v_input_pendidikan_nonpt';
		$data['title'] = 'Edit Pendidikan Formal Non PT';
		if($this->cekValidasiPendidikanNonPT()){
    		$uploaded = $this->MPelamar->do_upload(
    		$this->input->post('tingkat').
    		$this->input->post('thnMasuk').
    		$this->input->post('thnLulus'),'ijazahNonPT');
	    	if($uploaded == 'kosong'){
	    		$this->MPelamar->editPendidikanNonPT($idPend);
	    		redirect('pelamar/addPendidikan');
	    	} else {
	    		$data['berkas'] = $uploaded;
				$this->load->view('pelamar/main_pelamar', $data);
	    	}
    	} else {
			$this->load->view('pelamar/main_pelamar', $data);
    	}
    }
    
    function deletePendidikanNonPT($idPend){
        $form = $this->MPelamar->getPendidikanNonPT($idPend);
    	if(isset($form['berkas'])){
    		$this->MPelamar->delete_data($form['berkas'],'ijazahNonPT');
    	}
    	$this->MPelamar->delPendidikanNonPT($idPend);
    	redirect ('pelamar/addPendidikan');
    }
    
    function inputPendidikanPT(){
	    if($this->pelamarIsExist($this->session->userdata('id_akun'))){
			$data['option_year'] = $this->setOptionYear();
			$data['option_tingkat'] = $this->MPelamar->getTingkatList(true);
			$data['option_pt'] = $this->MPelamar->getPTList();
			$data['option_ps'] = $this->MPelamar->getProgramStudiList();
		    $data['view'] = 'pelamar/v_input_pendidikan_pt';
			$data['title'] = 'Riwayat Pendidikan';	    	
	    	$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
	    	if($this->cekValidasiPendidikanPT()){
    			$uploaded = $this->MPelamar->do_upload(
    			$this->input->post('tingkat').
    			$this->input->post('pt').
    			$this->input->post('ps').
    			$this->input->post('thnMasuk').
    			$this->input->post('thnLulus'),'ijazahPT');
	    		if($uploaded == 'kosong'){
	    			$this->MPelamar->addPendidikanPT($idpel['idpel']);
//	    			$this->MPelamar->do_upload();
	    			redirect ('pelamar/addPendidikan');
	    		} else {
	    			$data['berkas'] = $uploaded;
					$this->load->view('pelamar/main_pelamar', $data);
	    		}
		    } else {
				$this->load->view('pelamar/main_pelamar', $data);
	    	}
	    } else{
	    	redirect('pelamar');
	    }
    }
    
    function editPendidikanPT($idPend){
    	$data['option_year'] = $this->setOptionYear();
		$data['option_tingkat'] = $this->MPelamar->getTingkatList(true);
		$data['option_pt'] = $this->MPelamar->getPTList();
		$data['option_ps'] = $this->MPelamar->getProgramStudiList();
    	$data['form'] = $this->MPelamar->getPendidikanPT($idPend); 
    	$data['view'] = 'pelamar/v_input_pendidikan_pt';
		$data['title'] = 'Edit Pendidikan Formal PT';
    	if($this->cekValidasiPendidikanPT()){
//	    			$form = $this->MPelamar->getAllPendidikanPT();
    		$uploaded = $this->MPelamar->do_upload(
    		$this->input->post('tingkat').
    		$this->input->post('pt').
    		$this->input->post('ps').
    		$this->input->post('thnMasuk').
    		$this->input->post('thnLulus'),'ijazahPT');
	    	if($uploaded == 'kosong'){
	    		$this->MPelamar->editPendidikanPT($idPend);
	    		redirect('pelamar/addPendidikan');
	    	} else {
	    		$data['berkas'] = $uploaded;
				$this->load->view('pelamar/main_pelamar', $data);
	    	}
    	}else{
			$this->load->view('pelamar/main_pelamar', $data);
    	}
    }
    
    function deletePendidikanPT($idPend){
    	$form = $this->MPelamar->getPendidikanPT($idPend);
    	if(isset($form['berkas'])){
    		$this->MPelamar->delete_data($form['berkas'],'ijazahPT');
    	}
    	$this->MPelamar->delPendidikanPT($idPend);
    	redirect ('pelamar/addPendidikan');
    }
    
    function addPengalaman(){
    	$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
    	$data['pengalaman'] = $this->MPelamar->getAllPengalaman($idpel['idpel']);
    	$data['view'] = 'pelamar/v_isi_data_pengalaman';
		$data['title'] = 'Pengalaman Kerja';
		$this->load->view('pelamar/main_pelamar', $data);
    }
    
    function inputPengalaman(){
    	if($this->pelamarIsExist($this->session->userdata('id_akun'))){
	    	if($this->cekValidasiPengalaman()){
	    		$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
	    		$this->MPelamar->addPengalaman($idpel['idpel']);
	    		redirect ('pelamar/addPengalaman');
	    	} else {	
	    	$data['view'] = 'pelamar/v_input_pengalaman';
			$data['title'] = 'Tambah Pengalaman';
			$this->load->view('pelamar/main_pelamar', $data);
	    	}
	    } else {
	 		redirect('pelamar');   	
	    }
    }
    
    function editPengalaman($idkerja){
    	if($this->cekValidasiPengalaman()){
    		$this->MPelamar->editPengalaman($idkerja);
    		redirect('pelamar/addPengalaman');
    	}
    	$data['form'] = $this->MPelamar->getPengalaman($idkerja); 
    	$data['view'] = 'pelamar/v_input_pengalaman';
		$data['title'] = 'Edit Pengalaman';
		$this->load->view('pelamar/main_pelamar', $data);
    }
    
    function deletePengalaman($idkerja){
    	$this->MPelamar->delPengalaman($idkerja);
    	redirect ('pelamar/addPengalaman');
    }
    
    function addKursus(){
    	$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
    	$data['kursus'] = $this->MPelamar->getAllKursus($idpel['idpel']);
    	$data['view'] = 'pelamar/v_isi_data_kursus';
		$data['title'] = 'Kursus';
		$this->load->view('pelamar/main_pelamar', $data);
    }
    
    function inputKursus(){
    	if($this->pelamarIsExist($this->session->userdata('id_akun'))){
    		$data['option_year'] = $this->setOptionYear();
    		$data['view'] = 'pelamar/v_input_kursus';
			$data['title'] = 'Tambah Kursus';
	    	$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
	    	if($this->cekValidasiKursus()){
	    		$uploaded = $this->MPelamar->do_upload(
    			$this->input->post('nama').
    			$this->input->post('tahun'),'sertifikat');
	    		if($uploaded == 'kosong'){
		    		$this->MPelamar->addKursus($idpel['idpel']);
		    		redirect ('pelamar/addKursus');
	    		} else {
	    			$data['berkas'] = $uploaded;
					$this->load->view('pelamar/main_pelamar', $data);
	    		}
	    	} else {
				$this->load->view('pelamar/main_pelamar', $data);
	    	}
	    } else {
	 		redirect('pelamar');   	
	    }
    }
    
    function editKursus($idkursus){
    	$data['form'] = $this->MPelamar->getKursus($idkursus); 
    	$data['option_year'] = $this->setOptionYear();
    	$data['view'] = 'pelamar/v_input_kursus';
		$data['title'] = 'Tambah Kursus';
    	if($this->cekValidasiKursus()){
    		$uploaded = $this->MPelamar->do_upload(
    			$this->input->post('nama').
    			$this->input->post('tahun'),'sertifikat');
	    	if($uploaded == 'kosong'){
	    		$this->MPelamar->editKursus($idkursus);
    			redirect ('pelamar/addKursus');
	    	} else {
	    		$data['berkas'] = $uploaded;
				$this->load->view('pelamar/main_pelamar', $data);
	    	}
    	} else {
			$this->load->view('pelamar/main_pelamar', $data);
    	}
    }
    
    function deleteKursus($idkursus){
        $form = $this->MPelamar->getKursus($idkursus);
    	if(isset($form['berkas'])){
    		$this->MPelamar->delete_data($form['berkas'],'sertifikat');
    	}
    	$this->MPelamar->delKursus($idkursus);
    	redirect ('pelamar/addKursus');
    }
    
//    function addPersetujuan(){
//    	$data['view'] = 'pelamar/v_kelengkapan_persetujuan';
//		$data['title'] = 'Persetujuan & Kelengkapan Lain';
//		if($this->pelamarIsExist($this->session->userdata('id_akun'))){
//			$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
//			$data['form'] = $this->MPelamar->getPelamar($idpel['idpel']);
//			   	if($this->input->post('submit')){
//	    			$uploaded1 = $this->MPelamar->edit_upload($idpel['idpel'],'foto','userfile1');
//	    			$uploaded2 = $this->MPelamar->edit_upload($idpel['idpel'],'ktp','userfile2');
//	    			$uploaded3 = $this->MPelamar->edit_upload($idpel['idpel'],'akte','userfile3');
//	    		if($uploaded1 == 'kosong' && $uploaded2 == 'kosong' && $uploaded3 == 'kosong'){
//		    		$this->MPelamar->editBerkasPelamar($idpel['idpel']);
//		    		redirect ('pelamar/addPersetujuan');
//	    		} else {
//	    			$data['berkas1'] = $uploaded1;
//	    			$data['berkas2'] = $uploaded2;
//	    			$data['berkas3'] = $uploaded3;
//					$this->load->view('pelamar/main_pelamar', $data);
//	    		}
//	    	} else {
//				$this->load->view('pelamar/main_pelamar', $data);
//	    	}
//	    } else {
//	    	redirect('pelamar');
//	    }
//    }

    function pelamarIsExist($str)
    {
        $query = $this->db->query("SELECT COUNT(*) AS dupe FROM pelamar WHERE ID_AKUN = '$str'");
        $row = $query->row();
        return ($row->dupe > 0) ? TRUE : FALSE;
    }
    
    function setOptionYear(){
    	$now = date('Y');
    	$option[0] = '-pilih tahun-';
    	for($i = $now; $i >= 1945; $i--){
    		$option[$i] = $i;
    	}
    	return $option;
    }
    
    function displayBerkas($type,$name){
    	$data['type'] = $type;
    	$data['name'] = $name;
    	$data['view'] = 'pelamar/v_full_image';
		$data['title'] = $type.$name;
		$this->load->view('pelamar/v_full_image', $data);
    }
}
?>
