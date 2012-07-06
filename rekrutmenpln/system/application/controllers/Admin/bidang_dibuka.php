<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class bidang_dibuka extends Controller {

	function bidang_dibuka() {
		parent::Controller();	
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('m_rekrutmen');
		$this->load->model('m_bidang_dibuka');
	}
	
	function index() {
		$data['bidangjabatandibuka']  = $this->m_bidang_dibuka->getListBidangJabatanDibuka();
		$data['count']      = $this->m_bidang_dibuka->getTotalBidangDibuka();
		//$data['batas_usia'] = $this->rekrutmen->getListBatasUsia();
 		$this->load->view('v_view_bidang_dibuka',$data);
	}
	function cekFieldKosong(){
		$this->form_validation->set_rules('rekrutmen', 'Rekrutmen', 'required|callback_validasi');
		$this->form_validation->set_rules('bidang', 'Bidang', 'required|callback_validasi');
		$this->form_validation->set_rules('quota', 'Quota', 'required');
		$this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
		//$data = $this->input->post('program_studi');
		//echo $data[0];
		//die();
		if($this->form_validation->run()==FALSE){
			return false;
		}
		else{ 
			if($this->bidangDibukaIsExist()!=1)
		return true;
		}	
		
	}
	function cekField(){
		$this->form_validation->set_rules('rekrutmen', 'Rekrutmen', 'required|callback_validasi');
		$this->form_validation->set_rules('bidang', 'Bidang', 'required|callback_validasi');
		$this->form_validation->set_rules('quota', 'Quota', 'required');
		$this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
		//$data = $this->input->post('program_studi');
		//echo $data[0];
		//die();
		if($this->form_validation->run()==FALSE){
			return false;
		}
		else{ 
		return true;
		}	
		
	}
	function bidangDibukaIsExist(){
		$this->form_validation->set_message('validasi', 'Data harus diisi dengan benar.');
		$rekrutmen = $this->input->post('rekrutmen');
		$bidang    = $this->input->post('bidang');
//		echo $lokasi;
//		echo $tgl_tutup;
//		echo $tgl_buka;
		
    	$query = $this->db->query("SELECT COUNT(*) AS dupe FROM bidangjabatandibuka WHERE ID_REKRUTMEN = '$rekrutmen' AND ID_BID = '$bidang'");
        $row = $query->row();
        return ($row->dupe > 0) ? TRUE : FALSE;
		
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
		$data = array(	'option_rekrutmen' 			=> $this->m_rekrutmen->getAllRekrutmen(),
	      				'option_bidang' 			=> $this->m_bidang_dibuka->getBidang(),
						'total_prodi'				=> $this->m_bidang_dibuka->totalProdi(),
	      				'option_program_studi'      => $this->m_bidang_dibuka->getProdi()
		);
		if($this->input->post('submit')=="Batal")
		redirect ('admin/bidang_dibuka');
		else if($this->cekFieldKosong()){
				$this->m_bidang_dibuka->insert();
				redirect ('admin/bidang_dibuka');
		}else {
				$this->load->view('v_input_bidang_dibuka',$data);
		}
		
	}
	function delete($idrekrutmen,$idbidang,$idtingkat) {
		$this->m_bidang_dibuka->delete($idrekrutmen,$idbidang,$idtingkat);
		redirect('admin/bidang_dibuka');
	}
	function edit($idrekrutmen,$idbidang){
		$data = array(	'form_prodi'				=> $this->m_bidang_dibuka->getDataExisting($idrekrutmen,$idbidang),
						'total'						=> $this->m_bidang_dibuka->countDataProdi($idrekrutmen,$idbidang),
						'option_rekrutmen' 			=> $this->m_rekrutmen->getAllRekrutmen(),
	      				'option_bidang' 				=> $this->m_bidang_dibuka->getBidang(),
						'option_program_studi'      => $this->m_bidang_dibuka->getProdi(),
						'total_prodi'				=> $this->m_bidang_dibuka->totalProdi(),
						'form'						=> $this->m_bidang_dibuka->getBidangJabatanDibuka($idrekrutmen,$idbidang)
						
		);
		if($this->input->post('submit')=="Batal")
		redirect ('admin/bidang_dibuka');
		else if($this->cekField()){
				$this->m_bidang_dibuka->update($idrekrutmen,$idbidang);
				redirect ('admin/bidang_dibuka');
		}else {
				$this->load->view('v_input_bidang_dibuka',$data);
		}
    }
}
?>
