<?php 

$page_name = "Add Sales";

?>
<?php include "header.php"; ?>

	<?php include "nav.php"; ?>

<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="sales.php"><i class="fa fa-money"></i> Sales</a></li>
				<li class="active"><i class="fa fa-plus"></i> Add Sales</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="card" style="z-index: 5">
				<div class="header">
                    <h4 class="title"> Sales Information </h4>
                    <p class="category">Status : <span class="label label-danger">Not Validate</span></p>
                </div>
				<div class="content">
					<form action="" method="POST">
						<h3>Code : S0001</h3>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="customer">Customer : </label>
									<select name="customer" id="customer" class="form-control border-input">
										<option value="1">Customer 1</option>
										<option value="2">Customer 2</option>
										<option value="3">Customer 3</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="type">Type of Payment : </label>
									<select name="type" id="type" class="form-control border-input">
										<option value="cash">Cash</option>
										<option value="credit">Credit</option>
										<option value="dp">Down Payment (DP)</option>
									</select>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="exp">Expiration Date : </label>
									<div class="bfh-datepicker"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="text-right">
									<br>
									<button class="btn btn-default" type="submit" name="submit"><i class="fa fa-paper-plane-o"></i>Send Quotation</button>
									<button class="btn btn-success" type="submit" name="submit"><i class="fa fa-plus"></i> Confirm Sales Order</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="card">
				<div class="header">
					<h4 class="title">Product</h4>
					<p class="category">Product that Sold</p>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-xs-3">
							<select name="product" id="product" class="form-control border-input">
								<option value="1">Product A</option>
								<option value="2">Product B</option>
								<option value="3">Product C</option>
							</select>
						</div>
						<div class="col-xs-3">
							<input type="text" class="bfh-number form-control border-input" value="5">
						</div>
						<div class="col-xs-1">
							<button class="btn btn-default"><i class="fa fa-plus"></i></button>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<br>
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="5%">#</th>
										<th width="35%">Name</th>
										<th width="30%">Price</th>
										<th width="15%">Qty</th>
										<th width="15%">Action</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="card">
				<div class="header">
					<h4 class="title">Notes</h4>
					<p class="category">Internal Note For This Sales</p>
				</div>
				<div class="content">
					<form action="" method="POST">
						<label for="note">Note : </label>
						<textarea name="note" id="note" cols="30" rows="10" class="form-control border-input"></textarea>
						<div class="row">
							<div class="col-xs-12">
								<div class="text-right">
									<br>
									<button type="submit" class="btn btn-success" name="submit">Save Notes</button>
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