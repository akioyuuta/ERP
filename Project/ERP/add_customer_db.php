<?php session_start();
	include "connect.php";
	$name = $_POST['name'];
	$type = $_POST['type'];
	$company = $_POST['company'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$country = $_POST['country'];
	$website = $_POST['website'];
	$job_position = $_POST['job_position'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$fax = $_POST['fax'];
	$email = $_POST['email'];
	$title = $_POST['title'];
	$notes = $_POST['notes'];
	if($query = mysqli_query($con,"INSERT INTO customer VALUES('','$name','$type',$company,'$address1','$address2','$city','$zip','$country','$website','$job_position','$phone','$mobile','$fax','$email','$title','$notes')")){
		$_SESSION['alert']['msg'] = "Success!";
		$_SESSION['alert']['color'] = "success";
		
	}else{
		$_SESSION['alert']['msg'] = "Failed to create new customer!";
		$_SESSION['alert']['color'] = "danger";
	}
	header('location:customer.php');
?>