<html>
<head>
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
	<h3> Data Rekrutmen</h3>
	<?php echo anchor('admin/buka_rekrutmen/add', '[+] Buka Rekrutmen Baru');?>
	<table border="1">
		<tr>
			<td>Lokasi</td>
			<td>Jenis Rekrutmen</td>
			<td>Pelaksana</td>
			<td>Nama Rekrutmen</td>
			<td>Tanggal Buka</td>
			<td>Tanggal Tutup</td>
			<?php 
				foreach ($tingkat as $row){
				echo "<td>Batas Usia Max $row->NAMA_TINGKAT</td>";
			}
			?>
			<td>Action</td>
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
				echo "<td>";
				echo $rekrutmen[$j]->USIA_PELAMAR_MAX." Tahun";
				echo "</td>";
				}
				else{
				echo "<td>";
				echo $rekrutmen[$j]->USIA_PELAMAR_MAX." Tahun";
				echo "</td>";
				echo "<td>";
				echo anchor('admin/buka_rekrutmen/edit/'.$rekrutmen[$j]->ID_REKRUTMEN, 'Edit')."|".anchor('admin/buka_rekrutmen/delete/'.$rekrutmen[$j]->ID_REKRUTMEN, 'Delete',array('onClick' => "return confirm('Are you sure you want to delete?')"));
				echo "</td>";
				echo "</tr>";	
				}	
			}
		}
		?>
	</table>
			
</body>
</html>			
<?php echo form_close(); ?>
