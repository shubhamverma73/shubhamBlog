<?php
session_start();
include_once 'DB_function.php';
$con = new DB_function();

if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

if(isset($_POST['make-payment']))
{
    $data['user_id'] = $_SESSION['user_id'];
    $data['transection_id'] = time().date('ymd').$_SESSION['user_id'];
    $data['card_type'] = $_POST['card_type'];
    $data['country'] = $_POST['country'];
    $data['card_no'] = $_POST['card_no'];
    $data['month'] = $_POST['month'];
    $data['year'] = $_POST['year'];
    $data['csv'] = $_POST['csv'];
    $data['create_date'] = date('Y-m-d H:i:s');
    $data['modify_date'] = date('Y-m-d H:i:s');

    $con->save_data('payment',$data);
    $_SESSION['payment_done'] = 'Thank you for payment';
    header("Location: qualification.php");
}

$res=$con->select('user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
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

      <form class="form-horizontal" method="post" action="index.php">
        <h2>Payment</h2>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Card Type:</label>
          <div class="col-sm-4">          
            <select name="card_type" class="form-control" id="card_type" required="">
                <option value="" selected="true" disabled="">Select Card Type</option>
                <option value="visa">Visa</option>
                <option value="master">Master</option>
                <option value="rupay">Rupay</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Country:</label>
          <div class="col-sm-4">          
            <select name="country" class="form-control" id="country" required="">
                <option value="" selected="true" disabled="">Select Country</option>
                <option value="india">India</option>
                <option value="us">US</option>
                <option value="uk">UK</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Card No:</label>
          <div class="col-sm-4">          
            <input type="text" class="form-control" id="card_no" name="card_no" placeholder="Card No" required="" />
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Expiry:</label>
          <div class="col-md-2">          
            <select name="month" class="form-control" id="month" required="">
                <option value="" selected="true" disabled="">Month</option>
                <?php for ($i = 01; $i < 12; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="col-md-2">
            <select name="year" class="form-control" id="year" required="">
                <option value="" selected="true" disabled="">Year</option>
                <?php for ($i = 2017; $i < 2026; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">CSV:</label>
          <div class="col-sm-4">          
            <input type="text" class="form-control" id="csv" name="csv" placeholder="Enter CSV Code" required="" />
            </select>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="make-payment" class="btn btn-primary"><strong>Make Payment</strong></button>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <a href="logout.php">Logout</a>
          </div>
        </div>
    </form>
  </div>
</div>
    
</body>
</html>