<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class buka_rekrutmen extends Controller {

	function buka_rekrutmen() {
		parent::Controller();	
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('m_rekrutmen');
		$this->load->model('mPelamar');
	}
	
	function index() {
		$data['tingkat']  = $this->m_rekrutmen->getTingkat();
		$data['rekrutmen']  = $this->m_rekrutmen->getListRekrutmen();
		$data['count']      = $this->m_rekrutmen->getTotalRekrutmen();
		//$data['batas_usia'] = $this->rekrutmen->getListBatasUsia();
		
        $data['title'] = "Daftar Rekrutmen";
        $data['tampil'] = "v_view_rekrutmen.php";
    	$this->load->view('admin/template_admin',$data);
 		//$this->load->view('v_view_rekrutmen',$data);
	}

	function cekFieldKosong(){
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required|callback_validasi');
		$this->form_validation->set_rules('jenis_rekrutmen', 'Jenis Rekrutmen', 'required|callback_validasi');
		$this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required|callback_validasi');
		$this->form_validation->set_rules('nama_rekrutmen', 'Nama Rekrutmen', 'required');
		$this->form_validation->set_rules('tgl_buka', 'Tgl Buka', 'required');
		$this->form_validation->set_rules('tgl_tutup', 'Tgl Tutup', 'required|callback_validasi_tgl');
		$this->form_validation->set_rules('batas1', 'Batas Usia', 'required');
		$this->form_validation->set_rules('batas2', 'Batas Usia', 'required');
		
		if($this->form_validation->run()==FALSE){
			return false;
		}
		else{ 
			//if($this->rekrutmenIsExist()!=1)	
		return true;
		}	
		
	}
	function rekrutmenIsExist(){
		$this->form_validation->set_message('rekrutmenIsExist', 'Data harus diisi dengan benar.');
		$lokasi = $this->input->post('lokasi');
		$tgl_buka = $this->input->post('tgl_buka');
		$tgl_tutup = $this->input->post('tgl_tutup');
//		echo $lokasi;
//		echo $tgl_tutup;
//		echo $tgl_buka;
		
		
    	$query = $this->db->query("SELECT COUNT(*) AS dupe FROM rekrutmen WHERE ID_LOKASI = '$lokasi' AND TGL_BUKA = '$tgl_buka' AND TGL_TUTUP = '$tgl_tutup'");
        $row = $query->row();
        return ($row->dupe > 0) ? TRUE : FALSE;
		
	}
	function validasi_tgl($str)
    {
    	$this->form_validation->set_message('validasi_tgl', 'Tgl Tutup Rekrutmen harus melebihi Tgl Buka Rekrutmen.');
    	$tgl_buka = $this->input->post('tgl_buka');
    	if($str <= $tgl_buka){
    		return false;	
    	} else {
    		return true;
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
	function add(){
		$data = array(	'option_lokasi' 			=> $this->m_rekrutmen->getLokasi(),
	      				'option_jenis_rekrutmen' 			=> $this->m_rekrutmen->getJenisRekrut(),
						'option_pelaksana'	=> $this->m_rekrutmen->getPelaksana(),
						'option_tingkat'		=> $this->m_rekrutmen->getTingkat()
		);
		if($this->input->post('submit')=="Batal")
		$this->index();
		else if($this->cekFieldKosong()){
				$this->m_rekrutmen->insert();
				redirect ('admin/buka_rekrutmen');
		}else {
			$data['title'] = "Form Buka Rekrutmen";
       		$data['tampil'] = "v_input_rekrutmen.php";
    		$this->load->view('admin/template_admin',$data);	
		}
		
	}
	function delete($id) {
		$this->m_rekrutmen->delete($id);
		$data = $this->m_rekrutmen->getPeserta($id);
		$this->mPelamar->update_status_daftar($data);
		redirect('admin/buka_rekrutmen');
	}
	function close($id,$stat) {
		$this->m_rekrutmen->close($id,$stat);
		redirect('admin/buka_rekrutmen');
	}
	function edit($id){
    	$data = array(	'option_lokasi' 			=> $this->m_rekrutmen->getLokasi(),
	      				'option_jenis_rekrutmen' 			=> $this->m_rekrutmen->getJenisRekrut(),
						'option_pelaksana'	=> $this->m_rekrutmen->getPelaksana(),
						'option_tingkat'		=> $this->m_rekrutmen->getTingkat(),
    					'form' => $this->m_rekrutmen->getRekrutmen($id)
		);
		if($this->input->post('submit')=="Batal")
		redirect ('admin/buka_rekrutmen');
		else if($this->cekFieldKosong()){
				$this->m_rekrutmen->update($id);
				redirect ('admin/buka_rekrutmen');
				
		}else {
				$data['title'] = "Form Edit Rekrutmen";
       			$data['tampil'] = "v_input_rekrutmen.php";
    			$this->load->view('admin/template_admin',$data);
		}
    }
}
?>
