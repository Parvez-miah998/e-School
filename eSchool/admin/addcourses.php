<!--header area start-->
	<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	include('../admin/includes/header.php');
	include_once('../admin/includes/dbconnection.php');

	if (isset($_SESSION['is_admin_login'])) {
		
	}
	else {
		echo "<script>location.href='../index.php';</script>";
	}


	if (isset($_REQUEST['courseSubmitBtn'])) {
    if (empty($_REQUEST['course_name']) || empty($_REQUEST['course_desc']) || empty($_REQUEST['course_author']) || empty($_REQUEST['course_duration']) || empty($_REQUEST['course_originalprice']) || empty($_REQUEST['course_price'])) {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5">All Fields are Required!</div>';
    } else {
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_originalprice = $_REQUEST['course_originalprice'];
        $course_price = $_REQUEST['course_price'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name']; // Corrected array key

        $img_folder = '../assets/image/' . $course_image;
        move_uploaded_file($course_image_temp, $img_folder);

        // Assuming $conn is your mysqli connection object
	    $stmt = $conn->prepare("INSERT INTO courses (c_name, c_desc, c_author, c_img, c_duration, c_originalprice, c_price) VALUES (?, ?, ?, ?, ?, ?, ?)");

	    // Bind parameters to the prepared statement
	    $stmt->bind_param("sssssss", $course_name, $course_desc, $course_author, $img_folder, $course_duration, $course_originalprice, $course_price);

	    // Execute the prepared statement
	    if ($stmt->execute()) {
	        $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5">Course Added Successfully</div>';
	    } else {
	        $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5">Unable to add Course!</div>';
	    }

	    $stmt->close();
	    }
	}
?>
	<!--header area end-->

	<div class="col-sm-6 mt-5 mx-3 jumbotron">
		<h3 class="text-center bg-dark text-white">Add New Course</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="course_name">Course Name</label>
				<input type="text" class="form-control" id="course_name" name="course_name">
			</div><br>
			<div class="form-group">
				<label for="course_desc">Course Description</label>
				<textarea type="text" class="form-control" id="course_desc" name="course_desc" row=2></textarea>
			</div><br>
			<div class="form-group">
				<label for="course_author">Author Name</label>
				<input type="text" class="form-control" id="course_author" name="course_author">
			</div><br>
			<div class="form-group">
				<label for="course_duration">Course Duration</label>
				<input type="text" class="form-control" id="course_duration" name="course_duration">
			</div><br>
			<div class="form-group">
				<label for="course_originalprice">Course Original Price</label>
				<input type="text" class="form-control" id="course_originalprice" name="course_originalprice">
			</div><br>
			<div class="form-group">
				<label for="course_price">Course Selling Price</label>
				<input type="text" class="form-control" id="course_price" name="course_price">
			</div><br>
			<div class="form-group">
				<label for="course_img">Course Image</label>
				<input type="file" class="form-control-file" id="course_img" name="course_img">
			</div><br>
			<div class="text-center">
				<button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
				<a href="../admin/courses.php" class="btn btn-secondary">Close</a>
			</div>
				<?php if (isset($msg)) {
					echo $msg;
				} ?>
			
			
		</form>
	</div>





	<!--footer area start-->
	<?php include('../admin/includes/footer.php')?>
	<!--footer area end-->