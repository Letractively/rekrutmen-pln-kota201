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
<!-- End of header-->
<div class="flexigrid crud-form" style='width: 100%;'>
	<div class="mDiv">
		<div class="ftitle">
			<div class='ftitle-left'>		
				<?php if(isset($form['rekrutmen'])) {
						echo form_open('admin/bidang_dibuka/edit/'.$form['rekrutmen'].'/'.$form['bidang']) ;
						echo "Form Edit Bidang Dibuka";
						}else{
							echo form_open('admin/bidang_dibuka/add');
							echo "Form Bidang Dibuka";
				         }
		         ?>
			</div>
			<div class='clear'></div>
		</div>
	</div>
	<fieldset>
		<legend>Bidang Dibuka</legend>
			<table>
				<tr>
					<td class="td">Rekrutmen </td>                                   
					<td class="td"> : </td>                                     
					<td><?php
						if($option_rekrutmen==NULL)
    					echo "<input type='text' value='Isi Rekrutmen Dahulu' disabled='disabled'>";
    					else
    					echo form_dropdown("rekrutmen",$option_rekrutmen,set_value('rekrutmen',(isset($form['rekrutmen'])) ? $form['rekrutmen'] : 0),"id='rekrutmen'");
   						 ?>    
					</td>
					<td width="310"><?php echo form_error('rekrutmen'); ?> </td>
				</tr>
				
				<tr>
					<td class="td"> Bidang </td>                                   
					<td class="td"> : </td>                                     
					<td><?php
    					echo form_dropdown("bidang",$option_bidang,set_value('bidang',(isset($form['bidang'])) ? $form['bidang'] : 0),"id='bidang'");
   						 ?> 
					</td>
					<td width="310"><?php echo form_error('bidang'); ?> </td>
				</tr>
								
				<tr>
					<td class="td"> Quota </td>                                   
					<td class="td"> : </td>                                     
					<td><input name="quota" type="text" value="<?php echo set_value('quota',(isset($form['quota'])) ? $form['quota'] : '');?>" /></td>
					<td width="310"><?php echo form_error('quota'); ?> </td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>Program Studi Dibuka</legend>
			<?php 
//			echo $total_prodi;
//			die();
			?>
			<select name="program_studi[]" id='third' multiple='multiple' size='5' ><?php
								for($i=0;$i<$total_prodi;$i++)
								{
								// setiap kegiatan yang dibaca dari tabel disisipkan ke tag <option></option>
								echo "<option value='".$option_program_studi[$i]->ID_PS."' ";
									
									if(isset($form['rekrutmen'])){
									for($j=0;$j<$total;$j++){
										if($form_prodi[$j]->ID_PS == $option_program_studi[$i]->ID_PS){
										echo "selected='true'";
										$j=$total;
										}
									}
									}
								
								echo ">".$option_program_studi[$i]->NAMA_PS."</option>";
										
								}
						?>
						</select>
						<?php echo form_error('program_studi'); ?> 
								
						
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

<?php echo form_close(); ?>

<script type="text/javascript" language="javascript">
	
	$().ready(function() {
		$('#third').multiselect2side({
			selectedPosition: 'left',
			moveOptions: true,
			labelTop: '+ +',
			labelBottom: '- -',
			labelUp: '+',
			labelDown: '-',
			labelsx: 'Program Studi yang Dibutuhkan',
			labeldx: '* List Bidang *',
			search: "Cari: "
			});
		


	$('#third')
		//.multiselect2side('addOption', {name: 'test selected', value: 'test1', selected: false})
		//.multiselect2side('addOption', {name: 'test not selected', value: 'test2', selected: false});
	//$('#third').multiselect2side('destroy');
	});
</script>
</html>	