<?php 
error_reporting(2);
class DB_function
{	

	function __construct()
	{
	  include_once 'config.php';
	}
	
	//Insert client records into database
	function save_data($db_table, $field_data_hash) {

		$qs = "INSERT INTO $db_table (%fields%) VALUES (%values%)";
		$fields_string = "";
		$values_string = "";
	
		foreach ($field_data_hash as $field => $data) {
			if ($fields_string == "") {
				$fields_string = $field;
				$values_string = "'$data'";
			}
			else {
				$fields_string .= ", $field";
				$values_string .= ", '" . $data . "'";
			}
		}
	
		$qs = str_replace("%fields%", $fields_string, $qs);
		$qs = str_replace("%values%", $values_string, $qs);
		
		$res=mysqli_query($GLOBALS['connn'], $qs) or die(mysqli_error($GLOBALS['connn']));
		$id = mysqli_insert_id($GLOBALS['connn']);
		if($id != '')
		{
			return $id;
		} else {
			return false;
		}
		
	}

	function upate_image($db_table, $columnName, $field_data_hash, $where, $value) {

		$qs = "UPDATE $db_table SET $columnName =  '$field_data_hash' WHERE $where = $value ";		
		$res=mysqli_query($GLOBALS['connn'], $qs) or die(mysqli_error($GLOBALS['connn']));
		return true;
		
	}

	function upate_data($db_table, $columnName, $field_data_hash, $where, $value) {

		$qs = "UPDATE $db_table SET $columnName =  '$field_data_hash' WHERE $where = $value ";
		$res=mysqli_query($GLOBALS['connn'], $qs) or die(mysqli_error($GLOBALS['connn']));
		return true;
		
	}

	public function select($table, $where = null, $value = null)
	{
		$res=mysqli_query($GLOBALS['connn'], "SELECT * FROM $table");
		if (mysqli_num_rows($res) > 0) {
			$row = mysqli_fetch_assoc($res);
			return $row;
		} else {
			return false;
		}
	}

	public function check_email_pass_exists($table, $email, $pass)
	{
		$qs = 'SELECT * FROM '.$table.' WHERE email = "'.$email.'" AND password = "'.$pass.'"';
		$res=mysqli_query($GLOBALS['connn'], $qs);
		if (mysqli_num_rows($res) > 0) {
			$row = mysqli_fetch_assoc($res);
			return $row;
		} else {
			return false;
		}		
	}

	public function delete($table, $columnName, $id)
	{
		$res=mysqli_query($GLOBALS['connn'], "DELETE FROM $table WHERE $columnName = $id");
		return $res;
	}
}