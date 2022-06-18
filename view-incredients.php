<?php
require_once "connect.php";
$msg = "";

?>

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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
					<h1>View Ingredients</h1>
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
$query = "select * from incredients";
$data = mysql_query($query);

$result = mysql_query("select sum(total) as overalltotal from incredients");
$row = mysql_fetch_array($result);

?>


<table class="table table-hover table-striped" border="1">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Id</th>
                                        <th>Unit</th>
										<th>Quantity</th>
                                    	<th>Price</th>
                                    	<th>Total</th>
										<th>Date</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                     <?php while($rec = mysql_fetch_array($data)) { ?>
                               
                                        <tr>
                                        	<td><?php echo $rec['product_name']; ?></td>
                                        	<td><?php echo $rec['product_id']; ?></td>
                                        	<td><?php echo $rec['unit']; ?></td>
											<td><?php echo $rec['quantity']; ?></td>
                                        	<td><?php echo $rec['price']; ?></td>
											<td><?php echo $rec['total']; ?> RS</td>
											<td><?php echo $rec['updated_at']; ?></td>
                                            
                                             <td> 
																							<a href="incredients-edit.php?id=<?php echo $rec['id']; ?>">Edit</a> | 
                                             	<a onClick="return confirm('Sure to Delete ?')" href="incredients-delete.php?id=<?php echo $rec['id']; ?>">Delete</a> </td>
												
                                        </tr>
                                         <?php } 
										 ?><tr>
										 <td></td>
										 <td></td>
										 <td></td>
										 <td></td>
										 <td></td>
										 <td colspan="3"><?= $row['overalltotal']; ?> RS</td>
										 
										 </tr>
                                       
                                   
                                </table>
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
</body>
</html>