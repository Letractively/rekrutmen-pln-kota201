<?php
include "basecontroller.php";
class Pelamar extends BaseController{

	function __construct(){
		parent::BaseController();
		$this->load->model('MPelamar');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}
	
	function index(){	
		$this->output->enable_profiler(TRUE);	
		$data = array(	'email' 			=> $this->session->userdata('email'),
	      				'id_akun' 			=> $this->session->userdata('id_akun'),
						'option_propinsi'	=> $this->MPelamar->getPropinsiList(),
						'option_agama'		=> $this->MPelamar->getAgama(),
						'option_nikah'		=> $this->MPelamar->getPernikahan()
		);
		if($this->pelamarIsExist($this->session->userdata('id_akun'))){
			$this->editData($data);
		} else {
			if($this->cekFieldKosong()){
				$this->MPelamar->addPelamar($data);
			}else {
				$data['view'] = 'pelamar/v_isi_data';
				$data['title'] = 'Isi Data (CV)';
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
			if($this->cekFieldKosong()){	      		
				$this->MPelamar->editPelamar($data);
			}else {
				$data['view'] = 'pelamar/v_isi_data';
				$data['title'] = 'Isi Data (CV)';
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

    function addPendidikan(){
//    	$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
//    	$data['pengalaman'] = $this->MPelamar->getAllPengalaman($idpel['idpel']);
    	$data['view'] = 'pelamar/v_isi_data_pendidikan';
		$data['title'] = 'Riwayat Pendidikan';
		$this->load->view('pelamar/main_pelamar', $data);
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
	    	if($this->cekValidasiKursus()){
	    		$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
	    		$this->MPelamar->addKursus($idpel['idpel']);
	    		redirect ('pelamar/addKursus');
	    	} else {
	    	
	    	$data['view'] = 'pelamar/v_input_kursus';
			$data['title'] = 'Tambah Kursus';
			$this->load->view('pelamar/main_pelamar', $data);
	    	}
	    } else {
	 		redirect('pelamar');   	
	    }
    }
    
    function editKursus($idkursus){
    	if($this->cekValidasiKursus()){
    		$this->MPelamar->editKursus($idkursus);
    		redirect ('pelamar/addKursus');
    	}
    	$data['form'] = $this->MPelamar->getKursus($idkursus); 
    	$data['view'] = 'pelamar/v_input_kursus';
		$data['title'] = 'Tambah Kursus';
		$this->load->view('pelamar/main_pelamar', $data);
    }
    
    function deleteKursus($idkursus){
    	$this->MPelamar->delKursus($idkursus);
    	redirect ('pelamar/addKursus');
    }

    function pelamarIsExist($str)
    {
        $query = $this->db->query("SELECT COUNT(*) AS dupe FROM pelamar WHERE ID_AKUN = '$str'");
        $row = $query->row();
        return ($row->dupe > 0) ? TRUE : FALSE;
    }
}
?>