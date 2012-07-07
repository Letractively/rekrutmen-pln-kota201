<div class="isidata">
<table>
  <tr>
    <td width="56" ><div align="center">No</div></td>
    <td width="387" ><div align="center">Nama Kursus</div></td>
    <td width="352" ><div align="center">Nama Instansi</div></td>
    <td ><div align="center">Tahun Sertifikat</div></td>
    <td ><div align="center">Action</div></td>        
  </tr>
<?php  
$i=1;
foreach($kursus->result() as $row){ 
if(isset($row->ID_KURSUS)){
?>
  <tr>
    <td><div align="center"><?php echo $i ?></div></td>
    <td><div align="left"><?php echo $row->NAMAPENDIDIKANINFORMAL; ?></div></td>
    <td><div align="left"><?php echo $row->NAMA_INSTANSI; ?></div></td>
    <td width="118"><div align="center"><?php echo $row->TAHUN_SERTIFIKAT;?></div></td>    
    <td width="128"><div align="center"><?php echo anchor('','view') ;?> | <?php echo anchor('pelamar/editKursus/'.$row->ID_KURSUS,'edit'); ?> | <?php echo anchor('pelamar/deleteKursus/'.$row->ID_KURSUS,'delete',array('onClick' => "return confirm('Are you sure you want to delete?')")); ?></div></td>    
  </tr>
  <?php
  $i++;
  }
 } ?>
</table>
<?php echo anchor ('pelamar/inputKursus', '[+]Tambah Kursus');?>
  <div align="right">
  <?php echo anchor ('pelamar', '<< Sebelumnya');?> |   <?php echo anchor ('pelamar', "Berikutnya >>");?>
  </div>
</div>