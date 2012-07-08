<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Rekrutmen PLN - Pelamar</title>
      <meta http-equiv="Content-Type" content="" />
      <meta name="description" content="" />
      <meta name="keywords" content="" />
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/style/css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/style/css/960gs/960.css" type="text/	css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/style/css/960gs/reset.css" type="text/	css" media="all" />
	<script src="<?php echo base_url();?>/jquery-ui/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/datepicker/datetimepicker_css.js"></script>
  </head>
  <body>
		<div class="body">
			<div class="container_16">
				<div class="background">
				
					<div id="header">
						<div class="logo">
							<img src="i<?php echo base_url();?>/assets/style/mages/logo.png" alt="gambar"/>
							<p>REKRUTMEN PLN ONLINE</p>
						</div>
						<br class="clear" />
						<hr color="#bbbaba"/>
					</div>
					<br class="clear" />

					<div id="content" height="1500px">
						<div class="login">
              <form action="validasi">
                <label for="user-name"> Username :</label>
                <input type="text" name="user-name" size="15" maxlength="20" id="user-name"/>
								&nbsp;&nbsp;
								<label for="password">Password :</label>
                <input type="password" name="password" size="15" maxlength="20" id="password"/>
								&nbsp;
								<input type="submit" name="Login" value="Login"/>
              </form>
						</div>
						<div align="right"><br class="clear">
						      <a href="#">Kirim Aktivasi Email</a>&nbsp;|&nbsp;<a href="#">Lupa Password</a>&nbsp;|&nbsp;<a href="#">Buat Akun Baru</a><br/>
					  </div>
						<div id="menu">
							<ul>
								<li class="left"><a href="#">Lowongan</a></li>
								<li class="left"><a href="#">Berkas Saya</a></li>
								<li class="left"><a href="#">Akun Saya</a></li>
								<li class="right"><a href="#">Keluar</a></li>
							</ul>
						</div>
						<br class="clear"/>
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

					</div>
					
					<div id="footer">
						<p>Copyright <span>&#169;</span> 2012 KoTA 201</p>
					</div>
				</div>
			</div>
			<br class="clear">
		</div>
	</body>
</html>