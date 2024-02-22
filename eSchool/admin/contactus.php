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
		<p class="text-center bg-dark text-white p-2">List of Problems</p>
		<?php
		$sql = "SELECT * FROM contactus";
		$result = $conn->query($sql);
		if ($result ->num_rows > 0) {
		
		?>
		<table class="text-center table">
			<thead>
				<tr>
					<th scope="col">Contact Id</th>
					<th scope="col">Name</th>
					<th scope="col">Subject</th>
					<th scope="col">Email</th>
					<th scope="col">Problems</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $result->fetch_assoc()) {
				echo '<tr>';
					echo '<th scope="row">'.$row['ctus_id'].'</th>';
					echo '<td>'.$row['ctus_name'].'</td>';
					echo '<td>'.$row['ctus_subject'].'</td>';
					echo '<td>'.$row['ctus_email'].'</td>';
					echo '<td>'.$row['ctus_desc'].'</td>';
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