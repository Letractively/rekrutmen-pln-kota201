<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="<?php echo base_url();?>/jquery-ui/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url();?>/jquery-ui/ui.theme.css" type="text/	css" media="all" />
	<script src="<?php echo base_url();?>/jquery-ui/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/datepicker/datetimepicker_css.js"></script>
<title><?php echo $title;?></title>
</head>
<body>

<?php echo anchor('akunPelamar', 'Registrasi')?>
|
<?php echo anchor('login', 'Login') ?>
|
<?php echo anchor('pelamar', 'IsiData')?>
|
<?php echo anchor('pelamar/addKursus', 'Add Kursus')?>
|
<?php echo anchor('pelamar/addPengalaman', 'Add Pengalaman Kerja')?>
|
<?php echo anchor('pelamar/addPendidikan', 'Add Riwayat Pendidikan')?>
|
<?php echo anchor('lowongan', 'Lowongan Dibuka')?>
|
<?php echo anchor('Login/logout', 'Logout')?>
<?php $this->load->view($view);?>
</body>
</html>
