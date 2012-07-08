<?php 
echo form_open_multipart('admin/Test/importTestAkademik');
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo form_close();?>

<?php echo $query;?>