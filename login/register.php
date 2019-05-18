<?php
session_start();
include_once 'DB_function.php';
$con = new DB_function();
$status = isset($_GET['status']) ? $_GET['status'] : '';

if(isset($_POST['register']))
{
    $data['registration_no'] = time().date('ymd');
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['password'] = md5($_POST['password']);
    $data['mobile'] = $_POST['mobile'];
    $data['mother_name'] = @$_POST['mother_name'];
    $data['husband_name'] = @$_POST['husband_name'];
    $data['dob'] = $_POST['dob'];
    $data['gender'] = $_POST['gender'];
    $data['is_married'] = @$_POST['is_married'];
    $data['create_date'] = date('Y-m-d H:i:s');
    $data['modify_date'] = date('Y-m-d H:i:s');

    $user_id = $con->save_data('user_table',$data);
    $_SESSION['user_id'] = $user_id;
    $_SESSION['email'] = $data['email'];
    $_SESSION['message'] = 'Record added successfully';
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <?php
      if(@$_SESSION['message'] != '') { ?>
          <div id="show-all-error">
              <div class="show-error alert alert-danger jquery-error-message-box-align">
                  <?php
                    print_r($_SESSION);
                      echo @$_SESSION['message'];
                      unset($_SESSION['message']);
                  ?>
              </div>
          </div>
  <?php } ?>

  <form class="form-horizontal" method="post" action="register.php">
    <h2>Register</h2>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" id="email"  name="email" placeholder="Email" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" id="pass" name="password" placeholder="Password" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Mobile:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">DOB:</label>
      <div class="col-sm-4">          
        <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Gender:</label>
      <div class="col-sm-4">          
        <select name="gender" class="form-control" id="gender" required="">
            <option value="" selected="true" disabled="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Are you Married?:</label>
      <div class="col-sm-4">          
        <select name="is_married" class="form-control" id="is_married" required="" >
            <option value="" selected="true" disabled="">Select</option>
            <option value="no">No</option>
            <option value="yes">Yes</option>
        </select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="register" class="btn btn-primary"><strong>Register</strong></button>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        Already have an account: <a href="login.php">Click Here</a>
      </div>
    </div>
  </form>  
</body>
</html>