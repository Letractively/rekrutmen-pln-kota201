<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peserta_test extends Controller {

	function peserta_test() {
		parent::Controller();	
		$this->load->helper(array('form','url'));
		require_once 'PHPExcel.php';
		include 'PHPExcel/Writer/Excel5.php';
		$this->load->model('m_test');
		$this->load->model('m_rekrutmen');

	}
		
	function index(){
		$data['rekrutmen']  		= $this->m_rekrutmen->getRekrutmenSeleksi();
		$data['count_akademik']		= $this->m_test->countTest($data,"testakademik");
		$data['count_psikotes']		= $this->m_test->countTest($data,"psikotest");
		$data['count_kesehatan']	= $this->m_test->countTest($data,"testkesehatan");
		$data['count_gat']			= $this->m_test->countTest($data,"testgat");
		$data['count_wawancara']	= $this->m_test->countTest($data,"wawancara");
		
		$this->load->view('admin/v_test',$data);
	}
		
	function template_psikotes($id)
		{
		//require_once 'PHPExcel/IOFactory.php';

				$objPHPExcel = new PHPExcel();
                $objPHPExcel->getProperties()->setCreator("PLN");
                $objPHPExcel->getProperties()->setLastModifiedBy("PLN");
                $objPHPExcel->getProperties()->setTitle("Peserta Psikotes");

				//freeze panes
                $objPHPExcel->getActiveSheet()->freezePane('A7');
				// Set column width
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
				//Merge cells (warning: the row index is 0-based)
				$sheet = $objPHPExcel->getActiveSheet();
				$sheet->mergeCells('D1:U1');
				$sheet->mergeCells('D2:U2');

				//Modify cell's style
				$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray(
					array(
						'font' => array(
										'name'         => 'Times New Roman',
										'bold'         => true,
										'italic'    => false,
										'size'        => 12
										),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
										'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
										'wrap'       => true
										)
					)
				);
				
				$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray(
				array(
					'font' => array(
								'name'         => 'Times New Roman',
								'bold'         => true,
								'italic'    => false,
								'size'        => 14
								),
					'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
								'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
								'wrap'       => true
								)
					)
				);
				
				$objPHPExcel->getActiveSheet()->duplicateStyleArray(
					array(
						'font' => array(
									'name'         => 'Times New Roman',
									'bold'         => true,
									'italic'    => false,
									'size'        => 12
									),
						'borders' => array(
									'top'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'left'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'right'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE)
									),
						'alignment' => array(
									'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
									'wrap'       => true
									)
						),
					'A6:U6'
				);
				$objPHPExcel->getActiveSheet()->getStyle('A6:U6')->getBorders()->getAllBorders()->setColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK));
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(false);
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Daftar Peserta Psikotest');
				$objPHPExcel->getActiveSheet()->SetCellValue('D2',"Ceksound");
				$objPHPExcel->getActiveSheet()->SetCellValue('A6',"ID Rekrutmen");
				$objPHPExcel->getActiveSheet()->SetCellValue('B6',"ID_BID");
				$objPHPExcel->getActiveSheet()->SetCellValue('C6',"ID_PELAMAR");
				$objPHPExcel->getActiveSheet()->SetCellValue('D6',"No.");
				$objPHPExcel->getActiveSheet()->SetCellValue('E6',"Nama Peserta");
				$objPHPExcel->getActiveSheet()->SetCellValue('F6',"No Test");
				$objPHPExcel->getActiveSheet()->SetCellValue('G6',"Intelegensi");
				$objPHPExcel->getActiveSheet()->SetCellValue('H6',"Abstraksi");
				$objPHPExcel->getActiveSheet()->SetCellValue('I6',"Numerik");
				$objPHPExcel->getActiveSheet()->SetCellValue('J6',"Stabilitasi");
				$objPHPExcel->getActiveSheet()->SetCellValue('K6',"Emosi");
				$objPHPExcel->getActiveSheet()->SetCellValue('L6',"Adaptasi");
				$objPHPExcel->getActiveSheet()->SetCellValue('M6',"Kerjasama Kelompok");
				$objPHPExcel->getActiveSheet()->SetCellValue('N6',"Kontak Sosial");
				$objPHPExcel->getActiveSheet()->SetCellValue('O6',"Kepemimpinan");
				$objPHPExcel->getActiveSheet()->SetCellValue('P6',"Toleransi Stres");
				$objPHPExcel->getActiveSheet()->SetCellValue('Q6',"Motivasi Kerja");
				$objPHPExcel->getActiveSheet()->SetCellValue('R6',"Tempo");
				$objPHPExcel->getActiveSheet()->SetCellValue('S6',"Teliti");
				$objPHPExcel->getActiveSheet()->SetCellValue('T6',"Ketahanan Kerja");
				$objPHPExcel->getActiveSheet()->SetCellValue('U6',"Nilai Akhir");
                //Isi Data pelamar
				 $data = $this->m_test->getPeserta($id);
		 	     $no=1;
				 $row = 7;
				 foreach($data as $rows){
				 	$col = 0;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_REKRUTMEN);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_BID);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_PEL);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $no);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NAMA_PEL);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NO_TEST);
					$row++;
					$no++;
		 		}
				//HTTP Header untuk download         
                header('Content-type: application/ms-excel');
                header('Content-Disposition:  inline; attachment; filename=peserta_test_psikotes.xls');
                flush();
                //Dumping data to HTTP
                $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
				$objWriter->save('php://output');
		}
		
		function template_testakademik($id)
		{
		 
				$objPHPExcel = new PHPExcel();
                $objPHPExcel->getProperties()->setCreator("PLN");
                $objPHPExcel->getProperties()->setLastModifiedBy("PLN");
                $objPHPExcel->getProperties()->setTitle("Peserta Test Akademik");

				//freeze panes
                $objPHPExcel->getActiveSheet()->freezePane('A7');
				// Set column width
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
				//Merge cells (warning: the row index is 0-based)
				$sheet = $objPHPExcel->getActiveSheet();
				$sheet->mergeCells('D1:I1');
				$sheet->mergeCells('D2:I2');
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(false);
				//Modify cell's style
				$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray(
					array(
						'font' => array(
										'name'         => 'Times New Roman',
										'bold'         => true,
										'italic'    => false,
										'size'        => 12
										),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
										'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
										'wrap'       => true
										)
					)
				);
				
				$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray(
				array(
					'font' => array(
								'name'         => 'Times New Roman',
								'bold'         => true,
								'italic'    => false,
								'size'        => 14
								),
					'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
								'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
								'wrap'       => true
								)
					)
				);
				
				$objPHPExcel->getActiveSheet()->duplicateStyleArray(
					array(
						'font' => array(
									'name'         => 'Times New Roman',
									'bold'         => true,
									'italic'    => false,
									'size'        => 12
									),
						'borders' => array(
									'top'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'left'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'right'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE)
									),
						'alignment' => array(
									'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
									'wrap'       => true
									)
						),
					'D6:I6'
				);
				$objPHPExcel->getActiveSheet()->getStyle('A6:I6')->getBorders()->getAllBorders()->setColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK));
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Daftar Peserta Test Akademik');
				$objPHPExcel->getActiveSheet()->SetCellValue('D2',"Ceksound");
				$objPHPExcel->getActiveSheet()->SetCellValue('A6',"ID Rekrutmen");
				$objPHPExcel->getActiveSheet()->SetCellValue('B6',"ID_BID");
				$objPHPExcel->getActiveSheet()->SetCellValue('C6',"ID_PELAMAR");
				$objPHPExcel->getActiveSheet()->SetCellValue('D6',"No.");
				$objPHPExcel->getActiveSheet()->SetCellValue('E6',"Nama Peserta");
				$objPHPExcel->getActiveSheet()->SetCellValue('F6',"No Test");
				$objPHPExcel->getActiveSheet()->SetCellValue('G6',"Nilai Akademik");
				$objPHPExcel->getActiveSheet()->SetCellValue('H6',"Score Toefl");
				$objPHPExcel->getActiveSheet()->SetCellValue('I6',"Nilai Akhir");
				//Isi Data pelamar
				 $data = $this->m_test->getPeserta($id);
		 	     $no=1;
				 $row = 7;
				 foreach($data as $rows){
				 	$col = 0;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_REKRUTMEN);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_BID);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_PEL);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $no);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NAMA_PEL);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NO_TEST);
					$row++;
					$no++;
		 		}
				//HTTP Header untuk download  
				$nama="peserta_test_akademik_"."";       
                header('Content-type: application/ms-excel');
                header('Content-Disposition:  inline; attachment; filename=peserta_test_akademik".xls');
                flush();
                //Dumping data to HTTP
                $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
				$objWriter->save('php://output');
		}
		
		function template_testgat($id)
		{
		 
				$objPHPExcel = new PHPExcel();
                $objPHPExcel->getProperties()->setCreator("PLN");
                $objPHPExcel->getProperties()->setLastModifiedBy("PLN");
                $objPHPExcel->getProperties()->setTitle("Peserta Test GAT");

				//freeze panes
                $objPHPExcel->getActiveSheet()->freezePane('A7');
				// Set column width
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
				//Merge cells (warning: the row index is 0-based)
				$sheet = $objPHPExcel->getActiveSheet();
				$sheet->mergeCells('D1:K1');
				$sheet->mergeCells('D2:K2');
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(false);
				//Modify cell's style
				$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray(
					array(
						'font' => array(
										'name'         => 'Times New Roman',
										'bold'         => true,
										'italic'    => false,
										'size'        => 12
										),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
										'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
										'wrap'       => true
										)
					)
				);
				
				$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray(
				array(
					'font' => array(
								'name'         => 'Times New Roman',
								'bold'         => true,
								'italic'    => false,
								'size'        => 14
								),
					'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
								'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
								'wrap'       => true
								)
					)
				);
				
				$objPHPExcel->getActiveSheet()->duplicateStyleArray(
					array(
						'font' => array(
									'name'         => 'Times New Roman',
									'bold'         => true,
									'italic'    => false,
									'size'        => 12
									),
						'borders' => array(
									'top'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'left'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'right'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE)
									),
						'alignment' => array(
									'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
									'wrap'       => true
									)
						),
					'D6:K6'
				);
				$objPHPExcel->getActiveSheet()->getStyle('A6:K6')->getBorders()->getAllBorders()->setColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK));
                
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Daftar Peserta Test GAT');
				$objPHPExcel->getActiveSheet()->SetCellValue('D2',"Ceksound");
				$objPHPExcel->getActiveSheet()->SetCellValue('A6',"ID Rekrutmen");
				$objPHPExcel->getActiveSheet()->SetCellValue('B6',"ID_BID");
				$objPHPExcel->getActiveSheet()->SetCellValue('C6',"ID_PELAMAR");
				$objPHPExcel->getActiveSheet()->SetCellValue('D6',"No.");
				$objPHPExcel->getActiveSheet()->SetCellValue('E6',"Nama Peserta");
				$objPHPExcel->getActiveSheet()->SetCellValue('F6',"No Test");
				$objPHPExcel->getActiveSheet()->SetCellValue('G6',"Intelegensi");
				$objPHPExcel->getActiveSheet()->SetCellValue('H6',"Abstraksi");
				$objPHPExcel->getActiveSheet()->SetCellValue('I6',"Verbal");
				$objPHPExcel->getActiveSheet()->SetCellValue('J6',"Numerik");
				$objPHPExcel->getActiveSheet()->SetCellValue('K6',"Nilai Akhir");
				//Isi Data pelamar
				 $data = $this->m_test->getPeserta($id);
		 	     $no=1;
				 $row = 7;
				 foreach($data as $rows){
				 	$col = 0;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_REKRUTMEN);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_BID);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_PEL);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $no);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NAMA_PEL);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NO_TEST);
					$row++;
					$no++;
		 		}
				//HTTP Header untuk download         
                header('Content-type: application/ms-excel');
                header('Content-Disposition:  inline; attachment; filename=peserta_test_gat.xls');
                flush();
                //Dumping data to HTTP
                $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
				$objWriter->save('php://output');
		}
		
		function template_testkesehatan($id)
		{
		 
				$objPHPExcel = new PHPExcel();
                $objPHPExcel->getProperties()->setCreator("PLN");
                $objPHPExcel->getProperties()->setLastModifiedBy("PLN");
                $objPHPExcel->getProperties()->setTitle("Peserta Test Kesehatan");

				//freeze panes
                $objPHPExcel->getActiveSheet()->freezePane('A7');
				// Set column width
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

				//Merge cells (warning: the row index is 0-based)
				$sheet = $objPHPExcel->getActiveSheet();
				$sheet->mergeCells('D1:I1');
				$sheet->mergeCells('D2:I2');
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(false);
				//Modify cell's style
				$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray(
					array(
						'font' => array(
										'name'         => 'Times New Roman',
										'bold'         => true,
										'italic'    => false,
										'size'        => 12
										),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
										'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
										'wrap'       => true
										)
					)
				);
				
				$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray(
				array(
					'font' => array(
								'name'         => 'Times New Roman',
								'bold'         => true,
								'italic'    => false,
								'size'        => 14
								),
					'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
								'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
								'wrap'       => true
								)
					)
				);
				
				$objPHPExcel->getActiveSheet()->duplicateStyleArray(
					array(
						'font' => array(
									'name'         => 'Times New Roman',
									'bold'         => true,
									'italic'    => false,
									'size'        => 12
									),
						'borders' => array(
									'top'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'left'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'right'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE)
									),
						'alignment' => array(
									'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
									'wrap'       => true
									)
						),
					'A6:I6'
				);
				$objPHPExcel->getActiveSheet()->getStyle('A6:I6')->getBorders()->getAllBorders()->setColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK));
                
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Daftar Peserta Test Kesehatan');
				$objPHPExcel->getActiveSheet()->SetCellValue('D2',"Ceksound");
				$objPHPExcel->getActiveSheet()->SetCellValue('A6',"ID Rekrutmen");
				$objPHPExcel->getActiveSheet()->SetCellValue('B6',"ID_BID");
				$objPHPExcel->getActiveSheet()->SetCellValue('C6',"ID_PELAMAR");
				$objPHPExcel->getActiveSheet()->SetCellValue('D6',"No.");
				$objPHPExcel->getActiveSheet()->SetCellValue('E6',"Nama Peserta");
				$objPHPExcel->getActiveSheet()->SetCellValue('F6',"No Test");
				$objPHPExcel->getActiveSheet()->SetCellValue('G6',"Penyakit Diderita");
				$objPHPExcel->getActiveSheet()->SetCellValue('H6',"Catatan");
				$objPHPExcel->getActiveSheet()->SetCellValue('I6',"Hasil");
				//Isi Data pelamar
				 $data = $this->m_test->getPeserta($id);
		 	     $no=1;
				 $row = 7;
				 foreach($data as $rows){				 	
				 	$col = 0;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_REKRUTMEN);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_BID);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_PEL);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $no);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NAMA_PEL);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NO_TEST);
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$row,"TBA");
						$objValidation = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8,$row)->getDataValidation();
						$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
						$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
						$objValidation->setAllowBlank(false);
						$objValidation->setShowInputMessage(true);
						$objValidation->setShowErrorMessage(true);
						$objValidation->setShowDropDown(true);
						$objValidation->setErrorTitle('Input error');
						$objValidation->setError('Nilai Tidak Terdaftar.');
						$objValidation->setPromptTitle('Silahkan Pilih');
						$objValidation->setPrompt('Silahkan pilih kategoori.');
						$objValidation->setFormula1('"TBA,TBB,CB,B"');	// Make sure to put the list items between " and "  !!!
						
					$row++;
					$no++;					
		 		}
		 	
				//HTTP Header untuk download         
                header('Content-type: application/ms-excel');
                header('Content-Disposition:  inline; attachment; filename=peserta_test_kesehatan.xls');
                flush();
                //Dumping data to HTTP
                $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
				$objWriter->save('php://output');
		}

		function template_wawancara($id)
		{
		 
				$objPHPExcel = new PHPExcel();
                $objPHPExcel->getProperties()->setCreator("PLN");
                $objPHPExcel->getProperties()->setLastModifiedBy("PLN");
                $objPHPExcel->getProperties()->setTitle("Peserta Wawancara");

				//freeze panes
                $objPHPExcel->getActiveSheet()->freezePane('A7');
				// Set column width
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
				//Merge cells (warning: the row index is 0-based)
				$sheet = $objPHPExcel->getActiveSheet();
				$sheet->mergeCells('D1:L1');
				$sheet->mergeCells('D2:L2');
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setVisible(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(false);
				//Modify cell's style
				$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray(
					array(
						'font' => array(
										'name'         => 'Times New Roman',
										'bold'         => true,
										'italic'    => false,
										'size'        => 12
										),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
										'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
										'wrap'       => true
										)
					)
				);
				
				$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray(
				array(
					'font' => array(
								'name'         => 'Times New Roman',
								'bold'         => true,
								'italic'    => false,
								'size'        => 14
								),
					'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
								'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
								'wrap'       => true
								)
					)
				);
				
				$objPHPExcel->getActiveSheet()->duplicateStyleArray(
					array(
						'font' => array(
									'name'         => 'Times New Roman',
									'bold'         => true,
									'italic'    => false,
									'size'        => 12
									),
						'borders' => array(
									'top'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'left'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE),
									'right'        => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE)
									),
						'alignment' => array(
									'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
									'wrap'       => true
									)
						),
					'A6:L6'
				);
				$objPHPExcel->getActiveSheet()->getStyle('A6:L6')->getBorders()->getAllBorders()->setColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK));
                
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Daftar Peserta Wawancara');
				$objPHPExcel->getActiveSheet()->SetCellValue('D2',"Ceksound");
				$objPHPExcel->getActiveSheet()->SetCellValue('A6',"ID Rekrutmen");
				$objPHPExcel->getActiveSheet()->SetCellValue('B6',"ID_BID");
				$objPHPExcel->getActiveSheet()->SetCellValue('C6',"ID_PELAMAR");
				$objPHPExcel->getActiveSheet()->SetCellValue('D6',"No.");
				$objPHPExcel->getActiveSheet()->SetCellValue('E6',"Nama Peserta");
				$objPHPExcel->getActiveSheet()->SetCellValue('F6',"No Test");
				$objPHPExcel->getActiveSheet()->SetCellValue('G6',"Adaptasi");
				$objPHPExcel->getActiveSheet()->SetCellValue('H6',"Integritas");
				$objPHPExcel->getActiveSheet()->SetCellValue('I6',"Orientasi Pada Pelanggan");
				$objPHPExcel->getActiveSheet()->SetCellValue('J6',"Pembelajaran Kesinambungan");
				$objPHPExcel->getActiveSheet()->SetCellValue('K6',"Orientasi Hasil");
				$objPHPExcel->getActiveSheet()->SetCellValue('L6',"Nilai Akhir");
				//Isi Data pelamar
				 $data = $this->m_test->getPeserta($id);
		 	     $no=1;
				 $row = 7;
				 foreach($data as $rows){
				 	$col = 0;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_REKRUTMEN);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_BID);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->ID_PEL);
					$col++;
				 	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $no);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NAMA_PEL);
					$col++;
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $rows->NO_TEST);
					$row++;
					$no++;
		 		}
				//HTTP Header untuk download         
                header('Content-type: application/ms-excel');
                header('Content-Disposition:  inline; attachment; filename=peserta_wawancara.xls');
                flush();
                //Dumping data to HTTP
                $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
				$objWriter->save('php://output');
		}

}	
?>