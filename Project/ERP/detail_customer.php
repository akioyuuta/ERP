<?php 
	include "connect.php";
	$page_name = "Customer";
	$id = $_GET['id'];
	$customer = mysqli_query($con,"SELECT * FROM customer WHERE id = ".$id);
	$row_customer = mysqli_fetch_assoc($customer);
	$address = mysqli_query($con,"SELECT * FROM address WHERE customer_id = ".$id);
	$row_address = mysqli_fetch_assoc($address);
	$bank = mysqli_query($con,"SELECT * FROM bank_account ba JOIN bank b ON(ba.bank = b.id) WHERE ba.account_holder = ".$id);
	$credit = mysqli_query($con,"SELECT * FROM credit_card WHERE partner = ".$id);

?>
<?php include "header.php"; ?>

	<?php include "nav.php"; ?>

	<div class="content">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li><a href="customer.php"><i class="fa fa-user"></i> Customer</a></li>
					<li class="active"><i class="fa fa-address-card"></i> Customer Detail</li>
				</ol>
			</div>
		</div>
		<div class="card" style="z-index: 5">
			<div class="header">
			    <h4 class="title"> Personal Details </h4>
			    <p class="category">Customer's details</p>
			</div>
			<div class="content">
				<form action="" method="POST">
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<label for="name">Name :</label>
								<input type="text" name="name" value="<?php echo $row_customer['name'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="type">Type :</label>
								<input type="text" name="type" value="<?php echo $row_customer['type'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="company">Company :</label>
								<input type="text" name="company" value="<?php echo $row_customer['company'];?>" class="form-control border-input">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<label for="address1">Address1 :</label>
								<input type="text" name="address1" value="<?php echo $row_customer['address1'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="address2">Address2 :</label>
								<input type="text" name="address2" value="<?php echo $row_customer['address2'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="city">City :</label>
								<input type="text" name="city" value="<?php echo $row_customer['city'];?>" class="form-control border-input">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<label for="zip">Zip :</label>
								<input type="text" name="zip" value="<?php echo $row_customer['zip'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="country">Country :</label>
								<input type="text" name="country" value="<?php echo $row_customer['country'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="website">Website :</label>
								<input type="text" name="website" value="<?php echo $row_customer['website'];?>" class="form-control border-input">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<label for="job_position">Job Position :</label>
								<input type="text" name="job_position" value="<?php echo $row_customer['job_position'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="phone">Phone :</label>
								<input type="text" name="phone" value="<?php echo $row_customer['phone'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="mpbile">Mobile :</label>
								<input type="text" name="mobile" value="<?php echo $row_customer['mobile'];?>" class="form-control border-input">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<label for="fax">Fax :</label>
								<input type="text" name="fax" value="<?php echo $row_customer['fax'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="email">Email :</label>
								<input type="text" name="email" value="<?php echo $row_customer['email'];?>" class="form-control border-input">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label for="title">Title :</label>
								<input type="text" name="title" value="<?php echo $row_customer['title'];?>" class="form-control border-input">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="notes">Notes :</label>
								<textarea name="notes" value="<?php echo $row_customer['notes'];?>" class="form-control border-input"></textarea>
							</div>
						</div>
						<div class="col-xs-12">
							<div id="pojok">
							<button type="submit" class="btn btn-success" name="submit">Save</button>
							<button type="reset" class="btn btn-danger">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
			 	<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#address" aria-controls="address" role="tab" data-toggle="tab">Address</a></li>
					<li role="presentation"><a href="#bank" aria-controls="bank" role="tab" data-toggle="tab">Bank</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="address">
						<div class="card" style="z-index: 5">
							<div class="header">
							    <h4 class="title"> Address </h4>
							    <p class="category">Customer's addresses</p>
							</div>
							<div class="content">
								<form action="" method="POST">
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="street1">Street1 :</label>
												<input type="text" class="form-control" name="street1" value="<?php echo $row_address['street1'];?>">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="street1">Street2 :</label>
												<input type="text" class="form-control" name="street2" value="<?php echo $row_address['street2'];?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="city">city :</label>
												<input type="text" class="form-control" name="city" value="<?php echo $row_address['city'];?>">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="zip">Zip :</label>
												<input type="text" class="form-control" name="zip" value="<?php echo $row_address['zip'];?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="country">Country :</label>
												<input type="text" class="form-control" name="country" value="<?php echo $row_address['country'];?>">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="contact_name">Contact Name :</label>
												<input type="text" class="form-control" name="contact_name" value="<?php echo $row_address['contact_name'];?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="email">Email :</label>
												<input type="text" class="form-control" name="email" value="<?php echo $row_address['email'];?>">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="type_of_address">Type of Address :</label>
												<input type="text" class="form-control" name="type_of_address" value="<?php echo $row_address['type_of_address'];?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="mobile">Mobile :</label>
												<input type="text" class="form-control" name="mobile" value="<?php echo $row_address['mobile'];?>">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="phone">Phone :</label>
												<input type="text" class="form-control" name="phone" value="<?php echo $row_address['phone'];?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="notes">Notes :</label>
												<textarea name="notes" class="form-control" value="<?php echo $row_address['notes'];?>"></textarea>
											</div>
										</div>
										<div class="col-xs-6">
											<div id="pojok_address">
											<button type="submit" class="btn btn-success" name="submit_address">Save</button>
											<button type="reset" class="btn btn-danger">Cancel</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="bank">
						<div class="card" style="z-index: 5">
							<div class="header">
							    <h4 class="title"> Bank </h4>
							    <p class="category">Customer's bank account</p>
							</div>
							<div class="content">
								<table class="table">
									<thead>
										<tr>
											<td>Account Number</td>
											<td>Bank Name</td>
										</tr>
									</thead>
									<tbody>
										<?php while($row_bank = mysqli_fetch_assoc($bank)){?>
										<tr>
											<td><?php echo $row_bank['account_number'];?></td>
											<td><?php echo $row_bank['bank_name'];?></td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include "footer.php"; ?>
