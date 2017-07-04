<?php
require_once '../includes/conf.php';
require_once '../includes/header.php';

$uid = $_GET['user'];
$aid = $_GET['app'];

$UserNameSQL = "SELECT CONCAT(user_FName,' ',user_LName), user_dept, user_text_title FROM users WHERE user_id = ".$uid.";";
$GetUserName = mysqli_query($mysqli,$UserNameSQL);
$GetUserName = mysqli_fetch_array($GetUserName);
$UserDept = $GetUserName['user_dept'];
$GetDepartmentSQL = "SELECT department_name FROM departments WHERE department_id = ".$UserDept.";";
$GetDepartment = mysqli_query($mysqli,$GetDepartmentSQL);
$GetDepartment = mysqli_fetch_array($GetDepartment);

echo "<b>Name:</b> ".$GetUserName[0]."<br />";
echo "<b>Department:</b> ".$GetDepartment[0]."<br />";
echo "<b>Job Title:</b> ".$GetUserName['user_text_title']."<p />";

?>
<form method=POST action='user_build.php?id=<? echo $uid?>'>
<input type="hidden" id="uid" value=<?php echo $uid?>>
<input type="hidden" id="aid" value=<?php echo $aid?>>
<table>
<tr><td align="right">Username:</td><td><input type="text" id="txtUser"></td></tr>
<tr><td align="right">Master account (if needed):</td><td><input type="text" id="txtMaster"></td></tr>
<tr><td align="right">Temporary password:</td><td><input type="text" id="txtPass"></td></tr>
</table>
<input type="hidden" name="SetNewLogin" value="1">
<input type="submit" id="btnNewLogin" name="btnNewLogin">
</form>
<a onClick="history.go(-1)"><input type="button" value="Cancel"></a>
