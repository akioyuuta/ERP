<?php 
	$key = $_POST['key'];
	//$key ="a";
	include "connect.php";

	// echo "SELECT p.id, p.product_name , p.category , p.barcode, p.qty_on_hand, pc.category FROM product p join prodict_category pc on p.category= pc.id where p.id like '%".$key."%'' OR p.product_name like '%".$key."%'";

	$query = mysqli_query($con,"SELECT p.id as pid, p.product_name , p.category as category, p.barcode, p.qty_on_hand, pc.category as pcc FROM product p join prodict_category pc on p.category= pc.id where p.id like '%".$key."%' OR p.product_name like '%".$key."%' OR pc.category like '%".$key."%' OR p.barcode like '%".$key."%' OR p.qty_on_hand like '%".$key."%'");?>
<!-- 
	$query = mysqli_query($con,"SELECT * FROM product where id like '%".$key."%' OR product_name like '%".$key."%'");?> -->
	<div class="row">
			<?php while($row = mysqli_fetch_assoc($query)){
				?>

				<div class="col-xs-12 col-md-4">
					<div class="card " style="height:110px; cursor:pointer; " onclick=location.href="product_detail.php?id=<?php echo $row['pid'];?>";>
						<div class="header text-center">
							<b><?php echo $row['pcc']; ?> : <?php echo $row['product_name']; ?></b>	<br><br>
						</div> <hr style="margin:1px">
						<div class="content text-center">
							<i class="fa fa-cart-arrow-down"></i><?php echo $row['qty_on_hand']; ?>
							&nbsp &nbsp &nbsp 
							<i class="fa fa-barcode"></i><?php echo $row['barcode']; ?>	
						</div>
					</div>	
				</div>
				<?php }?>	
			</div>

