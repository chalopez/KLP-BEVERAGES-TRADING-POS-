<?php
session_start();

if(isset($_POST['purchased'])) {
	 $_SESSION['cusid'] = $_POST['customer'];
	 $_SESSION['mopid'] = $_POST['mop'];
	 $_SESSION['total'] = $_POST['gtotal'];
if ($_SESSION['mopid']==1){
	header("location: bayadformcash.php");
}
else{
	header("location: bayadformcheck.php");
}
	
}
?>
