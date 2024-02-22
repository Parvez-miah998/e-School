	<?php 
	include('includes/header.php'); 
	include('includes/dbconnection.php'); 
	?>

<div class="container-fluid bg-dark">
	<div class="row">
		<img src="assets/image/php.jpg" alt="" style="height:100px;width: 100%;object-fit: cover;box-shadow: 10px;margin: 0px !important;padding: 0px !important;">
	</div>
</div>

<!--start main content-->
<div class="container mt-5">
	<?php  
	if (isset($_GET['c_id'])) {
		$course_id = $_GET['c_id'];
		$_SESSION['c_id'] = $course_id;
		$sql= "SELECT * FROM courses WHERE c_id = '$course_id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
	?>
	<div class="row">
		<div class="col-md-4">
			<img src="<?php echo str_replace('..', '.', $row['c_img']) ?>" class="card-img-top" alt="Python" style="width:150px;height:150px;margin: 15px;">
		</div>
		<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title">Course Name: <?php echo $row['c_name'] ?></h5>
				<p class="card-text">Description: <?php echo $row['c_desc'] ?></p>
				<p class="card-text">Duration: <?php echo $row['c_duration'] ?></p>
				<form action="student/checkout.php" method="post">
					<p class="card-text d-inline">Price: <small> <del>$ <?php echo $row['c_originalprice'] ?></del> </small> <span class="font-weight-bolder">$ <?php echo $row['c_price'] ?></span> </p>
					<input type="hidden" name="course_price" value="<?php echo $row['c_price']; ?>">
    				<button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="container" style="margin-top:20px;">
	<div class="row">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Lesson No. </th>
					<th scope="col">Lesson Name. </th>
				</tr>
			</thead>
			<tbody>
		<?php  
		$sql = "SELECT * FROM lessons";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$num = 0;
			while($row = $result->fetch_assoc()){
				if ($course_id == $row['c_id']) {
					$num++;
					echo '
				<tr>
					<th scope="row">'.$num.'</th>
					<td>'.$row['l_name'].'</td>
				</tr>';
				}
				
			}
		}
		?>
		
				
			</tbody>
		</table>
	</div>
</div>

	<div class="footer pt-5">
		<!--include Footer area start-->
		<?php include('includes/footer.php') ?>
		<!--Footer area end-->		
	</div>