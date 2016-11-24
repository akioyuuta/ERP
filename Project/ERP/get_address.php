<?php include "connect.php";
	$id = $_POST['id'];
	$query = mysqli_query($con,"SELECT * FROM address WHERE id = ".$id);
	$row = mysqli_fetch_assoc($query);
?>

<form action="edit_address.php" method="POST">
	<input type="text" name="id" value="<?php echo $row['customer_id'];?>" hidden>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="street1">Street1 :</label>
				<input type="text" class="form-control" name="street1" value="<?php echo $row['street1']?>">
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label for="street1">Street2 :</label>
				<input type="text" class="form-control" name="street2" value="<?php echo $row['street2']?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="city">city :</label>
				<input type="text" class="form-control" name="city" value="<?php echo $row['city']?>">
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label for="zip">Zip :</label>
				<input type="text" class="form-control" name="zip" value="<?php echo $row['zip']?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="country">Country :</label>
				<input type="text" class="form-control" name="country" value="<?php echo $row['country']?>">
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label for="contact_name">Contact Name :</label>
				<input type="text" class="form-control" name="contact_name" value="<?php echo $row['contact_name']?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="email">Email :</label>
				<input type="text" class="form-control" name="email" value="<?php echo $row['email']?>">
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label for="type_of_address">Type of Address :</label>
				<input type="text" class="form-control" name="type_of_address" value="<?php echo $row['type_of_address']?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="mobile">Mobile :</label>
				<input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']?>">
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label for="phone">Phone :</label>
				<input type="text" class="form-control" name="phone" value="<?php echo $row['phone']?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="notes">Notes :</label>
				<textarea name="notes" class="form-control"><?php echo $row['notes'];?></textarea>
			</div>
		</div>
		<div class="col-xs-6">
			<div id="pojok_address">
			<button type="submit" class="btn btn-success" name="submit_address_edit">Save</button>
			<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</form>