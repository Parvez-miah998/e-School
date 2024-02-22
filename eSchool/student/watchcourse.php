<?php

	// Start the session
	session_start();

	// Include necessary files
	include('includes/header.php');
	include('includes/dbconnection.php');
	if (isset($_SESSION['stuEmail'])) {
        $stuEmail = $_SESSION['stuEmail'];
    }
    else {
    	echo "<script>location.href='../index.php';</script>";
        exit; // Exit to prevent further execution
    }

?>
		<div class="col-sm-10 mt-5" style="background-color: #ffff;">
            <h3 class="text-center">Welcome to eSchool</h3>
			<a class="btn btn-danger" href="./mycourses.php">My Courses</a>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3 border-right">
						<h4 class="text-center">Lessons</h4>
						<ul id="playlist" class="nav flex-column">
							<?php
							if (isset($_GET['c_id'])) {
								$course_id = $_GET['c_id'];
								$sql = "SELECT * FROM lessons WHERE c_id = '$course_id'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										echo '
										<li class="nav-item border-bottom py-2" movieurl='.$row['l_link'].' style="cursor:pointer;">'.$row['l_name'].'</li>
										';
									}
								}
							}
							?>
						</ul>
					</div>
					<div class="col-sm-8">
						<video id="videoarea" src="" class="mt-5 w-75 ml-2" controls></video>
					</div>
				</div>
			</div>
		</div>


</div>
</div>


<!--Footer Start-->
<?php include('includes/footer.php');?>
<!--Footer end-->