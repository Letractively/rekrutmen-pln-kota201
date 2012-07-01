<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<p>Riwayat Pendidikan Formal Perguruan Tinggi</p>
<table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td width="4%"><div align="center">No</div></td>
    <td width="13%"><div align="center">Tingkat Pendidikan</div></td>
    <td width="22%"><div align="center">Perguruan Tinggi</div></td>
    <td width="22%"><div align="center">Program Studi</div></td>
    <td width="9%"><div align="center">IPK</div></td>
    <td width="9%"><div align="center">Tahun Masuk</div></td>
    <td width="8%"><div align="center">Tahun Lulus</div></td>
    <td width="13%"><div align="center">Action</div></td>
  </tr>
<?php  
$i=1;
foreach($pendPT->result() as $row){ 
if(isset($row->ID_PENDIDIKAN_PT)){
?>
  <tr>
    <td><div align="center"><?php echo $i ?></div></td>
    <td><div align="center"><?php echo $row->NAMA_TINGKAT; ?></div></td>
    <td><?php echo $row->NAMA_PT; ?></td>
    <td><?php echo $row->NAMA_PS; ?></td>
    <td><div align="center"><?php echo $row->IPK; ?></div></td>
    <td><div align="center"><?php echo $row->TAHUN_MASUK; ?></div></td>
    <td><div align="center"><?php echo $row->TAHUN_LULUS; ?></div></td>
    <td><div align="center"><?php echo anchor('','view') ;?> | <?php echo anchor('pelamar/editPendidikanPT/'.$row->ID_PENDIDIKAN_PT,'edit'); ?> | <?php echo anchor('pelamar/deletePendidikanPT/'.$row->ID_PENDIDIKAN_PT,'delete'); ?>
        </div>
    </div></td>
  </tr>
  <?php
  $i++;
  }
 }
  ?>
</table>
<?php echo anchor ('pelamar/inputPendidikanPT', '[+]Tambah Pendidikan PT');?>
<p>&nbsp;</p>
<p>Riwayat Pendidikan Formal Non Perguruan Tinggi</p>
<table width="100%" border="1" cellspacing="2" cellpadding="2">
    <tr>
      <td width="4%"><div align="center">No</div></td>
      <td width="15%"><div align="center">Tingkat Pendidikan</div></td>
      <td width="36%"><div align="center">Nama Instansi/Sekolah</div></td>
      <td width="15%"><div align="center">Tahun Masuk</div></td>
      <td width="13%"><div align="center">Tahun Lulus</div></td>
      <td width="17%"><div align="center">Action</div></td>
    </tr>
<?php  
$i=1;
foreach($pendNonPT->result() as $row){ 
if(isset($row->ID_PENDIDIKAN)){
?>
    <tr>
      <td><div align="center"><?php echo $i ?></div></td>
      <td><div align="center"><?php echo $row->NAMA_TINGKAT; ?></div></td>
      <td><?php echo $row->NAMA_INSTITUSI; ?></td>
      <td><div align="center"><?php echo $row->TAHUN_MASUK; ?></div></td>
      <td><div align="center"><?php echo $row->TAHUN_LULUS; ?></div></td>
      <td><div align="center"><?php echo anchor('','view') ;?> | <?php echo anchor('pelamar','edit'); ?> | <?php echo anchor('pelamar','delete'); ?>
        </div>
      </div></td>
    </tr>
  <?php
  $i++;
  }
 }
  ?>
  </table>
  <p><?php echo anchor ('pelamar/inputPendidikanNonPT', '[+]Tambah Pendidikan Non PT');?>  </p>
  <p>&nbsp;</p>
  <div align="right">
  <?php echo anchor ('pelamar', '<< Sebelumnya');?> |   <?php echo anchor ('pelamar', "Berikutnya >>");?>
  </div>
  <p>&nbsp;</p>
</body>
</html>
