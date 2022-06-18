<?php
require_once "connect.php";
$msg = "";
if(isset($_REQUEST['btnSubmit'])) 
	{
		$fname = $_REQUEST['fname'];
		$ftype = $_REQUEST['ftype'];
		$unit = $_REQUEST['unit'];
		$price = $_REQUEST['price'];
		//$incredients = $_REQUEST['incredients'];
	
		$query = "insert into food (fname,ftype,unit,price) values ('$fname','$ftype','$unit','$price')";
		if(mysql_query($query))
		{
		echo '<script language="javascript">';
		echo 'alert("Food Item Added Successfully!")';
		echo '</script>';
		} 
		else 
		{
		echo '<script language="javascript">';
		echo 'alert("Unable to Add!")';
		echo '</script>';
		}
	}
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
					<h1>Add Food</h1>
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
						<form method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" name="fname" placeholder="Food Name" required>
										</div>
										<div class="form-group">
											<select class="form-control" name="ftype" required>
												<option value="">Select Food Type</option>
												<option value="Veg">Veg</option>
												<option value="Nonveg">Nonveg</option>
											</select>
										</div>          
									</div>
									
								</div>
								<div class="col-md-6">
								
									<div class="col-md-12">
										<div class="form-group">
											<select class="form-control" name="unit" required>
												<option value="">Select Unit</option>
												<option value="100 gm">100 gm</option>
												<option value="200 gm">200 gm</option>
												<option value="1 plate">1 plate</option>
												<option value="1 pice">1 pice</option>
												<option value="1 cup">1 cup</option>
											</select>
										</div>  
										<div class="form-group">
											<input type="text" class="form-control" name="price" placeholder="Price" required>
										</div>  

									</div>
									
								</div>
								<div class="col-md-12">
									
									<div class="submit-button text-center">
										<button class="btn btn-common" type="submit" name="btnSubmit">Add Item</button>
										<div class="clearfix"></div> 
									</div>
								</div>
							</div>            
						</form>
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