	<?php 
	include('includes/dbconnection.php');
	include('includes/header.php');
	?>
	<!--end nav bar-->

	<!--start img background-->
	<div class="container-fluid">
		<div class="imgparent">
			<img src="assets/image/pexels-lukas-1420702.jpg">
		
			<div class="vid-content">
				<h1 class="my-content">Welcome to eSchool</h1>
				<small class="my-content">Learn and Implement</small><br>
				<?php
	        if (!isset($_SESSION['is_login'])) {
	          echo '
					<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#examplesModal">Get Started</a>
					';
				}else{
					echo '<a href="student/stuprofile.php" class="btn btn-primary">My Profile</a>';
				}
			?>
			</div>
		</div>
	</div>
	<!--end img background-->


	<!--text abnner start-->
	<div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
      <div class="col-sm">
        <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Course</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-users mr-3"></i> Expert Instractors</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fa-solid fa-bangladeshi-taka-sign"></i> Money Back Guaranty</h5>
      </div>
    </div>    
  </div>
	<!--text banner end-->


	<!--populer courses start-->
	<div class="section" id="popular-courses-section">
				<div class="container mt-5">
					<h1 class="text-center">Populer Courses</h1>
					<!--start populer courses 1st card-->
					<div class="d-flex justify-content-between mt-4">
						<?php

						$sql = "SELECT * FROM courses LIMIT 3";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()){
								$course_id = $row['c_id'];
								echo '<div class="card" style="width: 20rem; background-color: #f5d3e0;">
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
		<!--start populer courses 2nd card-->
				<div class="d-flex justify-content-between mt-4">
						<?php
						$sql = "SELECT * FROM courses LIMIT 3, 3";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()){
								$course_id = $row['c_id'];
								echo '<div class="card" style="width: 20rem; background-color: #9ddb95;">
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
		<!--end populer courses 2nd card-->
		<div class="text-center m-2">
			<a class="btn btn-danger btn-sm" href="courses.php">View All Course</a>
		</div>
	</div>
	</div>
	<!--populer courses end-->
	

	<!--including contact us start-->
	<?php include('includes/contact.php') ?>
	<!--contact us end-->


	<!--testimonial start (owl testyslider need)-->
		<div class="container-fluid mt-5" style="background-color: #4B7289;" id="Feedback">
    <h1 class="text-center testyheading p-4">Student's Feedback</h1>
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
                <?php  
                $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        $stuimg = $row['stu_img']; // Assuming it holds the image name
                        ?>
                        <div class="testimonial">
                            <p class="description"><?php echo $row['f_content'] ?? ''; ?></p>
                            <div class="pic">
                                <?php if ($stuimg) { ?>
                                    <img class="img-thumbnail rounded-circle" src="<?php echo $stuimg; ?>" alt="Stu_image" style="width: 80px !important; height: 80px !important; margin: 0px; padding: 0px;"/>
                                <?php } else { ?>
                                    <img class="img-thumbnail rounded-circle" src="default_image.jpg" alt="Default Image" style="width: 80px !important; height: 80px !important; margin: 0px; padding: 0px;"/>
                                <?php } ?>
                            </div>
                            <div class="testimonial-proof">
                                <h6><?php echo $row['stu_name']; ?></h6>
                                <small><?php echo $row['stu_occ']; ?></small>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>



			<!-- <div class="container-fluid mt-5" style="background-color: #4B7289;" id="Feedback">
		  <h1 class="text-center testyheading p-4">Student's Feedback</h1>
		  <div class="row">
		    <div class="col-md-12">
		      <div id="testimonial-slider" class="owl-carousel">

		      	<?php  
		      	$sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
		      	$result = $conn->query($sql);
		      	if ($result->num_rows > 0) {
		      		while($row = $result->fetch_assoc()){
		      			$s_img = $row['stu_img'];
		      			$n_img = str_replace('..', '.', $s_img);	      		
		      	?>

		        <div class="testimonial">
		          <p class="description"><?php echo $row['f_content'] ?? ''; ?></p>
		          <div class="pic">
									<img class="img-thumbnail rounded-circle" src="<?php echo $n_img; ?>" alt="" style="width: 80px !important; height: 80px !important;margin: 0px; padding: 0px;"/>
		          </div>
		          <div class="testimonial-proof">
		            <h6><?php echo $row['stu_name']; ?></h6>
		            <small><?php echo $row['stu_occ']; ?></small>
		          </div>
		        </div>
		        <?php
		        	}
		      	}
		      	?>
		       </div>
		    </div>
		  </div>
		</div> -->
	<!--testimonial end-->



	<!--Start social media follow-->
  <div class="container-fluid bg-danger">
    <div class="row text-white text-cenetr p-1">
      <div class="col-sm">
        <a class="text-white social-hover" href="#"  style="text-decoration: none !important;"><i class="fa-brands fa-facebook"></i> Facebook</a>
      </div>
      <div class="col-sm">
        <a class="text-white social-hover" href="#"  style="text-decoration: none !important;"><i class="fa-brands fa-twitter"></i> Twitter</a>
      </div>
      <div class="col-sm">
        <a class="text-white social-hover" href="#"  style="text-decoration: none !important;"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
      </div>
      <div class="col-sm">
        <a class="text-white social-hover" href="#"  style="text-decoration: none !important;"><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
      </div>
    </div>    
  </div>
  <!--End social media follow-->


  <!--About Us area start-->
	<!--including Footer area start-->
	<?php include('includes/footer.php') ?>
	<!--Footer area end-->
	<!--About area end-->

  <!--include Registtration form start-->
  <?php include('student/registration.php') ?>
  <!--include Registtration form end-->


  <!--include Registtration form start-->
  <?php include('student/login.php') ?>
  <!--include Registtration form end-->


  <!--include Registtration form start-->
  <?php include('admin/adminlogin.php') ?>
  <!--include Registtration form end-->


