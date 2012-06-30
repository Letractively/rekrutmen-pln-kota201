<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Resume</title>
  </head>
  <body>
    <p>
      <!-- page content -->
      <?php echo form_open('pelamar');?>    </p>
    <table width="793" height="536" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td width="109" height="26">&nbsp;</td>
        <td width="148">Nama Lengkap</td>
        <td width="200"><input name="nama" type="text" id="nama" value="<?php echo set_value('nama',(isset($form['nama'])) ? $form['nama'] : '');?>" /></td>
        <td width="310"><?php echo form_error('nama'); ?> </td>
      </tr>
      <tr>
        <td height="26">&nbsp;</td>
        <td>Kota Lahir</td>
        <td><input name="kotaLahir" type="text" id="kotaLahir" value="<?php echo set_value('kotaLahir',(isset($form['kotaLahir'])) ? $form['kotaLahir'] : '');?>" /></td>
        <td width="310"><?php echo form_error('kotaLahir'); ?> </td>
      </tr>
      <tr>
        <td height="26">&nbsp;</td>
        <td>Tanggal Lahir</td>
        <td><div align="left"><a href="javascript:NewCssCal('tglLahir','yyyymmdd')">
        <input name="tglLahir" type="text" id="tglLahir" value="<?php echo set_value('tglLahir',(isset($form['tglLahir'])) ? $form['tglLahir'] : '');?>" />
        </a><a href="javascript:NewCssCal('tglLahir','yyyymmdd')"><img src="<?php echo base_url();?>/datepicker/images/cal.gif" width="12" height="13" alt="Pick a date"></a></div></td>
        <td width="310"><?php echo form_error('tglLahir'); ?> </td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td>Jenis Kelamin</td>
        <td>	<?php 
	$option_jk = array ( 0 => '-Pilih Jenis Kelamin-', 1 => 'Pria', 2 => 'Wanita');
    	echo form_dropdown("jk",$option_jk, set_value('jk',(isset($form['jk'])) ? $form['jk'] : 0),"id='jk'");
    ?>        </td>
        <td width="310"><?php echo form_error('jk'); ?> </td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td>Agama</td>
        <td><?php
    	echo form_dropdown("agama",$option_agama,set_value('agama',(isset($form['agama'])) ? $form['agama'] : 0),"id='agama'");
    ?>        </td>
        <td width="310"><?php echo form_error('agama'); ?> </td>
      </tr>
      <tr>
        <td height="26">&nbsp;</td>
        <td>Nomor Telp</td>
        <td><input name="noTelp" type="text" id="noTelp" value="<?php echo set_value('noTelp',(isset($form['noTelp'])) ? $form['noTelp'] : '');?>" /></td>
        <td width="310"><?php echo form_error('noTelp'); ?> </td>
      </tr>
      <tr>
        <td height="26">&nbsp;</td>
        <td>Nomor HP</td>
        <td><input name="noHp" type="text" id="noHp" value="<?php echo set_value('noHp',(isset($form['noHp'])) ? $form['noHp'] : '');?>" /></td>
        <td width="310"><?php echo form_error('noHp'); ?> </td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td>Status Pernikahan</td>
        <td><?php
    	echo form_dropdown("nikah",$option_nikah,set_value('nikah',(isset($form['nikah'])) ? $form['nikah'] : ''),"id='nikah'");
    ?>        </td>
        <td width="310"><?php echo form_error('nikah'); ?> </td>
      </tr>
      <tr>
        <td height="23">Alamat KTP</td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td height="39">&nbsp;</td>
        <td>Alamat</td>
        <td><textarea name="alamat" id="alamat"><?php echo set_value('alamat',(isset($form['alamat'])) ? $form['alamat'] : '');?></textarea></td>
        <td width="310"><?php echo form_error('alamat'); ?> </td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td>Provinsi</td>
        <td><div id="propinsi" style="width:200px;float:left;"><?php
    	echo form_dropdown("provinsi_id",$option_propinsi,set_value('provinsi_id',(isset($form['provinsi'])) ? $form['provinsi'] : 0),"id='propinsi_id'");
    ?>
    </div></td>
