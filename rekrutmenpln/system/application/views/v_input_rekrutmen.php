<html>
<head>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/grocery_crud/themes/flexigrid/css/flexigrid.css" />
<script type="text/javascript" src="<?php echo base_url();?>datepicker/datetimepicker_css.js"></script>
	

</head>
<body>
<!-- Beginning header -->
   
<!-- End of header-->

				<?php if(isset($form['idrekrutmen'])) {
							echo form_open('admin/buka_rekrutmen/edit/'.$form['idrekrutmen']) ;
								
						}else{
							echo form_open('admin/buka_rekrutmen/add');
							
				         }?>

	    <div class="table">
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" colspan="2">Rekrutmen</th>
                        </tr>
                        <tr>
                            <td>Lokasi</td>                                                                       
						    <td>
							<div class='form-input-box'>
						         <?php
		    					if($option_lokasi==NULL)
		    					echo "<input  size='30'type='text' value='Isi Data Lokasi Dahulu' disabled='disabled'>";
		    					else
								echo form_dropdown("lokasi",$option_lokasi,set_value('lokasi',(isset($form['lokasi'])) ? $form['lokasi'] : 0),"id='lokasi'")."*";
		   						 ?>    
							</div>
							</td>
							<td width="310"><?php echo form_error('lokasi'); ?> </td>
                        </tr>
                        <tr>
							<td class="td"> Jenis Rekrutmen </td>                                                                       
							<td><div class='form-input-box'>
							<?php
								if($option_jenis_rekrutmen==NULL)
		    					echo "<input size='30' type='text' value='Isi Data Jenis Rekrutmen Dahulu' disabled='disabled'>";
		    					else
		    					echo form_dropdown("jenis_rekrutmen",$option_jenis_rekrutmen,set_value('jenis_rekrutmen',(isset($form['jenis_rekrutmen'])) ? $form['jenis_rekrutmen'] : 0),"id='jenis_rekrutmen'")."*";
		   						 ?> 
							</div></td>
							<td width="310"><?php echo form_error('jenis_rekrutmen'); ?> </td>
						</tr>
                   		<tr>
							<td class="td"> Pelaksana </td>                                                                      
							<td><div class='form-input-box'>
							<?php
								if($option_pelaksana==NULL)
		    					echo "<input  size='30'type='text' value='Isi Data Pelaksana Dahulu' disabled='disabled'>";
		    					else
		    					echo form_dropdown("pelaksana",$option_pelaksana,set_value('pelaksana',(isset($form['pelaksana'])) ? $form['pelaksana'] : 0),"id='pelaksana'")."*";
		   						 ?>
							</div></td>
							<td width="310"><?php echo form_error('pelaksana'); ?> </td>
						</tr>
						<tr>
							<td class="td"> Nama Rekrutmen </td>                                                                       
							<td><input size=18 name="nama_rekrutmen" type="text" value="<?php echo set_value('nama_rekrutmen',(isset($form['nama_rekrutmen'])) ? $form['nama_rekrutmen'] : '');?>" />*</innput></td>
							<td width="310"><?php echo form_error('nama_rekrutmen'); ?> </td>
						</tr>
						<tr>
							<td class="td"> Tgl Buka Rekrutmen </td>                                                                        
							<td><div class='form-input-box'>
								<a href="javascript:NewCssCal('tgl_buka','yyyymmdd')">
								<input size=10 type="text" name="tgl_buka" id="tgl_buka" size="20" value="<?php echo set_value('tgl_buka',(isset($form['tgl_buka'])) ? $form['tgl_buka'] : '');?>"></input>
								<img src="<?php echo base_url();?>datepicker/images/cal.gif" width="16" height="16" alt="Pick a date"></img>*
								</a></div>
							</td>
							<td width="310"><?php echo form_error('tgl_buka'); ?> </td>
						</tr>
						<tr>
							<td class="td"> Tgl Tutup Rekrutmen </td>                                                                      
							<td><div class='form-input-box'>
								<a href="javascript:NewCssCal('tgl_tutup','yyyymmdd')">
								<input size=10  type="text" name="tgl_tutup" id="tgl_tutup" size="20" value="<?php echo set_value('tgl_tutup',(isset($form['tgl_tutup'])) ? $form['tgl_tutup'] : '');?>"></input>
								<img src="<?php echo base_url();?>datepicker/images/cal.gif" width="16" height="16" alt="Pick a date"></img>*
								</a></div>
							</td>
							<td width="310"><?php echo form_error('tgl_tutup'); ?> </td>
						</tr>
                    </table>
                </div>
  	<div class="table">
      <table class="listing form" cellpadding="0" cellspacing="0">
						 <tr>
                            <th class="full" colspan="2">Persyaratan Umum</th>
                        </tr>
						<tr>
							<td width=60>Tingkat</td>
							<td width=100>Batas Usia <br>Maximal</td>
							<td></td>
						</tr>
						<tr>
							<td>
								<?php echo $option_tingkat[0]->NAMA_TINGKAT;?>
						  		<input type="hidden" name="tingkat1" value="<?php echo $option_tingkat[0]->ID_TINGKAT;?>"></input>
   						  	</td>
   						  	<td>
   						  		<input size=2 name="batas1" type="text" id="batas1" value="<?php echo set_value('batas1',(isset($form['batas1'])) ? $form['batas1'] : '');?>" />*
        					</td>
        					<td width="100"><?php echo form_error('batas1'); ?> </td>
        				</tr>
        				<tr>
        					<td>
        					  <?php echo $option_tingkat[1]->NAMA_TINGKAT;?>
   						 	 <input type="hidden" name="tingkat2" value="<?php echo $option_tingkat[1]->ID_TINGKAT;?>"></input>
   							</td>
   							<td>
   						  		<input size=2 name="batas2" type="text" id="batas2" value="<?php echo set_value('batas2',(isset($form['batas2'])) ? $form['batas2'] : '');?>" />*
        					</td>
        					<td width="500"><?php echo form_error('batas2'); ?> </td>
   						</tr>	
   					</table>
	</div>
</body>

<?php echo form_submit('submit','Simpan'); ?>
<?php echo form_submit('submit','Batal'); ?>
<?php echo form_close(); ?>
</html>
