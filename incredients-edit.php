<?php 
require_once "connect.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
    if(isset($_REQUEST['btnSubmit'])) 
    {
        $product_name = $_REQUEST['product_name'];
		$product_id = $_REQUEST['product_id'];
		$quantity = $_REQUEST['quantity'];
		$unit = $_REQUEST['unit'];
		$price = $_REQUEST['price'];
        $total = Round($quantity * $price);
        $query1 = "update incredients set product_name='$product_name',product_id='$product_id',quantity='$quantity',total='$total',unit='$unit',price='$price' where id = ".$id;
        if(mysql_query($query1))
        {
        echo '<script language="javascript">';
        echo 'alert("Record Updated!")';
        echo '</script>';
        header('Refresh: 3; URL = view-incredients.php');
        } 
        else 
        {
        echo '<script language="javascript">';
        echo 'alert("Unable to Update!")';
        echo '</script>';
        }
    }

    $query = "select * from food where id='$id'";
    $data = mysql_query($query);
    $rec = mysql_fetch_array($data);
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
					<h1>Edit Food Items</h1>
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
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Incredients Name</label>
											<input type="text" class="form-control" name="product_name" placeholder="Incredients Name" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Incredients ID</label>
											<input type="text" class="form-control"  name="product_id" value="<?php  echo(rand(1000,10000)); ?>" readonly required>
										</div>          
									</div>
								</div>									
							</div>								
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Incredients Name</label>
											<select class="form-control" name="unit" required>
												<option value="">Select Unit</option>
												<option value="100 gm">100 gm</option>
												<option value="200 gm">200 gm</option>
												<option value="300 gm">300 gm</option>
												<option value="400 gm">400 gm</option>
												<option value="500 gm">500 gm</option>
												<option value="600 gm">600 gm</option>
												<option value="700 gm">700 gm</option>
												<option value="800 gm">800 gm</option>
												<option value="900 gm">900 gm</option>
												<option value="1 kg">1 kg</option>
												<option value="2 kg">2 kg</option>
												<option value="3 kg">3 kg</option>
												<option value="4 kg">4 kg</option>
												<option value="5 kg">5 kg</option>
												<option value="1 plate">1 plate</option>
												<option value="1 pice">1 pice</option>
												<option value="1 cup">1 cup</option>											
											</select>
										</div>  										 										  
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<lable>Price</lable>
											<input type="text" class="form-control" name="price" placeholder="Price" required>
										</div>
									</div>	
									<div class="col-md-4">
										<div class="form-group">
											<lable>Quantity</lable>
											<input type="text" class="form-control" name="quantity" placeholder="Quantity" required>
										</div>
									</div>	
								</div>
							</div>							
							<div class="col-md-12">									
								<div class="submit-button text-center">
									<button class="btn btn-common" type="submit" name="btnSubmit">Update Item</button>
									<div class="clearfix"></div> 
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