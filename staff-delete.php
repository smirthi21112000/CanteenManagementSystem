<?php 
	require_once "connect.php";
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
	$query = "delete from staff where id=".$id;
	if(mysql_query($query)) 
	{
		header("location:view-staff.php");
	} 
	else 
	{
		echo "unable to delete!";
	}
?>