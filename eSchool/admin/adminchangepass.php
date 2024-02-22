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


<!--update password form start-->
<?php
	// Initialize variables
	$admin_email = '';
	$passmsg = '';
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adminPassUpdateBtn'])) {
		    if (!empty($_POST['newpass']) && !empty($_POST['newcpass'])) {
		        // Fetch logged-in admin's email from session
		        $admin_email = $_SESSION['adminlogemail'];
		        
		        $new_password = $_POST['newpass'];
		        $confirm_password = $_POST['newcpass'];

		        if ($new_password === $confirm_password) {
		            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
		            
		            // Update the admin's password
		            $update_sql = "UPDATE admin SET a_password = ? WHERE a_email = ?";
		            $update_stmt = $conn->prepare($update_sql);

		            if ($update_stmt) {
		                $update_stmt->bind_param("ss", $hashed_password, $admin_email);
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

		// Fetch admin's email from the session
		$admin_email = isset($_SESSION['adminlogemail']) ? $_SESSION['adminlogemail'] : '';

?>

<!-- Your HTML form -->
<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5" method="POST" action="">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $admin_email; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="newpass">New Password</label>
                    <input type="password" class="form-control" id="newpass" name="newpass">
                </div>
                <div class="form-group">
                    <label for="newcpass">Confirm Password</label>
                    <input type="password" class="form-control" id="newcpass" name="newcpass">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdateBtn">Update</button>
                <?php if (!empty($passmsg)) {
                    echo $passmsg;
                } ?>
            </form>
        </div>
    </div>
</div>
	
	<!-- <div class="col-sm-9 mt-5">
	    <div class="row">
	        <div class="col-sm-6">
	            <form class="mt-5 mx-5" method="POST" action="">
	                <div class="form-group">
	                    <label for="inputEmail">Email</label>
	                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php if (isset($row['a_email'])) {echo $row['a_email'];} ?>" readonly>
	                </div>
	                <div class="form-group">
	                    <label for="newpass">New Password</label>
	                    <input type="password" class="form-control" id="newpass" name="newpass">
	                </div>
	                <div class="form-group">
	                    <label for="newcpass">Confirm Password</label>
	                    <input type="password" class="form-control" id="newcpass" name="newcpass">
	                </div>
	                <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdateBtn">Update</button>
	                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
	                <?php if (isset($passmsg)) {
	                    echo $passmsg;
	                } ?>
	            </form>
	        </div>
	    </div>
	</div>

<!--update password form end-->


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adminPassUpdateBtn'])) {
    if (!empty($_POST['inputEmail']) && !empty($_POST['newpass']) && !empty($_POST['newcpass'])) {
        $admin_email = $_POST['inputEmail'];
        $new_password = $_POST['newpass'];
        $confirm_password = $_POST['newcpass'];

        // Define $admin_email variable before its use
		$admin_email = '';

        // Retrieve the admin's email from the database
		$sql = "SELECT a_email FROM admin WHERE a_email = ?";
		$stmt = $conn->prepare($sql);

		if ($stmt) {
		    $stmt->bind_param("s", $admin_email);
		    $stmt->execute();
		    $result = $stmt->get_result();

		    if ($result->num_rows === 1) {
		        $row = $result->fetch_assoc();
		        $admin_email = isset($row['a_email']) ? $row['a_email'] : '';
		    
		    $stored_password = $row['a_password'];

		    // Check if new password and confirm password match
		    if ($new_password === $confirm_password) {
		        // Update the admin's password
		        $update_sql = "UPDATE admin SET a_password = ? WHERE a_email = ?";
		        $update_stmt = $conn->prepare($update_sql);

		        if ($update_stmt) {
		            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
		            $update_stmt->bind_param("ss", $hashed_password, $admin_email);
		            $update_stmt->execute();
		            $passmsg = "<div class='alert alert-success mt-2' role='alert'>Password changed successfully</div>";
		        } else {
		            $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Failed to update password</div>";
		        }
		    	} else {
		        $passmsg = "<div class='alert alert-danger mt-2' role='alert'>New password and confirm password do not match</div>";
		    }
			} else {
			    $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Admin not found</div>";
			}

        } else {
            $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Database error</div>";
        }
    } else {
        $passmsg = "<div class='alert alert-danger mt-2' role='alert'>Please fill in all fields</div>";
    }
}
		// if (isset($_SESSION['is_admin_login']) && $_SESSION['is_admin_login'] == true) {
		//     $adminEmail = $_SESSION['adminlogemail'];
		// } 
		// else {
		//     echo "<script>location.href='../index.php';</script>";
		// }

		// // $adminEmail = $_SESSION['adminlogemail'];
		// if (isset($_REQUEST['adminPassUpdateBtn'])) {
		// 	// if (($_REQUEST['adminPass']) == "")
		// 	if (($_REQUEST['newpass']) == "") {
		// 		$passmsg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">All Fields are Required !</div>';
		// 	}
		// 	else {
		// 		$sql = "SELECT * FROM admin WHERE a_email = '$adminEmail'";
		// 		$result -> $conn->query($sql);
		// 		if ($result->num_rows==1) {
		// 			$adminPass = $_REQUEST['adminPass'];
		// 			$sql = "UPDATE admin SET a_password = '$adminPass' WHERE a_email = '$adminEmail'";
		// 			if ($conn->query($sql) == TRUE) {
		// 				$passmsg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Password Update Successfull !</div>';
		// 			}
		// 			else{
		// 				$passmsg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5" role="alert">Unable to Update Password !</div>';
		// 			}
		// 		}
		// 	}
		// }
	?> -->


	<!-- <div class="col-sm-9 mt-5">
		<div class="row">
			<div class="col-sm-6">
				<form class="mt-5 mx-5">
					<div class="form-group">
	                    <label for="inputEmail">Email</label>
	                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $admin_email; ?>" readonly>
	                </div> -->



					<!-- <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php if (isset($row['a_email'])) {echo $row['a_email'];} ?>" readonly>
                </div> -->
					<!-- <div class="form-group">
						<label for="inputEmail">Email</label>
						<input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $adminEmail; ?>" readonly>
					</div> -->
					<!-- <div class="form-group">
						<label for="newpass">New Password</label>
						<input type="password" class="form-control" id="newpass" name="newpass">
					</div>
					<div class="form-group">
						<label for="newcpass">Confirm Password</label>
						<input type="password" class="form-control" id="newcpass" name="newcpass">
					</div>
					<button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdateBtn">Update</button>
					<button type="reset" class="btn btn-secondary mt-4">Reset</button>
					<?php if (isset($passmsg)) {
						echo $passmsg;
					} ?>
				</form>
			</div>
		</div>
	</div> -->



	<!--footer area start-->
	<?php include('../admin/includes/footer.php')?>
	<!--footer area end-->