<?php include "connect.php";
	$key = $_POST['key'];
	$query = mysqli_query($con , "SELECT * FROM customer WHERE name LIKE '%".$key."%' OR city LIKE '%".$key."%' OR country LIKE '%".$key."%' OR email LIKE '%".$key."%'");
	while($row = mysqli_fetch_assoc($query)){?>
		<div class="container floatable" onclick=location.href="detail_customer.php?id=<?php echo $row['id'];?>";>
			<div class="col-sm-3 col-xs-4"><i class="fa fa-user fa-5x"></i></div>
			<div class="col-sm-9 col-xs-8">
				<strong><?php echo $row['name']."<br/>";?></strong>
				<?php echo $row['city'].", ".$row['country']."<br/>";?>
				<?php echo $row['email']."<br/>";?>
			</div>
		</div>
	<?php }?>