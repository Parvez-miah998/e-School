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
?>
<!--header area end-->

	<div class="col-sm-6 mt-5 mx-3 jumbotron">
		<h3 class="text-center bg-dark text-white">Update Lesson Details</h3>


		<?php
			if (isset($_REQUEST['view'])) {
				$sql = "SELECT * FROM lessons WHERE l_id = {$_REQUEST['id']}";
				$result = $conn->query($sql); // Assign the query result to $result
			    if ($result && $result->num_rows > 0) { 
			        $row = $result->fetch_assoc(); // Fetch the row
			    } else {
			        // Handle if no rows were returned or any other error occurred
			        echo "No data found or an error occurred.";
			    }
			}

			//Update code start

			if (isset($_REQUEST['reqsupdate'])) {
				if (($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
					$msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5">All Fields are Required !</div>';
				}
				else {
					$lid = $_REQUEST['lesson_id'];
					$lname = $_REQUEST['lesson_name'];
					$ldesc = $_REQUEST['lesson_desc'];
			        $cid = $_REQUEST['course_id'];
			        $cname = $_REQUEST['course_name'];
			        $link = '../assets/video'.$_FILES['lesson_link']['name'];

			        $sql = "UPDATE lessons SET l_id = '$lid', l_name = '$lname',l_desc = '$ldesc',c_id = '$cid',c_name = '$cname',l_link = '$link' WHERE l_id = '$lid'";
			        if ($conn->query($sql) == TRUE) {
			        	$msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5">Course Update Successfully</div>';
				    } else {
				        $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5">Unable to Update Course!</div>';
					}
				}
			}
			//Update code end
		?>



		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="lesson_id">Lesson Id</label>
				<input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if (isset($row['l_id'])) {echo $row['l_id'];} ?>" readonly>
			</div><br>
			<div class="form-group">
				<label for="lesson_name">Lesson Name</label>
				<input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if (isset($row['l_name'])) {
					echo $row['l_name'];} ?>">
			</div><br>
			<div class="form-group">
				<label for="lesson_desc">Lesson Description</label>
				<textarea type="text" class="form-control" id="lesson_desc" name="lesson_desc" row=2><?php if (isset($row['l_desc'])) {
					echo $row['l_desc'];} ?></textarea>
			</div><br>
			<div class="form-group">
				<label for="course_id">Course ID</label>
				<input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($row['c_id'])) {
					echo $row['c_id'];} ?>" readonly>
			</div><br>
			<div class="form-group">
				<label for="course_name">Course Name</label>
				<input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['c_name'])) {
					echo $row['c_name'];} ?>" readonly>
			</div><br>
			<div class="form-group">
				<label for="lesson_link">Lesson Link</label>
				<div class="embed-responsive embed-reponsive-16by9">
					<iframe class="embed-responsive-item" src="<?php if (isset($row['l_link'])) {
						echo $row['l_link'];} ?>"></iframe>
				</div>
				<input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
			</div><br>
			<div class="text-center">
				<button type="submit" class="btn btn-danger" id="reqsupdate" name="reqsupdate">Update</button>
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