<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="<?php echo base_url();?>/assets/template/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
        <div id="header">
            <a href="#"  class="logo"><img src="<?php echo base_url();?>/assets/template/img/Logo Pln.jpg" align="Left" width="70" height="70" alt="" /></a>
            <ul id="top-navigation">
                <li><a href='<?php echo site_url('admin/buka_rekrutmen/')?>' >Buka Rekrutmen</a></li>
                <li><a href='<?php echo site_url('admin/peserta_test')?>'>Generate Peserta Test</a></li>
                <li><a href='<?php echo site_url('admin/Test')?>'>Import Nilai Test</a></li>
                <li><a href='<?php echo site_url('admin/generate_report')?>'>Generate Report</a></li>
                <li><a href="#">Filter Pelamar</a></li>
                <li><a href='<?php echo site_url('admin/user/crud')?>'>Administrator</a></li>
                <li><a href="#">Keluar</a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Data Master</h3>
                <ul class="nav">
                    <li><a href='<?php echo site_url('admin/tingkat_pendidikan/crud')?>'>Tingkat Pendidikan</a></li>
                    <li><a href='<?php echo site_url('admin/perguruan_tinggi/crud')?>'>Perguruan Tinggi</a></li>
                    <li><a href='<?php echo site_url('admin/program_studi/crud')?>'>Program Studi</a></li>
                    <li><a href='<?php echo site_url('admin/template_rekrutmen/crud')?>'>Template Rekrutmen</a></li>
                    <li><a href='<?php echo site_url('admin/jabatan/crud')?>'>Jabatan</a></li>
                    <li><a href='<?php echo site_url('admin/lokasi/crud')?>'>Lokasi</a></li>
                    <li><a href='<?php echo site_url('admin/agama/crud')?>'>Agama</a></li>
                	<li><a href='<?php echo site_url('admin/pelaksana/crud')?>'>Pelaksana</a></li>
                    <li><a href='<?php echo site_url('admin/jenis_studi/crud')?>'>Jenis Studi</a></li>
                    <li><a href='<?php echo site_url('admin/kota_kabupaten/crud')?>'>Kota Kabupaten</a></li>
                    <li><a href='<?php echo site_url('admin/passing_grade/crud')?>'>Passing Grade</a></li>
                    <li><a href='<?php echo site_url('admin/provinsi/crud')?>'>Provinsi</a></li>
                    <li><a href='<?php echo site_url('admin/jenis_rekrutmen/crud')?>'>Jenis rekrutmen</a></li>
                    <li><a href='<?php echo site_url('admin/status_pernikahan/crud')?>'>Status Pernikahan</a></li>
                </ul>
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
                <?php if(isset($tingkat)){
                		$this->load->view($tampil,$tingkat,$rekrutmen,$count);
                   	} 
                	 else if(isset($output))
                	  $this->load->view($view,$output);
                	  else if(isset($count_gat))
                	  $this->load->view($view,$title,$rekrutmen,$count_akademik,$count_psikotes,$count_kesehatan,$count_gat,$count_wawancara);
                	  else
                	  $this->load->view($tampil,$title);?>
                </div>
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
        <div id="footer"><p>Developed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010.</p></div>
    </div>
</body>
</html>