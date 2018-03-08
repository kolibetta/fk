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

<?php

	$search_country=$_REQUEST["search_country"];
	
	if($search_country) { 
	
		$join_country=" and iot_countryname='$search_country' "; 
		$sqlgetlatlondetailsCountry=mysqli_query($conn, "select iot_latitude,iot_longitude,iot_countryname from  tbl_iot_details where 1=1 $join_country and iot_countryname<>'' group by iot_countryname");
		$resgetlatlondetailsCountry=mysqli_fetch_array($sqlgetlatlondetailsCountry);
		if($sqlgetlatlondetailsCountry) {
			$country_lat=$resgetlatlondetailsCountry["iot_latitude"];
			$country_lon=$resgetlatlondetailsCountry["iot_longitude"];
			$zoom=4;
		} else { 
			$country_lat="15.184344641774892";
			$country_lon="76.2060546875";
			$zoom=1;
		}
		
	} else { 
		$country_lat="15.184344641774892";
		$country_lon="76.2060546875";
		$zoom=1;
	}
	

	?>
<script>
      function initMap() {
		var mapCenter = new google.maps.LatLng(<?php echo $country_lat;?>, <?php echo $country_lon;?>);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: <?php echo $zoom;?>,
         center: mapCenter
        });			  


<?php 
	
	if($search_country) { $join_country=" and iot_countryname='$search_country' ";} else {$join_country="";}
	$sqlgetlatlondetails=mysqli_query($conn, "select * from  tbl_iot_details where iot_cityname<>'' $join_country group by iot_cityname");
	$count_geo=0;
	while($res_getlatlondetails=mysqli_fetch_array($sqlgetlatlondetails)) { 
	$count_geo++;
	$iot_cityname=$res_getlatlondetails["iot_cityname"];
	

	
?>
var contentString<?php echo $count_geo;?> = '<div id="content" style="background:#ffffff;overflow-y:scroll;width:300px;max-height:350px;">'
				+ '<table width="100%"  cellspacing="0" cellpadding="0" border="0"   >'
					+ '<tr>' 
					+ '<td  valign=middle   style="padding:5px;" valign="top">'
					
					<?php 
					$sqlgetlatlondetails_A=mysqli_query($conn, "select * from  tbl_iot_details where iot_cityname='$iot_cityname'");
					$numdetails_latlon=mysqli_num_rows($sqlgetlatlondetails_A);
					$count_geoA=0;
					while($res_getlatlondetails_A=mysqli_fetch_array($sqlgetlatlondetails_A)) { 
					$count_geoA++;
					?>
					
						+ '<table width="100%"  cellspacing="0" cellpadding="0" border="0" style="font-size:11px;border:1px solid #d5d5d5;background: linear-gradient(#F5F5F5, #FFFFFF);margin-bottom:10px;">'
							
							+ '<tr>'
								+ '<td colspan="2"  valign=middle   style="padding:5px;font-size:11px;" valign="top"><div style="font-weight:bold;font-size:13px;">Address : </div><div style="padding-top:10px;font-size:11px;"><?php echo $res_getlatlondetails_A['iot_address'];?></div>'
								+ '</td>'
							+ '</tr>'
							
							+ '<tr>'
								+ '<td  valign=middle   style="padding:5px;font-weight:bold;font-size:11px;" valign="top">Date - Time</td>'
								+ '<td  valign=middle   style="padding:5px;font-size:11px;" valign="top"><?php echo trim($res_getlatlondetails_A['iot_datetime']);?></td>'
							+ '</tr>'	
							
							+ '<tr>'
								+ '<td  valign=middle   style="padding:5px;font-weight:bold;font-size:11px;" valign="top">IMEINO</td>'
								+ '<td  valign=middle   style="padding:5px;font-size:11px;" valign="top"><?php echo trim($res_getlatlondetails_A['iot_imeino']);?></td>'
							+ '</tr>'							
							
							+ '<tr>'
								+ '<td  valign=middle   style="padding:5px;font-weight:bold;font-size:11px;" valign="top">QR Code</td>'
								+ '<td  valign=middle   style="padding:5px;font-size:11px;" valign="top"><?php echo trim($res_getlatlondetails_A['iot_qrcode']);?></td>'
							+ '</tr>'							

							
							+ '<tr>'
								+ '<td  valign=middle   style="padding:5px;font-weight:bold;font-size:11px;" valign="top">Latitude</td>'
								+ '<td  valign=middle   style="padding:5px;font-size:11px;" valign="top"><?php echo trim($res_getlatlondetails_A['iot_latitude']);?></td>'
							+ '</tr>'
							
							+ '<tr>'
								+ '<td  valign=middle   style="padding:5px;font-weight:bold;font-size:11px;" valign="top">Longitude</td>'
								+ '<td  valign=middle   style="padding:5px;font-size:11px;" valign="top"><?php echo trim($res_getlatlondetails_A['iot_longitude']);?></td>'
							+ '</tr>'							
							
														
							
							+ '<tr>'
								+ '<td  valign=middle   style="padding:5px;font-weight:bold;font-size:11px;" valign="top">City</td>'
								+ '<td  valign=middle   style="padding:5px;font-size:11px;" valign="top"><?php echo trim($res_getlatlondetails_A['iot_cityname']);?></td>'
							+ '</tr>'
							
							+ '<tr>'
								+ '<td  valign=middle   style="padding:5px;font-weight:bold;font-size:11px;" valign="top">State</td>'
								+ '<td  valign=middle   style="padding:5px;font-size:11px;" valign="top"><?php echo trim($res_getlatlondetails_A['iot_statename']);?></td>'
							+ '</tr>'
							
							+ '<tr>'
								+ '<td  valign=middle   style="padding:5px;font-weight:bold;font-size:11px;" valign="top">Country</td>'
								+ '<td  valign=middle   style="padding:5px;font-size:11px;" valign="top"><?php echo trim($res_getlatlondetails_A['iot_countryname']);?></td>'
							+ '</tr>'
																					
							

						+ '</table>'
					<?php }?>
						
					+ '</td>'
					+ '</tr>'
					+ '</table>'
+ '</div>'; 


        var infowindow<?php echo $count_geo;?>= new google.maps.InfoWindow({
        content: contentString<?php echo $count_geo;?>        
		});
        var marker<?php echo $count_geo;?> = new google.maps.Marker({
         position: new google.maps.LatLng(<?php echo $res_getlatlondetails["iot_city_latitude"];?>, <?php echo $res_getlatlondetails["iot_city_longitude"];?>),
          map: map,
		  icon: 'images/hq.png',  
		  label: {
			text: '<?php echo $numdetails_latlon;?>',
			color: 'white',
		  },
          title: '<?php echo $res_getlatlondetails["iot_cityname"];?>'
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
	dochange_statics_circle('');
	
	function dochange_statics_circle(action) {
				
				$.ajax({
				type: "POST",
				url: "ajax_stastics_circle.php",
				data: "action="+action,
					success : function(data){
						$('#ajax_stastics_circle').css("display","block");  //Changes the style of table from display:none to display:block
						$('#ajax_stastics_circle').html(data);
					}
				});
		}	
	
	
	
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
	
	<script type="text/javascript">
	function change_url(val) {
	parent.location.href="dashboard.php?search_country="+val;
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
      <h1 style="margin-top:10px;">
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
					
					<div id="ajax_stastics"></div>
					
					
					
					
					
					<div class="row">
						<div class="col-md-3" style="margin-left:0px;"><strong>Select State : </strong></div>
						<div class="col-md-3" style="margin-left:0px;">
							<div class="form-group">

									
									<select  name="search_state" id="search_state"  onChange="dochange_statics_circle(this.value);" data-placeholder="State"  class="form-control chzn-select"  style="width:200px;display:inline;" >
									  <option value="">Karnataka</option>
									  <?php
									  $sqlSearchState=mysqli_query($conn, "select trim(iot_statename)  from  tbl_iot_details  group by trim(iot_statename) order by iot_statename");
									  while($resSearchState=mysqli_fetch_array($sqlSearchState)) { 
									  ?>	
									  <option value="<?php echo $resSearchState["iot_statename"];?>" <?php if($resSearchState["iot_statename"]==$search_country) { echo 'selected';}?>><?php echo $resSearchState["iot_statename"];?></option>
									  <?php  }?>
									  </select>
						  </div>
						</div>
					</div>				
			
					<div id="ajax_stastics_circle"></div>					
					
					
					
					
			</div>
			
			

			
			
			
			
			
			
			
			
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
			
					<div class="row">
						<div class="col-md-3" style="margin-left:0px;"><strong>Select Country : </strong></div>
						<div class="col-md-3" style="margin-left:0px;">
							<div class="form-group">

									
									<select  name="search_country" id="search_country"  onchange="change_url(this.value);" data-placeholder="Country"  class="form-control chzn-select"  style="width:200px;display:inline;">
									  <option value="">All Country</option>
									  <?php
									  $sqlSearchCountry=mysqli_query($conn, "select iot_countryname  from  tbl_iot_details  group by iot_countryname order by iot_countryname");
									  while($resSearchCountry=mysqli_fetch_array($sqlSearchCountry)) { 
									  ?>	
									  <option value="<?php echo $resSearchCountry["iot_countryname"];?>" <?php if($resSearchCountry["iot_countryname"]==$search_country) { echo 'selected';}?>><?php echo $resSearchCountry["iot_countryname"];?></option>
									  <?php  }?>
									  </select>
						  </div>
						</div>
					</div>	
			
			  
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
