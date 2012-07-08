<html>
<div>
		<a href='<?php echo site_url('admin/buka_rekrutmen/')?>'>Buka Rekrutment</a> |
		<a href='<?php echo site_url('admin/bidang_dibuka/')?>'>Bidang Jabatan Dibuka</a> |
	</div>
	<div>
		<a href='<?php echo site_url('admin/user/crud')?>'>Administrator</a> |	
	</div>
	<div>
		<a href='<?php echo site_url('admin/peserta_test')?>'>Generate Peserta Test</a> |
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
<?php echo form_open('admin\generate_report',array('method' => 'get'));?>
<fieldset>
	<legend>Filter Report</legend>
	<table>
		<tr>
			<td>Rekrutmen</td>
			<td>:</td>
			<td>
			<select name="rekrutmen">
			<option value="NULL" selected>pilih rekrutmen</option>
			<?php foreach($rekrutmen as $rows)		
					echo "<option value=".$rows->ID_REKRUTMEN.">".$rows->NAMA_REKRUTMEN."</option>";
			?>	
				</select>
			</td>
		</tr>
		<tr>
			<td>Test</td>
			<td>:</td>
			<td>
				<select name="test">
					<option value=NULL selected>pilih test</option>
					<option value="PSIKOTEST">psikotest</option>
					<option value="AKADEMIK">akademik</option>	
					<option value="GAT">gat</option>
					<option value="KESEHATAN">kesehatan</option>	
					<option value="WAWANCARA">wawancara</option>	
				</select>
			</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td>
			<input type="radio" name="status" value=1>lulus
			<input type="radio" name="status" value=0>tidak lulus
			</td>
		</tr>
	</table>
	<?php echo form_submit('submit','Lihat');?>
</fieldset>
<?php form_close();?>
<?php echo anchor('admin/generate_report/hasil_test/'.$this->input->get('rekrutmen').'/'.$this->input->get('test').'/'.$this->input->get('status'), 'Print');?>
<body>
	<?php 
		   
	?>
	<table border=1 align="center">
		<tr >
			<td>No</td>
			<td>Nama</td>
			<td>No.Test</td>
			<td>Bidang</td>
		</tr>
		<?php $no=1;
		if(isset($keterangan)){
		echo "<tr>";
		echo $keterangan;
		echo "</tr>";
		}
		if(isset($peserta)){
		 foreach($peserta as $rows){
		  echo "<tr>";
		  echo "<td>";
		  echo $no;
		  echo "</td>";
		   echo "<td>";
		  echo $rows->nama_pel;
		   echo "</td>";
		   echo "<td>";
		  echo $rows->no_test;
		   echo "</td>";
		   echo "<td>";
		  echo $rows->kode_bid;
		   echo "</td>";
		  echo "</tr>";
		  $no++;
		 }
		}
		?>
	</table>
</body>
</html>
