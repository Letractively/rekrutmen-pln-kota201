<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>

<body>
<?php if(isset($form['idkursus'])) {
			echo form_open('pelamar/editKursus/'.$form['idkursus']) ;
		}else{
			echo form_open('pelamar/inputKursus');
         }?>
<table width="532" height="151" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td width="164" height="26">Nama Kursus</td>
    <td width="153"> 
      <input type="text" name="nama" id="nama" value="<?php echo set_value('nama',(isset($form['nama'])) ? $form['nama'] : '');?>"/>
    </td>
    <td width="198"><?php echo form_error('nama'); ?></td>
  </tr>
  <tr>
    <td>Nama Instansi</td>
    <td>
      <input type="text" name="instansi" id="instansi" value="<?php echo set_value('instansi',(isset($form['instansi'])) ? $form['instansi'] : '');?>"/>
    </td>
    <td><?php echo form_error('instansi'); ?></td>
  </tr>
  <tr>
    <td>Tahun Sertifikat</td>
    <td>
      <input type="text" name="tahun" id="tahun" value="<?php echo set_value('tahun',(isset($form['tahun'])) ? $form['tahun'] : '');?>"/>
    </td>
    <td><?php echo form_error('tahun'); ?></td>
  </tr>
  <tr>
    <td>Berkas Sertifikat</td>
    <td>
      <input type="text" name="berkas" id="berkas" />
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
