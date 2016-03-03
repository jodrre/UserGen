<?php
class SelectList
{
	protected $conn;

	public function __construct()
	{
		$this->DbConnect();
	}

	protected function DbConnect()
	{
		include "includes/conf.php";
		$this->conn = $mysqli OR die("Unable to connect to the database");
		//mysqli_select_db($db,$this->conn) OR die("can not select the database $db");
		return TRUE;
	}

	public function ShowDepartment()
	{
		$sql = "SELECT * FROM departments";
		$res = mysqli_query($sql,$this->conn);
		$category = '<option value="0">choose...</option>';
		while($row = mysqli_fetch_array($res))
		{
			$category .= '<option value="' . $row[0] . '">' . $row[1] . '</option>';
		}
		return $category;
	}

	public function ShowTitle()
	{
		$sql = "SELECT * FROM job_titles WHERE job_dept=$_POST[id]";
		$res = mysqli_query($sql,$this->conn);
		$type = '<option value="0">choose...</option>';
		while($row = mysqli_fetch_array($res))
		{
			$type .= '<option value="' . $row['0'] . '">' . $row['1'] . '</option>';
		}
		return $type;
	}
}

$opt = new SelectList();
?>