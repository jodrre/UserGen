<?php
require_once '../includes/conf.php';
require_once '../includes/header.php';

IF (isset($_POST['btnUpdate'])) {
	$sqlUpdate = 'UPDATE job_titles SET job_title_name="'.$_POST['jobUpdateName'].'" WHERE job_title_ID='.$_POST['jid'].';';
	mysqli_query($mysqli, $sqlUpdate);
}

IF (isset($_POST['btnNew'])) {
	$newJob_dept = $_POST['dropDept'];
	$newJob_title = $_POST['txtNewJob'];
	$sqlUpdate = 'INSERT INTO job_titles (job_title_name, job_dept) VALUES ("'.$_POST['txtNewJob'].'",'.$newJob_dept.');';
	mysqli_query($mysqli, $sqlUpdate);
}

$sql_deptname = 'SELECT * FROM departments WHERE department_id='.$_POST['dropDept'].';';
$outp_deptname = mysqli_query($mysqli, $sql_deptname);
$deptname = mysqli_fetch_array($outp_deptname);
$deptname = $deptname['department_name'];
$getJobsInDept = 'SELECT * FROM job_titles WHERE job_dept='.$_POST['dropDept'].';';
$result = mysqli_query($mysqli,$getJobsInDept);
$jobDept = $_POST['dropDept'];


?>
<h1>Updating job titles for <?php echo $deptname; ?></h1>

<table border=1>
<tr><th>Job</th><th>Actions</th></tr>
<?php while($row = mysqli_fetch_array($result)) {
	$jname = $row['job_title_name'];
	$jid = $row['job_title_ID'];
	print("<tr><td>".$jname."</td><td><a href=back_jobs_edit.php?id=".$jid.">Edit</a></td></tr>");
} ?>
</table>
<P><P>
<h2>Add new job:</h2><p>
<form method=POST action=#>
<input type="hidden" name='dropDept' value=<?php echo $_POST['dropDept'];?>>
New Job Title: <input type=text name='txtNewJob'>
<input type="submit" name='btnNew'>
</form>
<P><P>
<a href=back.php><button>Go Back</button></a>
<?php 
require_once '../includes/footer.php';
?>