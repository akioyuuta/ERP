<?php session_start();
	include "connect.php";
	$_SESSION['place'] = "address";
	$id = $_POST['id'];
	$street1 = $_POST['street1'];
	$street2 = $_POST['street2'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$country = $_POST['country'];
	$contact_name = $_POST['contact_name'];
	$email = $_POST['email'];
	$type_of_address = $_POST['type_of_address'];
	$mobile = $_POST['mobile'];
	$phone = $_POST['phone'];
	$notes = $_POST['notes'];

	if($query = mysqli_query($con,"UPDATE address SET street1='".$street1."',street2='".$street2."',city='".$city."',zip='".$zip."',country='".$country."',contact_name='".$contact_name."',email='".$email."',phone='".$phone."',mobile='".$mobile."',notes='".$notes."',type_of_address='".$type_of_address."', customer_id = ".$id)){
		header('location:detail_customer.php?id='.$id);
	}else{
		echo "gagal <br/>";
	}
?>