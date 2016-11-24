<?php 
	include "connect.php";
	$id = $_POST['id'];
	$id_customer = $_POST['customer'];

	if($query = mysqli_query($con,"DELETE FROM bank_account WHERE id=".$id)){
		$new = mysqli_query($con,"SELECT ba.id as id, ba.account_holder, ba.account_number, b.id as b_id, b.bank_name FROM bank_account ba JOIN bank b ON(ba.bank = b.id) WHERE ba.account_holder = ".$id_customer);?>
		<div class="card" style="z-index: 5">
			<div class="header">
				<div class="col-xs-10">
			    	<h4 class="title"> Bank </h4>
			    	<p class="category">Customer's bank account</p>
			    </div>
			    <div class="col-xs-2">
			    	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Account</a>
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
							<td>Account Number</td>
							<td>Bank Name</td>
							<td>Tools</td>
						</tr>
					</thead>
					<tbody>
						<?php while($row_bank = mysqli_fetch_assoc($new)){?>
						<tr>
							<td><?php echo $row_bank['account_number'];?></td>
							<td><?php echo $row_bank['bank_name'];?></td>
							<td><button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row_bank['id'];?>,<?php echo $row_customer['id']?>)"><i class="fa fa-close"></i></button></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	<?php }else{ $new = mysqli_query($con,"SELECT ba.id as id, ba.account_holder, ba.account_number, b.id as b_id, b.bank_name FROM bank_account ba JOIN bank b ON(ba.bank = b.id) WHERE ba.account_holder = ".$id_customer);?>
		<div class="card" style="z-index: 5">
			<div class="header">
				<div class="col-xs-10">
			    	<h4 class="title"> Bank </h4>
			    	<p class="category">Customer's bank account</p>
			    </div>
			    <div class="col-xs-2">
			    	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Account</a>
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
							<td>Account Number</td>
							<td>Bank Name</td>
							<td>Tools</td>
						</tr>
					</thead>
					<tbody>
						<?php while($row_bank = mysqli_fetch_assoc($new)){?>
						<tr>
							<td><?php echo $row_bank['account_number'];?></td>
							<td><?php echo $row_bank['bank_name'];?></td>
							<td><button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row_bank['id'];?>,<?php echo $row_customer['id']?>)"><i class="fa fa-close"></i></button></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	<?php }
?>