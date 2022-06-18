<?php 
require_once "connect.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
    if(isset($_REQUEST['btnSubmit'])) 
    {
        $sname = $_REQUEST['sname'];
		$age = $_REQUEST['age'];
		$gender = $_REQUEST['gender'];
		$mobile = $_REQUEST['mobile'];
		$email = $_REQUEST['email'];
		$address = $_REQUEST['address'];
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
        
        $query1 = "update staff set sname='$sname',age='$age',gender='$gender',mobile='$mobile',email='$email',address='$address',username='$username', password='$password' where id = ".$id;
        if(mysql_query($query1))
        {
        echo '<script language="javascript">';
        echo 'alert("Record Updated!")';
        echo '</script>';
        header('Refresh: 3; URL = view-staff.php');
        } 
        else 
        {
        echo '<script language="javascript">';
        echo 'alert("Unable to Update!")';
        echo '</script>';
        }
    }

    $query = "select * from staff where id='$id'";
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
					<h1>Edit Staff</h1>
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
											<input type="text" class="form-control" name="sname" placeholder="Staff Name" required value="<?php echo $rec['sname']; ?>">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="age" placeholder="Age" required value="<?php echo $rec['age']; ?>">
										</div> 
										<div class="form-group">
											<select class="form-control" name="gender" required>
												<option value="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div> 
										<div class="form-group">
											<input type="text" class="form-control" name="mobile" placeholder="Mobile" required maxlength="10" value="<?php echo $rec['mobile']; ?>">
										</div>                   
									</div>
									
								</div>
								<div class="col-md-6">
								<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" name="email" placeholder="E-Mail" value="<?php echo $rec['email']; ?>">
										</div>                                 
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" name="address" placeholder="Address" required value="<?php echo $rec['address']; ?>">
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Username" class="form-control" name="username" required value="<?php echo $rec['username']; ?>">
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="password" placeholder="Password" class="form-control" name="password" required value="<?php echo $rec['password']; ?>">
										</div> 
									</div>
								</div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" type="submit" name="btnSubmit">Update</button>
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