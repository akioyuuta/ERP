<?php include "connect.php";
	$id = $_POST['id'];
	$customer = $_POST['customer'];
	if($query = mysqli_query($con,"DELETE FROM address WHERE id=".$id)){
		$address = mysqli_query($con,"SELECT * FROM address WHERE customer_id = ".$customer);?>
		<div class="card" style="z-index: 5">
			<div class="header">
				<div class="col-xs-8">
				    <h4 class="title"> Address </h4>
				    <p class="category">Customer's addresses</p>
			    </div>
			    <div class="col-xs-2">
			    	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAddress"><i class="fa fa-plus"></i> Add New Address</a>
			    </div>
			    <div class="col-xs-10">
			    	<div class="alert alert-dismissible alert-success">
						<strong>Success!</strong>
						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
			    </div>
			</div>
			<div class="content">
				<table class="table">
					<thead>
						<tr>
							<td>Contact Name</td>
							<td>City</td>
							<td>Country</td>
							<td>Email</td>
							<td>Tools</td>
						</tr>
					</thead>
					<tbody>
						<?php while($row_address = mysqli_fetch_assoc($address)){?>
						<tr>
							<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['contact_name'];?></td>
							<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['city'];?></td>
							<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['country'];?></td>
							<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['email'];?></td>
							<td><button class="btn btn-danger" type="button" onclick="deleteAddressFunction(<?php echo $row_address['id'];?>)"><i class="fa fa-close"></i></button></td>
						</tr>
						<?php	}?>
					</tbody>
				</table>
			</div>
		</div>
<?php }else{
	$address = mysqli_query($con,"SELECT * FROM address WHERE customer_id = ".$customer);?>
		<div class="card" style="z-index: 5">
			<div class="header">
				<div class="col-xs-8">
				    <h4 class="title"> Address </h4>
				    <p class="category">Customer's addresses</p>
			    </div>
			    <div class="col-xs-2">
			    	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAddress"><i class="fa fa-plus"></i> Add New Address</a>
			    </div>
			    <div class="col-xs-10">
			    	<div class="alert alert-dismissible alert-danger">
						<strong>Failed to delete data!</strong>
						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
			    </div>
			</div>
			<div class="content">
				<table class="table">
					<thead>
						<tr>
							<td>Contact Name</td>
							<td>City</td>
							<td>Country</td>
							<td>Email</td>
							<td>Tools</td>
						</tr>
					</thead>
					<tbody>
						<?php while($row_address = mysqli_fetch_assoc($address)){?>
						<tr>
							<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['contact_name'];?></td>
							<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['city'];?></td>
							<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['country'];?></td>
							<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['email'];?></td>
							<td><button class="btn btn-danger" type="button" onclick="deleteAddressFunction(<?php echo $row_address['id'];?>)"><i class="fa fa-close"></i></button></td>
						</tr>
						<?php	}?>
					</tbody>
				</table>
			</div>
		</div>
<?php	}
?>