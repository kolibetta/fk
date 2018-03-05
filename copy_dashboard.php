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
 <style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map_canvas { height: 100% }


      #map {
        width: 100%;
        height:800px;
      }

      #styles, #add-tab {
        float: left;
        margin-top: 10px;
        width: 400px;
      }

      #styles label,
      #add-tab label {
        display: inline-block;
        width: 130px;
      }

      .phoney {
        background: -webkit-gradient(linear,left top,left bottom,color-stop(0, rgb(112,112,112)),color-stop(0.51, rgb(94,94,94)),color-stop(0.52, rgb(57,57,57)));
        background: -moz-linear-gradient(center top,rgb(112,112,112) 0%,rgb(94,94,94) 51%,rgb(57,57,57) 52%);
      }

      .phoneytext {
        text-shadow: 0 -1px 0 #000;
        color: #fff;
        font-family: Helvetica Neue, Helvetica, arial;
        font-size: 18px;
        line-height: 25px;
        padding: 4px 45px 4px 15px;
        font-weight: bold;
        background: url(img/arrow.png) 95% 50% no-repeat;
      }

      .phoneytab {
        text-shadow: 0 -1px 0 #000;
        color: #fff;
        font-family: Helvetica Neue, Helvetica, arial;
        font-size: 18px;
        background: rgb(112,112,112) !important;
      }

			.inner_box_background {
				font-family: tahoma;font-size: 11px;font-weight: normal;text-decoration:none;
				color: #1B1B1B;
				border: solid 1px #CFCFCF;
				background: #6e6e6e;
				background: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#E0E0E0));
				background: -moz-linear-gradient(top,  #FFFFFF,  #E0E0E0);
				filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFF', endColorstr='#E0E0E0');
			}

.common_box { 
	font-family: arial;
	font-size: 14px;
	font-weight: bold;
	color: #fff;
	text-decoration: none;
	margin:0px;
	padding:10px;-moz-border-radius:4px;border-radius:4px;border: 1px solid #A2D246;
	background: #f78d1d;
	background: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#D4D4D4));
	background: -moz-linear-gradient(top,  #FFFFFF,  #D4D4D4);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFF', endColorstr='#D4D4D4');
	border: 1px solid #aaa;
	-moz-box-shadow: 0 0 1em rgba(0, 0, 0, .5);
	-webkit-box-shadow: 0 0 1em rgba(0, 0, 0, .5);
	 box-shadow: 0 0 1em rgba(0, 0, 0, .5);
}


.prvg_boxA { 
	font-family: tahoma;
	font-size: 11px;
	font-weight: normal;
	color: #333333;
	text-decoration: none;
	margin:0px;
	background: #6e6e6e;
	-webkit-border-radius: .2em; 
	-moz-border-radius: .2em;
	border-radius: .2em;
	background: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#E6E6E6));
	background: -moz-linear-gradient(top,  #FFFFFF,  #E6E6E6);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFF', endColorstr='#E6E6E6');
	-moz-box-shadow: 0 0 1em rgba(0, 0, 0, .5);
	-webkit-box-shadow: 0 0 1em rgba(0, 0, 0, .5);
	box-shadow: 0 0 1em rgba(0, 0, 0, .5);
}

</style>


  <link rel="stylesheet" href="css/chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chzn-rtl .chzn-search { left: -9000px; }
    .chzn-rtl .chzn-drop { left: -9000px; }
  </style>
  

<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/highcharts-3d.js"></script>
<script src="js/exporting.js"></script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
      function initMap() {
		var mapCenter = new google.maps.LatLng(15.184344641774892, 76.2060546875);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
         center: mapCenter
        });			  

var contentString1 = '<div id="content" style="background:#ffffff;">'
				+ '<table width="350"  cellspacing="0" cellpadding="0" border="0"   bgcolor="#ffffff">'
					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><img src="images/gmap_logo.gif" /></td>'
					+ '</tr>'

					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><span style=font-weight:bold;>Cleantech Tele Tower Services (P) Ltd,</span><br>C/o -Parveen, 1 floor, 1/1150, vishal Khand Gomti Nagar, Lucknow  Pin code : 226 010. UTTAR PRADESH<br>info@cleantechtelecom.com,  Tel : +91 80 40838900</td>'
					+ '</tr>'
					+ '</table>'
+ '</div>'; 


        var infowindow1= new google.maps.InfoWindow({
          content: contentString1        });
        var marker1 = new google.maps.Marker({
         position: new google.maps.LatLng(26.8518923, 80.98848870000006),
          map: map,
		  icon: 'images/hq.png',  
          title: 'Ahmdabad, Gujrat'
        });
        marker1.addListener('click', function() {
          infowindow1.open(map, marker1);
        });


/////marker1//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var contentString2 = '<div id="content" style="background:#ffffff;">'
				+ '<table width="350"  cellspacing="0" cellpadding="0" border="0"   bgcolor="#ffffff">'
					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><img src="images/gmap_logo.gif" /></td>'
					+ '</tr>'

					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><span style=font-weight:bold;>Cleantech Tele Tower Services (P) Ltd,</span><br>Shop No: A wing-408, 3rd Floor Mega Center, Near Magar Patta Bridge, Land Mark: Beside Noble Hospital, Hadapsar, Pune ? Pin code: 411 028. MAHARASTRA<br>info@cleantechtelecom.com,  Tel : +91 80 40838900</td>'
					+ '</tr>'
					+ '</table>'
+ '</div>'; 


        var infowindow2= new google.maps.InfoWindow({
          content: contentString2        });
        var marker2 = new google.maps.Marker({
         position: new google.maps.LatLng(18.5089197, 73.92602609999994),
          map: map,
		  icon: 'images/hq.png',  
          title: 'Ahmdabad, Gujrat'
        });
        marker2.addListener('click', function() {
          infowindow2.open(map, marker2);
        });


/////marker1//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var contentString3 = '<div id="content" style="background:#ffffff;">'
				+ '<table width="350"  cellspacing="0" cellpadding="0" border="0"   bgcolor="#ffffff">'
					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><img src="images/gmap_logo.gif" /></td>'
					+ '</tr>'

					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><span style=font-weight:bold;>Cleantech Tele Tower Services (P) Ltd,</span><br># D-416, Shiromani Complex, Near Jhansi Ki Rani BRTS Bus Stop,  Satellite Road, Ahmedabad ? 380 016. GUJARAT<br>info@cleantechtelecom.com,  Tel : +91 80 40838900</td>'
					+ '</tr>'
					+ '</table>'
+ '</div>'; 


        var infowindow3= new google.maps.InfoWindow({
          content: contentString3        });
        var marker3 = new google.maps.Marker({
         position: new google.maps.LatLng(23.0273763, 72.50977379999995),
          map: map,
		  icon: 'images/hq.png',  
          title: 'Ahmdabad, Gujrat'
        });
        marker3.addListener('click', function() {
          infowindow3.open(map, marker3);
        });


/////marker1//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var contentString4 = '<div id="content" style="background:#ffffff;">'
				+ '<table width="350"  cellspacing="0" cellpadding="0" border="0"   bgcolor="#ffffff">'
					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><img src="images/gmap_logo.gif" /></td>'
					+ '</tr>'

					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><span style=font-weight:bold;>Cleantech Tele Tower Services (P) Ltd,</span><br># 7-4/SE/504, 5th Floor, Supriya Estates, Survey No. 66/3, Plot NO. 5,6 & 7, Prashanthi Hills, Rayadurga, Navakalasa, Rayadurga X Roads,  Gachibowli,  Hyderabad -500 089. TELANGANA<br>info@cleantechtelecom.com,  Tel : +91 80 40838900</td>'
					+ '</tr>'
					+ '</table>'
+ '</div>'; 


        var infowindow4= new google.maps.InfoWindow({
          content: contentString4        });
        var marker4 = new google.maps.Marker({
         position: new google.maps.LatLng(17.4400802, 78.34891679999998),
          map: map,
		  icon: 'images/hq.png',  
          title: 'Ahmdabad, Gujrat'
        });
        marker4.addListener('click', function() {
          infowindow4.open(map, marker4);
        });


/////marker1//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var contentString5 = '<div id="content" style="background:#ffffff;">'
				+ '<table width="350"  cellspacing="0" cellpadding="0" border="0"   bgcolor="#ffffff">'
					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><img src="images/gmap_logo.gif" /></td>'
					+ '</tr>'

					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><span style=font-weight:bold;>Cleantech Tele Tower Services (P) Ltd,</span><br>Jaat Bhawan, 2nd floor, B-26(30), Hindon Vihar Sector - 49,  Opp: Kesar Garden, Noida ? 201 301. NEW DELHI<br>info@cleantechtelecom.com,  Tel : +91 80 40838900</td>'
					+ '</tr>'
					+ '</table>'
+ '</div>'; 


        var infowindow5= new google.maps.InfoWindow({
          content: contentString5        });
        var marker5 = new google.maps.Marker({
         position: new google.maps.LatLng(28.5541586, 77.37388490000001),
          map: map,
		  icon: 'images/hq.png',  
          title: 'Ahmdabad, Gujrat'
        });
        marker5.addListener('click', function() {
          infowindow5.open(map, marker5);
        });


/////marker1//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var contentString6 = '<div id="content" style="background:#ffffff;">'
				+ '<table width="350"  cellspacing="0" cellpadding="0" border="0"   bgcolor="#ffffff">'
					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><img src="images/gmap_logo.gif" /></td>'
					+ '</tr>'

					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><span style=font-weight:bold;>Cleantech Tele Tower Services (P) Ltd,</span><br># S-10, 2nd Floor, Jagadamba Tower, Amarapali Circle, Vaishali Nagar, Jaipur, Pincode -302 021. RAJASTHAN<br>info@cleantechtelecom.com,  Tel : +91 80 40838900</td>'
					+ '</tr>'
					+ '</table>'
+ '</div>'; 


        var infowindow6= new google.maps.InfoWindow({
          content: contentString6        });
        var marker6 = new google.maps.Marker({
         position: new google.maps.LatLng(26.9047751, 75.74886409999999),
          map: map,
		  icon: 'images/hq.png',  
          title: 'Ahmdabad, Gujrat'
        });
        marker6.addListener('click', function() {
          infowindow6.open(map, marker6);
        });


/////marker1//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var contentString7 = '<div id="content" style="background:#ffffff;">'
				+ '<table width="350"  cellspacing="0" cellpadding="0" border="0"   bgcolor="#ffffff">'
					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><img src="images/gmap_logo.gif" /></td>'
					+ '</tr>'

					+ '<tr>' 
					+ '<td  valign=middle bgcolor="#ffffff" class="website_font" style="padding:10px;" valign="top"><span style=font-weight:bold;>Cleantech Tele Tower Services (P) Ltd,</span><br>House No. 128F, Kurisinkal House, Chambokadavu Road, Toll  Junction, Edapally, Cochin-682 024, KERALA<br>info@cleantechtelecom.com,  Tel : +91 80 40838900</td>'
					+ '</tr>'
					+ '</table>'
+ '</div>'; 


        var infowindow7= new google.maps.InfoWindow({
          content: contentString7        });
        var marker7 = new google.maps.Marker({
         position: new google.maps.LatLng(10.0297417, 76.31081790000007),
          map: map,
		  icon: 'images/hq.png',  
          title: 'Ahmdabad, Gujrat'
        });
        marker7.addListener('click', function() {
          infowindow7.open(map, marker7);
        });


/////marker1//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



      }
    </script>	
	
	
	
</head>

<body class="hold-transition skin-blue-light sidebar-mini sidebar-collapse fixed">
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
	  
	  <div class="row">
		  
        <div class="col-md-6 col-12">
          <!-- Stacked/Grouped Multi-Bar Chart-->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Users Statics</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
			
			<div class="box-body">
			
					<div class="row">
					
					
						<div class="col-md-6">
							<div class="form-group">
									<select  name="start_date" id="start_date" data-placeholder="Select Year"  class="form-control chzn-select"  style="display:inline-block;"  onChange="fun1();">
									  <option value="">Select Year</option>
									  <?php
									  $sql_select_year=mysqli_query($conn, "select DATE_FORMAT(iot_datetime, '%Y') as iot_date  from  tbl_iot_details group by DATE_FORMAT(iot_datetime, '%Y')");
									  while($res_year=mysqli_fetch_array($sql_select_year)) { 
									  ?>	
									  <option value="<?php echo $res_year["iot_date"];?>" ><?php echo $res_year["iot_date"];?></option>
									  <?php  }?>
									  </select>
						  </div>
						</div>
					</div>			
			</div>
			
			
			
			
			
            <div class="box-body">
              <div id="container" style="height:470px;"></div>
			  
				<script type="text/javascript">//<![CDATA[
				
				Highcharts.chart('container', {
					chart: {
						type: 'column',
						options3d: {
							enabled: true,
							alpha: 10,
							beta: 25,
							depth: 70
						}
					},
					title: {
						text: 'Total Customer set values'
					},
					subtitle: {
						text: 'View Graphical Text Details'
					},
					plotOptions: {
						column: {
							depth: 25
						}
					},
					xAxis: {
						categories: Highcharts.getOptions().lang.shortMonths,
						labels: {
							skew3d: true,
							style: {
								fontSize: '16px'
							}
						}
					},
					yAxis: {
						title: {
							text: null
						}
					},
					series: [{
						name: 'Total Users',
						<?php
						$sql_graphdetails=mysqli_query($conn, "select DATE_FORMAT(iot_datetime, '%m') as iotyear_month, count(iot_id) as total_count  from  tbl_iot_details where DATE_FORMAT(iot_datetime, '%Y')='2018'  group by DATE_FORMAT(iot_datetime, '%Y-%m')");
						$jan_moth="";
						$feb_moth="";
						$mar_moth="";
						$apr_moth="";
						$may_moth="";
						$jun_moth="";
						$july_moth="";
						$aug_moth="";
						$sept_moth="";
						$oct_moth="";
						$nov_moth="";
						$dec_moth="";

						
						while($res_graphdetails=mysqli_fetch_array($sql_graphdetails)) { 
						
							$iotyear_month=$res_graphdetails["iotyear_month"];
							$total_count=$res_graphdetails["total_count"];
						
							if($iotyear_month=="01" && $total_count>0) {$jan_moth=$total_count; } else {$jan_moth='0'; }
							if($iotyear_month=="02" && $total_count>0) {$feb_moth=$total_count; } else {$feb_moth='0'; }
							if($iotyear_month=="03" && $total_count>0) {$mar_moth=$total_count; } else {$mar_moth='0'; }							
							if($iotyear_month=="04" && $total_count>0) {$apr_moth=$total_count; } else {$apr_moth='0'; }
							if($iotyear_month=="05" && $total_count>0) {$may_moth=$total_count; } else {$may_moth='0'; }							
							
							if($iotyear_month=="06" && $total_count>0) {$jun_moth=$total_count; } else {$jun_moth='0'; }
							if($iotyear_month=="07" && $total_count>0) {$july_moth=$total_count; } else {$july_moth='0'; }
							if($iotyear_month=="08" && $total_count>0) {$aug_moth=$total_count; } else {$aug_moth='0'; }							
							if($iotyear_month=="09" && $total_count>0) {$sept_moth=$total_count; } else {$sept_moth='0'; }
							if($iotyear_month=="10" && $total_count>0) {$oct_moth=$total_count; } else {$oct_moth='0'; }
							if($iotyear_month=="11" && $total_count>0) {$nov_moth=$total_count; } else {$nov_moth='0'; }
							if($iotyear_month=="12" && $total_count>0) {$dec_moth=$total_count; } else {$dec_moth='0'; }							

							
						}/////////while($res_graphdetails=mysqli_fetch_array($sql_graphdetails)) { 
						
						
						?>
						data: [<?php echo $jan_moth;?>, <?php echo $feb_moth;?>, <?php echo $mar_moth;?>, <?php echo $apr_moth;?>, <?php echo $may_moth;?>, <?php echo $jun_moth;?>, <?php echo $july_moth;?>, <?php echo $aug_moth;?>, <?php echo $sept_moth;?>, <?php echo $oct_moth;?>, <?php echo $nov_moth;?>, <?php echo $dec_moth;?>],
						dataLabels: {
							enabled: true,
							rotation: -90,
							color: '#000',
							align: 'right',
							format: '{point.y:.1f}', // one decimal
							y: -40, // 10 pixels down from the top
							style: {
								fontSize: '13px',
								fontFamily: 'Verdana, sans-serif'
							}
						}
					}]
				});
				
				</script>			  
			  
			  
			  
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
			  <ul class="list-inline text-right">
					<li>
						<h5><i class="fa fa-circle mr-5" style="color: #00bfc7;"></i>iPhone</h5>
					</li>
					<li>
						<h5><i class="fa fa-circle mr-5" style="color: #fb9678;"></i>iPad</h5>
					</li>
					<li>
						<h5><i class="fa fa-circle mr-5" style="color: #9675ce;"></i>iPod</h5>
					</li>
				</ul>
              <div id="map" style="width:100%;height:500px;"></div>
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
		<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	<script src="js/template.js"></script>
	<script src="js/demo.js"></script>
	
	  <script src="js/chosen.jquery.js" type="text/javascript"></script>
	  <script type="text/javascript"> 
		var config = {
		   '.chzn-select'           : {},
		  '.chzn-select-deselect'  : {allow_single_deselect:true},
		  '.chzn-select-no-single' : {disable_search_threshold:10},
		  '.chzn-select-no-results': {no_results_text:'Oops, nothing found!'},
		  '.chzn-select-width'     : {width:"95%"}
		  
	
	
		}
		for (var selector in config) {
		  $(selector).chosen(config[selector]);
		}
	  </script>	
	
	
</body>
</html>
