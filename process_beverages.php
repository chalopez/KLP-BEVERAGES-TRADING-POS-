<?php
include('connection.php');
session_start();
$supplierid = $_SESSION['suppid'];
if(isset($_POST['save'])) {
	  //$supplierid = $_POST['suppid'];
	  //echo $supplierid;
      $date = $_POST['date'];
	  $cat = $_POST['category'];
	  $prod = $_POST['product'];
      $quantity = $_POST['quantity'];
	  $price = $_POST['price'];
	  $price2 = $_POST['solo'];
	  $daterec =  date('Y-m-d H:i:s');
	  $mydate = date('Y-m-d');
	  $supplier = $_POST['suppname'];
	  $bo = $_POST['badorder'];
	  
	  $date = str_replace('/', '-', $date );
	  $myNewDate = date("Y-m-d", strtotime($date));
	  
	 
	  
	 
	 $result2 = $mysqli->query("SELECT
category.c_id,
category.unit
FROM
category
where category.c_id ='$cat' ")
		or die($mysqli->error);
		
	//----- e times ang case ug unit para mabal an ang per bottle
	$row1 = mysqli_fetch_assoc($result2);
	$piece=$row1['unit'];	
	$piecetot=$piece * $quantity;
	//echo $quantity;
	//echo $piece;
	//echo $piecetot;
	
	$result3 = $mysqli->query("SELECT * FROM supplier where supplier.supname ='$supplier' ")
		or die($mysqli->error);
	$row3 = mysqli_fetch_assoc($result3);
	$suppid=$row3['sup_id'];	
	
	$result5 = $mysqli->query("SELECT
beverages.b_id,
beverages.sup_id,
beverages.p_id,
beverages.c_id,
beverages.quantity
FROM
beverages
where beverages.p_id = $prod and beverages.c_id= $cat")
or die($mysqli->error);
	$row1 = mysqli_fetch_assoc($result5);
	echo $prodid=$row1['p_id'];	
	echo $categid=$row1['c_id'];	
	$qty=$row1['quantity'];	
	$updateqty = $quantity + $qty;

//$_SESSION["suppid"] = $suppid;

$duplicate=$mysqli->query("SELECT
beverages.b_id,
beverages.sup_id,
beverages.p_id,
beverages.c_id,
beverages.quantity
FROM
beverages
where beverages.p_id = $prod and beverages.c_id= $cat")or die($mysqli->error);
$count = mysqli_num_rows($duplicate);

if ($count>0){
	$mysqli->query("UPDATE beverages SET quantity='$updateqty' where p_id = $prodid and c_id= $categid")
		or die($mysqli->error);
		$mysqli->query("INSERT INTO supplierstock (sup_id, p_id, c_id, quantity, price_case, price_solo, date_rec, date_exp, d_date, piece, badorder) 
	VALUES('$supplierid','$prod', '$cat', '$quantity', '$price', '$price2', '$daterec', '$myNewDate', '$mydate', '$piecetot', '$bo')")
		or die($mysqli->error);
		header("location: beverages.php");
}
else{
$mysqli->query("INSERT INTO beverages (sup_id, p_id, c_id, quantity, price_case, price_solo, date_rec, date_exp, d_date, piece, badorder) 
	VALUES('$supplierid','$prod', '$cat', '$quantity', '$price', '$price2', '$daterec', '$myNewDate', '$mydate', '$piecetot', '$bo')")
		or die($mysqli->error);
		
	$mysqli->query("INSERT INTO supplierstock(sup_id, p_id, c_id, quantity, price_case, price_solo, date_rec, date_exp, d_date, piece, badorder) 
	VALUES('$supplierid','$prod', '$cat', '$quantity', '$price', '$price2', '$daterec', '$myNewDate', '$mydate', '$piecetot', '$bo')")
		or die($mysqli->error);
		
	header("location: beverages.php");
}
  //header("location: beverages.php");
}
?>

