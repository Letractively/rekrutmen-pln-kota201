<html>
<head>
	<link  href="<?php echo base_url();?>/assets/template/css/admin.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/multiselect/js/jquery.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/multiselect/js/jquery.multiselect2side.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/datepicker/datetimepicker_css.js"></script>
	
	<title> Form Buka Rekrutmen</title>
</head>
<body>
<!-- Beginning header -->
    
<!-- End of header-->

<img src="<?php echo base_url();?>/assets/template/img/add-icon.gif" width="20" height="20" alt="save" value="Test"/> 
<?php echo anchor('admin/buka_rekrutmen/add', 'Buka Rekrutmen Baru');?>
<br> <br>
						
 <table class="listing" cellpadding="0" cellspacing="0">
		<tr>
			<th>Lokasi</th>
			<th>Jenis Rekrutmen</th>
			<th>Pelaksana</th>
			<th>Nama Rekrutmen</th>
			<th>Tanggal Buka</th>
			<th>Tanggal Tutup</th>
			<th>Status Rekrutmen</th>
			<?php 
				foreach ($tingkat as $row){
				echo "<th>Batas Usia Max $row->NAMA_TINGKAT</th>";
			}
			?>
			<th>Action</th>
		</tr>
		<?php
		$i = 1; 
		foreach ($rekrutmen as $row){
			$rekrutmen[$i] =  $row;
			$i++;
		}
		if(isset($rekrutmen[1])){
			echo "<tr>";
				echo "<td>";
				echo $rekrutmen[1]->NAMA_LOKASI;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[1]->NAMA_JENIS_REKRUT;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[1]->NAMA_PELAKSANA;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[1]->NAMA_REKRUTMEN;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[1]->TGL_BUKA;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[1]->TGL_TUTUP;
				echo "</td>";
				echo "<td>";
				if($rekrutmen[1]->STATUS_REKRUTMEN==1)
				echo "Buka";
				else
				echo "Tutup";
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[1]->USIA_PELAMAR_MAX." Tahun";
				echo "</td>";	
				
			
			for($j=2;$j<=$count;$j++){
				if($rekrutmen[$j]->ID_REKRUTMEN != $rekrutmen[$j-1]->ID_REKRUTMEN)
				{
				echo "<tr>";
				echo "<td>";
				echo $rekrutmen[$j]->NAMA_LOKASI;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[$j]->NAMA_JENIS_REKRUT;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[$j]->NAMA_PELAKSANA;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[$j]->NAMA_REKRUTMEN;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[$j]->TGL_BUKA;
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[$j]->TGL_TUTUP;
				echo "</td>";
				echo "<td align='center'>";
				if($rekrutmen[$j]->STATUS_REKRUTMEN==1)
				echo "Buka";
				else
				echo "Tutup";
				echo "</td>";
				echo "<td>";
				echo $rekrutmen[$j]->USIA_PELAMAR_MAX." Tahun";
				echo "</td>";
				}
				else{
				echo "<td>";
				echo $rekrutmen[$j]->USIA_PELAMAR_MAX." Tahun";
				echo "</td>";
				echo "<td>";
				 
				echo anchor('admin/buka_rekrutmen/delete/'.$rekrutmen[$j]->ID_REKRUTMEN,'Delete|',array('onClick' => "return confirm('Apakah anda yakin untuk menghapus?')"));
				echo anchor('admin/buka_rekrutmen/edit/'.$rekrutmen[$j]->ID_REKRUTMEN,'Edit|');
					if($rekrutmen[$j]->STATUS_REKRUTMEN==1)
						echo anchor('admin/buka_rekrutmen/close/'.$rekrutmen[$j]->ID_REKRUTMEN.'/0', 'Close',array('onClick' => "return confirm('Apakah anda yakin ingin menutup rekrutmen ini?')"));
					else 
						echo anchor('admin/buka_rekrutmen/close/'.$rekrutmen[$j]->ID_REKRUTMEN.'/1', 'Publish',array('onClick' => "return confirm('Apakah anda yakin akan membuka rekrutmen ini?')"));
					 				
				echo "</td>";
				echo "</tr>";	
				}	
			}
		}
		?>
	</table>
	
<?php echo form_close(); ?>
</body>
</html>	