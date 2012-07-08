<html>
<head>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/grocery_crud/themes/flexigrid/css/flexigrid.css" />
<script type="text/javascript" src="<?php echo base_url();?>datepicker/datetimepicker_css.js"></script>
	
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
		<a href='<?php echo site_url('admin/peserta_test')?>'>Generate Peserta Test</a> |	
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

<div class="flexigrid crud-form" style='width: 100%;'>
	<div class="mDiv">
		<div class="ftitle">
			<div class='ftitle-left'>
				<?php if(isset($form['idrekrutmen'])) {
							echo form_open('admin/buka_rekrutmen/edit/'.$form['idrekrutmen']) ;
							echo "Form Edit Rekrutmen";	
						}else{
							echo form_open('admin/buka_rekrutmen/add');
							echo "Form Buka Rekrutmen";
				         }?>
			</div>
			<div class='clear'></div>
		</div>
	</div>
	<fieldset>
		<legend>Rekrutmen</legend>
			<table>
				<tr>
					<td class="td"> Lokasi </td>                                   
					<td class="td"> : </td>                                     
					<td>
					<div class='form-input-box'>
				         <?php
    					if($option_lokasi==NULL)
    					echo "<input  size='30'type='text' value='Isi Data Lokasi Dahulu' disabled='disabled'>";
    					else
						echo form_dropdown("lokasi",$option_lokasi,set_value('lokasi',(isset($form['lokasi'])) ? $form['lokasi'] : 0),"id='lokasi'");
   						 ?>    
					</div>
					</td>
					<td width="310"><?php echo form_error('lokasi'); ?> </td>
				
				</tr>
				
				<tr>
					<td class="td"> Jenis Rekrutmen </td>                                   
					<td class="td"> : </td>                                     
					<td><?php
						if($option_jenis_rekrutmen==NULL)
    					echo "<input size='30' type='text' value='Isi Data Jenis Rekrutmen Dahulu' disabled='disabled'>";
    					else
    					echo form_dropdown("jenis_rekrutmen",$option_jenis_rekrutmen,set_value('jenis_rekrutmen',(isset($form['jenis_rekrutmen'])) ? $form['jenis_rekrutmen'] : 0),"id='jenis_rekrutmen'");
   						 ?> 
					</td>
					<td width="310"><?php echo form_error('jenis_rekrutmen'); ?> </td>
				</tr>
				
				<tr>
					<td class="td"> Pelaksana </td>                                   
					<td class="td"> : </td>                                     
					<td><?php
						if($option_pelaksana==NULL)
    					echo "<input  size='30'type='text' value='Isi Data Pelaksana Dahulu' disabled='disabled'>";
    					else
    					echo form_dropdown("pelaksana",$option_pelaksana,set_value('pelaksana',(isset($form['pelaksana'])) ? $form['pelaksana'] : 0),"id='pelaksana'");
   						 ?>
					</td>
					<td width="310"><?php echo form_error('pelaksana'); ?> </td>
				</tr>
				
				<tr>
					<td class="td"> Nama Rekrutmen </td>                                   
					<td class="td"> : </td>                                     
					<td><input size=30 name="nama_rekrutmen" type="text" value="<?php echo set_value('nama_rekrutmen',(isset($form['nama_rekrutmen'])) ? $form['nama_rekrutmen'] : '');?>" /></td>
					<td width="310"><?php echo form_error('nama_rekrutmen'); ?> </td>
				</tr>
				
				<tr>
					<td class="td"> Tgl Buka Rekrutmen </td>                                   
					<td class="td"> : </td>                                     
					<td> 
						<a href="javascript:NewCssCal('tgl_buka','yyyymmdd')">
						<input size=10 type="text" name="tgl_buka" id="tgl_buka" size="20" value="<?php echo set_value('tgl_buka',(isset($form['tgl_buka'])) ? $form['tgl_buka'] : '');?>"></input>
						<img src="<?php echo base_url();?>datepicker/images/cal.gif" width="16" height="16" alt="Pick a date"></img>
						</a>
					</td>
					<td width="310"><?php echo form_error('tgl_buka'); ?> </td>
				</tr>
				
				<tr>
					<td class="td"> Tgl Tutup Rekrutmen </td>                                   
					<td class="td"> : </td>                                     
					<td> 
						<a href="javascript:NewCssCal('tgl_tutup','yyyymmdd')">
						<input size=10  type="text" name="tgl_tutup" id="tgl_tutup" size="20" value="<?php echo set_value('tgl_tutup',(isset($form['tgl_tutup'])) ? $form['tgl_tutup'] : '');?>"></input>
						<img src="<?php echo base_url();?>datepicker/images/cal.gif" width="16" height="16" alt="Pick a date"></img>
						</a>
					</td>
					<td width="310"><?php echo form_error('tgl_tutup'); ?> </td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>Persyaratan Umum</legend>
						<table>
						<tr>
							<td width=60>Tingkat</td>
							<td>Batas Usia <br>Maximal</td>
							<td></td>
						</tr>
						<tr>
							<td>
								<?php echo $option_tingkat[0]->NAMA_TINGKAT;?>
						  		<input type="hidden" name="tingkat1" value="<?php echo $option_tingkat[0]->ID_TINGKAT;?>"></input>
   						  	</td>
   						  	<td>
   						  		<input size=2 name="batas1" type="text" id="batas1" value="<?php echo set_value('batas1',(isset($form['batas1'])) ? $form['batas1'] : '');?>" />
        					</td>
        					<td width="100"><?php echo form_error('batas1'); ?> </td>
        				</tr>
        				<tr>
        					<td>
        					  <?php echo $option_tingkat[1]->NAMA_TINGKAT;?>
   						 	 <input type="hidden" name="tingkat2" value="<?php echo $option_tingkat[1]->ID_TINGKAT;?>"></input>
   							</td>
   							<td>
   						  		<input size=2 name="batas2" type="text" id="batas2" value="<?php echo set_value('batas2',(isset($form['batas2'])) ? $form['batas2'] : '');?>" />
        					</td>
        					<td width="500"><?php echo form_error('batas2'); ?> </td>
   						</tr>	
   						</table>
						
				
		</fieldset>
<div class="pDiv">
			<div class='form-button-box'>			
			<?php echo form_submit("submit","Simpan"); ?>
			</div>
			<div class='form-button-box'>		
			<?php echo form_submit("submit","Batal"); ?>
			</div>
</div>
</div>	
</body>
</html>

<?php echo form_close(); ?>
