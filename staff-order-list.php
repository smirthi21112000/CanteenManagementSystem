<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Canteen</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<?php include "staff-header.php" ?>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Bill Details</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<?php
ob_start();
session_start(); 
//$username=$_SESSION['username'];
include('connect.php');
error_reporting(E_ERROR | E_PARSE);
$date = $_REQUEST['date'];
$tableno = $_REQUEST['tableno'];
$username = $_REQUEST['username'];
$query = "select * from orders order by id desc";
$data = mysql_query($query);
?>


<table class="table table-hover table-striped" border="1">
                                    <tr>
										<th>Order Id</th>
                                    	<th>Date</th>
                                        <th>Food Name</th>
                                        <th>Unit</th>
                                    	<th>Price</th>
                                    	<th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                     <?php while($rec = mysql_fetch_array($data)) { ?>
                               
                                        <tr>
											<td><?php echo $rec['orderid']; ?></td>
                                        	<td><?php echo $rec['date']; ?></td>
                                        	<td><?php echo $rec['fname']; ?></td>
                                        	<td><?php echo $rec['unit']; ?></td>
                                        	<td><?php echo $rec['price']; ?></td>
                                        	<td><?php echo $rec['qty']; ?></td>
                                            <td><?php echo $rec['subtotal']; ?></td>
                                            <td><?php echo $rec['status']; ?></td>
                                            <td><a href="order-edit.php?id=<?php echo $rec['id']; ?>">Edit</a></td>
                                            
                                        </tr>
                                         <?php } ?>
										 <tr>
                                        	<td colspan="6" align="right"> Total </td>
                                        	 <td><?php $result = mysql_query("SELECT SUM(subtotal) AS subtotal FROM orders"); 
$row = mysql_fetch_assoc($result); 
$sum = $row['subtotal']; echo $sum; ?></td>
                                        </tr>
                                       
                                   
                                </table>


								<div class="container-fluid">
			<div class="row">
				 <div class="col-md-12">
					<div class="card mt-4">
						<div class="card-header">Pie Chart</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="pie_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<!--<div class="col-md-6">
					<div class="card mt-4">
						<div class="card-header">Doughnut Chart</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="doughnut_chart"></canvas>
							</div>
						</div>
					</div>
				</div> -->
				<!-- <div class="col-md-12">
					<div class="card mt-4 mb-4">
						<div class="card-header">Bar Chart</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="bar_chart"></canvas>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Reservation -->
	

	
	<!-- Start Footer -->
	<?php include "footer.php" ?>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script src="js/picker.time.js"></script>
	<script src="js/legacy.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
	<script>	
	$(document).ready(function(){
		
		makechart();
		function makechart()
		{
			$.ajax({
				url:"chart.php",
				method:"POST",
				data:{action:'sftech'},
				dataType:"JSON",
				success:function(data)
				{
					var fname = [];
					var amount = [];
					var color = [];

					for(var count = 0; count < data.length; count++)
					{
						fname.push(data[count].fname);
						amount.push(data[count].amount);
						color.push(data[count].color);
					}

					var chart_data = {
						labels:fname,
						datasets:[
							{
								label:'Total Sales (RS)',
								backgroundColor:color,
								color:'#fff',
								data:amount,
							}
						]
					};

					var options = {
						responsive:true,
						scales:{
							yAxes:[{
								ticks:{
									min:0
								}
							}]
						}
					};

					var group_chart1 = $('#pie_chart');

					var graph1 = new Chart(group_chart1, {
						type:"pie",
						data:chart_data
					});

					var group_chart2 = $('#doughnut_chart');

					var graph2 = new Chart(group_chart2, {
						type:"doughnut",
						data:chart_data
					});

					var group_chart3 = $('#bar_chart');

					var graph3 = new Chart(group_chart3, {
						type:'bar',
						data:chart_data,
						options:options
					});
				}
			})
		}

	});
</script>
</body>
</html>