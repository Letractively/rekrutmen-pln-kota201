<?php

class Kiba extends Controller

{
		
		function Kiba()
		
		{
		
		parent::Controller();
		
		}
		
		function testexcel()
		{
		require_once 'PHPExcel.php';
		include 'PHPExcel/Writer/Excel5.php';
		//require_once 'PHPExcel/IOFactory.php';
		 
				$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("BazZ");				
				$objPHPExcel->getProperties()->setLastModifiedBy("BazZ");				
				$objPHPExcel->getProperties()->setTitle("TestExcel");				
				$objPHPExcel->getProperties()->setSubject("");
                $objPHPExcel->getProperties()->setCreator("Petra Barus");
                $objPHPExcel->getProperties()->setLastModifiedBy("Petra Barus");
                $objPHPExcel->getProperties()->setTitle("Dokumen Saya");
                $objPHPExcel->getProperties()->setSubject("Dokumen Saya");
                $objPHPExcel->getProperties()->setDescription("Dokumen Saya");
                // Set row height
//				$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(5);
//				$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(5);
				// Set column width
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(24);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(11);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(7);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
				$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(12);
				$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(8);
				$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
				$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
				$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(8);
				$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(6);
				$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(12);
				$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(11);
				//Merge cells (warning: the row index is 0-based)
				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(0,1,17,1);
				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(0,2,17,2);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(0,3,0,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(1,3,1,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(2,3,3,3);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(2,4,2,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(3,4,3,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(4,3,4,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(5,3,5,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(6,3,6,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(7,3,9,3);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(7,4,7,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(8,4,9,4);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(10,3,10,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(11,3,11,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(12,3,12,5);
//				$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(13,3,13,5);
				//Modify cell's style
				$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray(
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
				
				$objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray(
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
					'A3:R3'
				);
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Daftar Peserta Psikotest');
				$objPHPExcel->getActiveSheet()->SetCellValue('A2',"Ceksound");
				$objPHPExcel->getActiveSheet()->SetCellValue('A3',"No.");
				$objPHPExcel->getActiveSheet()->SetCellValue('B3',"Nama Pelamar");
				$objPHPExcel->getActiveSheet()->SetCellValue('C3',"No Test");
				$objPHPExcel->getActiveSheet()->SetCellValue('D3',"Intelegensi");
				$objPHPExcel->getActiveSheet()->SetCellValue('E3',"Abstraksi");
				$objPHPExcel->getActiveSheet()->SetCellValue('F3',"Numerik");
				$objPHPExcel->getActiveSheet()->SetCellValue('G3',"Stabilitasi");
				$objPHPExcel->getActiveSheet()->SetCellValue('H3',"Emosi");
				$objPHPExcel->getActiveSheet()->SetCellValue('I3',"Adaptasi");
				$objPHPExcel->getActiveSheet()->SetCellValue('J3',"Kerjasama Kelompok");
				$objPHPExcel->getActiveSheet()->SetCellValue('K3',"Kontak Sosial");
				$objPHPExcel->getActiveSheet()->SetCellValue('L3',"Kepemimpinan");
				$objPHPExcel->getActiveSheet()->SetCellValue('M3',"Toleransi Stres");
				$objPHPExcel->getActiveSheet()->SetCellValue('N3',"Motivasi Kerja");
				$objPHPExcel->getActiveSheet()->SetCellValue('O3',"Tempo");
				$objPHPExcel->getActiveSheet()->SetCellValue('P3',"Teliti");
				$objPHPExcel->getActiveSheet()->SetCellValue('Q3',"Ketahanan Kerja");
				$objPHPExcel->getActiveSheet()->SetCellValue('R3',"Nilai Akhir");
                //HTTP Header untuk download
                header('Content-type: application/ms-excel');
                header('Content-Disposition:  inline; attachment; filename=dokumen.xls');
                flush();
                //Dumping data to HTTP
                $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
				$objWriter->save('php://output');
		}

}

?>