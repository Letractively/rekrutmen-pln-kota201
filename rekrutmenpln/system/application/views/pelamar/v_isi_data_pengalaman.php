<table class="isidata">
  <tr>
    <td width="5%"><div align="center">No</div></td>
    <td width="18%"><div align="center">Nama Perusahaan</div></td>
    <td width="16%"><div align="center">Jabatan</div></td>
    <td width="10%"><div align="center">Tanggal Masuk</div></td>
    <td width="11%"><div align="center">Tanggal Keluar</div></td>
    <td width="15%"><div align="center">Website Perusahaan</div></td>
    <td width="12%"><div align="center">Penghasilan</div></td>
    <td width="13%"><div align="center">Action</div></td>
  </tr>
<?php  
$i=1;
foreach($pengalaman->result() as $row){ ?>
<?php if (isset($row->ID_KERJA)){?>
  <tr>
    <td><div align="center"><?php echo $i ?></div></td>
    <td><div align="left"><?php echo $row->NAMA_PERUSAHAAN; ?></div></td>
    <td><div align="left"><?php echo $row->JABATAN; ?></div></td>
    <td width="118"><div align="center"><?php echo $row->TGL_MASUK; ?></div></td>    
    <td width="118"><div align="center"><?php echo $row->TGL_KELUAR; ?></div></td>    
	<td width="118"><div align="center"><?php echo $row->WEBSITE_PERUSAHAAN?></div></td>    
    <td width="118"><div align="center"><?php echo $row->PENGHASILAN?></div></td>    
    <td width="128"><div align="center"><?php echo anchor('','view') ;?> | <?php echo anchor('pelamar/editPengalaman/'.$row->ID_KERJA,'edit'); ?> | <?php echo anchor('pelamar/deletePengalaman/'.$row->ID_KERJA,'delete'); ?></div></td>    
  </tr>
  <?php
  $i++;
  }
 }?>
</table>
<?php echo anchor ('pelamar/inputPengalaman', '[+]Tambah Pengalaman Kerja');?>
  <div align="right">
  <?php echo anchor ('pelamar', '<< Sebelumnya');?> |   <?php echo anchor ('pelamar', "Berikutnya >>");?>
  </div>
