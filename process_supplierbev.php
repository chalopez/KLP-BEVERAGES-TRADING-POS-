<?php
include('connection.php');
if(isset($_POST['save'])) {
	
	$name = $_POST['supname'];
	$address = $_POST['supadd'];
	$number = $_POST['supnum'];
	
    $mysqli->query("INSERT INTO supplier (supname, supadd, supnum) 
	VALUES('$name', '$address', '$number')")
		or die($mysqli->error); 
	
	
	header("location: supplier2.php");
	  }
?>