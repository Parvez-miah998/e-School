	<!--include start nav bar-->
	<?php 
	include('includes/header.php'); 
	include('includes/dbconnection.php'); 
	?>
	<!--end nav bar-->

<div class="container-fluid bg-dark">
	<div class="row">
		<img src="assets/image/php.jpg" alt="" style="height:100px;width: 100%;object-fit: cover;box-shadow: 10px;margin: 0px !important;padding: 0px !important;">
	</div>
</div>
<!--populer courses start-->
			<div class="section">
				<div class="container mt-5">
					<h1 class="text-center">All Courses</h1>
					<div class="row mt-5 ml-4 mb-3">
						<?php

						$sql = "SELECT * FROM courses";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()){
								$course_id = $row['c_id'];
								echo '<div class="card mt-3 ml-3" style="width: 20rem; background-color: #f5d3e0; margin-left: 2rem;">
							        <div class="card-body">
							            <h5 class="card-title">'.$row["c_name"].'</h5>
							            <img src=" '.str_replace('..', '.', $row['c_img']).' " style="height: 150px; width: 150px; object-fit: cover;">
							            <p class="card-text">'.$row["c_desc"].'</p>
							        </div>
							        <div class="card-footer">
							            <p class="card-text d-inline">Price: <small><del>$ '.$row["c_originalprice"].'</del></small> <span class="font-weight-bolder">$ '.$row["c_price"].'</span></p>
							            <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?c_id='.$course_id.'">Enroll</a>
							        </div>
							    </div>';
									}
								} 
							?>
							</div>
		<!--end populer courses 1st card-->
		

	<!--populer courses end-->


			</div>
		</div>


	<!--include Footer area start-->
	<?php include('includes/footer.php') ?>
	<!--Footer area end-->		
