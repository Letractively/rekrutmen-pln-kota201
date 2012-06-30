<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="AkunPelamar">
  <div align="left">
    <table width="598" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td width="163">No KTP</td>
        <td width="180"><input name="ktp" type="text" id="ktp" value="<?php echo set_value('ktp');?>" size="30" /></td><td width="235">
          <?php echo form_error('ktp'); ?></td>
      </tr>
      <tr>
        <td>Konfirmasi No KTP</td>
        <td><input name="ktp2" type="text" id="ktp2" value="<?php echo set_value('ktp2');?>" size="30" /></td><td>
          <?php echo form_error('ktp2'); ?>
          </td>
      </tr>
      <tr>
        <td>E - Mail</td>
        <td>
        <input name="email" type="text" id="email" value="<?php echo set_value('email');?>" size="30" /> </td><td>
        <?php echo form_error('email'); ?> </td>
      </tr>
      <tr>
        <td>Konfirmasi E - Mail</td>
        <td>
          <input name="email2" type="text" id="email2" value="<?php echo set_value('email2');?>" size="30" /></td><td>
          <?php echo form_error('email2'); ?> </td>
      </tr>
      <tr>
        <td>Password</td>
        <td>
        <input name="pass" type="password" id="pass" value="<?php echo set_value('pass');?>" size="30" /></td><td>
        <?php echo form_error('pass'); ?> </td>
      </tr>
      <tr>
        <td>Konfirmasi Password</td>
        <td>
          <input name="pass2" type="password" id="pass2" size="30" /></td><td>
          <?php echo form_error('pass2'); ?> </td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
        <td><?php echo $cap_img ;?> </td>
        <td><?php echo $cap_msg ;?></td>
      </tr>
      <tr>
        <td>Kode Verifikasi</td>
        <td>
          <input name="verifikasi" type="text" id="verifikasi" value="" size="30" /></td><td>
          <?php echo form_error('verifikasi'); ?> </td>
      </tr>
      <tr>
        <td><label>
          <div align="right"></div>
        </label></td>
        <td><div align="right">
          <input type="submit" name="submit" id="submit" value="Submit" />
        </div></td>
        <td></td>
      </tr>
    </table>
  </div>
</form>
Page rendered in {elapsed_time} seconds
</body>
</html>
