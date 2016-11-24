<?php session_start();
	include "connect.php";
	$page_name = "Customer";
	$query = mysqli_query($con,"SELECT * FROM customer");
?>
<?php include "header.php"; ?>
	<script type="text/javascript">
		function searchFunction(){
			var key = document.getElementById('search').value;
			$.post('search_customer.php',{key:key},function(data){
				$('#search_result').html(data);
			});
		}
	</script>
	<?php include "nav.php"; ?>

	<div class="content">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li class="active"><i class="fa fa-user"></i> Customer</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8">
				<a href="add_customer.php" class="btn btn-default"><i class="fa fa-plus"></i> Add Customer</a>
				<a class="btn btn-success" href="download_customer_csv.php"><i class="fa fa-file-excel-o"></i> Export CSV</a>
				<hr>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<input type="text" name="search" id="search" class="form-control" placeholder="Search" onkeyup="searchFunction()">
					<span class="input-group-btn">
						<button class="btn btn-default"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</div>
		</div>
		<?php if(isset($_SESSION['alert'])){?>
		<div class="row">
			<div class="col-xs-12">
		    	<div class="alert alert-dismissible alert-<?php echo $_SESSION['alert']['color'];?>">
					<strong><?php echo $_SESSION['alert']['msg'];?></strong>
					<button type="button" class="close" data-dismiss="alert">&times;</button>
				</div>
		    </div>
		</div>
		<?php unset($_SESSION['alert']);}?>
		<div class="row">
			<div class="col-xs-12" id="search_result">
			
			<?php while($row = mysqli_fetch_assoc($query)){?>
				<div class="container floatable" onclick=location.href="detail_customer.php?id=<?php echo $row['id'];?>";>
					<div class="col-sm-3 col-xs-4"><i class="fa fa-user fa-5x"></i></div>
					<div class="col-sm-9 col-xs-8">
						<strong><?php echo $row['name']."<br/>";?></strong>
						<?php echo $row['city'].", ".$row['country']."<br/>";?>
						<?php echo $row['email']."<br/>";?>
					</div>
				</div>
			<?php }?>

			</div>
		</div>
	</div>

<?php include "footer.php"; ?>