<!--including start nav bar-->
	<?php

	// Start the session
	session_start();

	// Include necessary files
	include_once('includes/header.php');
	include_once('includes/dbconnection.php');
	if (isset($_SESSION['stuEmail'])) {
        $stuEmail = $_SESSION['stuEmail'];
    }
    else {
    	echo "<script>location.href='../index.php';</script>";
        exit; // Exit to prevent further execution
    }

?>
			
		<div class="col-sm-10 mt-5" style="background-color: #f7cfff;">
            <h1 class="text-center mt-2">My Courses</h1>
            
				<?php  
				if (isset($stuEmail)) {
					$sql = "SELECT co.order_id,c.c_id,c.c_name,c.c_duration,c.c_desc,c.c_img,c.c_author,c.c_originalprice,c.c_price FROM courseorder AS co JOIN courses AS c ON c.c_id = co.c_id WHERE co.stu_email = '$stuEmail'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							?>
							<div class="mb-3"  style="padding-top: 10px !important; background-color: #c4f5ba;border-radius: 10px;">
								<h5 class="card-header text-center"> <?php echo $row['c_name']; ?> </h5><br>
								<div class="row">
									<div class="col-sm-3">
										<img src="<?php echo $row['c_img']; ?>" class="card-img-top mt-4" alt="pic" style="height: 180px !important;padding-left: 20px !important;">
									</div>
									<div class="col-sm-6 mb-3">
										<div class="card-body">
											<p class="card-title"> <?php echo $row['c_desc']; ?> </p>
											<small class="card-text"><b>Duration:</b> <?php  echo $row['c_duration'];?></small><br>
											<small class="card-text"><b>Instrctor:</b> <?php echo $row['c_author']; ?> </small><br>
											<small class="card-text d-inline"><b>Original Price:</b> <del>$ <?php echo $row['c_originalprice']; ?> </del></small><br>
											<small class="font-weight-bolder"><b>Price:</b> $ <?php echo $row['c_price'];?></small><br>
											<a href="watchcourse.php?c_id=<?php echo $row['c_id'];?>" class="btn btn-primary mt-5 float-right">Watch Course</a>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
				}
				?>
			</div>
				

</div>
</div>


<!--Footer Start-->
<?php include('includes/footer.php');?>
<!--Footer end-->