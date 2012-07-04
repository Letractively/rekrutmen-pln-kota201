<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {font-size: 12}
.style3 {font-size: 10px}
-->
</style>
</head>

<body>
<?php if(isset($form['idkursus'])) {
			echo form_open_multipart('pelamar/editKursus/'.$form['idkursus']) ;
		}else{
			echo form_open_multipart('pelamar/addPersetujuan');
         }?>
<table width="1017" border="0" cellspacing="2" cellpadding="2">
<tr>
    <td width="146">Foto</td>
    <td width="287"><?php echo form_upload('userfile1');?>    
	<?php 
    if (isset($form['foto']))  {?>
	    <a href="<?php echo base_url();?>index.php/pelamar/displayBerkas/foto/<?php echo $form['foto'];?>">
    	<img src="<?php echo base_url();?>berkas/foto/thumbnails/<?php echo $form['foto'];?>"/>        </a>
    	<?php }?>
  <br />    
        <span class="style3">filetype: jpg,jpeg,gif,png,bmp; size max:100kb</span></td>
    <td width="405"><div align="left">

    <?php 
    if(isset($berkas1)){
	    if($berkas1 != 'kosong'){
	    	echo $berkas1; }
    	}?>
    </div></td>
  </tr>
<tr>
    <td>Berkas KTP</td>
    <td><?php echo form_upload('userfile2');?>    
	<?php 
    if (isset($form['ktp']))  {?>
	    <a href="<?php echo base_url();?>index.php/pelamar/displayBerkas/ktp/<?php echo $form['ktp'];?>">
    	<img src="<?php echo base_url();?>berkas/ktp/thumbnails/<?php echo $form['ktp'];?>"/>        </a>
    	<?php }?>
        <br />    
        <span class="style3">filetype: jpg,jpeg,gif,png,bmp; size max:100kb</span></td>
    <td><div align="left">

    <?php 
    if(isset($berkas2)){
	    if($berkas2 != 'kosong'){
	    	echo $berkas2; }
    	}?>
    </div></td>
  </tr>
<tr>
    <td>Berkas Akte Kelahiran</td>
    <td><span class="style1"><?php echo form_upload('userfile3');?>    
      <?php 
    if (isset($form['akte']))  {?>
	    <a href="<?php echo base_url();?>index.php/pelamar/displayBerkas/akte/<?php echo $form['akte'];?>">
    	<img src="<?php echo base_url();?>berkas/akte/thumbnails/<?php echo $form['akte'];?>"/>        </a>
    	<?php }?>
        <br />    
        <span class="style3">filetype: jpg,jpeg,gif,png,bmp; size max:100kb</span></span></td>
    <td><div align="left">

    <?php 
    if(isset($berkas3)){
	    if($berkas3 != 'kosong'){
	    	echo $berkas3; }
    	}?>
    </div></td>
  </tr>
  <tr>
    <td>Penghasilan Diinginkan</td>
    <td>
      <input type="text" name="penghasilan" id="penghasilan" value="<?php echo set_value('penghasilan',(isset($form['penghasilan'])) ? $form['penghasilan'] : '');?>" />
    </td>
    <td>&nbsp;</td>
  </tr>  
  <tr>
    <td>Pernyataan</td>
    <td>
      <textarea name="pernyataan" id="pernyataan" cols="45" rows="5" readonly></textarea>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<?php 
	$setuju = '';
	if(isset($form['setuju'])){ 
		if($form['setuju'] == 'on'){ 
			$setuju = 'checked';
		}
	}
	
	?>
      <input type="checkbox" name="setuju" id="setuju" <?php echo $setuju ?>/>
      Setuju Coy !!
    </td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><div align="right">
      <?php echo form_submit("submit","Submit"); ?>

    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php echo form_close(); ?>

</body>
</html>
