<?php
Class generate_report extends Controller {

   function generate_report() {
		parent::Controller();	
		$this->load->helper(array('form','url'));
		$this->load->library('cezpdf');
		$this->load->model('m_rekrutmen');
		$this->load->model('m_test');
		$this->load->helper('date');
		
	}
   function index(){
	$data['rekrutmen']=$this->m_rekrutmen->getRekrutmenSeleksi();
	$rekrutmen = $this->input->get('rekrutmen');
	$data['field'] = $this->m_rekrutmen->getFieldRekrutmen($rekrutmen);
	$test = $this->input->get('test');
	$status = $this->input->get('status');
	if($rekrutmen!="NULL" and $rekrutmen!=NULL and $test!="NULL" and $test!=NULL and $status!="NULL" and $status!=NULL){
		if($test=="PSIKOTEST"){
		$data['peserta'] = $this->m_test->getHasilTestPsikotest($rekrutmen,$test,$status);
		}
		if($test=="AKADEMIK"){
		$data['peserta'] = $this->m_test->getHasilTestAkademik($rekrutmen,$test,$status);
		}
		if($test=="GAT"){
		$data['peserta'] = $this->m_test->getHasilTestGat($rekrutmen,$test,$status);
		}
		if($test=="KESEHATAN"){
		$data['peserta'] = $this->m_test->getHasilTestKesehatan($rekrutmen,$test,$status);
		}
		if($test=="WAWANCARA"){
		$data['peserta'] = $this->m_test->getHasilTestWawancara($rekrutmen,$test,$status);
		}
		
		$data['title'] = "Daftar Rekrutmen";
        $data['tampil'] = "admin/v_generate_report.php";
    	$this->load->view('admin/template_admin',$data,$rekrutmen,$test,$status);
		
		//$this->hasil_test($data,$title,$test);
	}
	else{
	$data['title'] = "Daftar Rekrutmen";
    $data['tampil'] = "admin/v_generate_report.php";
	$data['keterangan'] = "Isi Semua Data filter";
   	   $this->load->view('admin/template_admin',$data,$rekrutmen,$test,$status);
	}
   }
	
	function hasil_test($title,$test,$status){
		$field = $this->m_rekrutmen->getFieldRekrutmen($title);
		if($test=="PSIKOTEST")
		$data = $this->m_test->getHasilTestPsikotest($title,$test,$status);
		if($test=="AKADEMIK")
		$data = $this->m_test->getHasilTestAkademik($title,$test,$status);
		if($test=="GAT")
		$data = $this->m_test->getHasilTestGat($title,$test,$status);
		if($test=="KESEHATAN")
		$data = $this->m_test->getHasilTestKesehatan($title,$test,$status);
		if($test=="WAWANCARA")
		$data = $this->m_test->getHasilTestWawancara($title,$test,$status);
		
	$datestring = "%d/%m/%Y";

	$date = mdate($datestring);
	$this->cezpdf->ezText('Tanggal '.$date,8,array('justification' => 'left'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	$this->cezpdf->ezText('PT PLN (PERSERO)',8,array('justification' => 'left'));
	$this->cezpdf->ezText('KANTOR',8,array('justification' => 'left'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	$this->cezpdf->ezText('DAFTAR PESERTA LULUS TEST '.$test,11,array('justification' => 'center'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	$this->cezpdf->ezText($field[0]->NAMA_REKRUTMEN." ".$field[0]->NAMA_LOKASI ,11,array('justification' => 'center'));
	$this->cezpdf->ezText('',10,array('justification' => 'center'));
	//$this->cezpdf->addText(225, 740, 13,'<b> PANGGILAN PSIKOTEST </b>');
	$i=1;
	if(isset($data)){
	foreach($data as $rows){
		$isi[$i] =
			array(
				'No' => $i,
				'Nama' => $rows->nama_pel,
				'No.Test' => $rows->no_test,
				'Bidang' => $rows->kode_bid
				);
		$i++;
		}
	}
	else{
		$isi=
		array(
			'No' => "1",
			'Nama' => "2",
			'No.Test' => "3",
			'Bidang' => "4"
			);
	}
	$this->cezpdf->ezTable($isi);
//	array('width'=>550,'cellspacing'=>'4')
	$this->cezpdf->ezStartPageNumbers(320, 15, 8);
	$this->cezpdf->ezStream();
   }
}
?>
