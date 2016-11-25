	<?php 
	include "connect.php";
	$page_name = "Product";
	$query = mysqli_query($con,"SELECT * FROM product");
	?>
	<?php include "header.php"; ?>

	<?php include "nav.php"; ?>

	<div class="content">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li class="active"><i class="fa fa-cart-arrow-down"></i> Product</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6">
				<a href="add_product.php" class="btn btn-default"><i class="fa fa-plus"></i> Add Product</a>
				<button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export CSV</button>
				<hr>
			</div>
			<div class="col-xs-2">
				<a href="product.php">
					<div class="btn text-right active">
						<i class="fa fa-th-large"></i> 
					</div>
				</a>
				<a href="product-table.php">
					<div class="btn text-right">
						<i class="fa fa-th-list	"></i> 
					</div>
				</a>
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
		<div  id="satu" name= "satu">
			
		</div>
			
		</div>	
		<script>
			$(document).ready(function(){
				showdata();
				$("#search").keyup(function(){
					var key1 = $("#search").val();
					$.ajax({
						url: "productcardlist.php",
						type : "POST",
						data:
						{
							key : key1
						},
						dataType: "html",
						success: function(result){
							
							$("#satu").html(result);
						}
					});
				});
			});
			function showdata()
			{
				var key1 = $("#search").val();
				$.ajax({
					url: "productcardlist.php",
					type : "POST",
					data:
					{
						key : key1
					},
					dataType: "html",
					success: function(result){
						console.log(result);
						$("#satu").html(result);
					}
				});
			};
</script>

<?php include "footer.php"; ?>