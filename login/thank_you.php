<?php
session_start();
include_once 'DB_function.php';
$con = new DB_function();
$reg_id = $con->select('user_table', 'id', $_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Thank you</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h2>Thank you for registration, we'll get back you soon</h2>
Your Registration ID is:
<?php echo $reg_id['registration_no']; ?>
</body>
</html>