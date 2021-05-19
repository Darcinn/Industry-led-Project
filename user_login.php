<?php

session_start();

$currentPage = 'account';
if (isset($_SESSION['user_id'])) {
	include('includes/header_loggedin.php');
} else {
	header("Location: login.php");
}

?>
<div class="user-section bg-light">
	<div class="container">
		<?php
		echo "<div class=\"container\"><h1 class=\"text-center display-4\">Welcome {$_SESSION['first_name']} {$_SESSION['last_name']}</title></div>";
		?>
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<div class="alert fade show" role="alert">

					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Account: <?php if ($_SESSION['subscribed'] == "1") {
													echo "Subscribed";
												} else {
													echo "Free";
												} ?></th>

							</tr>
						</thead>
						<tfoot>

						</tfoot>
						<tbody>
							<div id="paypal-button-container">
								<script src="https://www.paypal.com/sdk/js?client-id=AcBQaqzIPTsCmX5vEbPzCN0NUM9QduuDoNmWrbYTRtTze59fxAxtVKNOImYXJ-2U6VTUty4xOb_4LM8e&currency=GBP" data-sdk-integration-source="button-factory"></script>
								<script>
									function paid() {
										location.replace("payment_successful.php");
									}

									paypal.Buttons({
											style: {
												color: "silver",
												shape: "pill",
											},
											createOrder: function(data, actions) {
												// Set up the transaction
												return actions.order.create({
													purchase_units: [{
														amount: {
															currency_code: "GBP",
															value: "99",
														},
														description: "Webflix Premium",
														custom_id: "4206969",
													}, ],
												});
											},
											onApprove: function(data, actions) {
												// Capture order after payment approved
												return actions.order.capture().then(function(details) {
													paid();
												});
											},
											onError: function(err) {
												errorText = err;
												error = true;
											},
										})
										.render("#paypal-button-container"); // Renders the PayPal button
								</script>


							</div>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="alert fade show" role="alert">

					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>User Details</th>

							</tr>
						</thead>
						<tbody>

							<tr>
								<td>First Name</td>
								<td><?php echo "{$_SESSION['first_name']}"; ?></td>
							</tr>
							<tv>
								<td>Last Name</td>
								<td><?php echo "{$_SESSION['last_name']}"; ?></td>
							</tv>
							<tr>
								<td>Email</td>
								<td><?php echo "{$_SESSION['email']}"; ?></td>
							</tr>

						</tbody>
					</table>
					<div class="row">
						<div class="col">
							<a href="#" data-toggle="modal" data-target="#details"><em class="fa fa-edit"></em>Edit Details</a>
						</div>
						<div class="col">
							<a href="#" data-toggle="modal" data-target="#password"><em class="fa fa-edit"></em> Change Password</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php

include('includes/footer.php');

?>
<!--  =========================
=====    Modal Edit Details   =======
	=========================== -->


<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Change Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="includes/edit.php" method="post">
					<input type="hidden" id="userId" name="user_id" value="<?php echo "{$_SESSION['user_id']}"; ?>">
					<div class="form-group">
						<input type="text" name="first_name" class="form-control" placeholder="<?php echo "{$_SESSION['first_name']}"; ?>" value="<?php echo "{$_SESSION['first_name']}"; ?>">

					</div>
					<div class="form-group">
						<input type="text" name="last_name" class="form-control" placeholder="<?php echo "{$_SESSION['last_name']}"; ?>" value="<?php echo "{$_SESSION['last_name']}"; ?>">

					</div>
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit" name="btnEditUser" class="btn btn-dark btn-block" value="Save Changes" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!--  =============================
=====    Modal Change Password   =======
	=================================== -->


<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="change-password.php" method="post">
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Confirm Email" value="<?php if (isset($_POST['email'])) {
																														echo $_POST['email'];
																													} ?>" required>

					</div>
					<div class="form-group">
						<input type="password" name="pass1" class="form-control" placeholder="New Password" value="<?php if (isset($_POST['pass1'])) {
																														echo $_POST['pass1'];
																													} ?>" required>

					</div>
					<div class="form-group">
						<input type="password" name="pass2" class="form-control" placeholder="Confirm New Password" value="<?php if (isset($_POST['pass2'])) {
																																echo $_POST['pass2'];
																															} ?>" required>

					</div>
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit" name="btnChangePassword" class="btn btn-dark btn-block" value="Save Changes" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>