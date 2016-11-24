<?php session_start();
	include "connect.php";
	$page_name = "Customer";
	$id = $_GET['id'];
	$customer = mysqli_query($con,"SELECT * FROM customer WHERE id = ".$id);
	$row_customer = mysqli_fetch_assoc($customer);
	$address = mysqli_query($con,"SELECT * FROM address WHERE customer_id = ".$id);
	$bank = mysqli_query($con,"SELECT ba.id as id, ba.account_holder, ba.account_number, b.id as b_id, b.bank_name FROM bank_account ba JOIN bank b ON(ba.bank = b.id) WHERE ba.account_holder = ".$id);
	$b = mysqli_query($con,"SELECT * FROM bank");
	$credit = mysqli_query($con,"SELECT * FROM credit_card WHERE partner = ".$id);
	$sales = mysqli_query($con,"SELECT * FROM sales_order WHERE customer_id = ".$id);
?>
<?php include "header.php"; ?>
	<script type="text/javascript">
		function delFunction(id,id_customer){
			$.post( "delete_bank_account.php", {  id: id,customer: id_customer}, function( data ) {
				$( "#bank" ).html( data );
			});
		}
		function delCreditFunction(id,id_customer){
			$.post("delete_credit_card.php",{ id: id, customer : id_customer},function(data){
				$( "#credit" ).html( data );
			});
		}
		function showFunction(id){
			$.post("get_address.php",{id:id},function(data){
				$("#edit_address").html(data);
			});
			$("#myModalEditAddress").modal("show");
		}
		function deleteAddressFunction(id,id_customer){
			$.post("delete_address.php",{id:id,customer:id_customer},function(data){
				$("#address").html(data);
			});
		}
		function showSalesFunction(id){
			$.post("getSales.php",{id : id},function(data){
				$("#show_sales").html(data);
			});
			$("#myModalSales").modal("show");
		}
	</script>
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
		<div class="row">
			<div class="col-xs-12">
			 	<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li id="tab-personal" role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Personal</a></li>
					<li id="tab-address" role="presentation"><a href="#address" aria-controls="address" role="tab" data-toggle="tab">Address</a></li>
					<li id="tab-bank" role="presentation"><a href="#bank" aria-controls="bank" role="tab" data-toggle="tab">Bank</a></li>
					<li  id="tab-credit" role="presentation"><a href="#credit" aria-controls="credit" role="tab" data-toggle="tab">Credit Card</a></li>
					<li id="tab-sales" role="presentation"><a href="#salesorder" aria-controls="salesorder" role="tab" data-toggle="tab">Sales Order</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="personal">
						<div class="card" style="z-index: 5">
							<div class="header">
							    <h4 class="title"> Personal Details </h4>
							    <p class="category">Customer's details</p>
							</div>
							<div class="content">
								<form action="edit_personal.php" method="POST">
									<div class="row">
										<div class="col-xs-4">
											<div class="form-group">
												<label for="name">Name :</label>
												<input type="text" name="id" value="<?php echo $row_customer['id'];?>" hidden>
												<input type="text" name="name" value="<?php echo $row_customer['name'];?>" class="form-control border-input" required>
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
												<input type="number" name="company" value="<?php echo $row_customer['company'];?>" class="form-control border-input" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-4">
											<div class="form-group">
												<label for="address1">Address1 :</label>
												<input type="text" name="address1" value="<?php echo $row_customer['address1'];?>" class="form-control border-input" required>
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
												<input type="text" name="city" value="<?php echo $row_customer['city'];?>" class="form-control border-input" required>
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
												<input type="text" name="email" value="<?php echo $row_customer['email'];?>" class="form-control border-input" required>
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
												<textarea name="notes" class="form-control border-input"><?php echo $row_customer['notes'];?></textarea>
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
					</div>	<!-- SUDAH LENGKAP -->
					<div role="tabpanel" class="tab-pane" id="address">
						<div class="card" style="z-index: 5">
							<div class="header">
								<div class="col-xs-8">
								    <h4 class="title"> Address </h4>
								    <p class="category">Customer's addresses</p>
							    </div>
							    <div class="col-xs-2">
							    	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAddress"><i class="fa fa-plus"></i> Add New Address</a>
							    </div>
							</div>
							<div class="content"><br/>
								<table class="table">
									<thead>
										<tr>
											<td>Contact Name</td>
											<td>City</td>
											<td>Country</td>
											<td>Email</td>
											<td>Tools</td>
										</tr>
									</thead>
									<tbody>
										<?php while($row_address = mysqli_fetch_assoc($address)){?>
										<tr style="cursor:pointer;">
											<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['contact_name'];?></td>
											<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['city'];?></td>
											<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['country'];?></td>
											<td onclick="showFunction(<?php echo $row_address['id'];?>)"><?php echo $row_address['email'];?></td>
											<td><button class="btn btn-danger" type="button" onclick="deleteAddressFunction(<?php echo $row_address['id'];?>,<?php echo $row_customer['id'];?>)"><i class="fa fa-close"></i></button></td>
										</tr>
										<?php	}?>
									</tbody>
								</table>
							</div>
						</div>
					</div>	<!-- SUDAH LENGKAP -->
					<div role="tabpanel" class="tab-pane" id="bank">
						<div class="card" style="z-index: 5">
							<div class="header">
								<div class="col-xs-10">
							    	<h4 class="title"> Bank </h4>
							    	<p class="category">Customer's bank account</p>
							    </div>
							    <div class="col-xs-2">
							    	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Account</a>
							    </div>
							</div>
							<div class="content"><br/>
								<table class="table">
									<thead>
										<tr>
											<td>Account Number</td>
											<td>Bank Name</td>
											<td>Tools</td>
										</tr>
									</thead>
									<tbody>
										<?php while($row_bank = mysqli_fetch_assoc($bank)){?>
										<tr>
											<td><?php echo $row_bank['account_number'];?></td>
											<td><?php echo $row_bank['bank_name'];?></td>
											<td><button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row_bank['id'];?>,<?php echo $row_customer['id']?>)"><i class="fa fa-close"></i></button></td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>	<!-- SUDAH LENGKAP -->
					<div role="tabpanel" class="tab-pane" id="credit">
						<div class="card" style="z-index: 5">
							<div class="header">
							    <div class="col-xs-10">
							    	<h4 class="title"> Credit Cards </h4>
							    	<p class="category">Customer's credit cards</p>
							    </div>
							    <div class="col-xs-2">
							    	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalCredit"><i class="fa fa-plus"></i> Add Credit Card</a>
							    </div>
							</div>
							<div class="content"><br/>
							<table class="table">
								<thead>
									<tr>
										<td>Name</td>
										<td>Acquirer Account</td>
										<td>Acquirer Ref</td>
										<td>Tools</td>
									</tr>
								</thead>
								<tbody>
									<?php while($row_credit = mysqli_fetch_assoc($credit)){?>
									<tr>
										<td><?php echo $row_credit['name'];?></td>
										<td><?php echo $row_credit['acquirer_account'];?></td>
										<td><?php echo $row_credit['acquirer_ref'];?></td>
										<td><button type="button" class="btn btn-danger" onclick="delCreditFunction(<?php echo $row_credit['id'];?>,<?php echo $row_customer['id']?>)"><i class="fa fa-close"></i></button></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
							</div>
						</div>
					</div>	<!-- SUDAH LENGKAP -->
					<div role="tabpanel" class="tab-pane" id="salesorder">
						<div class="card" style="z-index: 5">
							<div class="header">
								<div class="col-xs-8">
								    <h4 class="title"> Sales Order </h4>
								    <p class="category">Customer's sales history</p>
							    </div>
							</div>
							<div class="content">
							<br/>
								<table class="table">
									<thead>
										<tr>
											<td>Code Number</td>
											<td>Order Date</td>
											<td>Payment Term</td>
											<td>Status</td>
										</tr>
									</thead>
									<tbody>
									<?php while($row_sales = mysqli_fetch_assoc($sales)){?>
										<tr onclick="showSalesFunction(<?php echo $row_sales['id'];?>)" style="cursor:pointer;">
											<td><?php echo $row_sales['code_number'];?></td>
											<td><?php echo $row_sales['order_date'];?></td>
											<td><?php echo $row_sales['payment_term'];?></td>
											<td><?php echo $row_sales['status'];?></td>
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

	<script type="text/javascript">
		<?php if(isset($_SESSION['place'])){?>
				$('#tab-personal').removeClass("active");
				$('#tab-<?php echo $_SESSION['place'];?>').addClass("active");
				$('#personal').removeClass("active");
				$('#<?php echo $_SESSION['place'];?>').addClass("fade active in");
				console.log('masuk');
		<?php unset($_SESSION['place']);}?>
	</script>

<?php include "footer.php"; ?>

<!-- MODAL -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add New Account</h4>
      </div>
      	<form action="add_account.php" method="POST">
      <div class="modal-body">
      	<input type="text" name="id" value="<?php echo $row_customer['id'];?>" hidden>
      	<div class="form-group">
        	<label for="account_number">Account Number: </label>
        	<input type="text" name="account_number" class="form-control" required>
        </div>
        <div class="form-group">
        	<label for="bank">Bank: </label>
        	<select name="bank" class="form-control">
        		<?php while($row_b = mysqli_fetch_assoc($b)){?>
        			<option value="<?php echo $row_b['id'];?>"><?php echo $row_b['bank_name'];?></option>
        		<?php }?>
        	</select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      	</form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModalCredit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add New Credit Card</h4>
      </div>
      	<form action="add_credit.php" method="POST">
      <div class="modal-body">
      	<input type="text" name="id" value="<?php echo $row_customer['id'];?>" hidden>
      	<div class="form-group">
        	<label for="name">Name: </label>
        	<input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
        	<label for="acquirer_account">Acquirer Account: </label>
        	<input type="text" name="acquirer_account" class="form-control" required>
        </div>
        <div class="form-group">
        	<label for="acquirer_ref">Acquirer Ref: </label>
        	<input type="text" name="acquirer_ref" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      	</form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModalAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add New Address</h4>
      </div>
		<div class="modal-body">
			<form action="add_address.php" method="POST">
				<input type="text" name="id" value="<?php echo $row_customer['id'];?>" hidden>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="street1">Street1 :</label>
							<input type="text" class="form-control" name="street1">
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="street1">Street2 :</label>
							<input type="text" class="form-control" name="street2">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="city">city :</label>
							<input type="text" class="form-control" name="city">
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="zip">Zip :</label>
							<input type="text" class="form-control" name="zip">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="country">Country :</label>
							<input type="text" class="form-control" name="country">
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="contact_name">Contact Name :</label>
							<input type="text" class="form-control" name="contact_name">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="email">Email :</label>
							<input type="text" class="form-control" name="email">
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="type_of_address">Type of Address :</label>
							<input type="text" class="form-control" name="type_of_address">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="mobile">Mobile :</label>
							<input type="text" class="form-control" name="mobile">
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="phone">Phone :</label>
							<input type="text" class="form-control" name="phone">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="notes">Notes :</label>
							<textarea name="notes" class="form-control"></textarea>
						</div>
					</div>
					<div class="col-xs-6">
						<div id="pojok_address">
						<button type="submit" class="btn btn-success" name="submit_address">Save</button>
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModalEditAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Add New Address</h4>
		</div>
		<div class="modal-body" id="edit_address">

		</div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModalSales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Sales Details</h4>
		</div>
		<div class="modal-body" id="show_sales">
		</div>
    </div>
  </div>
</div>