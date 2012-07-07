<?php 
class Test extends Controller{
	function Test(){
		parent::Controller();
		$this->load->helper('form');
	}
	
	function index(){
		$data['view']= 'admin/v_test_akademik';
	    $this->load->view('admin/main_admin',$data);
	}
	
	function importData(){
		include_once ( APPPATH."libraries/excel_reader.php");
    	$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
	    $j = -1;
	    for ($i=7; $i <= ($data->rowcount($sheet_index=0)); $i++){ 
	      $j++;
	      $nama[$j]   = $data->val($i, 4);
	      $nim[$j]    = $data->val($i, 5);
	      $kelas[$j]  = $data->val($i, 6);
	      $kelas1[$j]  = $data->val($i, 7);
	      $kelas2[$j]  = $data->val($i, 8);
	    }
	     
	    $xdata['nama']  = $nama;
	    $xdata['nim']  = $nim;
	    $xdata['kelas']  = $kelas;
	    $xdata['kelas1']  = $kelas1;
	    $xdata['kelas2']  = $kelas2;
	    $xdata['view']= 'admin/v_test_akademik';
	    $this->load->view('admin/main_admin', $xdata);
	}
	
	function filterLulusBerkas($idpel,$idbid,$rekrutmen){
		
	}
	
}
?>