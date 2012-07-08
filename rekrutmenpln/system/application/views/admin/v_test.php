<html>
<head>
	<title> Daftar Peserta Psikotes</title>
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
		<a href='<?php echo site_url('admin/generate_report')?>'>Generate Report</a> |		
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
<center><h3>Generate Peserta Test</h3></center>					

	<table border="1">
			<tr align="center">
					<th rowspan="2" width="300px">Nama Rerkutmen</th>
					<th rowspan="2" width="150px">Lokasi</th>
					<th rowspan="2" width="100px">Pelaksana</th>
					<th rowspan="2" width="100px">Jenis rekrutmen</th>
					<th rowspan="2" width="200px">Tanggal Buka</th>
					<th rowspan="2" width="200px">Tanggal Tutup</th>
					<th colspan="5" width="100px">Tahapan Seleksi</th>
				</tr>
				<tr align="center">
					<th colspan="1">Psikotest</th>
					<th colspan="1">Akademik</th>
					<th colspan="1">Gat</th>
					<th colspan="1">Kesehatan</th>
					<th colspan="1">Wawancara</th>
				</tr>	
		<?php
			if(isset($rekrutmen)){
			$i=0;
			foreach($rekrutmen as $rows){
				echo "<tr>";
				echo "<td>";
				echo $rows->NAMA_REKRUTMEN;
				echo "</td>";
				echo "<td>";
				echo $rows->NAMA_LOKASI;
				echo "</td>";
				echo "<td>";
				echo $rows->NAMA_PELAKSANA;
				echo "</td>";
				echo "<td>";
				echo $rows->NAMA_JENIS_REKRUT;
				echo "</td>";
				echo "<td>";
				echo $rows->TGL_BUKA;
				echo "</td>";
				echo "<td>";
				echo $rows->TGL_TUTUP;
				echo "</td>";
				echo "<td align='center'>";
					if($count_psikotes[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
					echo "</td>";
				echo "<td align='center'>";
					if($count_akademik[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
					echo anchor('admin/peserta_test/template_testakademik/'.$rows->ID_REKRUTMEN, 'Generate');
				echo "</td>";
				echo "<td align='center'>";
					if($count_gat[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
					echo anchor('admin/peserta_test/template_testgat/'.$rows->ID_REKRUTMEN, 'Generate');
				echo "</td>";
				echo "<td align='center'>";
					if($count_kesehatan[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
				echo anchor('admin/peserta_test/template_testkesehatan/'.$rows->ID_REKRUTMEN, 'Generate');
					echo "</td>";
				echo "<td align='center'>";
					if($count_wawancara[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
					echo anchor('admin/peserta_test/template_wawancara/'.$rows->ID_REKRUTMEN, 'Generate');
				echo "</td>";
				echo "</tr>";
				$i++;	
			}
			}
		?>
	</table>
	Catatan : <img src="<?php echo base_url();?>assets/checklist_icon.gif" width=30 height=30 align='center'></img> Sudah dilakukan Tahapan Seleksi
<?php echo form_close(); ?>
</body>
</html>	