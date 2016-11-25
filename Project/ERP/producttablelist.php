<?php 
	$key = $_POST['key'];
	//$key ="a";
	include "connect.php";

	// echo "SELECT p.id, p.product_name , p.category , p.barcode, p.qty_on_hand, pc.category FROM product p join prodict_category pc on p.category= pc.id where p.id like '%".$key."%'' OR p.product_name like '%".$key."%'";

	$query = mysqli_query($con,"SELECT p.id as pid, p.product_name , p.category as category, p.barcode, p.qty_on_hand, pc.category as pcc FROM product p join prodict_category pc on p.category= pc.id where p.id like '%".$key."%' OR p.product_name like '%".$key."%' OR pc.category like '%".$key."%' OR p.barcode like '%".$key."%' OR p.qty_on_hand like '%".$key."%'");?>

<div class="col-md-11 col-offset-1">
			<div class="row card">
			<table class="table table-stripped table-hover">
			<thead style="background-color:wheat">
			<th><b>#</b></th>
			<th><b>Category</b></th>
			<th><b>Product Name</b></th>
			<th><b>Stock</b></th>
			<th><b>Barcode</b></th>
			</thead>
				<?php 
				$count=1;
				while($row = mysqli_fetch_assoc($query)){?>

						<tr onclick=location.href="product_detail.php?id=<?php echo $row['pid'];?>">
						<td><?php echo $count ; $count++ ?></td>
							<td><?php echo $row['pcc']; ?></td>
							<td> <?php echo $row['product_name']; ?></td>	
							<td><?php echo $row['qty_on_hand']; ?></td>
							<td><?php echo $row['barcode']; ?></td>
						</tr>	
					
			<?php }?>
				</table>
				</div>	
				</div>