<?php
require_once '../includes/conf.php';
require_once '../includes/header.php';
$jid = $_GET['id'];
$getJobSQL = 'SELECT * FROM job_titles WHERE job_title_ID='.$jid.';';
$outp = mysqli_query($mysqli, $getJobSQL);
$outp = mysqli_fetch_array($outp);

?>

<form method=POST action='back_jobs.php'>
<input type=hidden name='jid' value="<?php echo $jid; ?>">
<input type=hidden name='dropDept' value="<?php echo $outp[2];?>">
<input type='text' name='jobUpdateName' value='<?php echo $outp[1];?>'>
<input type="submit" value='Update' name='btnUpdate'>
</form>
<a href=back.php><button>Go Back</button></a>
<?php 
require_once '../includes/footer.php';
?>