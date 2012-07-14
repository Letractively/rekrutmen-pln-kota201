<html>
<head>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/grocery_crud/themes/flexigrid/css/flexigrid.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/multiselect/css/jquery.multiselect2side.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/multiselect/js/jquery.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/multiselect/js/jquery.multiselect2side.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/datepicker/datetimepicker_css.js"></script>
	
</head>
<body>
<!-- Beginning header -->

<!-- End of header-->
		
				<?php if(isset($form['rekrutmen'])) {
						echo form_open('admin/bidang_dibuka/edit/'.$id.'/'.$form['bidang']) ;
						}else{
							echo form_open('admin/bidang_dibuka/add/'.$id);
				         }
		         ?>
			
	<fieldset>
		<legend>Bidang Dibuka</legend>
			<div class="table">
                    <table class="listing form" cellpadding="0" cellspacing="0">
				<tr>
					<td class="td">Rekrutmen </td>                                                                     
					<td>
					<div class='form-input-box'>
					<input name ='rekrutmen' type='hidden' value='<?php echo $id;?>'>
					<?php echo $option_rekrutmen[0]->NAMA_REKRUTMEN?>
					</div>
 					</td>
					<td width="310"><?php echo form_error('rekrutmen'); ?> </td>
				</tr>
				
				<tr>
					<td class="td"> Bidang </td>                                                                       
					<td>
					<div class='form-input-box'>
					<?php
    					echo form_dropdown("bidang",$option_bidang,set_value('bidang',(isset($form['bidang'])) ? $form['bidang'] : 0),"id='bidang'" );
   						 ?>
   						 </div> 
					</td>
					<td width="310"><?php echo form_error('bidang'); ?> </td>
				</tr>
								
				<tr>
					<td class="td"> Quota </td>                                                                     
					<td>
					<div class='form-input-box'>
					<input name="quota" type="text" value="<?php echo set_value('quota',(isset($form['quota'])) ? $form['quota'] : '');?>" /></td>
					</div>
					<td width="310"><?php echo form_error('quota'); ?> </td>
				</tr>
			</table>
			</div>
		</fieldset>
		<fieldset>
			<legend>Program Studi Dibuka</legend>
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
<?php echo form_submit("submit","Simpan"); ?>
<?php echo form_submit("submit","Batal"); ?>
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