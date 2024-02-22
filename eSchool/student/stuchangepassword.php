<!--header area start-->
	<?php
	// Start or resume a session
    session_start();


    // Include necessary files
    include_once('includes/header.php');
    include_once('includes/dbconnection.php');

	if (isset($_SESSION['is_login'])) {
		
	}
	else {
		echo "<script>location.href='../index.php';</script>";
	}
	?>
<!--header area end-->


<!--update password form start-->
<?php
	// Initialize variables
	$stu_email = '';
	$passmsg = '';
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['stuPassUpdateBtn'])) {
		    if (!empty($_POST['newpass']) && !empty($_POST['newcpass'])) {
		        // Fetch logged-in admin's email from session
		        $stu_email = $_SESSION['stuEmail'];
		        
		        $new_password = $_POST['newpass'];
		        $confirm_password = $_POST['newcpass'];

		        if ($new_password === $confirm_password) {
		            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
		            
		            // Update the admin's password
		            $update_sql = "UPDATE student SET stu_password = ? WHERE stu_email = ?";
		            $update_stmt = $conn->prepare($update_sql);

		            if ($update_stmt) {
		                $update_stmt->bind_param("ss", $hashed_password, $stu_email);
		                $update_stmt->execute();
		                $passmsg = "<div class='alert alert-success mt-2' role='alert'>Password changed successfully</div>";
		            } else {
		                $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Failed to update password</div>";
		            }
		        } else {
		            $passmsg = "<div class='alert alert-danger mt-2' role='alert'>New password and confirm password do not match</div>";
		        }
		    } else {
		        $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Please fill in all fields</div>";
		    }
		}

		// Fetch student's email from the session
		$stu_email = isset($_SESSION['stuEmail']) ? $_SESSION['stuEmail'] : '';

?>

		<!-- Your HTML form -->
		<div class="col-sm-9 mt-5">
		    <div class="row">
		        <div class="col-sm-6">
            <h1 class="text-center mt-2">Student Change Password</h1>
		            <form class="mt-5 mx-5" method="POST" action="">
		                <div class="form-group">
		                    <label for="inputEmail">Email</label>
		                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $stu_email; ?>" readonly>
		                </div>
		                <div class="form-group">
		                    <label for="newpass">New Password</label>
		                    <input type="password" class="form-control" id="newpass" name="newpass">
		                </div>
		                <div class="form-group">
		                    <label for="newcpass">Confirm Password</label>
		                    <input type="password" class="form-control" id="newcpass" name="newcpass">
		                </div>
		                <button type="submit" class="btn btn-danger mr-4 mt-4" name="stuPassUpdateBtn">Update</button>
		                <?php if (!empty($passmsg)) {
		                    echo $passmsg;
		                } ?>
		            </form>
		        </div>
		    </div>
		</div>

	</div>
</div>

<!--Footer Start-->
<?php include('includes/footer.php');?>
<!--Footer end-->
	

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['stuPassUpdateBtn'])) {
    if (!empty($_POST['inputEmail']) && !empty($_POST['newpass']) && !empty($_POST['newcpass'])) {
        $stu_email = $_POST['inputEmail'];
        $new_password = $_POST['newpass'];
        $confirm_password = $_POST['newcpass'];

        // Define $student variable before its use
		$stu_email = '';

        // Retrieve the student's email from the database
		$sql = "SELECT stu_email FROM student WHERE stu_email = ?";
		$stmt = $conn->prepare($sql);

		if ($stmt) {
		    $stmt->bind_param("s", $stu_email);
		    $stmt->execute();
		    $result = $stmt->get_result();

		    if ($result->num_rows === 1) {
		        $row = $result->fetch_assoc();
		        $stu_email = isset($row['stu_email']) ? $row['stu_email'] : '';
		    
		    $stored_password = $row['stu_password'];

		    // Check if new password and confirm password match
		    if ($new_password === $confirm_password) {
		        // Update the student's password
		        $update_sql = "UPDATE student SET stu_password = ? WHERE stu_email = ?";
		        $update_stmt = $conn->prepare($update_sql);

		        if ($update_stmt) {
		            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
		            $update_stmt->bind_param("ss", $hashed_password, $stu_email);
		            $update_stmt->execute();
		            $passmsg = "<div class='alert alert-success mt-2' role='alert'>Password changed successfully</div>";
		        } else {
		            $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Failed to update password</div>";
		        }
		    	} else {
		        $passmsg = "<div class='alert alert-danger mt-2' role='alert'>New password and confirm password do not match</div>";
		    }
			} else {
			    $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Student not found</div>";
			}

        } else {
            $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Database error</div>";
        }
    } else {
        $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Please fill in all fields</div>";
    }
}
?>