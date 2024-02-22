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


	if (isset($_REQUEST['lessonSubmitBtn'])) {
    if (empty($_REQUEST['lesson_name']) || empty($_REQUEST['lesson_desc']) || empty($_REQUEST['course_name']) || empty($_REQUEST['course_id'])) {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5">All Fields are Required!</div>';
    } else {
        $lesson_name = $_REQUEST['lesson_name'];
        $lesson_desc = $_REQUEST['lesson_desc'];
        $course_name = $_REQUEST['course_name'];
        $course_id = $_REQUEST['course_id'];
        $lesson_link = $_FILES['lesson_link']['name'];
        $lesson_link_temp = $_FILES['lesson_link']['tmp_name']; // Corrected array key

        $link_folder = '../assets/video/' . $lesson_link;
        move_uploaded_file($lesson_link_temp, $link_folder);

        // Assuming $conn is your mysqli connection object
	    $stmt = $conn->prepare("INSERT INTO lessons (l_name, l_desc, l_link, c_id, c_name) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $lesson_name, $lesson_desc, $link_folder, $course_id, $course_name);


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
		<h3 class="text-center bg-dark text-white">Add New Lesson</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="course_id">Course ID</label>
				<input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($_SESSION['c_id'])) {
					echo $_SESSION['c_id'];} ?>" readonly>
			</div><br>
			<div class="form-group">
				<label for="course_name">Course Name</label>
				<input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($_SESSION['c_name'])) {
					echo $_SESSION['c_name'];} ?>" readonly>
			</div><br>
			<div class="form-group">
				<label for="lesson_name">Lesson Name</label>
				<input type="text" class="form-control" id="lesson_name" name="lesson_name">
			</div><br>
			<div class="form-group">
				<label for="lesson_desc">Lesson Description</label>
				<textarea class="form-control" id="lesson_desc" name="lesson_desc" row = 2></textarea>
			</div><br>
			<div class="form-group">
				<label for="lesson_link">Lesson Video Link: </label>
				<input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
			</div><br>
			<div class="text-center">
				<button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
				<a href="../admin/lesson.php" class="btn btn-secondary">Close</a>
			</div>
				<?php if (isset($msg)) {
					echo $msg;
				} ?>
			
			
		</form>
	</div>





	<!--footer area start-->
	<?php include('../admin/includes/footer.php')?>
	<!--footer area end-->