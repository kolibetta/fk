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
									<select  name="start_date" id="start_date" data-placeholder="Select Year"  class="form-control chzn-select"  style="display:inline-block;"  onChange="dochange_statics(this.value);">
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
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	<script src="js/template.js"></script>
	<script src="js/demo.js"></script>
	  
	  
	  
	  
	
</body>
</html>
