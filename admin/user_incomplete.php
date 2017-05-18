<?php
require_once '../includes/conf.php';
require_once '../includes/header.php';
$uid = $_GET['id'];

$getUsers_SQL = "SELECT * FROM users WHERE user_setupcomplete=0 ORDER BY user_dept, user_LName;";
$getUsers = $mysqli->query($getUsers_SQL);
?>


<table border='1'>
<tr>
<th>Name</th>
<th>Department</th>
<th>Job Title</th>
<th>Extension</th>
<th>Actions</th>
</tr>
<?php while($row = mysqli_fetch_array($getUsers)) {
	$uname = $row['user_LName'].", ".$row['user_FName'];
	$uid = $row['user_id'];
	
	echo "<tr>
    <td>".$uname."</td>
    <td>".$row['user_dept']."</td>
	<td>".$row['user_text_title']."</td>
	<td>".$row['user_extension']."</td>	
	<td><a href=user_build.php?id=".$uid.">Create Accounts</a></td>
  </tr>"; }?>
</table> 