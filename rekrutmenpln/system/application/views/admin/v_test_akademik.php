<?php 
echo form_open_multipart('admin/Test/importTestAkademik');
echo "Import Test Akademik ;";
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo form_close();?>
<?php 
echo form_open_multipart('admin/Test/importPsikotest');
echo "Import Psikotest ;";
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo form_close();?>

<?php 
echo form_open_multipart('admin/Test/importTestWawancara');
echo "Import Wawancara ;";
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo form_close();?>

<?php 
echo form_open_multipart('admin/Test/importTestGat');
echo "Import GAT ;";
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo form_close();?>

<?php echo $query;?>