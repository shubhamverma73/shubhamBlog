<?php
session_start();
include_once 'DB_function.php';
$con = new DB_function();

if(isset($_POST['documents']))
{
	if($_FILES["profile_pic"]["name"] != '') {
		$temp = explode(".", $_FILES["profile_pic"]["name"]);
		$file_name = 'profile_pic'.round(microtime(true)) . '.' . end($temp);
		$imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));		
		move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "data/profile/". $file_name);

	    $data['is_married'] = $file_name;
    	$data['create_date'] = date('Y-m-d H:i:s');
    	$data['modify_date'] = date('Y-m-d H:i:s');
	    $profile_id = $con->save_data('user_docs',$data);
	    $_SESSION['profile_id'] = $profile_id;
	}

	if($_FILES["signature"]["name"] != '') {
		$temp2 = explode(".", $_FILES["signature"]["name"]);
		$file_name2 = 'signature_pic'.round(microtime(true)) . '.' . end($temp2);
		$imageFileType2 = strtolower(pathinfo($file_name2,PATHINFO_EXTENSION));	
	    move_uploaded_file($_FILES["signature"]["tmp_name"], "data/signature/". $file_name2);
    	$con->upate_image('user_docs', 'signature', $file_name2, 'id', $_SESSION['profile_id']);
    	header('Location: education_details.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Documentation</title>
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

  <form class="form-horizontal" action="file_upload_guideline.php" method="post" enctype="multipart/form-data">
    <h2>Upload Documentation</h2>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Profile Pic:</label>
      <div class="col-sm-4">
        <input type="file" name="profile_pic" id="profile_pic" accept="image/x-png,image/gif,image/jpeg">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Signature:</label>
      <div class="col-sm-4">          
        <input type="file" name="signature" id="signature" accept="image/x-png,image/gif,image/jpeg">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="documents" class="btn btn-primary"><strong>Submit</strong></button>
      </div>
    </div>
  </form>
</div>

</body>
</html>