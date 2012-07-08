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
			Data Bidang Dibuka
		</div>
	</div>
	<div id='main-table-box'>
		<div class="tDiv">
			<div class="tDiv2">
	        	<div class="fbutton">
					<div>
						<span class="add">
						<?php echo anchor('admin/bidang_dibuka/add', 'Tambah Bidang Dibuka');?>
						</span>
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
			<td>Nama Rekrutmen</td>
			<td>Lokasi</td>
			<td>Tanggal Buka</td>
			<td>Tanggal Tutup</td>
			<td>Nama Bidang</td>
			<td>Quota</td>
			<td>Program Studi</td>
			<td>Action</td>
		</tr>
		<?php
		 
			foreach($bidangjabatandibuka as $rows){
				echo "<tr>";
				echo "<td>";
				echo $rows->nama_rekrutmen;
				echo "</td>";
				echo "<td>";
				echo $rows->nama_lokasi;
				echo "</td>";
				echo "<td>";
				echo $rows->tgl_buka;
				echo "</td>";
				echo "<td>";
				echo $rows->tgl_tutup;
				echo "</td>";
				echo "<td>";
				echo $rows->NAMA_BID;
				echo "</td>";
				echo "<td>";
				echo $rows->QUOTA;
				echo "</td>";
				echo "<td>";
				echo $rows->nama_ps;
				echo "</td>";
				echo "<td>";
				echo anchor('admin/bidang_dibuka/delete/'.$rows->ID_REKRUTMEN.'/'.$rows->ID_BID.'/'.$rows->ID_PS, "<span class='delete-icon'></span>");
				echo anchor('admin/bidang_dibuka/edit/'.$rows->ID_REKRUTMEN.'/'.$rows->ID_BID, "<span class='edit-icon'></span>");
				echo "</td>";
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

<?php echo form_close(); ?>
</div>
</div>
</body>	
</html>	
