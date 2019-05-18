<?php
session_start();
include_once 'DB_function.php';
$con = new DB_function();
$status = isset($_GET['status']) ? $_GET['status'] : '';

if(isset($_POST['preview']))
{
	$data['user_id'] = $_SESSION['user_id'];
    $data['degree'] = $_POST['degree'];
    $data['org'] = $_POST['org'];
    $data['month'] = $_POST['month'];
    $data['year'] = $_POST['year'];
    $data['madderss'] = $_POST['madderss'];
    $data['mcity'] = $_POST['mcity'];
    $data['mdistrict'] = $_POST['mdistrict'];
    $data['mpincode'] = $_POST['mpincode'];
    $data['padderss'] = $_POST['padderss'];
    $data['pcity'] = $_POST['pcity'];
    $data['pdistrict'] = $_POST['pdistrict'];
    $data['ppincode'] = $_POST['ppincode'];
    $data['is_submited'] = 'No';
    $data['create_date'] = date('Y-m-d H:i:s');
    $data['modify_date'] = date('Y-m-d H:i:s');

    $user_id = $con->save_data('qualification',$data);
    $_SESSION['message'] = 'Record added successfully';
    header("Location: preview.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Qualification</title>
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

  <form class="form-horizontal" method="post" action="education_details.php">
    <h2>Qualification</h2>
    <div class="form-group">
      <label class="control-label col-sm-2" for="degree">Higher Qualification:</label>
      <div class="col-sm-4">          
        <select name="degree" class="form-control" id="degree" required="">
            <option value="" selected="true" disabled="">Select Degree</option>
            <option value="Masetr">Master</option>
            <option value="Bachelor">Bachelor</option>
            <option value="PHD">PHD</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="org">School/Organization:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="org"  name="org" placeholder="School/Organization" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Passing Year:</label>
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
            <?php for ($i = 2005; $i < 2026; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
      </div>
    </div>
    <h3>Mailing Address</h3>
    <div class="form-group">
      <label class="control-label col-sm-2" for="madderss">Address:</label>
      <div class="col-sm-4">          
        <textarea class="form-control" id="madderss" name="madderss" placeholder="Address"  required></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="mcity">City/Town/Village:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="mcity" name="mcity" placeholder="City/Town/Village" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="mdistrict">District:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="mdistrict" name="mdistrict" placeholder="District" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="mpincode">Pincode:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="mpincode" name="mpincode" placeholder="Pincode" required="" />
      </div>
    </div>
    <h3>Permanent Address</h3>
    <div class="form-group">
      <label class="control-label col-sm-2" for="padderss">Address:</label>
      <div class="col-sm-4">          
        <textarea class="form-control" id="padderss" name="padderss" placeholder="Address"  required></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pcity">City/Town/Village:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="pcity" name="pcity" placeholder="City/Town/Village" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pdistrict">District:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="pdistrict" name="pdistrict" placeholder="District" required="" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ppincode">Pincode:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="ppincode" name="ppincode" placeholder="Pincode" required="" />
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="preview" class="btn btn-primary"><strong>Preview</strong></button>
      </div>
    </div>
  </form>  
</body>
</html>