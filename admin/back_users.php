<?php
require_once '../includes/conf.php';
require_once '../includes/header_back.php';

IF (isset($_POST['updateUser'])) {
	$sqlUpdate = "UPDATE users SET 
			user_LName = '".$_POST['user_LName']."', 
			user_FName = '".$_POST['user_FName']."', 
			user_dept = '".$_POST['user_dept']."', 
			user_text_title = '".$_POST['user_text_title']."',  
			user_extension = '".$_POST['user_extension']."', 
			user_badge = '".$_POST['user_badge']."' 
			WHERE user_ID=".$_POST['uid'].";";
	mysqli_query($mysqli, $sqlUpdate);
}

// Make sure we query for users AFTER updates/deletions so the data is correct
$getUsers_SQL = "SELECT * FROM users ORDER BY user_dept, user_LName;";
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
	<td><a href=user_edit.php?id=".$uid.">Edit</a></td>
  </tr>"; }?>
</table> 
<a href=back.php><button>Go Back</button></a>