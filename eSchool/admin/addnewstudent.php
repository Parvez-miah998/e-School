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

		//Code for addnewStudent by Admin
		if (isset($_REQUEST['stuSubmitBtn'])) {
	    if (empty($_REQUEST['stu_name']) || empty($_REQUEST['stu_email']) || empty($_REQUEST['stu_contact']) || empty($_REQUEST['stu_insname']) || empty($_REQUEST['stu_major']) || empty($_REQUEST['stu_occ']) || empty($_REQUEST['stu_paddress']) || empty($_REQUEST['stu_password'])) {
	        $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5">All Fields are Required!</div>';
	    } else {
	        $stu_name = $_REQUEST['stu_name'];
	        $stu_email = $_REQUEST['stu_email'];
	        $stu_contact = $_REQUEST['stu_contact'];
	        $stu_insname = $_REQUEST['stu_insname'];
	        $stu_major = $_REQUEST['stu_major'];
	        $stu_occ = $_REQUEST['stu_occ'];
	        $stu_paddress = $_REQUEST['stu_paddress'];
	        $stu_password = $_REQUEST['stu_password'];
	        $stu_image = $_FILES['stu_img']['name'];
	        $stu_image_temp = $_FILES['stu_img']['tmp_name']; 

	        $img_folder = '../assets/image/' . $stu_image;
	        move_uploaded_file($stu_image_temp, $img_folder);

	        // Assuming $conn is your mysqli connection object
		    $stmt = $conn->prepare("INSERT INTO student (stu_name, stu_email, stu_contact, stu_insname, stu_major, stu_occ, stu_paddress, stu_password, stu_img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

		    // Bind parameters to the prepared statement
		    $stmt->bind_param("sssssss", $stu_name, $stu_email, $stu_contact, $stu_insname, $stu_major, $stu_occ, $stu_paddress, $stu_password, $img_folder);

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
		<h3 class="text-center bg-dark text-white">Add New Student</h3><br>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="stu_name">Student Name</label>
				<input type="text" class="form-control" id="stu_name" name="stu_name">
			</div><br>
			<div class="form-group">
				<label for="stu_email">Student Email</label>
				<input type="text" class="form-control" id="stu_email" name="stu_email">
			</div><br>
			<div class="form-group">
				<label for="stu_contact">Student Contact</label>
				<input type="text" class="form-control" id="stu_contact" name="stu_contact">
			</div><br>
			<div class="form-group">
				<label for="stu_insname">Institution Name</label>
				<input type="text" class="form-control" id="stu_insname" name="stu_insname">
			</div><br>
			<div class="form-group">
				<label for="stu_major">Student Major/Class</label>
				<input type="text" class="form-control" id="stu_major" name="stu_major">
			</div><br>
			<div class="form-group">
				<label for="stu_occ">Occuption</label>
				<input type="text" class="form-control" id="stu_occ" name="stu_occ">
			</div><br>
			<div class="form-group">
				<label for="stu_address">Address</label>
				<input type="text" class="form-control" id="stu_address" name="stu_address">
			</div><br>
			<div class="form-group">
				<label for="stu_pass">Password</label>
				<input type="password" class="form-control" id="stu_pass" name="stu_pass">
			</div><br>
			<div class="form-group">
				<label for="stu_confirmpass">Confirm Password</label>
				<input type="password" class="form-control" id="stu_confirmpass" name="stu_confirmpass">
			</div><br>
			<div class="form-group">
				<label for="stu_img">Student Image</label>
				<input type="file" class="form-control-file" id="stu_img" name="stu_img">
			</div><br>
			<div class="text-center">
				<button type="submit" class="btn btn-danger" id="stuSubmitBtn" name="stuSubmitBtn">Submit</button>
				<a href="../admin/students.php" class="btn btn-secondary">Close</a>
			</div>
			<?php if (isset($msg)) {
					echo $msg;
				} ?>
		</form>
	</div>




<!--footer area start-->
	<?php include('../admin/includes/footer.php')?>
<!--footer area end-->