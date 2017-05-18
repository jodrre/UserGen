<?php
require_once '../includes/conf.php';
require_once '../includes/header.php';
$sql = 'SELECT * FROM departments;';
$outp = mysqli_query($mysqli, $sql);

?>


<P>Update Departments - <a href=back_dept.php><button>GO</button></a>
<P>Update Job Titles for:
<form method=POST action='back_jobs.php'><select name="dropDept" required><option selected value="">--Choose a department--</option>
<?php while($row = mysqli_fetch_array($outp)) {
	echo "		<option value=".$row[0].">".$row[0]." - ".$row[1]."</option>
		";
} ?>
	</select> - <input type=submit value="GO"></form>
<p />
<b>User Management</b><br />
<a href='back_users.php'>Show all users</a><br />
<a href='user_incomplete.php'>Users to complete</a>

<?php 
require_once '../includes/footer.php';
?>