<?php 
class Test extends Controller{
	function Test(){
		parent::Controller();
		$this->load->helper('form');
		$this->load->model('MTest');
	}
	
	function index(){
		$data['view']= 'admin/v_test_akademik';
	    $this->load->view('admin/main_admin',$data);
	}
	
	function importPsikotest(){
		include_once ( APPPATH."libraries/excel_reader.php");
    	$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
    	$pgPsikotest = $this->MTest->getPassingGrade(3);
	    $qry = "INSERT INTO psikotest (ID_REKRUTMEN, ID_BID, ID_PEL, INTELEGENSI, ABSTRAKSI, NUMERIK, STABILITASI, EMOSI, ADAPTASI, KERJASAMA_KELOMPOK, KONTAKSOSIAL, KEPEMIMPINAN, TOLERANSISTRESS, MOTIVASIKERJA, TEMPO, TELITI, KETAHANANKERJA, NILAIAKHIR, STATUSLULUS) VALUES";
	    $j = -1;
	    for ($i=7; $i <= ($data->rowcount($sheet_index=0)); $i++){ 
	      $j++;
	      $rekrut[$j]   = $data->val($i, 1);
	      $bid[$j]   = $data->val($i, 2);
	      $pel[$j]   = $data->val($i, 3);
//	      $noTest[$j]  = $data->val($i, 6);
	      $intelegensi[$j] = $data->val($i, 7);
			$abstraksi[$j] = $data->val($i, 8);
			$numerik[$j] = $data->val($i, 9);
			$stabilitasi[$j] = $data->val($i, 10);
			$emosi[$j] = $data->val($i, 11);
			$adaptasi[$j] = $data->val($i, 12);
			$kerjasama_kelompok[$j] = $data->val($i, 13);
			$kontaksosial[$j] = $data->val($i, 14);
			$kepemimpinan[$j] = $data->val($i, 15);
			$toleransistress[$j] = $data->val($i, 16);
			$motivasikerja[$j] = $data->val($i, 17);
			$tempo[$j] = $data->val($i, 18);
			$teliti[$j] = $data->val($i, 19);
			$ketahanankerja[$j] = $data->val($i, 20);
	      $akhir[$j]  = $data->val($i, 21);
	      
	      if($akhir[$j] >= $pgPsikotest)
	      	$status = 1;
	      else
	      	$status = 0;
		
	      $qry = $qry."('$rekrut[$j]', '$bid[$j]', '$pel[$j]', '$intelegensi[$j]','$abstraksi[$j]','$numerik[$j]','$stabilitasi[$j]','$emosi[$j]','$adaptasi[$j]','$kerjasama_kelompok[$j]','$kontaksosial[$j]','$kepemimpinan[$j]','$toleransistress[$j]','$motivasikerja[$j]','$tempo[$j]','$teliti[$j]','$ketahanankerja[$j]','$akhir[$j]','$status')";
	      
	    	if($i % 500 == 0 && $i != $data->rowcount($sheet_index=0)){
	    		$error = $this->MTest->insertTest($qry);
	    		$qry = "INSERT INTO psikotest (ID_REKRUTMEN, ID_BID, ID_PEL, INTELEGENSI, ABSTRAKSI, NUMERIK, STABILITASI, EMOSI, ADAPTASI, KERJASAMA_KELOMPOK, KONTAKSOSIAL, KEPEMIMPINAN, TOLERANSISTRESS, MOTIVASIKERJA, TEMPO, TELITI, KETAHANANKERJA, NILAIAKHIR, STATUSLULUS) VALUES";
	    	} else
	    	if($i < $data->rowcount($sheet_index=0) ){
	      			$qry = $qry.',';
	      	}else {
	      		$qry = $qry.';';

	      	}
	    }
	    $xdata['query'] = $qry; 
	    $xdata['view']= 'admin/v_test_akademik';
		$error = $this->MTest->insertTest($qry);
	    $this->load->view('admin/main_admin', $xdata);
	}
	
