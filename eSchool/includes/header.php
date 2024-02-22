<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eSchool</title>
  <link rel="icon" type="image/x-icon" href="assets/icons/school-flag-solid.svg">
  <!--Owl Testyslider link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

	<link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!--Google font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Reem+Kufi:wght@400;500;600;700&family=Roboto:wght@700&family=Ubuntu:ital,wght@0,500;0,700;1,400&display=swap" rel="stylesheet">
  <!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
</head>
<body>
	<!--start nav bar-->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">eSchool</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav custom-nav pl-5">

        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link custom-nav-item" href="#popular-courses-section">Course</a>
          </li>
          <li class="nav-item">
              <a class="nav-link custom-nav-item" href="#contact-section">Contact Us</a>
          </li>
                
        <?php
        session_start();
        if (isset($_SESSION['is_login'])) {
          echo '
          <li class="nav-item">
            <a class="nav-link" href="#">Quize and Assessment</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="includes/paymentstatus.php">Payment Status</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="student/stufeedback.php">Feedback</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="student/logout.php">Log Out</a>
          </li>
          <li class="nav-item">
            <a class="nav-link custom-nav-item" href="student/stuprofile.php">My Profile</a>
          </li>-->
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Profile
          </a>
          <ul class="dropdown-menu bg-secondary">
            <li><a class="dropdown-item" href="student/stuprofile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="student/logout.php">Log Out</a></li>
          </ul>
        </li>
          ';
        } else {
          echo '          
            <li class="nav-item">
            <a class="nav-link " href="#" data-bs-toggle="modal" data-bs-target="#examplesModal">Login</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal">Sign UP</a>
          </li>-->
          ';
        }

        ?>       
        
      </ul>
    </div>
  </div>
</nav>
	<!--end nav bar-->

	

</body>
</html>