<?php
session_start();
include('connection.php');

if(isset($_POST['save'])) {
	$mopid = $_SESSION['mopid'] ;
	$cname = $_POST['cusname'];
	$ponum = $_POST['ponum'];
	$total = $_POST['gtotal'];
	$daterec =  date('Y-m-d');
	$stat = 1;
	$disc = $_POST['discount'];
	$discamount = $_POST['discamount'];
	
	$result5 = $mysqli->query("SELECT * FROM ordernum")
	or die($mysqli->error); 
	$row = mysqli_fetch_assoc($result5);
	$number=$row['ord_id'];
	$upnum = $number + 1;
	
	$result2 = $mysqli->query("SELECT
	customer.cus_id,
	customer.cus_name,
	customer.cus_add,
	customer.contact
	FROM
	customer where customer.cus_name ='$cname'")or die($mysqli->error);
	$row2 = mysqli_fetch_assoc($result2);
	$cusid=$row2['cus_id'];	
	
	
	$mysqli->query("INSERT INTO customersales (cus_id, order_id, pay_id, date, amount, discount, discamount, s_id) 
	VALUES('$cusid','$ponum', '$mopid', '$daterec', '$total', '$disc', '$discamount', '$stat')")
	or die($mysqli->error);
		
	$mysqli->query("UPDATE ordernum SET ord_id=$upnum")
	or die($mysqli->error);
	
	$mysqli->query("DELETE  FROM purchase")
	or die($mysqli->error);
	
header("location: purchase.php");
}

?>