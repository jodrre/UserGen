<?php
require_once '../includes/conf.php';
require_once '../includes/header.php';

// This isn't letting me add a new department from this page.
// Need to fix this.

IF (isset($_POST['btnNew'])) {
	$newDeptNum = $_POST['txtDeptNum'];
	$newDeptName = $_POST['txtDeptName'];
	$sqlUpdate = 'INSERT INTO departments VALUES ('.$newDeptNum.',."'.$newDeptName.'");';
	mysqli_query($mysqli, $sqlUpdate);
}


$SQL_alldepts = "SELECT * FROM departments ORDER BY department_id;";
$outp_alldepts = mysqli_query($mysqli,$SQL_alldepts);

?>
<table border='1'>
  <tr>
    <th>Number</th>
    <th>Department Name</th>
    <th>Actions</th>
  </tr>
  <?php while($row = mysqli_fetch_array($outp_alldepts)) {
  	$did = $row['department_id'];
  	$dname = $row['department_name'];
  echo "<tr>
    <td align=center>".$did."</td>
    <td>".$dname."</td>
	<td><a href=back_dept_edit.php?id=".$did.">Edit</a></td>
  </tr>"; }?>
</table> 
<h2>Add new department:</h2>
<form method=POST action=#>
Department Name: <input type=text name='txtDeptName'><br />
Department Number: <input type=text name='txtDeptNum'>Use MAS90 number (refer to Accounting)<br />
<input type="submit" name='btnNew'>
</form>
<P><P>
<a href=back.php><button>Go Back</button></a>
<?php 
require_once '../includes/footer.php';
?>