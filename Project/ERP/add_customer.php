<?php $page_name = "Customer";?>
<?php include "header.php"; ?>

	<?php include "nav.php"; ?>

<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="customer.php"><i class="fa fa-user"></i> Customer</a></li>
				<li class="active"><i class="fa fa-plus"></i> Add Customer</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="card" style="z-index: 5">
				<div class="header">
				    <h4 class="title"> Personal Details </h4>
				    <p class="category">Customer's details</p>
				</div>
				<div class="content">
					<form action="add_customer_db.php" method="POST">
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="name">Name :</label>
									<input type="text" name="name" class="form-control border-input" required>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="type">Type :</label>
									<input type="text" name="type" class="form-control border-input">
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="company">Company :</label>
									<input type="number" name="company" class="form-control border-input" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="address1">Address1 :</label>
									<input type="text" name="address1" class="form-control border-input" required>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="address2">Address2 :</label>
									<input type="text" name="address2" class="form-control border-input">
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="city">City :</label>
									<input type="text" name="city" class="form-control border-input" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="zip">Zip :</label>
									<input type="text" name="zip" class="form-control border-input">
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="country">Country :</label>
									<input type="text" name="country" class="form-control border-input">
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="website">Website :</label>
									<input type="text" name="website" class="form-control border-input">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="job_position">Job Position :</label>
									<input type="text" name="job_position" class="form-control border-input">
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="phone">Phone :</label>
									<input type="text" name="phone" class="form-control border-input">
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="mpbile">Mobile :</label>
									<input type="text" name="mobile" class="form-control border-input">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="fax">Fax :</label>
									<input type="text" name="fax" class="form-control border-input">
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="email">Email :</label>
									<input type="text" name="email" class="form-control border-input" required>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="title">Title :</label>
									<input type="text" name="title" class="form-control border-input">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="notes">Notes :</label>
									<textarea name="notes" class="form-control border-input"></textarea>
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
		</div>
	</div>
</div>
<?php include "footer.php"; ?>