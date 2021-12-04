<?php
include 'connection.php';
session_start();
	echo $idsupp = $_GET['stockin'];
	$result2 = $mysqli->query("SELECT * FROM supplier where sup_id =$idsupp") or die ($mysqli->error);
		while ($row2 = $result2->fetch_assoc()):
		$suppid = $row2['sup_id'];
		endwhile;
	$_SESSION['suppid'] = $suppid;
	//$idbev = $_SESSION['suppid'];
	//echo $idbev;
	echo "-";
	echo $_SESSION['suppid'];
header("location: beverages.php");
?>

