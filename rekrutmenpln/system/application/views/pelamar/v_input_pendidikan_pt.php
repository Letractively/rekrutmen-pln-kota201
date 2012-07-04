<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
</style>
</head>

<body>
<?php if(isset($form['idPend'])) {
			echo form_open_multipart('pelamar/editPendidikanPT/'.$form['idPend']) ;
		}else{
			echo form_open_multipart('pelamar/inputPendidikanPT');
         }?>
<table width="956" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="122">Tingkat Pendidikan</td>
    <td width="354">
      <div id="tingkat" style="width:200px;float:left;"><?php
    	echo form_dropdown("tingkat",$option_tingkat,set_value('tingkat',(isset($form['tingkat'])) ? $form['tingkat'] : 0),"id='tingkat'");
    ?>   </td>
    <td width="460"><?php echo form_error('tingkat'); ?></td>   </div>  
  </tr>
  <tr>
    <td>Perguruan Tinggi</td>
    <td>      <div id="pt" style="width:200px;float:left;"><?php
    	echo form_dropdown("pt",$option_pt,set_value('pt',(isset($form['pt'])) ? $form['pt'] : 0),"id='pt'");
    ?>  </td>
    <td><?php echo form_error('pt'); ?></td>   </div> 
  </tr>
  <tr>
    <td>Program Studi</td>
    <td>  <div id="ps" style="width:200px;float:left;"><?php
    	echo form_dropdown("ps",$option_ps,set_value('ps',(isset($form['ps'])) ? $form['ps'] : 0),"id='ps'");
    ?>
    </div> </td>
    <td><?php echo form_error('ps'); ?></td>
  </tr>
  <tr>
    <td>Konsentrasi</td>
    <td><input type="text" name="konsen" id="konsen" value="<?php echo set_value('konsen',(isset($form['konsen'])) ? $form['konsen'] : '');?>"/></td>
    <td><?php echo form_error('konsen'); ?></td>
  </tr>
  <tr>
    <td>IPK</td>
    <td><input type="text" name="ipk" id="ipk" value="<?php echo set_value('ipk',(isset($form['ipk'])) ? $form['ipk'] : '');?>"/></td>
    <td><?php echo form_error('ipk'); ?></td>
  </tr>
  <tr>
    <td>Tahun Masuk</td>
    <td><?php echo form_dropdown('thnMasuk', $option_year,set_value('thnLulus',(isset($form['thnMasuk'])) ? $form['thnMasuk'] : 0),"'id=thnMasuk'");?></td>
    <td><?php echo form_error('thnMasuk'); ?></td>
  </tr>
  <tr>
    <td>Tahun Lulus</td>
    <td><?php echo form_dropdown('thnLulus', $option_year,set_value('thnLulus',(isset($form['thnLulus'])) ? $form['thnLulus'] : 0),"'id=thnLulus'");?></td>
    <td><?php echo form_error('thnLulus'); ?></td>
  </tr>
  <tr>
    <td>Gelar</td>
    <td><input type="text" name="gelar" id="gelar" value="<?php echo set_value('gelar',(isset($form['gelar'])) ? $form['gelar'] : '');?>"/></td>
    <td><?php echo form_error('gelar'); ?></td>
  </tr>
  <tr>
    <td>Berkas Ijazah</td>
    <td><?php echo form_upload('userfile');?>    
	<?php 
    if (isset($form['berkas']))  {?>
	    <a href="<?php echo base_url();?>index.php/pelamar/displayBerkas/ijazahPT/<?php echo $form['berkas'];?>">
    	<img src="<?php echo base_url();?>berkas/ijazahPT/thumbnails/<?php echo $form['berkas'];?>"/>        </a>
    	<?php }?>
        <br />    
        <span class="style3">filetype: jpg,jpeg,gif,png,bmp; size max:100kb</span></td>
    <td><div align="left">

    <?php 
    if(isset($berkas)){
	    if($berkas != 'kosong'){
	    	echo $berkas; }
    	}?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo form_submit('submit', 'Submit');?></div></td>
    <td><div align="left"></div></td>
  </tr>
<?php echo form_close();?>
</table>

</body>
</html>
