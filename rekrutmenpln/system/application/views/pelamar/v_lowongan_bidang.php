<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<table width="469" height="119">
<?php 

$i=0;
$temp = 0;
foreach($lowongan->result() as $row){
	$idRekrutmen[$i] = $row->ID_REKRUTMEN;
	if($i == 0){
		$temp = $row->ID_REKRUTMEN;?>
<tr><td colspan="4">
		<?php 
		echo $row->NAMA_REKRUTMEN.' '.$row->NAMA_LOKASI.' '.$row->TGL_BUKA.' - '.$row->TGL_TUTUP;
		?>
		</td>
</tr>
	<?php }
	if($temp == $row->ID_REKRUTMEN){
		?>
		<tr>
		<td width="55"></td>
		<td width="55"><?php echo $row->KODE_BID;?></td>
		<td width="343"><?php echo $row->NAMA_BID;?></td>
        <td width="343"><?php echo anchor('lowongan/detailBidang/'.$row->ID_REKRUTMEN.'/'.$row->ID_BID, 'Lihat');?></td>
		</tr>
		<?php 
	} else {
		$temp = $row->ID_REKRUTMEN;?>
				<tr><td colspan="4">
		<?php 
		echo $row->NAMA_REKRUTMEN.' '.$row->NAMA_LOKASI.' '.$row->TGL_BUKA.' - '.$row->TGL_TUTUP;
		?>
		</td></tr>
		<tr>
		<td width="55"></td>
		<td width="55"><?php echo $row->KODE_BID;?></td>
		<td width="343"><?php echo $row->NAMA_BID;?></td>
        <td width="343"><?php echo anchor('lowongan/detailBidang/'.$row->ID_REKRUTMEN.'/'.$row->ID_BID, 'Lihat');?></td>
		</tr>
		
<?php 	}
	$i++;
}
?>
</table>
</body>
</html>
