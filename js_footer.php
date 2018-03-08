<!-- jQuery 3 -->
	<script src="js/jquery.js"></script>
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>		
	<script src="assets/vendor_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>	
	
		<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- Lion_admin App -->
	<script src="js/template.js"></script>
	
	<!-- Lion_admin for demo purposes -->
	<script src="js/demo.js"></script>
	
	<script>
		$(document).ready(function() {
		    $('#example1').DataTable( {
				"aProcessing": true,
				"aServerSide": true,
				 language: {
					 processing: "<img src='btn-ajax-loader.gif'>"
				  },
				  
				//"scrollY": 600,
				//"scrollX": true,
				
		        "ajax": "server-json-data.php",
				dom: 'Bfrtip',
				buttons: [
					 'copy', 'csv', 'excel', 'pdf', 'print'
				],	
				
				
						
					
				
				"columnDefs": [
				
				
					{
			        	"targets": 0,
			            "render": function ( data, type, row, meta ) {
			                return meta.row + meta.settings._iDisplayStart + 1;
			            }
		        	},
					
					
					
					{
			        	"targets": 4,
			            "render": function ( data, type, row ) {
							var data_first = data.charAt(0);
							var data_second =data.substring(1);
							var final_volt=data_first+' . '+data_second+" V";
			                return final_volt;
			            }
		        	},					
					
					
					{
			        	"targets": 7,
			            "render": function ( data, type, row ) {
			                return data == 1 ? 'GPS': 'CELL';
			            }
		        	},
					
					{
			        	"targets": 10,
			            "render": function ( data, type, row ) {
							if(data == 1){ return 'On'; }else if(data == 0){ return 'Off';}else {return 'NA';}
			                
			            }
		        	},										
					
					
					/*
		        	{
		      		 	"targets": 3,
		                "render": function ( data, type, row ) {
		                    return row["city"] +', ' + row["country"] +', '+data;
		                },
		              
		            },*/
					
					
		        ]
				
				
				
		    });
		});
		
		
			// Edit row
			function editRow(id) {
				if ( 'undefined' != typeof id ) {
					$.getJSON('server-json-data.php?edit=' + id, function(obj) {
						$('#edit-id').val(obj.iot_id);
						$('#iot_datetime').text(obj.iot_datetime);
						$('#iot_latitude').text(obj.iot_latitude);
						$('#iot_longitude').text(obj.iot_longitude);
						$('#iot_batteryvoltage').text(obj.iot_batteryvoltage);
						$('#iot_sampling_frequency').text(obj.iot_sampling_frequency);
						$('#iot_posting_frequency').text(obj.iot_posting_frequency);
						if(obj.iot_gpsfixed=="1"){var iot_gpsfixed="GPS"; } else if(obj.iot_gpsfixed=="0"){ var iot_gpsfixed="CELL"; } else {var iot_gpsfixed="-";}
						$('#iot_gpsfixed').text(iot_gpsfixed);
						$('#iot_satellitesfixed').text(obj.iot_satellitesfixed);
						$('#iot_imeino').text(obj.iot_imeino);
						if(obj.iot_power_onoff=="1"){var iot_power_onoff="On"; } else {var iot_power_onoff="Off"; }
						$('#iot_power_onoff').text(iot_power_onoff);
						$('#iot_qrcode').text(obj.iot_qrcode);

						
						$('#edit-modal').modal('show')
					}).fail(function() { alert('Unable to fetch data, please try again later.') });
				} else alert('Unknown row id.');
			}		
		
		
		</script>