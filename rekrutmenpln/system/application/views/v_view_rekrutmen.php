<html>
<head>
	<link  href="<?php echo base_url();?>/assets/template/css/admin.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/multiselect/js/jquery.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/multiselect/js/jquery.multiselect2side.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/datepicker/datetimepicker_css.js"></script>
	
	<title> Form Buka Rekrutmen</title>
</head>
<body>
<!-- Beginning header -->
    
<!-- End of header-->

<img src="<?php echo base_url();?>/assets/template/img/add-icon.gif" width="20" height="20" alt="save" value="Test"/> 
<?php echo anchor('admin/buka_rekrutmen/add', 'Buka Rekrutmen Baru');?>
<br> <br>
						
<table class="listing" cellpadding="0" cellspacing="0">
		<tr>
			<th>Nama Rekrutmen</th>
			<th>Lokasi</th>
			<th>Jenis Rekrutmen</th>
			<th>Pelaksana</th>
			<th>Tanggal Buka</th>
			<th>Tanggal Tutup</th>
			<th>Status Rekrutmen</th>
			<th>BidangDibuka</th>
			<th>Action</th>
		</tr>
	<?php
$i=0;
$temp = 0;

foreach($rekrutmen as $row){
	$idRekrutmen[$i] = $row->ID_REKRUTMEN;
	$temp2 = $row->ID_BID;
	if($i == 0){
		$temp = $row->ID_REKRUTMEN;
		$temp2 = $row->ID_BID;?>
	<tr><td >
		<?php 
		echo $row->NAMA_REKRUTMEN;
		?>
		</td>
		<td >
		<?php 
		echo $row->NAMA_LOKASI;
		?>
		</td>
		<td >
		<?php 
		echo $row->NAMA_JENIS_REKRUT;
		?>
		</td>
		<td >
		<?php 
		echo $row->NAMA_PELAKSANA;
		?>
		</td>
				<td >
		<?php 
		echo $row->TGL_BUKA;
		?>
		</td>
				<td >
		<?php 
		echo $row->TGL_TUTUP;
		?>
		</td>
		<td width="55"><?php
		if($row->STATUS_REKRUTMEN==1) 
		echo "buka";
		else
		echo "tutup";
		?></td>
		<td width="55"></td>
		<td width="55">
		<?php 
			echo anchor('admin/buka_rekrutmen/delete/'.$rekrutmen[$i]->ID_REKRUTMEN,'Delete|',array('onClick' => "return confirm('Apakah anda yakin untuk menghapus?')"));
				echo anchor('admin/buka_rekrutmen/edit/'.$rekrutmen[$i]->ID_REKRUTMEN,'Edit|');
				echo anchor('admin/bidang_dibuka/add/'.$rekrutmen[$i]->ID_REKRUTMEN,'Tambah Bidang|');
					if($rekrutmen[$i]->STATUS_REKRUTMEN==1){
					echo anchor('admin/buka_rekrutmen/close/'.$rekrutmen[$i]->ID_REKRUTMEN.'/0', 'Close',array('onClick' => "return confirm('Apakah anda yakin ingin menutup rekrutmen ini?')"));
					 }
					else
					echo anchor('admin/buka_rekrutmen/close/'.$rekrutmen[$i]->ID_REKRUTMEN.'/1', 'Publish',array('onClick' => "return confirm('Apakah anda yakin ingin buka rekrutmen ini?')"));
		?></td>
		
</tr>
	<?php }
	if($temp == $row->ID_REKRUTMEN){
		if(isset($temp2)){
		?>
		<tr>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"><?php echo $row->KODE_BID;?></td>
        <td width="343"><?php 
        echo anchor('admin/bidang_dibuka/detailBidang/'.$rekrutmen[$i]->ID_REKRUTMEN.'/'.$rekrutmen[$i]->ID_BID, 'Lihat|');
        if($rekrutmen[$i]->STATUS_REKRUTMEN==0)
        echo anchor('admin/bidang_dibuka/delete/'.$rekrutmen[$i]->ID_REKRUTMEN.'/'.$rekrutmen[$i]->ID_BID,'Delete|',array('onClick' => "return confirm('Apakah anda yakin untuk menghapus?')"));
        if($rekrutmen[$i]->STATUS_REKRUTMEN==0)
		echo anchor('admin/bidang_dibuka/edit/'.$rekrutmen[$i]->ID_REKRUTMEN.'/'.$rekrutmen[$i]->ID_BID,'Edit');
		?></td>
        </tr>
		<?php } 
	}else {
		$temp = $row->ID_REKRUTMEN;?>
		<tr><td >
		<?php 
		echo $row->NAMA_REKRUTMEN;
		?>
		</td>
		<td >
		<?php 
		echo $row->NAMA_LOKASI;
		?>
		</td>
		<td >
		<?php 
		echo $row->NAMA_JENIS_REKRUT;
		?>
		</td>
		<td >
		<?php 
		echo $row->NAMA_PELAKSANA;
		?>
		</td>
				<td >
		<?php 
		echo $row->TGL_BUKA;
		?>
		</td>
				<td >
		<?php 
		echo $row->TGL_TUTUP;
		?>
		</td>
		<td width="55"><?php
		if($row->STATUS_REKRUTMEN==1) 
		echo "buka";
		else
		echo "tutup";
		?></td>
		<td width="55"></td>
		<td width="55"><?php 
			echo anchor('admin/buka_rekrutmen/delete/'.$rekrutmen[$i]->ID_REKRUTMEN,'Delete|',array('onClick' => "return confirm('Apakah anda yakin untuk menghapus?')"));
				echo anchor('admin/buka_rekrutmen/edit/'.$rekrutmen[$i]->ID_REKRUTMEN,'Edit|');
				echo anchor('admin/bidang_dibuka/add/'.$rekrutmen[$i]->ID_REKRUTMEN,'Tambah Bidang|');
					if($rekrutmen[$i]->STATUS_REKRUTMEN==1){
					echo anchor('admin/buka_rekrutmen/close/'.$rekrutmen[$i]->ID_REKRUTMEN.'/0', 'Close',array('onClick' => "return confirm('Apakah anda yakin ingin menutup rekrutmen ini?')"));
					 }
					else
					echo anchor('admin/buka_rekrutmen/close/'.$rekrutmen[$i]->ID_REKRUTMEN.'/1', 'Publish',array('onClick' => "return confirm('Apakah anda yakin ingin buka rekrutmen ini?')"));
		?></td>
		</tr><?php 
		if($temp == $row->ID_REKRUTMEN && isset($temp2)){
		?>
		<tr>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"></td>
		<td width="55"><?php echo $row->KODE_BID;?></td>
        <td width="343"><?php 
        echo anchor('admin/bidang_dibuka/detailBidang/'.$rekrutmen[$i]->ID_REKRUTMEN.'/'.$rekrutmen[$i]->ID_BID, 'Lihat|');
        if($rekrutmen[$i]->STATUS_REKRUTMEN==0)
        echo anchor('admin/bidang_dibuka/delete/'.$rekrutmen[$i]->ID_REKRUTMEN.'/'.$rekrutmen[$i]->ID_BID,'Delete|',array('onClick' => "return confirm('Apakah anda yakin untuk menghapus?')"));
        if($rekrutmen[$i]->STATUS_REKRUTMEN==0)
		echo anchor('admin/bidang_dibuka/edit/'.$rekrutmen[$i]->ID_REKRUTMEN.'/'.$rekrutmen[$i]->ID_BID,'Edit');
		?></td>
        </tr>
		
	<?php }}
	$i++;
}
?>
</table>
	
	
<?php echo form_close(); ?>
</body>
</html>	