	function importTestAkademik(){
		include_once ( APPPATH."libraries/excel_reader.php");
    	$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
    	$pgAkademik = $this->MTest->getPassingGrade(1);
	    $pgToefl = $this->MTest->getPassingGrade(2);
	    $qry = "INSERT INTO testakademik (ID_REKRUTMEN, ID_BID, ID_PEL, AKADEMIK, TOEFL, NILAIAKHIR, STATUSLULUS) VALUES ";
	    $j = -1;
	    for ($i=7; $i <= ($data->rowcount($sheet_index=0)); $i++){ 
	      $j++;
	      $rekrut[$j]   = $data->val($i, 1);
	      $bid[$j]   = $data->val($i, 2);
	      $pel[$j]   = $data->val($i, 3);
//	      $noTest[$j]  = $data->val($i, 6);
	      $akademik[$j]  = $data->val($i, 7);
	      $toefl[$j]  = $data->val($i, 8);
	      $akhir[$j]  = $data->val($i, 9);
	      
	      if($akademik[$j] >= $pgAkademik && $toefl[$j] >= $pgToefl)
	      	$status = 1;
	      else
	      	$status = 0;
		
	      $qry = $qry."('$rekrut[$j]', '$bid[$j]', '$pel[$j]', '$akademik[$j]','$toefl[$j]','$akhir[$j]','$status')";
	      
	    	if($i % 500 == 0 && $i != $data->rowcount($sheet_index=0)){
	    		$error = $this->MTest->insertTest($qry);
	    		$qry = "INSERT INTO testakademik (ID_REKRUTMEN, ID_BID, ID_PEL, AKADEMIK, TOEFL, NILAIAKHIR, STATUSLULUS) VALUES ";
	    	} else
	    	if($i < $data->rowcount($sheet_index=0) ){
	      			$qry = $qry.',';
	      	}else {
	      		$qry = $qry.';';

	      	}
	    }
	    $xdata['query'] = $qry; 
	    $xdata['view']= 'admin/v_test_akademik';
		$error = $this->MTest->insertTest($qry);
	    $this->load->view('admin/main_admin', $xdata);
	}	
	
