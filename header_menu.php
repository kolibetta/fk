<?php
$useragent = $_SERVER['HTTP_USER_AGENT']; 
$iPod = stripos($useragent, "iPod"); 
$iPad = stripos($useragent, "iPad"); 
$iPhone = stripos($useragent, "iPhone");
$Android = stripos($useragent, "Android"); 
$iOS = stripos($useragent, "iOS");
//-- You can add billion devices 

$DEVICE = ($iPod||$iPad||$iPhone||$Android||$iOS||$webOS||$Blackberry||$IEMobile||$OperaMini);


$stmt = $db_con->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
	  <b class="logo-mini">

		  <span class="dark-logo"><img src="images/logo-dark.png" alt="logo"></span>
	  </b>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
		  <img src="images/logo-light-text.png" alt="logo" class="light-logo">
	  	  <img src="images/logo-dark-text.png" alt="logo" class="dark-logo">
	  </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
	  <?php if ($DEVICE !=true) { ?>
	  <a>
	  	<h3 style="color:#fff;font-weight:400;font-size:25px;">Quinta Systems</h3>
	  </a>
	  <?php } ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  
		 		
		  
          <!-- Messages -->
          
          <!-- Notifications -->
          
          <!-- Tasks -->
          
		  <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/user5-128x128.jpg" class="user-image rounded-circle" alt="User Image">
			  <span style="color:#fff;font-weight:400;font-size:12px;"><?php echo $row['profile_name']; ?></span>
			  <small style="color:#fff;font-weight:400;font-size:10px;"> <?php echo $row['profile_emailid']; ?></small>
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <img src="images/user5-128x128.jpg" class="float-left rounded-circle" alt="User Image">
                	<p><?php echo $row['profile_name']; ?> <small class="mb-5"><?php echo $row['profile_emailid']; ?></small>
                  <a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row no-gutters">
                  <div class="col-12 text-left">
                    <a href="#"><i class="ion ion-person"></i> My Profile</a>
                  </div>

				<div role="separator" class="divider col-12"></div>
				  <div class="col-12 text-left">
                    <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                  </div>				
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>