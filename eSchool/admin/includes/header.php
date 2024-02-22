<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ddahsboard</title>
	<link rel="icon" type="image/x-icon" href="../assets/icons/gauge-high-solid.svg">
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
					<ul class="nav flex-colum">
						<li class="nav-item">
							<a class="nav-link" href="dashboard.php">
								<i class="fa-solid fa-gauge"></i> Dashboard</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="courses.php">
								<i class="fa-solid fa-book"></i> Courses</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="lesson.php">
								<i class="fa-solid fa-person-chalkboard"></i> Lesson</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="dashboard.php">
								<i class="fa-solid fa-person-chalkboard"></i> Quize & Assessment</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="students.php">
								<i class="fa-solid fa-users"></i> Students</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="salesdetails.php">
								<i class="fa-brands fa-salesforce"></i> Sales Report</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="paymentstatus.php"><i class="fa-solid fa-money-check-dollar"></i></i> Payment Status</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="feedback.php">
								<i class="fa-solid fa-comment"></i> Feedback</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contactus.php">
								<i class="fa-solid fa-comment"></i> Users Comments</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="adminchangepass.php">
								<i class="fa-solid fa-key"></i> Change Password</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="includes/logout.php">
								<i class="fa-solid fa-right-from-bracket"></i> Logout</a>
						</li>
					</ul>
				</div>
			</nav>
</body>
</html>
