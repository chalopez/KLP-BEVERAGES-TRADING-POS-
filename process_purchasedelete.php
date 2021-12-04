<?php
include('connection.php');
//$gtotal= 0;
if(isset($_POST['purdel'])) {
	
	$mysqli->query("DELETE FROM purchase")
		or die($mysqli->error);
	header("location: purchase.php");
	 
  }

?>
