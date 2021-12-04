<?php
include('connection.php');
if(isset($_POST['save'])) {
	
	$name = $_POST['custname'];
	$address = $_POST['custadd'];
	$number = $_POST['custnum'];
	
    $mysqli->query("INSERT INTO customer (cus_name, cus_add, contact) 
	VALUES('$name', '$address', '$number')")
		or die($mysqli->error); 
	
	
	header("location: customer.php");
	  }
?>