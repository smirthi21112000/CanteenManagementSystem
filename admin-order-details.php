<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
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
 
      <style>

		
         .badge span {
         background-color: #fffbec;
         width: 60px;
         height: 25px;
         padding-bottom: 3px;
         border-radius: 5px;
         display: flex;
         color: #fed85d;
         justify-content: center;
         font-size: 22px;
         align-items: center
         }

		 .p-4 {
    padding: 1.5rem !important;
}
.widget-stat .media {
    padding: 0rem 0;
    align-items: center;
}

.widget-stat .media>span {
    height: 5.3125rem;
    width: 5.3125rem;
    border-radius: 3.125rem;
    padding: 0.625rem 0.75rem;
    font-size: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #464a53;
    min-width: 5.3125rem;
}
.bgl-primary {
    background: var(--rgba-primary-1);
    border-color: var(--rgba-primary-1);
}

		 .card {
    margin-bottom: 1.875rem;
    background-color: #fff;
    transition: all .5s ease-in-out;
    position: relative;
    border: 0rem solid transparent;
    border-radius: 0.5rem;
    box-shadow: 0rem 0.3125rem 0.3125rem 0rem rgb(82 63 105 / 5%);
    height: calc(100% - 30px);
}
      </style>
   </head>
   <body>
      <!-- Start header -->
      <?php include "admin-header.php" ?>
      <!-- End header -->
      <!-- Start All Pages -->
      <div class="all-page-title page-breadcrumb">
         <div class="container text-center">
            <div class="row">
               <div class="col-lg-12">
                  <h1>POS Details</h1>
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
                        // session_start(); 
                        // $username=$_SESSION['username'];
                        include('connect.php');
                        error_reporting(E_ERROR | E_PARSE);
                        $date = $_REQUEST['date'];
                        $tableno = $_REQUEST['tableno'];
                        $query = "select * from orders where date='$date'";
                        $data = mysql_query($query);

						$querw = mysql_query("select count(*) as total from orders where date='$date'");
                        $d=mysql_fetch_assoc($querw);
                        
                        // include('connect.php');
                        $query = mysql_query("select count(*) as total from staff");
                        $staff=mysql_fetch_assoc($query);
                        
                        $query1 = mysql_query("select count(*) as total from user");
                        $user=mysql_fetch_assoc($query1);
                        
                        $query2 = mysql_query("select count(*) as total from food");
                        $food=mysql_fetch_assoc($query2);
                        
                        $query3 = mysql_query("select SUM(total) as subtotal, count(*) as total from incredients");
                        $incredients=mysql_fetch_assoc($query3);
                        
                        $query4 = mysql_query("select SUM(subtotal) as subtotal, Count(*)  as total from orders");
                        $subtotal=mysql_fetch_assoc($query4);
            
                        
                        ?>
                     <input type="hidden" value="<?= $_REQUEST['date'] ?>" id="date" >
					 <div class="col-md-12">
                     <table class="table table-hover table-striped table-border" >
                        <tr>
                           <th>Date</th>
                           <th>Food Name</th>
                           <th>Unit</th>
                           <th>Price</th>
                           <th>Quantity</th>
                           <th>Status</th>
                           <th>Subtotal</th>
                        </tr>
                        <?php while($rec = mysql_fetch_array($data)) { ?>
                        <tr>
                           <td><?php echo $rec['date']; ?></td>
                           <td><?php echo $rec['fname']; ?></td>
                           <td><?php echo $rec['unit']; ?></td>
                           <td><?php echo $rec['price']; ?></td>
                           <td><?php echo $rec['qty']; ?></td>
                           <td>
							   	<?php if($rec['status'] == 'Completed') { ?>
							   		<span class="badge badge-success"><?php echo $rec['status']; ?></span>
							   	<?php } else { ?>
									<span class="badge badge-warning"><?php echo $rec['status']; ?></span>
								<?php } ?>
							</td>
                           <td><?php echo $rec['subtotal']; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                           <td colspan="6" align="right"> Total </td>
                           <td><?php $result = mysql_query("SELECT SUM(subtotal) AS subtotal FROM orders where date='$date'"); 
                              $row = mysql_fetch_assoc($result); 
                              $sum = $row['subtotal']; echo $sum; ?></td>
                        </tr>
                     </table>
						</div>
                     <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
                              <div class="container mt-4 mb-4">
                                 <div class="row">
                                    <div class="col-md-6">                                   
									   <div class="widget-stat card">
											<div class="card-body p-4">
												<div class="media ai-icon d-flex">
													<span class="me-3 bgl-primary text-primary">
														<i class="fa fa-users"></i>
													</span>
													<div class="media-body">
														<h3 class="mb-0 text-black"><span class="counter ms-0"><?php echo $staff['total']; ?></span></span></h3>
														<p class=" mt-2 mb-0">Total Staffs</p>
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                    <div class="col-md-6">
										<div class="widget-stat card">
											<div class="card-body p-4">
												<div class="media ai-icon d-flex">
													<span class="me-3 bgl-primary text-primary">
														<i class="fa fa-users"></i>
													</span>
													<div class="media-body">
														<h3 class="mb-0 text-black"><span class="counter ms-0"><?php echo $user['total']; ?></span></span></h3>
														<p class=" mt-2 mb-0">Total Users</p>
													</div>
												</div>
											</div>
										</div>                               
                                    </div>                                 
                                 </div>
								<div class="row">
									<div class="col-md-6">                                   
									   <div class="widget-stat card">
											<div class="card-body p-4">
												<div class="media ai-icon d-flex">
													<span class="me-3 bgl-primary text-primary">
														<i class="fa fa-shopping-basket "></i>
													</span>
													<div class="media-body">
														<h3 class="mb-0 text-black"><span class="counter ms-0"><?php echo $food['total']; ?></span></span></h3>
														<p class=" mt-2 mb-0">Total no of Food in menu</p>
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                    <div class="col-md-6">
										<div class="widget-stat card">
											<div class="card-body p-4">
												<div class="media ai-icon d-flex">
													<span class="me-3 bgl-primary text-primary">
														<i class="fa fa-sitemap"></i>
													</span>
													<div class="media-body">
														<h3 class="mb-0 text-black"><span class="counter ms-0"><?php echo $incredients['total']; ?></span></span></h3>
														<p class=" mt-2 mb-0">Total no of Ingredients </p>
													</div>
												</div>
											</div>
										</div>                               
                                    </div>
								</div>

								<div class="row">
									<div class="col-md-6">                                   
									   <div class="widget-stat card">
											<div class="card-body p-4">
												<div class="media ai-icon d-flex">
													<span class="me-3 bgl-primary text-primary">
														<i class="fa fa-shopping-cart"></i>
													</span>
													<div class="media-body">
														<h3 class="mb-0 text-black"><span class="counter ms-0"><?php echo $d['total']; ?></span></span></h3>
														<p class=" mt-2 mb-0">No of food ordered on given day</p>
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                    <div class="col-md-6">
										<div class="widget-stat card">
											<div class="card-body p-4">
												<div class="media ai-icon d-flex">
													<span class="me-3 bgl-primary text-primary">
														<i class="fa fa-inr"></i>
													</span>
													<div class="media-body">
														<h3 class="mb-0 text-black"><span class="counter ms-0"><?php echo $sum; ?></span></span></h3>
														<p class=" mt-2 mb-0">This Date's Income</p>
													</div>
												</div>
											</div>
										</div>                               
                                    </div>
								</div>

								<div class="row">
									<div class="col-md-6">                                   
									   <div class="widget-stat card">
											<div class="card-body p-4">
												<div class="media ai-icon d-flex">
													<span class="me-3 bgl-primary text-primary">
														<i class="fa fa-shopping-cart"></i>
													</span>
													<div class="media-body">
														<h3 class="mb-0 text-black"><span class="counter ms-0"><?php echo $subtotal['total']; ?></span></span></h3>
														<p class=" mt-2 mb-0">Total No of Order's</p>
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                    <div class="col-md-6">
										<div class="widget-stat card">
											<div class="card-body p-4">
												<div class="media ai-icon d-flex">
													<span class="me-3 bgl-primary text-primary">
														<i class="fa fa-inr"></i>
													</span>
													<div class="media-body">
														<h3 class="mb-0 text-black"><span class="counter ms-0"><?php echo $subtotal['subtotal']; ?></span></span></h3>
														<p class=" mt-2 mb-0">Total Income </p>
													</div>
												</div>
											</div>
										</div>                               
                                    </div>
								</div>
								
								<div class="row">									
                                    <div class="col-md-6">
										<div class="widget-stat card">
											<div class="card-body p-4">
												<div class="media ai-icon d-flex">
													<span class="me-3 bgl-primary text-primary">
														<i class="fa fa-sitemap"></i>
													</span>
													<div class="media-body">
														<h3 class="mb-0 text-black"><span class="counter ms-0"><?php echo $incredients['subtotal']; ?></span></span></h3>
														<p class=" mt-2 mb-0">Total expense of this day</p>
													</div>
												</div>
											</div>
										</div>                               
                                    </div>
								</div>
								
							
                              </div>
                            </div>
						</div>
                        <div class="row">
                           <!-- <div class="col-md-6">
									<div class="card mt-4">
										<div class="card-header">Pie Chart</div>
										<div class="card-body">
											<div class="chart-container pie-chart">
												<canvas id="pie_chart"></canvas>
											</div>
										</div>
									</div>
									</div>
									<div class="col-md-6">
									<div class="card mt-4">
										<div class="card-header">Doughnut Chart</div>
										<div class="card-body">
											<div class="chart-container pie-chart">
												<canvas id="doughnut_chart"></canvas>
											</div>
										</div>
									</div>
                              	</div> -->
                           <div class="col-md-12">
                              <div class="card mt-4 mb-4">
                                 <div class="card-header">Bar Chart</div>
                                 <div class="card-body">
                                    <div class="chart-container pie-chart">
                                       <canvas id="bar_chart"></canvas>
                                    </div>
                                 </div>
                              </div>
                           </div>                         
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
         	var date  = $('#date').val();
         	makechart();
         	function makechart()
         	{
         		$.ajax({
         			url:"chart.php",
         			method:"POST",
         			data:{action:'fetch',date:date, date2:''},
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