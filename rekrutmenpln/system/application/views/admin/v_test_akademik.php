<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/grocery_crud/themes/flexigrid/css/flexigrid.css" />
	    <div class="table">
                    <table class="listing form" cellpadding="0" cellspacing="0">
<?php 
echo "<tr>";
echo form_open_multipart('admin/Test/importPsikotest');
echo "<td>";
echo "Import Nilai Test Psikotest";
echo "</td>";
echo "<td>";
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo "</td>";
echo form_close();
echo "</tr>";?>
<?php 
echo "<tr>";
echo form_open_multipart('admin/Test/importTestAkademik');
echo "<td>";
echo "Import Nilai Test Akademik";
echo "</td>";
echo "<td>";
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo form_close();
echo "</tr>";
?>
<?php 
echo "<tr>"; 
echo form_open_multipart('admin/Test/importTestGat');
echo "<td>";
echo "Import Nilai Test GAT";
echo "</td>";
echo "<td>";
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo "</td>";
echo form_close();
echo "</tr>";?>
<?php 
echo "<tr>";
echo form_open_multipart('admin/Test/importTestWawancara');
echo "<td>";
echo "Import Nilai Test Wawancara";
echo "</td>";
echo "<td>";
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo "</td>";
echo form_close();
echo "</tr>";?>

<?php
echo "<tr>"; 
echo form_open_multipart('admin/Test/importTestKesehatan');
echo "<td>";
echo "Import Nilai Test Kesehatan";
echo "</td>";
echo "<td>";
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo "</td>";
echo form_close();
echo "</tr>";?>
</table>
</div>