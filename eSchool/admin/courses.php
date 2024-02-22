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
		<p class="text-center bg-dark text-white p-2">List of Courses</p>
		<?php
		$sql = "SELECT * FROM courses";
		$result = $conn->query($sql);
		if ($result ->num_rows > 0) {
		
		?>
		<table class="text-center table">
			<thead>
				<tr>
					<th scope="col">Course Id</th>
					<th scope="col">Name</th>
					<th scope="col">Author</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $result->fetch_assoc()) {
				echo '<tr>';
					echo '<th scope="row">'.$row['c_id'].'</th>';
					echo '<td>'.$row['c_name'].'</td>';
					echo '<td>'.$row['c_author'].'</td>';
					echo '<td>
						<form action="../admin/editcourse.php" method="POST" class="d-inline">
						<input type="hidden" name="id" value='.$row["c_id"].'>
						<button type="submit" class="btn btn-info mr-3" name="view" value="View" href="../admin/editcourse.php"> <i class="fas fa-pen"></i> </button>
						</form>
						<form action="" method="POST" class="d-inline">
						<input type="hidden" name="id" value='.$row["c_id"].'>
						<button type="submit" class="btn btn-secondary" name="delete" value="Delete"> <i class="far fa-trash-alt"></i> </button>
						</form>
					</td>
				</tr>'; ?>
			<?php } ?>
			</tbody>
		</table>
		<?php } else echo "This Table hasn't any value !";?>
		<!--Table end-->

			<div>
				<a class="btn btn-danger box" href="../admin/addcourses.php">
					<i class="fas fa-plus fa-2x"></i>
				</a>
			</div>
	</div>

	<!--Course Delete Button start-->
	<?php
	if (isset($_REQUEST['delete'])) {
		$sql = "DELETE FROM courses WHERE c_id = {$_REQUEST['id']}";
		if ($conn->query($sql) == TRUE) {
			echo '<meta http-equiv ="refresh" content= "0;url=?deleted" />';
		}
		else{
			echo "Unable to Delete Data !";
		}
	}
	?>
	<!--Course Delete Button end-->

	<!--footer area start-->
	<?php include('../admin/includes/footer.php')?>
	<!--footer area end-->