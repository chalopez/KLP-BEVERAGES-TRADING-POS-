<?php
session_start();
include('connection.php');
$name = '';
$update = false;
$id= 0;
	if(isset($_POST['save']))
	{
		$pname = $_POST['pname'];
		//$location = $_POST['location'];
				
		$mysqli->query("INSERT INTO product (p_name) VALUES('$pname')")
		or die($mysqli->error);
		
		$_SESSION['message'] = "Record has been saved!";
		$_SESSION['msg_type'] = "success";
		header("location: index2.php");
	}	
	
	if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		
		$mysqli->query("DELETE FROM product where p_id=$id")
		or die($mysqli->error);
		
		$_SESSION['message'] = "Record has been deleted!";
		$_SESSION['msg_type'] = "danger";
		header("location: index2.php");
	}
	
	if (isset($_GET['edit'])){
		$id = $_GET['edit'];
		$update = true;
		$mysqli->query("SELECT * FROM product where p_id=$id")
		or die($mysqli->error);
		
		if (count($result)==1){
			$row = $result->fetch_array();
			$name = $row['p_name'];
		}
		
		
	}
	if (isset($_POST['update'])){
		$id = $_POST['editid'];
		$name = $_POST['pname'];
	    $mysqli->query("UPDATE product SET p_name='$name' where p_id=$id")
		or die($mysqli->error);
		 
		$_SESSION['message'] = "Record has been updated!";
		$_SESSION['msg_type'] = "warning";
		header("location: index2.php");
		
	}
	?>
	
