<?php
error_reporting(0);
session_start();
include_once 'dbconfig.php';
if(!isset($_SESSION['user_session'])){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once('header.php');?> 
<style>

/* Preloader */
#preloader {
	position: fixed;
	top:0;
	left:0;
	right:0;
	bottom:0;
	background-color:#fff; /* change if the mask should have another color then white */
	z-index:3000; /* makes sure it stays on top */
}

#status {
	width:640px;
	height:314px;
	position:absolute;
	left:30%; /* centers the loading animation horizontally one the screen */
	top:50%; /* centers the loading animation vertically one the screen */
	background-image:url(btn-ajax-loader.gif); /* path to your loading animation */
	background-repeat:no-repeat;
	background-position:center;
	margin:-100px 0 0 -100px; /* is width and height divided by two */
}
</style>
</head>

<body class="hold-transition skin-blue-light sidebar-mini sidebar-collapse fixed">
<div id="preloader">
	<div id="status"></div>
</div>
<div class="wrapper">

  	<?php include_once("header_menu.php");?>
    <?php include_once("left_menu.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>IoT Reports</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">IoT Reports</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	  <div class="callout bg-pale-info">
        <h4>IoT Reports</h4>
        <p>Customer set values</p>
      </div>
      <div class="row">
        <div class="col-12">
		
		
	<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		    	<form class="form-horizontal" id="edit-form">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="edit-modal-label" style="color:#000;">Customer set values</h4>
			      </div>
			      <div class="modal-body">
			      		<div class="row">
						
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>Date and Time</label><div id="iot_datetime"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>Latitude</label><div id="iot_latitude"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>Longitude</label><div id="iot_longitude"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>Battery voltage</label><div id="iot_batteryvoltage"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>Sampling frequency</label><div id="iot_sampling_frequency"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>Posting frequency</label><div id="iot_posting_frequency"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>GPS fixed/ CELL Locate</label><div id="iot_gpsfixed"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>No of satellites fixed</label><div id="iot_satellitesfixed"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>IMEI No</label><div id="iot_imeino"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>Power on/off</label><div id="iot_power_onoff"></div></div></div>
						  <div class="col-md-6 col-xl-4"><div class="form-group"><label>QR code</label><div id="iot_qrcode"></div></div></div>
			      		</div>														
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
		      	</form>
		    </div>
		  </div>
		</div>		
		
		
		
		
		
         
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive dataTable display" role="grid">
                <thead>
					<tr role="row" style="background: linear-gradient(#E2E2E2, #FFFFFF);font-size:12px;color:#000;">
						<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 173px;">SL.NO</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 272px;">Date</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 132px;">Latitude</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 69px;">Longitude</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 122px;">Battery voltage</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 95px;">Sampling frequency</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" aria-label="Salary: activate to sort column ascending" style="width: 95px;">Posting frequency</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" aria-label="Salary: activate to sort column ascending" style="width: 95px;">GPS</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" aria-label="Salary: activate to sort column ascending" style="width: 95px;">No of satellites fixed</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" aria-label="Salary: activate to sort column ascending" style="width: 95px;">IMEI No</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" aria-label="Salary: activate to sort column ascending" style="width: 95px;">Power on/off</th>
					    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" aria-label="Salary: activate to sort column ascending" style="width: 95px;">QR code</th>
					</tr>
				</thead>
              </table>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	<?php include_once('footer_content.php');?>
  <div class="control-sidebar-bg"></div>
</div>
	<?php include_once('js_footer.php');?>
	
	<script language="JavaScript">
			//<![CDATA[
			$(window).load(function() { // makes sure the whole site is loaded
				$('#status').fadeOut(); // will first fade out the loading animation
				$('#preloader').fadeOut('fast'); // will fade out the white DIV that covers the website.
				$('body').css({'overflow':'visible'});
			})
		//]]>  
	  
	  </script>		
	
</body>
</html>
