<?php
include_once 'dbconfig.php';
$action=$_REQUEST["action"];
if($action) {
$action=$action;
} else { 
$action=date('Y');
}


						//$sql_graphdetails=mysqli_query($conn, "select DATE_FORMAT(iot_datetime, '%m') as iotyear_month, count(iot_id) as total_count  from  tbl_iot_details where DATE_FORMAT(iot_datetime, '%Y')='$action'  group by DATE_FORMAT(iot_datetime, '%Y-%m')");
						
						$sql_graphdetails=mysqli_query($conn, "select DATE_FORMAT(iot_datetime, '%Y-%m') as iotyear_month, count(iot_id) as total_count  from  tbl_iot_details where DATE_FORMAT(iot_datetime, '%Y')='2018' group by DATE_FORMAT(iot_datetime, '%Y-%m')");
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
						
						$jan_moth_cmpr="01";	$feb_moth_cmpr="02";	$mar_moth_cmpr="03";	$apr_moth_cmpr="04";	$may_moth_cmpr="05";	$jun_moth_cmpr="06";
						$july_moth_cmpr="07";	$aug_moth_cmpr="08";	$sept_moth_cmpr="09";	$oct_moth_cmpr="10";	$nov_moth_cmpr="11";	$dec_moth_cmpr="12";
												
						while($res_graphdetails=mysqli_fetch_array($sql_graphdetails)) { 
						
							$iotyear_month=$res_graphdetails["iotyear_month"];
							$ffexplode=explode("-", $iotyear_month);
							$iotyear_month=$ffexplode[1];
							$total_count=$res_graphdetails["total_count"];
							

							if($iotyear_month=="01" && $total_count>0) {$jan_moth=$total_count; } 
							if($iotyear_month=="02" && $total_count>0) {$feb_moth=$total_count; } 						
							

							if($iotyear_month=="03" && $total_count>0) {$mar_moth=$total_count; } 						
							if($iotyear_month=="04" && $total_count>0) {$apr_moth=$total_count; } 
							if($iotyear_month=="05" && $total_count>0) {$may_moth=$total_count; } 				
							
							if($iotyear_month=="06" && $total_count>0) {$jun_moth=$total_count; } 
							if($iotyear_month=="07" && $total_count>0) {$july_moth=$total_count; } 
							if($iotyear_month=="08" && $total_count>0) {$aug_moth=$total_count; } 						
							if($iotyear_month=="09" && $total_count>0) {$sept_moth=$total_count; }
							if($iotyear_month=="10" && $total_count>0) {$oct_moth=$total_count; } 
							if($iotyear_month=="11" && $total_count>0) {$nov_moth=$total_count; }
							if($iotyear_month=="12" && $total_count>0) {$dec_moth=$total_count; } 
							
						}/////////while($res_graphdetails=mysqli_fetch_array($sql_graphdetails)) { 
						
					
						
?>

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
						
						

						
						
						?>
						data: [<?php if($jan_moth>0){ echo $jan_moth; } else {echo '0';}?>, <?php if($feb_moth>0){ echo $feb_moth; } else {echo '0';}?>, <?php if($mar_moth>0){ echo $mar_moth; } else { echo '0';}?>, <?php if($apr_moth>0){ echo $apr_moth; } else {echo '0';}?>, <?php if($may_moth>0){  echo $may_moth; } else {echo '0';}?>, <?php if($jun_moth>0){  echo $jun_moth; } else {echo '0';}?>, <?php if($july_moth>0){  echo $july_moth; } else {echo '0';}?>, <?php if($aug_moth>0){  echo $aug_moth; } else {echo '0';}?>, <?php if($sept_moth>0){  echo $sept_moth; } else {echo '0';}?>, <?php if($oct_moth>0){  echo $oct_moth; } else {echo '0';}?>, <?php if($nov_moth>0){  echo $nov_moth; } else {echo '0';}?>, <?php if($dec_moth>0){  echo $dec_moth; } else {echo '0';}?>],
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
			
<?php $action="";?>			
			