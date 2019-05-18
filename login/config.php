<?php
$connn = mysqli_connect("localhost","root","","login");
$GLOBALS['connn'] = $connn;

// Check connection
if (mysqli_connect_errno())
{
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>