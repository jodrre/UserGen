<?php
require_once '../includes/conf.php';
require_once '../includes/header.php';
$uid = $_GET['id'];

$getJobSQL = 'SELECT * FROM users WHERE user_ID='.$uid.';';
$outp = mysqli_query($mysqli, $getJobSQL);
$outp = mysqli_fetch_array($outp);

?>
<h2>Edit User</h2><br />
Use this page to edit details about the user.<p />

<form method=POST action='back_users.php'>
<input type='hidden' name='uid' value="<?php echo $uid; ?>">
<table>
<tr><td align=right>Last Name:</td><td><input type='text' name='user_LName' value="<?php echo $outp['user_LName'];?>"></td></tr>
<tr><td align=right>First Name:</td><td><input type='text' name='user_FName' value="<?php echo $outp['user_FName'];?>"></td></tr>
<tr><td align=right>Department:</td><td><input type='text' name='user_dept' value="<?php echo $outp['user_dept'];?>"></td></tr>
<tr><td align=right>Job Title:</td><td><input type='text' name='user_text_title' value="<?php echo $outp['user_text_title'];?>"></td></tr>
<tr><td align=right>Extension:</td><td><input type='text' name='user_extension' value="<?php echo $outp['user_extension'];?>"></td></tr>
<tr><td align=right>Badge:</td><td><input type='text' name='user_badge' value="<?php echo $outp['user_badge'];?>"></td></tr>
</table>
<input type="submit" value='Update' name='btnUpdate'>
<input type="hidden" value=1 name='updateUser'>
</form>