<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<table width=100% height="70" border="1" cellpadding="2" cellspacing="2" bordercolor="#000000">
  <tr>
    <td width="56" ><div align="center">No</div></td>
    <td width="387" ><div align="center">Nama Kursus</div></td>
    <td width="352" ><div align="center">Nama Instansi</div></td>
    <td ><div align="center">Tahun Sertifikat</div></td>
    <td ><div align="center">Action</div></td>        
  </tr>
<?php  
$i=1;
foreach($kursus->result() as $row){ ?>
<!--<?php $id[$i] = $row->ID_KURSUS; ?>-->
  <tr>
    <td><div align="center"><?php echo $i ?></div></td>
    <td><div align="left"><?php echo $row->NAMAPENDIDIKANINFORMAL; ?></div></td>
    <td><div align="left"><?php echo $row->NAMA_INSTANSI; ?></div></td>
    <td width="118"><div align="center"><?php echo $row->TAHUN_SERTIFIKAT;?></div></td>    
    <td width="128"><div align="center"><?php echo anchor('','view') ;?> | <?php echo anchor('pelamar/editKursus/'.$row->ID_KURSUS,'edit'); ?> | <?php echo anchor('pelamar/deleteKursus/'.$row->ID_KURSUS,'delete'); ?></div></td>    
  </tr>
  <?php
  $i++;
 } ?>
</table>
<?php echo anchor ('pelamar/inputKursus', '[+]Tambah Kursus');?>
  <div align="right">
  <?php echo anchor ('pelamar', '<< Sebelumnya');?> |   <?php echo anchor ('pelamar', "Berikutnya >>");?>
  </div>
</body>
</html>
