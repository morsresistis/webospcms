<?php
$error = '0';

if (isset($_POST['submitBtn'])){
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';

	$error = loginUser($username,$password);
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administrator Panel</title>

  <link href="<?php echo $admin_templates; ?>assets/css/sb-admin.css" rel="stylesheet">
  <link href="<?php echo $admin_templates; ?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo $admin_templates; ?>assets/css/admin.css" rel="stylesheet">
  <script src="<?php echo $admin_templates; ?>assets/scripts/jquery.js"></script>
        <!--script src="templates/scripts/form.js"></script-->
  <script src="<?php echo $admin_templates; ?>assets/scripts/popper.js"></script>
  <script src="<?php echo $admin_templates; ?>assets/scripts/bootstrap.js"></script>
  <script src="<?php echo $admin_templates; ?>assets/scripts/core.js"></script>

</head>
<body class="bg-dark">

  <div class="container">
  	<?php if ($error != '') {?>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Authorization</div>
      <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" class="form-control" name="username">
              <label for="inputEmail">Login</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" class="form-control" name="password">
              <label for="inputPassword">password</label>
            </div>
          </div>
          <button type="submit" name="submitBtn" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo $admin_templates; ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo $admin_templates; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo $admin_templates; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
      
<?php 
}   
    if (isset($_POST['submitBtn'])){

	if ($error == '') {
		echo("<script>location.href='index.php'</script>");
	}
	else echo $error;
}
?>


    </div>
</body>   
