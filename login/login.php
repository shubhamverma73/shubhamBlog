<?php
session_start();
include_once 'DB_function.php';
$con = new DB_function();

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $user_data = $con->check_email_pass_exists('user_table',$email, $password);

    if(is_array($user_data)) {
      $_SESSION['user_id'] = $user_data['id'];
      $_SESSION['email'] = $user_data['email'];
      header("Location: index.php");
    } else {
      session_start();
      $_SESSION['message'] = 'Email-ID/Password not valid';
      header("Location: index.php");
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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

  <form class="form-horizontal" method="post" action="login.php">
    <h2>Login</h2>
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
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="login" class="btn btn-primary"><strong>Login</strong></button>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        Not have an account: <a href="register.php">Click Here</a>
      </div>
    </div>
  </form>
</div>

</body>
</html>