<td width="310"><?php echo form_error('provinsi_id'); ?> </td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td>Kota</td>
        <td>     <div id="kota">  	<?php
    	echo form_dropdown("kota_id",isset($option_kota1) ? $option_kota1: array('Pilih Kota / Kabupaten'=>'Pilih Propinsi Dahulu'),set_value('kota',(isset($form['kota'])) ? $form['kota'] : 0),'enabled');
    ?>   </div></td>
    <td width="310"><?php echo form_error('kota_id'); ?> </td>
      </tr>
      <tr>
        <td height="26">&nbsp;</td>
        <td>Kodepos</td>
        <td><input name="kodepos" type="text" id="kodepos" value="<?php echo set_value('kodepos',(isset($form['kodepos'])) ? $form['kodepos'] : '');?>" maxlength="5" /></td>
        <td width="310"><?php echo form_error('kodepos'); ?> </td>
      </tr>
      <tr>
        <td height="26">Alamat Surat</td>
      <td colspan="2"><label>
          <input type="checkbox" name="idem" id="idem" />
          Sama dengan Alamat KTP</label></td>
      </tr>
      <tr>
        <td height="39">&nbsp;</td>
        <td>Alamat</td>
        <td><textarea name="alamat2" id="alamat2"><?php echo set_value('alamat2',(isset($form['alamat2'])) ? $form['alamat2'] : '');?></textarea></td>
        <td width="310"><?php echo form_error('alamat2'); ?> </td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td>Provinsi</td>
        <td> <div id="propinsi2" style="width:200px;float:left;"> <?php
    	echo form_dropdown("provinsi_id2",$option_propinsi,set_value('provinsi_id2',(isset($form['provinsi2'])) ? $form['provinsi2'] : 0),"id='propinsi_id2'");
    ?></div></td>
    <td width="310"><?php echo form_error('provinsi_id2'); ?> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Kota</td>
        <td> <div id="kota2">  	<?php
    	echo form_dropdown("kota_id2",isset($option_kota2) ? $option_kota2: array('Pilih Kota / Kabupaten'=>'Pilih Propinsi Dahulu'),set_value('kota2',(isset($form['kota2'])) ? $form['kota2'] : 0),'enabled');
    ?>   </div></td>
    <td width="310"><?php echo form_error('kota_id2'); ?> </td>
      </tr>
      <tr>
        <td height="26">&nbsp;</td>
        <td>Kodepos</td>
        <td><input name="kodepos2" type="text" id="kodepos2" value="<?php echo set_value('kodepos2',(isset($form['kodepos2'])) ? $form['kodepos2'] : '');?>" maxlength="5" /></td>
        <td width="310"><?php echo form_error('kodepos2'); ?> </td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
  </table>

<?php echo form_submit("submit","Submit"); ?>
    <?php echo form_close(); ?>
    <script type="text/javascript">
	  	$("#propinsi_id").change(function(){
	    		var selectValues = $("#propinsi_id").val();
	    		if (selectValues == 0){
	    			var msg = "<select name=\"kota_id\" disabled><option value=\"Pilih Kota / Kabupaten\">Pilih Propinsi Dahulu</option></select>";
	    			$('#kota').html(msg);
	    		}else{
	    			var propinsi_id = {propinsi_id:$("#propinsi_id").val()};
	    			$('#kota_id').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('pelamar/select_kota1')?>",
							data: propinsi_id,
							success: function(msg){
								$('#kota').html(msg);
							}
				  	});
	    		}
	    });
			$("#propinsi_id2").change(function(){
	    		var selectValues = $("#propinsi_id2").val();
	    		if (selectValues == 0){
	    			var msg = "<select name=\"kota_id2\" disabled><option value=\"Pilih Kota / Kabupaten\">Pilih Propinsi Dahulu</option></select>";
	    			$('#kota2').html(msg);
	    		}else{
	    			var propinsi_id2 = {propinsi_id2:$("#propinsi_id2").val()};
	    			$('#kota_id2').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('pelamar/select_kota2')?>",
							data: propinsi_id2,
							success: function(msg){
								$('#kota2').html(msg);
							}
				  	});
	    		}
	    });
			$("#idem").change(function () { 
			    if ($(this).is(":checked")) {			    	
			    	$("#alamat2").attr("disabled",true);
			    	$("#propinsi_id2").attr("disabled",true);
			    	$("#kota_id2").attr("disabled",true);
			    	$("#kodepos2").attr("disabled",true);
			    }
			    else {
			    	$("#alamat2").attr("disabled",false);
			    	$("#propinsi_id2").attr("disabled",false);
			    	$("#kota_id2").attr("disabled",false);
			    	$("#kodepos2").attr("disabled",false);
			    }
			});
	   </script>
  </body>
</html>
