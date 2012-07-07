<?php 
echo form_open_multipart('admin/Test/importData');
	echo form_upload('userfile','Import');
	echo form_submit('submit', 'Import');
echo form_close();?>
  <table border="1">  
    <tr>  
      <th>Nama</th>  
      <th>Kelas</th>  
      <th>Nim</th>  
    </tr>
<?php $i = 0;  
          while($i < count($nama)):?>  
    <tr>  
      <td><?php echo $nama[$i];?></td>  
      <td><?php echo $nim[$i];?></td>  
      <td><?php echo $kelas[$i];?></td>
      <td><?php echo $kelas1[$i];?></td>  
      <td><?php echo $kelas2[$i];?></td>    
    </tr>  
        
    <?php $i++; endwhile;?>  
</table>