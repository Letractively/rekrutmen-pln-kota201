<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php if(isset($form['idkerja'])) {
			echo form_open('pelamar/editPengalaman/'.$form['idkerja']) ;
		}else{
			echo form_open('pelamar/inputPengalaman');
         }?>
<table width="700" height="195" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td width="156" height="26">Nama Perusahaan</td>
    <td width="189">
      <input type="text" name="nama" id="nama" value="<?php echo set_value('nama',(isset($form['nama'])) ? $form['nama'] : '');?>" />
    *    </td>
    <td width="335"><?php echo form_error('nama'); ?></td>
  </tr>
  <tr>
    <td height="26">Jabatan</td>
    <td>
      <input type="text" name="jabatan" id="jabatan" value="<?php echo set_value('jabatan',(isset($form['jabatan'])) ? $form['jabatan'] : '');?>" />
      *</td>
    <td><?php echo form_error('jabatan'); ?></td>
  </tr>
  <tr>
    <td height="26">Tanggal Masuk</td>
    <td>
<div align="left"><a href="javascript:NewCssCal('tglMasuk','yyyymmdd')">
        <input name="tglMasuk" type="text" id="tglMasuk" value="<?php echo set_value('tglMasuk',(isset($form['tglMasuk'])) ? $form['tglMasuk'] : '');?>" />
        </a><a href="javascript:NewCssCal('tglMasuk','yyyymmdd')"><img src="<?php echo base_url();?>/datepicker/images/cal.gif" width="12" height="13" alt="Pick a date"></a>*</div>
    </td>
    <td><?php echo form_error('tglMasuk'); ?></td>
  </tr>
  <tr>
    <td height="26">Tanggal keluar</td>
    <td>
      <div align="left"><a href="javascript:NewCssCal('tglKeluar','yyyymmdd')">
        <input name="tglKeluar" type="text" id="tglKeluar" value="<?php echo set_value('tglKeluar',(isset($form['tglKeluar'])) ? $form['tglKeluar'] : '');?>" />
        </a><a href="javascript:NewCssCal('tglKeluar','yyyymmdd')"><img src="<?php echo base_url();?>/datepicker/images/cal.gif" width="12" height="13" alt="Pick a date"></a>*</div>
    </td>
    <td><?php echo form_error('tglKeluar'); ?></td>
  </tr>
  <tr>
    <td height="26">Penghasilan</td>
    <td>
      <input type="text" name="penghasilan" id="penghasilan" value="<?php echo set_value('penghasilan',(isset($form['penghasilan'])) ? $form['penghasilan'] : '');?>" /></td>
    <td><?php echo form_error('penghasilan'); ?></td>
  </tr>
  <tr>
    <td height="26">Website Perusahaan</td>
    <td>
      <input type="text" name="website" id="website" value="<?php echo set_value('website',(isset($form['website'])) ? $form['website'] : '');?>" /></td>
    <td><?php echo form_error('website'); ?></td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td><div align="right">
      <?php echo form_submit("submit","Submit"); ?>

    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php echo form_close();?>
</body>
</html>
