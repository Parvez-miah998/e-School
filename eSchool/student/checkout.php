<?php  
	include('includes/dbconnection.php');
	include('config.php');
	session_start();
	if (!isset($_SESSION['stuEmail'])) {
		echo "<script>location.href='../loginorsignup.php';</script>";
	}
	else {
		$stuEmail = $_SESSION['stuEmail'];

		if (isset($_POST['course_price'])) {
        $coursePrice = $_POST['course_price'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout Page</title>
</head>
<body>
	<div class="container mt-5" style="margin-left: 150px; padding-top: 20px; border: 2px solid greenyellow; border-radius: 20px; height: 350px; width: 350px;">
		<div class="row">
			<div class="col-sm-6 offset-sm-3 jumbotron" style="padding-left: 35px;">
				<h3 class="mb-5">Welcome to eSchool Payment Page</h3>
				<form action="submit.php" method="POST">
					<div class="form-group">
						<label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
						<div class="col-sm-8">
							<input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" type="" name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS". rand(10000,99999999) ?>" readonly>
						</div>
					</div><br>
					<div class="form-group">
						<label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
						<div class="col-sm-8">
							<input id="CUST_ID" class="form-control" tabindex="2" maxlength="20" size="20" type="" name="CUST_ID" autocomplete="off" value="<?php if (isset($stuEmail)) {
								echo $stuEmail;} ?>" readonly>
						</div>
					</div><br>
					<?php 
						// After retrieving course_price
						$sql = "SELECT c_id FROM courses WHERE c_price = '$coursePrice'";
						$result = mysqli_query($conn, $sql);

						if ($row = mysqli_fetch_assoc($result)) {
						  $cid = $row['c_id']; // Store course ID
						}
					?>
					<div class="form-group">
					  <label for="CourseID" class="col-sm-4 col-form-label">Course ID: </label>
					  <div class="col-sm-8">
					    <input id="CourseID" class="form-control" tabindex="2" maxlength="20" size="20" type="" name="CourseID" autocomplete="off" value="<?php echo $cid; ?>" readonly>
					  </div>
					</div>

					<!-- <div class="form-group">
						<label for="CourseID" class="col-sm-4 col-form-label">Course ID: </label>
						<div class="col-sm-8">
						<input id="CourseID" class="form-control" tabindex="2" maxlength="20" size="20" type="" name="CourseID" autocomplete="off" value="<?php echo $cid; ?>" readonly>
						</div>
					</div> -->
					<br>
					<div class="form-group">
					    <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
					    <div class="col-sm-8">
					        <input title="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php if (isset($_POST['course_price'])) { echo "$ ".$_POST['course_price']; } ?>" readonly>
					    </div>
					</div><br>
					<div class="form-group">
						<div class="col-sm-8">
							<input title="INDUSTRY_TYPE_ID" class="form-control" tabindex="10" type="hidden" maxlength="20" size="20" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8">
							<input title="CHANNEL_ID" class="form-control" tabindex="10" type="hidden" maxlength="20" size="20" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
						</div>
					</div>
					<script src="https://checkout.stripe.com/checkout.js"
				        class="stripe-button"
				        data-key="<?php echo $publishableKey ?>"
				        data-amount="<?php echo $coursePrice * 100; ?>"
				        data-name="Parvez Mosarof"
				        data-description="eSchool"
				        data-image=""
				        data-currency="usd">
				</script>

				<?php try {
				    // Add hidden form field with course price
				    echo "<input type='hidden' name='coursePrice' value='" . $coursePrice . "'>";
				} catch (\Exception $e) {
				    // Handle error while retrieving course price
				    echo "Error: Course price could not be retrieved.";
				    exit;
				} ?>					
					
				</form>
			</div>
		</div>
	</div>
	

</body>
</html>
<?php
} 
}

?>