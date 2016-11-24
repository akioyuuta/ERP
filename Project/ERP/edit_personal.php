<?php include "connect.php";
	$id = $_POST['id'];
	$name = $_POST['name'];
	$type= $_POST['type'];
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

	if($query = mysqli_query($con, "UPDATE customer SET name='".$name."', type='".$type."', company=".$company.", address1='".$address1."', address2='".$address2."', city='".$city."',zip='".$zip."', country='".$country."', website='".$website."', job_position='".$job_position."', phone='".$phone."', mobile='".$mobile."', fax='".$fax."', email='".$email."', title='".$title."', notes='".$notes."' WHERE id = ".$id)){
		header('location:detail_customer.php?id='.$id);
	}else{
		echo "gagal"."<br/>";
	}
?>