		function importTestWawancara(){
			include_once ( APPPATH."libraries/excel_reader.php");
	    	$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
	    	$pgWawancara= $this->MTest->getPassingGrade(5);
		    $qry = "INSERT INTO wawancara (ID_REKRUTMEN ,ID_BID ,ID_PEL ,ADAPTASI ,INTEGRITAS ,ORIENTASIPADAPELANGGAN ,PEMBELAJARANKESINAMBUNGAN ,ORIENTASIHASIL ,NILAIAKHIR ,STATUSLULUS) VALUES ";
		    $j = -1;
		    for ($i=7; $i <= ($data->rowcount($sheet_index=0)); $i++){ 
		      $j++;
		      $rekrut[$j]   = $data->val($i, 1);
		      $bid[$j]   = $data->val($i, 2);
		      $pel[$j]   = $data->val($i, 3);
//		      $noTest[$j]  = $data->val($i, 6);
				$adaptasi[$j]= $data->val($i, 7);
				$integritas[$j]= $data->val($i, 8);
				$orientasipadapelanggan[$j]= $data->val($i, 9);
				$pembelajarankesinambungan[$j]= $data->val($i, 10);
				$orientasihasil[$j]= $data->val($i, 11);
				$nilaiakhir[$j]= $data->val($i, 12);
		      
		      if($nilaiakhir[$j] >= $pgWawancara && 
							      	$adaptasi[$j] > 0 && 
							      	$integritas[$j] > 0 && 
							      	$orientasipadapelanggan[$j] > 0 && 
							      	$pembelajarankesinambungan[$j] > 0 &&
							      	$orientasihasil[$j] > 0)
		      	$status = 1;
		      else
		      	$status = 0;
			
		      $qry = $qry."('$rekrut[$j]', '$bid[$j]', 
		      				'$pel[$j]', '$adaptasi[$j]',
		      				'$integritas[$j]','$orientasipadapelanggan[$j]',
		      				'$pembelajarankesinambungan[$j]','$orientasihasil[$j]',
		      				'$nilaiakhir[$j]','$status')";
		      
		    	if($i % 500 == 0 && $i != $data->rowcount($sheet_index=0)){
		    		$error = $this->MTest->insertTest($qry);
		    		$qry = "INSERT INTO wawancara (ID_REKRUTMEN ,ID_BID ,ID_PEL ,ADAPTASI ,INTEGRITAS ,ORIENTASIPADAPELANGGAN ,PEMBELAJARANKESINAMBUNGAN ,ORIENTASIHASIL ,NILAIAKHIR ,STATUSLULUS) VALUES ";
		    	} else
		    	if($i < $data->rowcount($sheet_index=0) ){
		      			$qry = $qry.',';
		      	}else {
		      		$qry = $qry.';';
	
		      	}
		    }
		    $xdata['query'] = $qry; 
		    $xdata['view']= 'admin/v_test_akademik';
			$error = $this->MTest->insertTest($qry);
		    $this->load->view('admin/main_admin', $xdata);
		}
		
	function importTestGAT(){
			include_once ( APPPATH."libraries/excel_reader.php");
	    	$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
	    	$pgGAT= $this->MTest->getPassingGrade(4);
		    $qry = "INSERT INTO testgat (ID_REKRUTMEN ,ID_BID ,ID_PEL ,INTELEGENSI,ABSTRAKSI,VERBAL,NUMERIK,NILAIAKHIR ,STATUSLULUS) VALUES ";
		    $j = -1;
		    for ($i=7; $i <= ($data->rowcount($sheet_index=0)); $i++){ 
		      $j++;
		      $rekrut[$j]   = $data->val($i, 1);
		      $bid[$j]   = $data->val($i, 2);
		      $pel[$j]   = $data->val($i, 3);
//		      $noTest[$j]  = $data->val($i, 6);
				$intelegensi[$j]= $data->val($i, 7);
				$abstraksi[$j]= $data->val($i, 8);
				$verbal[$j]= $data->val($i, 9);
				$numerik[$j]= $data->val($i, 10);
				$nilaiakhir[$j]= $data->val($i, 11);
		      
		      if($nilaiakhir[$j] >= $pgGAT)
		      	$status = 1;
		      else
		      	$status = 0;
			
		      $qry = $qry."('$rekrut[$j]', '$bid[$j]', '$pel[$j]', '$intelegensi[$j]','$abstraksi[$j]','$verbal[$j]','$numerik[$j]','$nilaiakhir[$j]','$status')";
		      
		    	if($i % 500 == 0 && $i != $data->rowcount($sheet_index=0)){
		    		$error = $this->MTest->insertTest($qry);
		    		$qry = "INSERT INTO testgat (ID_REKRUTMEN ,ID_BID ,ID_PEL ,INTELEGENSI,ABSTRAKSI,VERBAL,NUMERIK ,NILAIAKHIR ,STATUSLULUS) VALUES ";
		    	} else
		    	if($i < $data->rowcount($sheet_index=0) ){
		      			$qry = $qry.',';
		      	}else {
		      		$qry = $qry.';';
	
		      	}
		    }
		    $xdata['query'] = $qry; 
		    $xdata['view']= 'admin/v_test_akademik';
			$error = $this->MTest->insertTest($qry);
		    $this->load->view('admin/main_admin', $xdata);
		}
		
	function importTestKesehatan(){
			include_once ( APPPATH."libraries/excel_reader.php");
	    	$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
//	    	$pgGAT= $this->MTest->getPassingGrade(4);
		    $qry = "INSERT INTO testkesehatan (ID_KATEGORI_SEHAT ,ID_REKRUTMEN ,ID_BID ,ID_PEL ,PENYAKITDIDERITA ,CATATAN ,STATUSLULUS) VALUES ";
		    $j = -1;
		    for ($i=7; $i <= ($data->rowcount($sheet_index=0)); $i++){ 
		      $j++;
		      $rekrut[$j]   = $data->val($i, 1);
		      $bid[$j]   = $data->val($i, 2);
		      $pel[$j]   = $data->val($i, 3);
//		      $noTest[$j]  = $data->val($i, 6);
				$penyakit[$j]= $data->val($i, 7);
				$catatan[$j]= $data->val($i, 8);
				$nilaiakhir[$j]= $data->val($i, 9);
		      
		      if($nilaiakhir[$j] == 'B'){
		      	$kategori = 1;
		      	$status = 1;
		      }else if($nilaiakhir[$j] == 'CB'){
		      	$kategori = 2;
		      	$status = 1;
		      }else if($nilaiakhir[$j] == 'TBA'){
		      	$kategori = 3;
		      	$status = 0;
		      }else if($nilaiakhir[$j] == 'TBB'){
		      	$kategori = 4;
		      	$status = 0;
		      }	
			
		      $qry = $qry."('$kategori','$rekrut[$j]', '$bid[$j]', '$pel[$j]', '$penyakit[$j]','$catatan[$j]','$status')";
		      
		    	if($i % 500 == 0 && $i != $data->rowcount($sheet_index=0)){
		    		$error = $this->MTest->insertTest($qry);
		    		$qry = "INSERT INTO testkesehatan (ID_KATEGORI_SEHAT ,ID_REKRUTMEN ,ID_BID ,ID_PEL ,PENYAKITDIDERITA ,CATATAN ,STATUSLULUS) VALUES ";
		    	} else
		    	if($i < $data->rowcount($sheet_index=0) ){
		      			$qry = $qry.',';
		      	}else {
		      		$qry = $qry.';';
	
		      	}
		    }
		    $xdata['query'] = $qry; 
		    $xdata['view']= 'admin/v_test_akademik';
			$error = $this->MTest->insertTest($qry);
		    $this->load->view('admin/main_admin', $xdata);
		}
	
	function inputGagalSeleksiBerkas($idpel,$idbid,$rekrutmen){
		
	}
	
}
?>