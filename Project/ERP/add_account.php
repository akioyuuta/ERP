<?php session_start();
	include "connect.php";
	$_SESSION['place'] = "bank";
	$id = $_POST['id'];
	$account = $_POST['account_number'];
	$bank = $_POST['bank'];
	if($query = mysqli_query($con,"INSERT INTO bank_account SET account_holder = ".$id.", account_number = '".$account."', bank = ".$bank)){
		header('location:detail_customer.php?id='.$id);
	}else{
		echo "gagal";
	}
?>