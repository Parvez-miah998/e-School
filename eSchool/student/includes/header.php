<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../includes/dbconnection.php');


if (isset($_SESSION['is_login'])) {
    if (isset($_SESSION['stuEmail'])) {
        $stuLogEmail = $_SESSION['stuEmail']; // Retrieve the email from the session

        $sql = "SELECT stu_img FROM student WHERE stu_email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $stuLogEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $stu_img = $row['stu_img'];
        } else {
            // Handle if student data not found
            // For example: $stu_img = ''; or other appropriate action
        }
    } else {
        // Handle if stuEmail session variable is not set
        // For example: redirect or define $stu_img = '';
    }
} else {
    echo "<script>location.href='../index.php';</script>";
    // Handle redirection if the user is not logged in
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Profile</title>
	<link rel="icon" type="image/x-icon" href="../assets/icons/id-card-solid.svg">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!--Google font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Reem+Kufi:wght@400;500;600;700&family=Roboto:wght@700&family=Ubuntu:ital,wght@0,500;0,700;1,400&display=swap" rel="stylesheet">
	<!--Fas Fa Icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/adminstyle.css">
</head>
<body>
	<!--Top navbar start-->
	<nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php" style="margin-left: 20px;">eSchool </a><small class="text-white" style="margin-right: 20px;"> Admin</small>
	</nav>
	<!--Top navbar end-->

	<!--Sidebar start-->
	<div class="container-fluid mb-5" style="margin-top: 30px;">
	    <div class="row">
	        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
	            <div class="sidebar-sticky">
	                <ul class="nav flex-column">
	                	<li class="nav-item mb-3">
	                        <img src="<?php echo isset($stu_img) ? '../assets/student_image/' . $stu_img : ''; ?>" alt="Student Image" class="img-thumbnail rounded-circle">
	                    </li>
						<li class="nav-item">
							<a class="nav-link <?php if ($page == 'prfile') {
							  echo 'active';} ?>" href="stuprofile.php"><i class="fa-solid fa-user"></i> Profile<span class="sr-only">(current)</span> 
							</a>
						</li> 
						<li class="nav-item">
							<a class="nav-link" href="mycourses.php">
								<i class="fa-solid fa-book"></i> My Course
							</a>
						</li> 
						<li class="nav-item">
							<a class="nav-link" href="paymentstatus.php"><i class="fa-solid fa-money-check-dollar"></i> Payment Status
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="stufeedback.php">
								<i class="fab fa-accessible-icon"></i> Feedback
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="stuchangepassword.php">
								<i class="fa-solid fa-key"></i> Change Password
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../student/logout.php">
								<i class="fa-solid fa-right-from-bracket"></i> Log Out
							</a>
						</li>
					</ul>
				</div>
			</nav>

	
	<!--side bar end-->


</body>
</html>