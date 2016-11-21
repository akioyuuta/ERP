<?php 

$page_name = "Sales";

?>
<?php include "header.php"; ?>

	<?php include "nav.php"; ?>

<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active"><i class="fa fa-money"></i> Sales</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-8">
			<a href="add_sales.php" class="btn btn-default"><i class="fa fa-plus"></i> Add Sales Order</a>
			<button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export CSV</button>
			<hr>
		</div>
		<div class="col-xs-4">
			<div class="input-group">
				<input type="text" name="search" id="search" class="form-control" placeholder="Search">
				<span class="input-group-btn">
					<button class="btn btn-default"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Date</th>
						<th>Code Number</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<?php include "footer.php"; ?>