<?php
session_start();
include('connection.php');

if(isset($_POST['save'])) {
	$mopid = $_SESSION['mopid'] ;
	$cname = $_POST['cusname'];
	$ponum = $_POST['ponum'];
	$total = $_POST['gtotal'];
	$check = $_POST['checknum'];
	$bank = $_POST['bankname'];
	$amount = $_POST['checkamount'];
	$daterec =  date('Y-m-d');
	$stat = 2;
	$disc = 0;
	$discamount = 0;
	
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
	
	
	$mysqli->query("INSERT INTO customersales (cus_id, order_id, pay_id, date, amount, discount, discamount, s_id, checknum, check_date, bankname, check_amount) 
	VALUES('$cusid','$ponum', '$mopid', '$daterec', '$total', '$disc', '$discamount', '$stat', '$check', '$daterec', '$bank', '$amount')")
	or die($mysqli->error);
		
	$mysqli->query("UPDATE ordernum SET ord_id=$upnum")
	or die($mysqli->error);
	
	$mysqli->query("DELETE  FROM purchase")
	or die($mysqli->error);
	
header("location: purchase.php");
}

?>