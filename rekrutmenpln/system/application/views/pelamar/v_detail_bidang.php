<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php 
if(isset($pesan)){
	echo $pesan;
}
echo form_open('lowongan/daftarkanpelamar/'.$idRekrutmen.'/'.$idBid);?>
<?php 
$i = 1;
foreach ($detail->result() as $row){
?>
<?php if($i == 1){
?>

<p>Kode Bidang : <?php echo $row->KODE_BID?></p>
<p>Nama Bidang : <?php echo $row->NAMA_BID?></p>
<p>Deskripsi :<?php echo $row->DESKRIPSI?></p>
<p>&nbsp;</p>
<p>Jenis Studi : <?php echo $row->NAMA_JS;?></p>
<p>Tingkat Pendidikan : <?php echo $row->NAMA_TINGKAT;?></p>
<p>Min IPK : <?php echo $row->MIN_IPK;?></p>
<p>Max usia : <?php echo $row->USIA_PELAMAR_MAX.' tahun';?></p>
<p>&nbsp;</p>
<p>Program Studi :</p>
<input type="hidden" name="usia" id="usia" value="<?php echo $row->USIA_PELAMAR_MAX;?>" />
<input type="hidden" name="tingkat" id="tingkat" value="<?php echo $row->ID_TINGKAT;?>" />
<input type="hidden" name="ipk" id="ipk" value="<?php echo $row->MIN_IPK;?>" />
<ul>

    <?php }?> 
    <li>  <?php echo $row->NAMA_PS;?>  </li>
    <?php 
$i++;}?>
</ul>
<?php echo form_submit('submit', "Melamar")?>
</body>
</html>
