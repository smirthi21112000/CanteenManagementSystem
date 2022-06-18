<?php 
	require_once "connect.php";
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
	$query = "delete from user where id=".$id;
	if(mysql_query($query)) 
	{
		header("location:user-list.php");
	} 
	else 
	{
		echo "unable to delete!";
	}
?>