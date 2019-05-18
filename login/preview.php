<?php
session_start();
include_once 'DB_function.php';
$con = new DB_function();

$reg_id = $con->select('qualification', 'id', $_SESSION['user_id']);

if($reg_id['is_submited'] != 'No') {
  header('Location: profile.php');
}

if(isset($_POST['final_submit']))
{
    $con->upate_data('qualification', 'is_submited', 'Yes', 'user_id', $_SESSION['user_id']);
    $_SESSION['message'] = 'Thank You for submitted!';
    header("Location: thank_you.php");
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

<?php
$education_data = $con->select('qualification', 'id', $_SESSION['user_id']);
$docs = $con->select('user_table', 'id', $_SESSION['user_id']);
?>

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

  <form class="form-horizontal" method="post" action="preview.php">
    <h2>Qualification</h2>
    <div class="form-group">
      <label class="control-label col-sm-2" for="degree">Higher Qualification:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" disabled value="<?php echo $education_data['degree'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="org">School/Organization:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" disabled value="<?php echo $education_data['org'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="passing_year">Passing Year:</label>
    <div class="col-md-2">          
        <input type="text" class="form-control" disabled value="<?php echo $education_data['month'] ?>" />
      </div>
      <div class="col-md-2">
        <input type="text" class="form-control" disabled value="<?php echo $education_data['year'] ?>" />
      </div>
    </div>
    <h3>Mailing Address</h3>
    <div class="form-group">
      <label class="control-label col-sm-2" for="madderss">Address:</label>
      <div class="col-sm-4">          
        <textarea class="form-control" disabled><?php echo $education_data['madderss'] ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="mcity">City/Town/Village:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" disabled value="<?php echo $education_data['mcity'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="mdistrict">District:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" disabled value="<?php echo $education_data['mdistrict'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="mpincode">Pincode:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" disabled value="<?php echo $education_data['mpincode'] ?>" />
      </div>
    </div>
    <h3>Permanent Address</h3>
    <div class="form-group">
      <label class="control-label col-sm-2" for="padderss">Address:</label>
      <div class="col-sm-4">          
        <textarea class="form-control" disabled><?php echo $education_data['padderss'] ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pcity">City/Town/Village:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" disabled value="<?php echo $education_data['pcity'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pdistrict">District:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" disabled value="<?php echo $education_data['pdistrict'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ppincode">Pincode:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" disabled value="<?php echo $education_data['ppincode'] ?>" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="profile_pic">Profile Pic:</label>
      <div class="col-sm-4">          
        <a href="data/profile/<?php echo $docs['profile_pic']; ?>" target="_blank"><?php echo $docs['profile_pic']; ?></a>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="signature">Signature:</label>
      <div class="col-sm-4">          
        <a href="data/signature/<?php echo $docs['signature']; ?>" target="_blank"><?php echo $docs['signature']; ?></a>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="final_submit" class="btn btn-success"><strong>Final Submit</strong></button>
        <a href="javascript:window.print()" class="btn btn-success">Print</a>
      </div>
    </div>
  </form>  
</body>
</html>