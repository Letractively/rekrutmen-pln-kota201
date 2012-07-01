<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php if(isset($form['idPend'])) {
			echo form_open('pelamar/editPendidikanNonPT/'.$form['idPend']) ;
		}else{
			echo form_open('pelamar/inputPendidikanNonPT');
         }?>
<table width="606" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="157">Tingkat Pendidikan</td>
    <td width="200">
      <div id="tingkat" style="width:200px;float:left;"><?php
    	echo form_dropdown("tingkat",$option_tingkat,set_value('tingkat',(isset($form['tingkat'])) ? $form['tingkat'] : 0),"id='tingkat'");
    ?>
    </div>    </td>
    <td width="229"><?php echo form_error('tingkat'); ?></td>
  </tr>
  <tr>
    <td>Nama Sekolah/Institusi</td>
    <td><input type="text" name="nama" id="nama" value="<?php echo set_value('nama',(isset($form['nama'])) ? $form['nama'] : '');?>"/></td>
    <td><?php echo form_error('nama'); ?></td>
  </tr>
  <tr>
    <td>Tempat/Alamat</td>
    <td><textarea name="tempat" id="tempat"><?php echo set_value('tempat',(isset($form['tempat'])) ? $form['tempat'] : '');?></textarea></td>
    <td><?php echo form_error('tempat'); ?></td>
  </tr>
  <tr>
    <td>Tahun Masuk</td>
    <td><?php echo form_dropdown('thnMasuk', $option_year,set_value('ipk',(isset($form['thnMasuk'])) ? $form['thnMasuk'] : 0),"'id=thnMasuk'");?></td>
    <td><?php echo form_error('thnMasuk'); ?></td>
  </tr>
  <tr>
    <td>Tahun Lulus</td>
    <td><?php echo form_dropdown('thnLulus', $option_year,set_value('ipk',(isset($form['thnLulus'])) ? $form['thnLulus'] : 0),"'id=thnLulus'");?></td>
    <td><?php echo form_error('thnLulus'); ?></td>
  </tr>
  <tr>
    <td>Berkas Ijazah</td>
    <td><input type="text" name="berkas" id="berkas" value="<?php echo set_value('berkas',(isset($form['berkas'])) ? $form['berkas'] : '');?>"/></td>
    <td><?php echo form_error('berkas'); ?></td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td><div align="right"><?php echo form_submit('submit', 'Submit');?></div></td>
    <td><div align="right"></div></td>
  </tr>
</table>
<?php echo form_close();?>
</body>
</html>
