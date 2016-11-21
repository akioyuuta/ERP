<?php include "header.php"; ?>


<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<div class="card">
				<div class="header">
                    <h2 class="title text-center"> Login </h2>
                    <hr>
                </div>
				<div class="content">
					<form action="" method="POST">
						<div class="form-group">
							<div class="input-group border-input">
								<span class="input-group-addon">
									<i class="fa fa-user"></i>
								</span>
								<input type="text" name="username" id="username" class="form-control border-input" placeholder="Username">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group border-input">
								<span class="input-group-addon">
									<i class="fa fa-key"></i>
								</span>
								<input type="password" name="password" id="password" class="form-control border-input" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block" type="submit" name="submit"><i class="fa fa-paper-plane-o"></i> Login </button>
						</div>
					</form>
				</div>
			</div>
	</div>
</div>


<?php include "footer.php"; ?>