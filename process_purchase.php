<?php
include('connection.php');
$gtotal= 0;
if(isset($_POST['save'])) {
	  //$number = 10;
	  //$number++;
	  //echo str_pad($number, 5, "0", STR_PAD_LEFT);
	  $ordernum = $_POST['ponum'];
      //echo $ordernum;
      $purchase = $_POST['purchase'];
	  $case = $_POST['case'];
	  //echo $purchase;
	  
	  //$date = str_replace('/', '-', $date );
	  $daterec =  date('Y-m-d');
	 
	$result = $mysqli->query("SELECT
beverages.price_case,
beverages.quantity
FROM
beverages
where beverages.b_id ='$purchase' ")
or die($mysqli->error); 
$row = mysqli_fetch_assoc($result);
$totprice=$row['price_case'];
$quantity=$row['quantity'];

//-----multiply case to price per case
$total= $totprice * $case;

//-----subtract case from purchase case
$totquant=$quantity-$case;

$result2 = $mysqli->query("SELECT
sum(purchase.total) as gtotal
FROM
purchase")
		or die($mysqli->error);
		
		
	$row1 = mysqli_fetch_assoc($result2);
	$gtotal=$row1['gtotal'];	
	echo $gtotal;

	$mysqli->query("INSERT INTO purchase (order_id, b_id, quant, total, p_date) 
	VALUES('$ordernum', '$purchase', '$case', '$total', '$daterec')")
		or die($mysqli->error);
		
	 $mysqli->query("INSERT INTO purchased (order_id, b_id, quant, total, p_date) 
	VALUES('$ordernum', '$purchase', '$case', '$total', '$daterec')")
		or die($mysqli->error); 
		
	$mysqli->query("UPDATE beverages SET quantity='$totquant' where b_id=$purchase")
		or die($mysqli->error);
	
	header("location: purchase.php");
	 
  }
  
  
if (isset($_GET['delete'])){
		$delid = $_GET['delete'];
		//-----giselect ang b_id para ang case mabalik ug add sa beverages
		$result3 = $mysqli->query("SELECT * FROM
purchase where pur_id=$delid")
		or die($mysqli->error);	
	$row3 = mysqli_fetch_assoc($result3);
	$upid=$row3['b_id'];
	$purcase=$row3['quant'];
	
	//-----eselect ang quantity sa beverages 
	$result4 = $mysqli->query("SELECT * FROM
beverages where b_id=$upid")
		or die($mysqli->error);	
	$row4 = mysqli_fetch_assoc($result4);
	$quantcase=$row4['quantity'];
	
	//-----e add ang remaining case sa beverages sa gi cancel nga case
	$addcase = $quantcase + $purcase;
	
		//-----eupdate na ang quantity sa beverages nga table after e cancel ang transaction
		$mysqli->query("UPDATE beverages SET quantity='$addcase' where b_id=$upid")
		or die($mysqli->error);
		
		//----- gidelete ang gipalit ddto sa purchase nga table ug sa purchased nga table
		$mysqli->query("DELETE FROM purchase where pur_id=$delid")
		or die($mysqli->error);
		
		$mysqli->query("DELETE FROM purchased where pur_id=$delid")
		or die($mysqli->error);
		
		$_SESSION['message'] = "Beverage has been Cancelled!";
		$_SESSION['msg_type'] = "danger";
		header("location: purchase.php");
	}
?>
