<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
</head>
<body>

<?php echo form_open('Login')?>
    <?php echo validation_errors('<p style="color:red">', ''); ?>
    <?php if ($login_error):?><p style="color:red">Invalid Username or Password<?php endif; ?>
    <label>User</label>    
    <table width="238" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="88">E - Mail</td>
        <td width="136"><span style="color:red"><?php echo form_input('email')?></span></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><span style="color:red"><?php echo form_password('password')?></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="right"><span style="color:red">
          <input type="submit" value="Continue &rarr;" name='submits'>
        </span></div></td>
      </tr>
    </table>
    <p style="color:red">
    <?php echo anchor('forgot_password', 'Forgot password') ?> | 
    <?php echo anchor('register', 'Register Here')?>
    </form>    
    <p style="color:red">
      Page rendered in {elapsed_time} seconds
</body>
</html>