<?php include "connect.php";
	$id = $_POST['id'];
	$query = mysqli_query($con,"SELECT * FROM sales_order WHERE id = ".$id);
	$row = mysqli_fetch_assoc($query);
?>

<form>
	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<label>Code Number</label><input type="text" value="<?php echo $row['code_number'];?>" readonly class="form-control">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label>Order Date</label><input type="text" value="<?php echo $row['order_date'];?>" readonly class="form-control">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label>Expire Date</label><input type="text" value="<?php echo $row['expire_date'];?>" readonly class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<label>Payment Term</label><input type="text" value="<?php echo $row['payment_term'];?>" readonly class="form-control">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label>Type Of Payment</label><input type="text" value="<?php echo $row['type_of_payment'];?>" readonly class="form-control">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label>Status</label><input type="text" value="<?php echo $row['status'];?>" readonly class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<label>Notes</label><textarea readonly class="form-control"><?php echo $row['note'];?></textarea>
			</div>
		</div>
	</div>
</form>