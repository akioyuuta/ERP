<?php 
	include "connect.php";
	$id = $_POST['id'];
	$customer = $_POST['customer'];
	if($query = mysqli_query($con,"DELETE FROM credit_card WHERE id = ".$id)){
		$new = mysqli_query($con, "SELECT * FROM credit_card WHERE partner = ".$customer);?>
		<div class="card" style="z-index: 5">
			<div class="header">
			    <div class="col-xs-10">
			    	<h4 class="title"> Credit Cards </h4>
			    	<p class="category">Customer's credit cards</p>
			    </div>
			    <div class="col-xs-2">
			    	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalCredit"><i class="fa fa-plus"></i> Add Credit Card</a>
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
						<td>Name</td>
						<td>Acquirer Account</td>
						<td>Acquirer Ref</td>
						<td>Tools</td>
					</tr>
				</thead>
				<tbody>
					<?php while($row_credit = mysqli_fetch_assoc($new)){?>
					<tr>
						<td><?php echo $row_credit['name'];?></td>
						<td><?php echo $row_credit['acquirer_account'];?></td>
						<td><?php echo $row_credit['acquirer_ref'];?></td>
						<td><button type="button" class="btn btn-danger" onclick="delCreditFunction(<?php echo $row_credit['id'];?>,<?php echo $row_customer['id']?>)"><i class="fa fa-close"></i></button></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			</div>
		</div>
<?php	}else{ $new = mysqli_query($con, "SELECT * FROM credit_card WHERE partner = ".$customer);?>
		<div class="card" style="z-index: 5">
			<div class="header">
			    <div class="col-xs-10">
			    	<h4 class="title"> Credit Cards </h4>
			    	<p class="category">Customer's credit cards</p>
			    </div>
			    <div class="col-xs-2">
			    	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalCredit"><i class="fa fa-plus"></i> Add Credit Card</a>
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
						<td>Name</td>
						<td>Acquirer Account</td>
						<td>Acquirer Ref</td>
						<td>Tools</td>
					</tr>
				</thead>
				<tbody>
					<?php while($row_credit = mysqli_fetch_assoc($new)){?>
					<tr>
						<td><?php echo $row_credit['name'];?></td>
						<td><?php echo $row_credit['acquirer_account'];?></td>
						<td><?php echo $row_credit['acquirer_ref'];?></td>
						<td><button type="button" class="btn btn-danger" onclick="delCreditFunction(<?php echo $row_credit['id'];?>,<?php echo $row_customer['id']?>)"><i class="fa fa-close"></i></button></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			</div>
		</div>
<?php	}?>