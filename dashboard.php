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
  <link rel="stylesheet" href="css/chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chzn-rtl .chzn-search { left: -9000px; }
    .chzn-rtl .chzn-drop { left: -9000px; }
  </style>
<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script> 
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmiAuZQaFAgfssrfwtyFEQhY2NWzkgJ0&callback=initMap"></script>

<script src="js/highcharts.js"></script>
<script src="js/highcharts-3d.js"></script>
<script src="js/exporting.js"></script>

<script>
      function initMap() {
		var mapCenter = new google.maps.LatLng(15.184344641774892, 76.2060546875);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
         center: mapCenter
        });			  


<?php 
	$sqlgetlatlondetails=mysqli_query($conn, "select * from  tbl_iot_details where iot_geolocation<>''");
	$count_geo=0;
	while($res_getlatlondetails=mysqli_fetch_array($sqlgetlatlondetails)) { 
	$count_geo++;
?>
var contentString<?php echo $count_geo;?> = '<div id="content" style="background:#ffffff;">'
				+ '<table width="350"  cellspacing="0" cellpadding="0" border="0"   bgcolor="#ffffff">'

					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><span style=font-weight:bold;><?php echo $res_getlatlondetails["iot_address"];?></td>'
					+ '</tr>'
					+ '</table>'
+ '</div>'; 


        var infowindow<?php echo $count_geo;?>= new google.maps.InfoWindow({
        content: contentString<?php echo $count_geo;?>        
		});
        var marker<?php echo $count_geo;?> = new google.maps.Marker({
         position: new google.maps.LatLng(<?php echo $res_getlatlondetails["iot_latitude"];?>, <?php echo $res_getlatlondetails["iot_longitude"];?>),
          map: map,
		  icon: 'images/hq.png',  
          title: '<?php echo $res_getlatlondetails["iot_address"];?>'
        });
        marker<?php echo $count_geo;?>.addListener('click', function() {
          infowindow<?php echo $count_geo;?>.open(map, marker<?php echo $count_geo;?>);
        });

/////marker1//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
<?php  }?>



      }
    </script>	
	
	
	
	<script language="javascript">
	dochange_statics('');
	
	function dochange_statics(action) {
				
				$.ajax({
				type: "POST",
				url: "ajax_stastics.php",
				data: "action="+action,
					success : function(data){
						$('#ajax_stastics').css("display","block");  //Changes the style of table from display:none to display:block
						$('#ajax_stastics').html(data);
					}
				});
		}
	</script>
	
	
</head>

<body class="hold-transition skin-blue-light sidebar-mini  fixed">
<div class="wrapper">
  <?php include_once("header_menu.php");?>
  <?php include_once("left_menu.php");?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<?php
	$sql_stasttics=mysqli_query($conn, "select count(*) as total_user_count from tbl_iot_details");
	$res_stasttics=mysqli_fetch_array($sql_stasttics);
	$total_user_count=$res_stasttics["total_user_count"];
	?>
<div class="row">
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">600</span>
              <span class="info-box-text" style="text-transform:none;">Total Visit</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="ion ion-thumbsup"></i></span>

            <div class="info-box-content">
              <span class="info-box-number"><?php echo $total_user_count;?></span>
              <span class="info-box-text" style="text-transform:none;">Total Users</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion ion-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">30</span>
              <span class="info-box-text" style="text-transform:none;">States</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">2,000</span>
              <span class="info-box-text" style="text-transform:none;">Join Members</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>	
	  
	  <div class="row">
		  
        <div class="col-md-6 col-12">
          <!-- Stacked/Grouped Multi-Bar Chart-->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Users Statistics</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
			
			<div class="box-body">
			
					<div class="row">
					
						<div class="col-md-3" style="margin-left:0px;"><strong>Select Year : </strong></div>
						<div class="col-md-3" style="margin-left:0px;">
							<div class="form-group">
									
									<select  name="start_date" id="start_date" data-placeholder="Select Year"  class="form-control chzn-select"  style="width:200px;display:inline;"  onChange="dochange_statics(this.value);">
									  <option value="">Select Year</option>
									  <?php
									  $sql_select_year=mysqli_query($conn, "select DATE_FORMAT(iot_datetime, '%Y') as iot_date  from  tbl_iot_details group by DATE_FORMAT(iot_datetime, '%Y')");
									  while($res_year=mysqli_fetch_array($sql_select_year)) { 
									  ?>	
									  <option value="<?php echo $res_year["iot_date"];?>" <?php if($res_year["iot_date"]==date('Y')) { echo 'selected';}?>><?php echo $res_year["iot_date"];?></option>
									  <?php  }?>
									  </select>
						  </div>
						</div>
					</div>			
			</div>
            <div id="ajax_stastics"></div>
			
			
			
			
			
			
			
			
			
			
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>  
		
        <div class="col-md-6 col-12">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Geo Location <small>Get User LAT LON Position</small></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
			  
              <div id="map" style="width:100%;height:900px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
		  

	  </div>	
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	<?php include_once('footer_content.php');?>
  <div class="control-sidebar-bg"></div>
</div>
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	<script src="js/template.js"></script>
	<script src="js/demo.js"></script>
	  
	  
	  
	  
	
</body>
</html>
