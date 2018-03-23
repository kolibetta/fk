<?php
include_once 'dbconfig.php';
$action=$_REQUEST["action"];
if($action) {
$action=$action;
} else { 
$action="Karnataka";
}
?>

				
				
				
<div id="container_pie" style="height:400px"></div>
						  
<script  language="javascript">
Highcharts.chart('container_pie', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Contents of Statewise User Statistics Report'
    },
    subtitle: {
        text: '3D donut in Statewise Statistics Report'
    },
    plotOptions: {
        pie: {
            innerSize: 70,
            depth: 45
        }
    },
    series: [{
        name: 'Users Hit Count',
        data: [
		<?php
		$sql_graphdetailscityhit=mysqli_query($conn, "select count(iot_id) as totalhit, iot_cityname  from  tbl_iot_details where iot_statename='$action' and iot_imeino<>''  group by iot_cityname");
		while($res_graphdetailscityhit=mysqli_fetch_array($sql_graphdetailscityhit)) { 
		$iot_cityname=$res_graphdetailscityhit["iot_cityname"];
		$total_count=$res_graphdetailscityhit["totalhit"];
			

	?>
            ['<?php echo $iot_cityname."--".$total_count;?>', <?php echo $total_count;?>],
	<?php } ?>
        ]
    }]
});
</script>			  
			  
            </div>
			
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
			