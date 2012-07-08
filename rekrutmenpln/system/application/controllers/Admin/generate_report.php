<?php
Class generate_report extends Controller {

   function generate_report() {
		parent::Controller();	
		$this->load->helper(array('form','url'));
		$this->load->library('cezpdf');
		$this->load->model('m_rekrutmen');
		$this->load->model('m_bidang_dibuka');
		$this->load->helper('date');
		
	}
   function index(){
	
	}
	
	function generate_akademik(){
	$datestring = "%d/%m/%Y";


	$data = mdate($datestring);
	$this->cezpdf->ezText('Tanggal '.$data,8,array('justification' => 'left'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	$this->cezpdf->ezText('PT PLN (PERSERO)',8,array('justification' => 'left'));
	$this->cezpdf->ezText('KANTOR',8,array('justification' => 'left'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	$this->cezpdf->ezText('DAFTAR PESERTA LULUS TEST AKADEMIK',11,array('justification' => 'center'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	$this->cezpdf->ezText('REKRUTMEN TERBUKA TASIKMALAYA TINGKAT D3/S1/D4',11,array('justification' => 'center'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	//$this->cezpdf->addText(225, 740, 13,'<b> PANGGILAN PSIKOTEST </b>');
	$data=$this->m_rekrutmen->ambildata();
	$i=1;
	foreach($data as $rows){
	$isi[$i] =
		array(
			'No' => $i,
			'Nama' => $rows->ID_PS,
			'No.Test' => $rows->NAMA_PS
			);
	$i++;
	
	}
	$this->cezpdf->ezTable($isi);
//	array('width'=>550,'cellspacing'=>'4')
	$this->cezpdf->ezStartPageNumbers(320, 15, 8);
	$this->cezpdf->ezStream();
   }
}
?>
