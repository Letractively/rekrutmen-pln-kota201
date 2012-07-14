<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<table class="listing" cellpadding="0" cellspacing="0">
<?php 
if(isset($lowongan)){
$i=0;
$temp = 0;
foreach($lowongan->result() as $row){
	$idRekrutmen[$i] = $row->ID_REKRUTMEN;
	if($i == 0){
		$temp = $row->ID_REKRUTMEN;?>
<th colspan="4">
		<?php 
		echo $row->NAMA_REKRUTMEN.' '.$row->NAMA_LOKASI.' '.$row->TGL_BUKA.' - '.$row->TGL_TUTUP;
		?>
</th>
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
				<th colspan="4">
		<?php 
		echo $row->NAMA_REKRUTMEN.' '.$row->NAMA_LOKASI.' '.$row->TGL_BUKA.' - '.$row->TGL_TUTUP;
		?>
		</th>
		<tr>
		<td width="55"></td>
		<td width="55"><?php echo $row->KODE_BID;?></td>
		<td width="343"><?php echo $row->NAMA_BID;?></td>
        <td width="343"><?php echo anchor('lowongan/detailBidang/'.$row->ID_REKRUTMEN.'/'.$row->ID_BID, 'Lihat');?></td>
		</tr>
		
<?php 	}
	$i++;
}
} else {
	echo "Tidak Ada Lowongan Dibuka";
}
?>
</table>
</body>
</html>
