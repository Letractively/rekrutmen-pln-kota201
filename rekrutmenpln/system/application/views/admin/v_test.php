<html>
<head>

</head>
<body>
<!-- Beginning header -->
    
<!-- End of header-->
				

<table class="listing" cellpadding="0" cellspacing="0">
			<tr align="center">
					<th rowspan="2" width="300px">Nama Rerkutmen</th>
					<th rowspan="2" width="150px">Lokasi</th>
					<th rowspan="2" width="100px">Pelaksana</th>
					<th rowspan="2" width="100px">Jenis rekrutmen</th>
					<th rowspan="2" width="200px">Tanggal Buka</th>
					<th rowspan="2" width="200px">Tanggal Tutup</th>
					<th colspan="5" width="100px">Tahapan Seleksi</th>
				</tr>
				<tr align="center">
					<th colspan="1">Psikotest</th>
					<th colspan="1">Akademik</th>
					<th colspan="1">Gat</th>
					<th colspan="1">Kesehatan</th>
					<th colspan="1">Wawancara</th>
				</tr>	
		<?php
			if(isset($rekrutmen)){
			$i=0;
			foreach($rekrutmen as $rows){
				echo "<tr>";
				echo "<td>";
				echo $rows->NAMA_REKRUTMEN;
				echo "</td>";
				echo "<td>";
				echo $rows->NAMA_LOKASI;
				echo "</td>";
				echo "<td>";
				echo $rows->NAMA_PELAKSANA;
				echo "</td>";
				echo "<td>";
				echo $rows->NAMA_JENIS_REKRUT;
				echo "</td>";
				echo "<td>";
				echo $rows->TGL_BUKA;
				echo "</td>";
				echo "<td>";
				echo $rows->TGL_TUTUP;
				echo "</td>";
				echo "<td align='center'>";
					if($count_psikotes[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
						echo anchor('admin/peserta_test/template_psikotes/'.$rows->ID_REKRUTMEN, 'Generate');
					echo "</td>";
				echo "<td align='center'>";
					if($count_akademik[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
					echo anchor('admin/peserta_test/template_testakademik/'.$rows->ID_REKRUTMEN, 'Generate');
				echo "</td>";
				echo "<td align='center'>";
					if($count_gat[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
					echo anchor('admin/peserta_test/template_testgat/'.$rows->ID_REKRUTMEN, 'Generate');
				echo "</td>";
				echo "<td align='center'>";
					if($count_kesehatan[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
				echo anchor('admin/peserta_test/template_testkesehatan/'.$rows->ID_REKRUTMEN, 'Generate');
					echo "</td>";
				echo "<td align='center'>";
					if($count_wawancara[$i]!=0)
				echo "<img src=".base_url()."assets/checklist_icon.gif width=30 height=30 align='center'>";
					else
					echo anchor('admin/peserta_test/template_wawancara/'.$rows->ID_REKRUTMEN, 'Generate');
				echo "</td>";
				echo "</tr>";
				$i++;	
			}
			}
		?>
</table>
	Catatan : <img src="<?php echo base_url();?>assets/checklist_icon.gif" width=30 height=30 align='center'></img> Sudah dilakukan Tahapan Seleksi
<?php echo form_close(); ?>
</body>
</html>	