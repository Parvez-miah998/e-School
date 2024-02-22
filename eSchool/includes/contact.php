<?php


// Check if the form is submitted
if (isset($_POST['submit'])) {
    $form_token = $_POST['form_token'];

    // Validate form token
    if (!isset($_SESSION['form_token']) || empty($_SESSION['form_token']) || $_SESSION['form_token'] !== $form_token) {
        // Token invalid or not set, handle as a new submission
        $_SESSION['form_token'] = $form_token;

        if (empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['email']) || empty($_POST['massage'])) {
            echo '<p class="text-danger" style="text-align:center;font-family:bolder;">Please fill in all fields.';
            if (empty($_POST['name'])) {
                echo ' Name';
            }
            if (empty($_POST['subject'])) {
                echo ' Subject';
            }
            if (empty($_POST['email'])) {
                echo ' Email';
            }
            if (empty($_POST['massage'])) {
                echo ' Description';
            }
            echo '.</p>';
        } else {
            // Get the form data and sanitize it
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $subject = mysqli_real_escape_string($conn, $_POST['subject']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $message = mysqli_real_escape_string($conn, $_POST['massage']);

            // SQL query to insert data into the contactus table
            $sql = "INSERT INTO contactus (ctus_name, ctus_subject, ctus_email, ctus_desc)
                    VALUES ('$name', '$subject', '$email', '$message')";

            // Perform the insert operation
            if ($conn->query($sql) === TRUE) {
                echo '<p class="text-success" style="text-align:center;font-family:bolder;font-size: 20px !important;color:white !important;">Thank you for submitting your Problems. We will be in touch soon.</p>';
                href:"header('Location: ../index.php')"; 
                exit;
            } else {
                echo '<p class="text-danger" style="text-align:center;font-family:bolder;">Error: ' . $conn->error . '</p>';
            }
        }
    } else {
        // Token matches, indicating a resubmission
        echo '<p class="text-warning" style="text-align:center;font-family:bolder;font-size: 20px !important;">Problems already submitted! We will be in touch very soon.</p>';
        // Optionally, you can redirect the user or handle the resubmission differently here
    }
} else {
    //echo '<p class="text-danger" style="text-align:center;font-family:bolder;">Form not submitted.</p>';
}
?>


<div class="container mt-4" id="contact-section">
		<h2 class="text-center mb-4">Contact Us</h2>
		<div class="row">
			<div class="col-md-8">
				<form action="" method="post">
					<input class="form-control" type="text" name="name" placeholder="Name" required><br>
					<input class="form-control" type="text" name="subject" placeholder="Subject" required><br>
					<input class="form-control" type="text" name="email" placeholder="Email" required><br>
					<textarea class="form-control" name="massage" placeholder="How can We help you?" style="height: 150px;" required></textarea><br>
					<input type="hidden" name="form_token" value="<?= time() ?>">
					<input type="submit" class="btn btn-primary" value="Send" name="submit"><br><br>
				</form>
			</div>
			<div class="col-md-4 stripe text-white text-cenetr">
				<h4>eSchool</h4>
				<p>eSchool,
				Near Dhaka University,
				Shabag, Dhaka 1100<br />
				Phone: +880215698<br />
				www.eschool.edu.bd
				</p>
			</div>
		</div>
	</div>
