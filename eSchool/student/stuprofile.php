	<?php

	session_start();

	// Include necessary files
	include_once('includes/header.php');
	include_once('includes/dbconnection.php');

	// Check if user is logged in
	if (isset($_SESSION['is_login']) && isset($_SESSION['stuEmail'])) {
	    $stuEmail = $_SESSION['stuEmail'];

	    // Fetch student data from the database
	    $sql = "SELECT * FROM student WHERE stu_email = ?";
	    $stmt = $conn->prepare($sql);
	    $stmt->bind_param("s", $stuEmail);
	    $stmt->execute();
	    $result = $stmt->get_result();

		    if ($result->num_rows === 1) {
		        $row = $result->fetch_assoc();
		        $stuid = $row['stu_id'];
		        $stuname = $row['stu_name'];
		        $stucontact = $row['stu_contact'];
		        $stuemail = $row['stu_email'];
		        $stuinsname = $row['stu_insname'];
		        $stumajor = $row['stu_major'];
		        $stupaddress = $row['stu_paddress'];
		        $stuocc = $row['stu_occ'];
		        $stuimg = $row['stu_img']; // Image path from the database

		        // Handle form submission and update the student profile
		        if (isset($_POST['updateStuBtn'])) {
				    // Retrieve other form fields
				    $stuname = $_POST['stuname'];
				    $stucontact = $_POST['stucontact'];
				    $stuemail = $_POST['stuEmail'];
				    $stuinsname = $_POST['stuinsname'];
				    $stumajor = $_POST['stumajor'];
				    $stuocc = $_POST['stuocc'];
				    $stupaddress = $_POST['stupaddress'];

				    if (!empty($_FILES['stu_image']['name'])) {
				        $stu_image = $_FILES['stu_image']['name'];
				        $stu_image_temp = $_FILES['stu_image']['tmp_name'];
				        $image_folder = '../assets/student_image/' . $stu_image;
				        
				        // Move uploaded image to the desired location
				        if (move_uploaded_file($stu_image_temp, $image_folder)) {
				            // Update the database with the new image path
				            $sql = "UPDATE student SET stu_name = ?, stu_contact = ?, stu_insname = ?, stu_major = ?, stu_occ = ?, stu_paddress = ?, stu_img = ? WHERE stu_email = ?";
				            $stmt = $conn->prepare($sql);
				            $stmt->bind_param("ssssssss", $stuname, $stucontact, $stuinsname, $stumajor, $stuocc, $stupaddress, $stu_image, $stuemail);

				            if ($stmt->execute()) {
				                $passmsg = '<div class="alert alert-success col-sm-6 mt-2 ml-5">Update Successful</div>';
				                // Update the session variable with the new image path
				                $_SESSION['stu_img'] = $stu_image;
				            } else {
				                $passmsg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5">Unable to Update</div>';
				            }
				        } else {
				            $passmsg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5">Image Upload Failed</div>';
				        }
				    } else {
				        // Update other fields without changing the image
				        $sql = "UPDATE student SET stu_name = ?, stu_contact = ?, stu_insname = ?, stu_major = ?, stu_occ = ?, stu_paddress = ? WHERE stu_email = ?";
				        $stmt = $conn->prepare($sql);
				        $stmt->bind_param("sssssss", $stuname, $stucontact, $stuinsname, $stumajor, $stuocc, $stupaddress, $stuemail);

				        if ($stmt->execute()) {
				            $passmsg = '<div class="alert alert-success col-sm-6 mt-2 ml-5">Update Successful</div>';
				        } else {
				            $passmsg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5">Unable to Update</div>';
				        }
				    }
				}
		    } else {
		        echo "<script>location.href='../index.php';</script>";
		    }
		} else {
	    echo "<script>location.href='../index.php';</script>";
	}


?>

	<div class="col-sm-6 mt-5">
            <h1 class="text-center mt-2">My Profile</h1>
		<form class="mx-5" action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="stuid">Student ID</label>
				<input type="text" class="form-control" id="stuid" name="stuid"
				value="<?php if (isset($stuid)) {echo $row['stu_id'];} ?>" readonly>
			</div><br>
			<div class="form-group">
				<label for="stuname">Student Name</label>
				<input type="text" class="form-control" id="stuname" name="stuname"
				value="<?php if (isset($stuname)) {echo $row['stu_name'];} ?>">
			</div><br>
			<div class="form-group">
	            <label for="stucontact">Student Contact</label>
	            <input type="text" class="form-control" id="stucontact" name="stucontact" value="<?php echo isset($row['stu_contact']) ? $row['stu_contact'] : ''; ?>">
	        </div><br>
			<div class="form-group">
				<label for="stuEmail">Student Email</label>
				<input type="text" class="form-control" id="stuEmail" name="stuEmail"
				value="<?php if (isset($stuEmail)) {echo $row['stu_email'];} ?>" readonly>
			</div><br>
			<div class="form-group">
	            <label for="stuinsname">Institution Name</label>
	            <input type="text" class="form-control" id="stuinsname" name="stuinsname" value="<?php echo isset($row['stu_insname']) ? $row['stu_insname'] : ''; ?>">
	        </div><br>
			<div class="form-group">
	            <label for="stumajor">Class/Major</label>
	            <input type="text" class="form-control" id="stumajor" name="stumajor" value="<?php echo isset($row['stu_major']) ? $row['stu_major'] : ''; ?>">
	        </div><br>
			<div class="form-group">
				<label for="stuocc">Occaption</label>
				<input type="text" class="form-control" id="stuocc" name="stuocc"
				value="<?php if (isset($stuocc)) {echo $row['stu_occ'];} ?>">
			</div><br>
			<div class="form-group">
	            <label for="stupaddress">Student Address</label>
	            <input type="text" class="form-control" id="stupaddress" name="stupaddress" value="<?php echo isset($row['stu_paddress']) ? $row['stu_paddress'] : ''; ?>">
	        </div><br>
	        <div class="form-group">
	            <label for="stu_image">Upload Image</label>
	            <input type="file" class="form-control-file" id="stu_image" name="stu_image">
	            <?php if (isset($stuimg)) { ?>
	                <img src="../assets/student_image/<?php echo $stuimg; ?>" alt="Student Image" style="width: 150px !important; height: 150px !important;">
	            <?php } ?>
	        </div><br>
			<button type="submit" class="btn btn-primary" name="updateStuBtn">Update</button>
			<?php if (isset($passmsg)) {
				echo $passmsg;
			} ?>
		</form>
	</div>
	
<!--end nav bar-->
</div>
</div>


<!--Footer Start-->
<?php include('includes/footer.php');?>
<!--Footer end-->

