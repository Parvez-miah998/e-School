<!--header area start-->
	<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	include('includes/header.php');
	include_once('includes/dbconnection.php');

	if (isset($_SESSION['is_admin_login'])) {
		
	}
	else {
		echo "<script>location.href='../index.php';</script>";
	}
	?>
<!--header area end-->
				<!--Sidebar end-->
				<?php  
					$sql = "SELECT COUNT(*) as total_course FROM courses";
					$result = $conn->query($sql);
					if ($result && $result -> num_rows > 0) {
						$row = $result->fetch_assoc();
						$total_course = $row ['total_course'];
					}
					else {
						$total_course = 0;
					}
				?>
				<div class="col-sm-9 mt-5">
					<div class="row mx-5 text-center">
						<div class="col-sm-4 mt-5">
							<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
								<div class="card-header"><i class="fa-solid fa-book"></i> Courses</div>
								<div class="card-body">
									<h4 class="card-title"><?php echo $total_course; ?></h4>
									<a class="btn text-white" href="courses.php">View</a>
								</div>
							</div>
						</div>
						<?php
						    $sql = "SELECT COUNT(*) as total_students FROM student"; 
						    $result = $conn->query($sql);

						    if ($result && $result->num_rows > 0) {
						        $row = $result->fetch_assoc();
						        $total_students = $row['total_students']; 
						    } else {
						        $total_students = 0; 
						    }
						?>
						<div class="col-sm-4 mt-5">
						    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
						        <div class="card-header"><i class="fa-solid fa-users"></i> Student</div>
						        <div class="card-body">
						            <h4 class="card-title"><?php echo $total_students; ?></h4> 
						            <a class="btn text-white" href="students.php">View</a>
						        </div>
						    </div>
						</div>

						<div class="col-sm-4 mt-5">
							<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
								<div class="card-header"><i class="fa-brands fa-salesforce"></i> Sold</div>
								<div class="card-body">
									<h4 class="card-title">15</h4>
									<a class="btn text-white" href="#">View</a>
								</div>
							</div>
						</div>
						<div class="col-sm-4 mt-5">
							<?php  
								$sql = "SELECT COUNT(*) as total_probs FROM contactus";
								$result = $conn->query($sql);
								if ($result && $result->num_rows > 0) {
									$row = $result->fetch_assoc();
									$total_probs = $row['total_probs'];
								}
								else {
									$total_probs = 0;
								}
							?>
							<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
								<div class="card-header"><i class="fa-brands fa-salesforce"></i> Users Problem</div>
								<div class="card-body">
									<h4 class="card-title"><?php echo $total_probs; ?></h4>
									<a class="btn text-white" href="contactus.php">View</a>
								</div>
							</div>
						</div>
					</div>
					<?php
					// Query to fetch data from the courseorder table
					$sql = "SELECT co_id, order_id, amount, stu_email, order_date FROM courseorder";
					$result = $conn->query($sql);
					if ($result ->num_rows > 0){

					?>
					<div class="mx-5 mt-5 text-center">
					    <p class="bg-dark text-white p-2">Course Ordered</p>
					    <table class="table">
					        <thead>
					            <tr>
					                <th scope="col">Course ID</th>
					                <th scope="col">Order ID</th>
					                <th scope="col">Student Email</th>
					                <th scope="col">Order Date</th>
					                <th scope="col">Amount</th>
					                <th scope="col">Action</th>
					            </tr>
					        </thead>
					        <tbody>
					            <?php
					            // Fetching data and populating the table rows dynamically
					            while ($row = $result->fetch_assoc()) {
					                echo "<tr>";
					                echo "<th scope='row'>" . $row['co_id'] . "</th>";
					                echo "<td>" . $row['order_id'] . "</td>";
					                echo "<td>" . $row['stu_email'] . "</td>";
					                echo "<td>" . $row['order_date'] . "</td>";
					                echo "<td>" . $row['amount'] . "</td>";
					                echo "<td> 
					                        <form method='post'>
					                            <input type='hidden'name='id' value='" . $row['co_id'] . "'>
					                            <button type='submit' class='btn btn-secondary' name='delete'><i class='fas fa-trash'></i></button>
					                        </form>
					                      </td>";
					                echo "</tr>";
					            }
						    }
					            ?>
					        </tbody>
					    </table>
					</div>
					<!-- Course Order Delete Button start -->
<?php
if (isset($_REQUEST['delete'])) {
    $delete_id = $_REQUEST['id'];
    $sql = "DELETE FROM courseorder WHERE co_id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        echo '<meta http-equiv="refresh" content="0;url=?deleted" />';
    } else {
        echo "Unable to Delete Data!";
    }
}
?>
<!-- Course Order Delete Button end -->
				</div>

		

	<!--Footer area start-->
	<?php include('../admin/includes/footer.php')?>
	<!--Footer area end-->
