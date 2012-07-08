<html>
<head>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/grocery_crud/themes/flexigrid/css/flexigrid.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/multiselect/css/jquery.multiselect2side.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/multiselect/js/jquery.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/multiselect/js/jquery.multiselect2side.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/datepicker/datetimepicker_css.js"></script>
	
	<title> Form Buka Rekrutmen</title>
</head>
<body>
<!-- Beginning header -->
    <div>
		<a href='<?php echo site_url('admin/buka_rekrutmen/')?>'>Buka Rekrutment</a> |
		<a href='<?php echo site_url('admin/bidang_dibuka/')?>'>Bidang Jabatan Dibuka</a> |
	</div>
	<div>
		<a href='<?php echo site_url('admin/user/crud')?>'>Administrator</a> |	
	</div>
	<div>
		<a href='<?php echo site_url('admin/test')?>'>Generate Peserta Test</a> |	
	</div>
    <div>
		<a href='<?php echo site_url('admin/tingkat_pendidikan/crud')?>'>Tingkat Pendidikan</a> |
		<a href='<?php echo site_url('admin/perguruan_tinggi/crud')?>'>Perguruan Tinggi</a> |
		<a href='<?php echo site_url('admin/program_studi/crud')?>'>Program Studi</a> |
		<a href='<?php echo site_url('admin/template_rekrutmen/crud')?>'>Template Rekrkutmen</a> |
		<a href='<?php echo site_url('admin/jabatan/crud')?>'>Jabatan</a> |
		<a href='<?php echo site_url('admin/lokasi/crud')?>'>Lokasi</a> |
	</div>
	<div>
		<a href='<?php echo site_url('admin/agama/crud')?>'>Agama</a> |
		<a href='<?php echo site_url('admin/pelaksana/crud')?>'>Pelaksana</a> |
		<a href='<?php echo site_url('admin/jenis_studi/crud')?>'>Jenis Studi</a> |
		<a href='<?php echo site_url('admin/kota_kabupaten/crud')?>'>Kota Kabupaten</a> |
		<a href='<?php echo site_url('admin/passing_grade/crud')?>'>Passing Grade</a> |
		<a href='<?php echo site_url('admin/provinsi/crud')?>'>Provinsi</a> |
		<a href='<?php echo site_url('admin/jenis_rekrutmen/crud')?>'>Jenis Rekrutmen</a> |
		<a href='<?php echo site_url('admin/status_pernikahan/crud')?>'>Status Pernikahan</a> |
	</div>
<!-- End of header-->
<div class="flexigrid" style='width: 100%;'>
	<div class="mDiv">
		<div class="ftitle">
			Data Rekrutmen
		</div>
	</div>
	<div id='main-table-box'>
		<div class="tDiv">
			<div class="tDiv2">
	        	<div class="fbutton">
					<div>
						<span class="add">
						<?php echo anchor('admin/buka_rekrutmen/add', 'Buka Rekrutmen Baru');?></span>
					</div>
				</div>
	
				<div class="btnseparator">
				</div>
			</div>
				<div class='clear'></div>
		</div>
	</div>
	
	<table border="1">
		<tr>
			<td>Lokasi</td>
			<td>Jenis Rekrutmen</td>
			<td>Pelaksana</td>
			<td>Nama Rekrutmen</td>
			<td>Tanggal Buka</td>
			<td>Tanggal Tutup</td>
			<td>Status Rekrutmen</td>
			<?php 
				foreach ($tingkat as $row){
				echo "<td>Batas Usia Max $row->NAMA_TINGKAT</td>";
			}
			?>
			<td align="center">Action</td>
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
				echo "<td align='center'>";
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
				echo anchor('admin/buka_rekrutmen/delete/'.$rekrutmen[$j]->ID_REKRUTMEN,"<span class='delete-icon'></span>",array('onClick' => "return confirm('Apakah anda yakin untuk menghapus?')"));
				echo anchor('admin/buka_rekrutmen/edit/'.$rekrutmen[$j]->ID_REKRUTMEN,"<span class='edit-icon'></span>");
					if($rekrutmen[$j]->STATUS_REKRUTMEN==1){
					echo anchor('admin/buka_rekrutmen/close/'.$rekrutmen[$j]->ID_REKRUTMEN, 'Close',array('onClick' => "return confirm('Apakah anda yakin ingin menutup rekrutmen ini?')"));
					 }				
				echo "</td>";
				echo "</tr>";	
				}	
			}
		}
		?>
	</table>
	<div class="pDiv">
		<div class="pDiv2">
		<div class="btnseparator">
		</div>
		<div style="clear: both;">
		</div>
	</div>	
	</div>			
</div>		
<?php echo form_close(); ?>
</body>
</html>	