<?php
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
</head>
<body class="hold-transition skin-blue-light sidebar-mini sidebar-collapse fixed">
<div class="wrapper">
  	<?php include_once("header_menu.php");?>
    <?php include_once("left_menu.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Users Details</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Users Details</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	  <div class="callout bg-pale-info">
        <h4>Users Details</h4>
        <p>Customer set values</p>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
					<tr role="row" style="background: linear-gradient(#E2E2E2, #FFFFFF);font-size:12px;color:#000;">
						<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 173px;">SL.NO</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 272px;">Name</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 132px;">Email Id</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 69px;">User Name</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 122px;">Password</th>
						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 95px;">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$users_count=0;
					$sql_userdetails=mysqli_query($conn, "select *  from  tbl_user order by profile_name");
					while($res_userdetails=mysqli_fetch_array($sql_userdetails)) { 
					$users_count++;
					?>
					<tr>
					  <td><?php echo $users_count;?></td>
					  <td><?php echo $res_userdetails["profile_name"];?></td>
					  <td><?php echo $res_userdetails["profile_emailid"];?></td>
					  <td><?php echo $res_userdetails["user_email"];?></td>
					  <td><?php echo $res_userdetails["user_password"];?></td>
					  <td><span class="label label-<?php if($res_userdetails["user_status"]=="Active") { echo 'success'; } else { echo 'danger'; }?>"><?php echo $res_userdetails["user_status"];?></span></td>
					</tr>
					<?php } ?>
				</tbody>	
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
<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendor_components/nvd3/lib/d3.v3.js" type="text/javascript"></script>
	<script src="assets/vendor_components/nvd3/lib/stream_layers.js" type="text/javascript"></script>
    <script src="assets/vendor_components/nvd3/src/utils.js" type="text/javascript"></script>	
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	<!-- Lion_admin App -->
	<script src="js/template.js"></script>
	<!-- Lion_admin for demo purposes -->
	<script src="js/demo.js"></script>
</body>
</html>
