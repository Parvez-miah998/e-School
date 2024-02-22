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

<div class="col-sm-10 mt-5">
		<!--Table start-->
		<p class="text-center bg-dark text-white p-2">List of Students</p>
		<?php
		$sql = "SELECT * FROM student";
		$result = $conn->query($sql);
		if ($result ->num_rows > 0) {
		
		?>
		<table class="text-center table">
			<thead>
				<tr>
					<th scope="col">Student Id</th>
					<th scope="col">Student Name</th>
					<th scope="col">S Contact</th>
					<th scope="col">S Email</th>
					<th scope="col">Institution</th>
					<th scope="col">Major/Class</th>
					<th scope="col">Address</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $result->fetch_assoc()) {
				echo '<tr>';
					echo '<th scope="row">'.$row['stu_id'].'</th>';
					echo '<td>'.$row['stu_name'].'</td>';
					echo '<td>'.$row['stu_contact'].'</td>';
					echo '<td>'.$row['stu_email'].'</td>';
					echo '<td>'.$row['stu_insname'].'</td>';
					echo '<td>'.$row['stu_major'].'</td>';
					echo '<td>'.$row['stu_paddress'].'</td>';
					// echo '<td>
					// 	<form action="../admin/editstudent.php" method="POST" class="d-inline">
					// 	<input type="hidden" name="id" value='.$row["stu_id"].'>
					// 	<button type="submit" class="btn btn-info mr-3" name="view" value="View" href="../admin/editcourse.php"> <i class="fas fa-pen"></i> </button>
					// 	</form>
					// 	<form action="" method="POST" class="d-inline">
					// 	<input type="hidden" name="id" value='.$row["stu_id"].'>
					// 	<button type="submit" class="btn btn-secondary" name="delete" value="Delete"> <i class="far fa-trash-alt"></i> </button>
					// 	</form>
					// </td>
				echo '</tr>'; ?>
			<?php } ?>
			</tbody>
		</table>
		<?php } else echo "This Table hasn't any value !";?>
		<!--Table end-->

			<!-- <div>
				<a class="btn btn-danger box" href="../admin/addnewstudent.php">
					<i class="fas fa-plus fa-2x"></i>
				</a>
			</div> -->
	</div>

	<!--Student Delete Button start-->
	<?php
		// if (isset($_REQUEST['delete'])) {
		// 	$sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
		// 	if ($conn->query($sql) == TRUE) {
		// 		echo '<meta http-equiv ="refresh" content= "0;url=?deleted" />';
		// 	}
		// 	else{
		// 		echo "Unable to Delete Data !";
		// 	}
		// }
	?>
	<!--Student Delete Button end-->


	<!--footer area start-->
	<?php include('../admin/includes/footer.php')?>
	<!--footer area end-->