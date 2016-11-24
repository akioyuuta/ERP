<?php session_start();
	include "connect.php";
	$_SESSION['place'] = "credit";
	$id = $_POST['id'];
	$name = $_POST['name'];
	$ac_acc = $_POST['acquirer_account'];
	$ac_ref = $_POST['acquirer_ref'];

	if($query = mysqli_query($con,"INSERT INTO credit_card VALUES('','".$name."', ".$id.", '".$ac_acc."', '".$ac_ref."')")){
		header('location:detail_customer.php?id='.$id);
	}else{
		echo "gagal";
	}

?>