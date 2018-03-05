<?php
session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">
    <title>Flipkart IOT Services </title>
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
	<link rel="stylesheet" href="css/master_style.css">
	<link rel="stylesheet" href="css/skins/_all-skins.css">	
	<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript" src="validation.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Embtech </b>Innova
	<div id="error"></div>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form class="form-element" method="post" id="login-form">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="user_email" id="user_email">
		<span id="check-e"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
      </div>
      <div class="row">

        <div class="col-12 text-center">
          <button type="submit" class="btn btn-info btn-block margin-top-10" name="btn-login" id="btn-login">SIGN IN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
