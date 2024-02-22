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
		<h3 class="text-center bg-dark text-white">Update Course</h3>


		<?php
			if (isset($_REQUEST['view'])) {
				$sql = "SELECT * FROM courses WHERE c_id = {$_REQUEST['id']}";
				$result = $conn->query($sql); // Assign the query result to $result
			    if ($result && $result->num_rows > 0) { 
			        $row = $result->fetch_assoc(); // Fetch the row
			    } else {
			        // Handle if no rows were returned or any other error occurred
			        echo "No data found or an error occurred.";
			    }
			}

			//Update code start

			if (isset($_REQUEST['requpdate'])) {
				if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_originalprice'] == "") || ($_REQUEST['course_price'] == "")) {
					$msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5">All Fields are Required !</div>';
				}
				else {
					$cid = $_REQUEST['course_id'];
					$cname = $_REQUEST['course_name'];
					$cdesc = $_REQUEST['course_desc'];
			        $cauthor = $_REQUEST['course_author'];
			        $cduration = $_REQUEST['course_duration'];
			        $coriginalprice = $_REQUEST['course_originalprice'];
			        $cprice = $_REQUEST['course_price'];
			        $cimg = '../assets/image'.$_FILES['course_img']['name'];

			        $sql = "UPDATE courses SET c_id = '$cid', c_name = '$cname',c_desc = '$cdesc',c_author = '$cauthor',c_duration = '$cduration',c_originalprice = '$coriginalprice',c_price = '$cprice',c_img = '$cimg' WHERE c_id = '$cid'";
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
				<label for="course_id">Course Id</label>
				<input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($row['c_id'])) {echo $row['c_id'];} ?>" readonly>
			</div><br>
			<div class="form-group">
				<label for="course_name">Course Name</label>
				<input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['c_name'])) {
					echo $row['c_name'];} ?>">
			</div><br>
			<div class="form-group">
				<label for="course_desc">Course Description</label>
				<textarea type="text" class="form-control" id="course_desc" name="course_desc" row=2><?php if (isset($row['c_desc'])) {
					echo $row['c_desc'];} ?></textarea>
			</div><br>
			<div class="form-group">
				<label for="course_author">Author Name</label>
				<input type="text" class="form-control" id="course_author" name="course_author" value="<?php if (isset($row['c_author'])) {
					echo $row['c_author'];
				} ?>">
			</div><br>
			<div class="form-group">
				<label for="course_duration">Course Duration</label>
				<input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if (isset($row['c_duration'])) {
					echo $row['c_duration'];} ?>">
			</div><br>
			<div class="form-group">
				<label for="course_originalprice">Course Original Price</label>
				<input type="text" class="form-control" id="course_originalprice" name="course_originalprice" value="<?php if (isset($row['c_originalprice'])) {
					echo $row['c_originalprice'];
				} ?>">
			</div><br>
			<div class="form-group">
				<label for="course_price">Course Selling Price</label>
				<input type="text" class="form-control" id="course_price" name="course_price" value="<?php if (isset($row['c_price'])) {
					echo $row['c_price'];
				} ?>">
			</div><br>
			<div class="form-group">
			    <label for="course_img">Course Image</label>
			    <?php
			    $courseImagePath = (isset($row['c_img'])) ? $row['c_img'] : '';
			    if (!empty($courseImagePath)) {
			        echo '<img src="' . $courseImagePath . '" alt="" class="img-thumbnail">';
			    } else {
			        echo '<p>No image available</p>';
			    }
			    ?>
			    <input type="file" class="form-control-file" id="course_img" name="course_img">
			</div><br>
			<div class="text-center">
				<button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
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