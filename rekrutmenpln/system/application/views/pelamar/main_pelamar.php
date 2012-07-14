<!DOCTYPE html>
<html>
<head>
    <title><?php if(isset($title)) echo $title;?></title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="<?php echo base_url();?>/assets/template/css/pelamar.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>/jquery-ui/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>/datepicker/datetimepicker_css.js"></script> 


</head>
<body>

    <div id="main">
        <div id="header">
            <a href="#"  class="logo"><img src="<?php echo base_url();?>/assets/template/img/Logo Pln.jpg" align="Left" width="70" height="70" alt="" /></a>
            
            <div class="box" id="right-column">
<?php if (!$this->session->userdata('email')){?>
              <div class="box" id="login">
		<?php echo form_open('Login')?>
                <label for="user-name"> 
                Username :
                <?php echo form_input('email')?>
				&nbsp;&nbsp;
				Password :
                <?php echo form_password('password')?>
				&nbsp;
		<input type="submit" value="Login" name='submits'>
		<br>
			<a href="#">Kirim Aktivasi Email</a>&nbsp;|&nbsp;<a href="#">Lupa Password</a>&nbsp;|&nbsp;<a href='<?php echo site_url('akunpelamar')?>' >Buat Akun Baru</a><br>
                </label>

		<?php echo form_close()?>
		</div>
		<?php } ?>
              <ul id="top-navigation">
              		
              		 <?php if ($this->session->userdata('email')){?>
                <li><a href='<?php echo site_url('lowongan')?>' class="style1" >Lowongan</a></li>
                <li><a href='<?php echo site_url('pelamar')?>' class="style1">Berkas Saya</a></li>
                <li><a href="#">Pengaturan Akun</a></li>
                <li><a href='<?php echo site_url('Login/logout')?>'>Logout</a></li>
                          <?php } ?>
              </ul>
          </div>
      </div>

  <div id="middle">
            <div id="left-column">
              <?php if(isset($kelengkapan)) {?>
                <h3>Kelengkapan</h3>
                <ul class="nav">
					<li><?php echo anchor('pelamar', 'Data Pribadi')?></li>
					<li><?php echo anchor('pelamar/addPendidikan', 'Riwayat Pendidikan')?></li>
					<li><?php echo anchor('pelamar/addPengalaman', 'Pengalaman Kerja')?></li>
					<li><?php echo anchor('pelamar/addKursus', 'Kursus / Pelatihan')?></li>
                </ul>
              <?php } ?>
            </div>

            <div id="center-column">
                <div class="top-bar">
                    <a href="#" class="button"> </a>
                    <h1><?php if(isset($title)) echo $title;?></h1>
                </div>
          <div class="select-bar">
<!--                    <label>-->
<!--                        <input type="text" name="textfield" />-->
<!--                    </label>-->
<!--                    <label>-->
<!--                        <input type="submit" name="Submit" value="Search" />-->
<!--                    </label>-->
                </div>
                <?php if($this->session->flashdata('error')) : ?>
        <div id="flashmessage" class="error">
        <img style="float: left; cursor: pointer" id="closemessage" width=15 height=15 src="<?php echo base_url();?>/assets/checklist_icon.gif" />
        <?php echo '&nbsp;'.$this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('warning')) : ?>
        <div id="flashmessage" class="error">
        <img style="float: left; cursor: pointer" id="closemessage" width=15 height=15 src="<?php echo base_url();?>/assets/checklist_icon.gif" />
        <?php echo '&nbsp;'.$this->session->flashdata('warning'); ?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('message')) : ?>
        <div id="flashmessage" class="message">
        <img style="float: left; cursor: pointer" id="closemessage" width=15 height=15 src="<?php echo base_url();?>/assets/checklist_icon.gif" />
        <?php echo '&nbsp;'.$this->session->flashdata('message'); ?>
    </div>
<?php endif; ?>
<?php if (isset($login_error)){?>
	<div id="flashmessage" class="error">
	<?php echo "Email atau Password Tidak Valid" ?>
	</div>
<?php }?>
				<div class="table">
<!--                  <table class="listing" cellpadding="0" cellspacing="0">-->
<!--                        <tr>-->
<!--                            <th>Header Here</th>-->
<!--                            <th>Header</th>-->
<!--                            <th>Head</th>-->
<!--                            <th>Header</th>-->
<!--                            <th>Header</th>-->
<!--                            -->
<!--                            <th>Head</th>-->
<!--                            <th>Header</th>-->
<!--                            <th>Head</th>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="style1">- Lorem Ipsum </td>-->
<!--                            <td><img src="/img/add-icon.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/edit-icon.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/login-icon.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="style2">- Lorem Ipsum </td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></td>-->
<!--                            <td><img src="img/login-icon.gif" width="16" height="16" alt="login" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="style3">- Lorem Ipsum </td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></td>-->
<!--                            <td><img src="img/login-icon.gif" width="16" height="16" alt="login" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="style1">- Lorem Ipsum </td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></td>-->
<!--                            <td><img src="img/login-icon.gif" width="16" height="16" alt="login" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="style2">- Lorem Ipsum </td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></td>-->
<!--                            <td><img src="img/login-icon.gif" width="16" height="16" alt="login" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="style3">- Lorem Ipsum </td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></td>-->
<!--                            <td><img src="img/login-icon.gif" width="16" height="16" alt="login" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="style4">- Lorem Ipsum </td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></td>-->
<!--                            <td><img src="img/login-icon.gif" width="16" height="16" alt="login" /></td>-->
<!--                            <td><img src="img/save-icon.gif" width="16" height="16" alt="save" /></td>-->
<!--                            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                    <div class="select">-->
<!--                        <strong>Other Pages: </strong>-->
<!--                        <select>-->
<!--                            <option>1</option>-->
<!--                        </select>-->
<!--                    </div>-->

				<?php $this->load->view($view);?>
<!--                </div>-->
<!--                <div class="table">-->
<!--                    <table class="listing form" cellpadding="0" cellspacing="0">-->
<!--                        <tr>-->
<!--                            <th class="full" colspan="2">Header Here</th>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td width="172"><strong>Lorem Ipsum</strong></td>-->
<!--                            <td><input type="text" class="text" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td><strong>Lorem Ipsum</strong></td>-->
<!--                            <td><input type="text" class="text" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td><strong>Lorem Ipsum</strong></td>-->
<!--                            <td><input type="text" class="text" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td><strong>Lorem Ipsum</strong></td>-->
<!--                            <td><input type="text" class="text" /></td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                </div>-->
            </div>
          </div>  
        </div>
        <div id="footer"><p>Copyright <span>&#169;</span> 2012 KoTA 201</p></div>
    </div>
    <script>
    $("#flashmessage").animate({top: "0px"}, 5000 ).show("slow").fadeIn(100).fadeOut(100);
    </script>    
</body>
</html>