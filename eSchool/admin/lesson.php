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

	<div class="col-sm-9 mt-5 mx-3" style="margin-left:20px !important;">
		<h2 class="text-center my-4 bg-light"><b>Lesson</b></h2>
	  <form action="" class="mt-3 form-inline d-inline d-print-none">
	    <label for="checkid" class="mr-2">Enter Course ID:</label>
	    <input type="text" class="form-control mr-2" id="checkid" name="checkid" style="max-width:300px;"><br>
	    <button type="submit" class="btn btn-danger">Search</button>
	  </form><br><br>
	    <?php

			$sql = "SELECT c_id FROM courses";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				if (isset($_REQUEST['checkid']) && ($_REQUEST['checkid']) == $row['c_id']) {
					$sql = "SELECT * FROM courses WHERE c_id = {$_REQUEST['checkid']}";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();

					if (($row['c_id']) == $_REQUEST['checkid']) {
						$_SESSION['c_id'] = $row['c_id'];
						$_SESSION['c_name'] = $row['c_name'];
					?>
					<h3 class="text-center bg-dark text-white p-2">Course ID: <?php if (isset($row['c_id'])) {
						echo $row['c_id'];
					} ?> <br>Course Name: <?php if (isset($row['c_id'])) {
						echo $row['c_name'];
					} ?> </h3>
					<?php 

					//Code for Lesson Table
					$sql = "SELECT * FROM lessons WHERE c_id = {$_REQUEST['checkid']}";
					$result = $conn->query($sql);
					echo '
					<table class="table text-center">
					<thead>
					<tr>
					<th scope="col">Lesson ID</th>
					<th scope="col">Lesson Name</th>
					<!--<th scope="col">Lesson Description</th>-->
					<th scope="col">Lesson Link</th>
					<th scope="col">Action</th>
					</tr>
					</thead>';
					while ($row = $result->fetch_assoc()) {
						echo '<tr>';
						echo '<th scope="row">'.$row["l_id"].'</th>';
						echo '<td>'.$row["l_name"].'</td>';
						//echo '<td>'.$row["l_desc"].'</td>';
						echo '<td>'.$row["l_link"].'</td>';
						echo '<td><form action="editlesson.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='.$row["l_id"].'> <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button></form>
						<form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='.$row["l_id"].'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
						</td>
						</tr>
						';
					}
					echo '</table>';
					 
					
					}
					else {
						echo '<div class="alert alert-dark mt-4" role="alert">Course Not Found !</div>';
					}

					if (isset($_REQUEST['delete'])) {
						$sql = "DELETE FROM lessons WHERE l_id = {$_REQUEST['id']}";
						if ($conn->query($sql) == TRUE) {
							echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
						}
						else{
							echo "Unable to Delete";
						}
					}
				}
			}
		?>
	</div>

		<?php

		if (isset($_SESSION['c_id'])) {
			echo '
					<div>
						<a class="btn btn-danger box" href="../admin/addlesson.php">
							<i class="fas fa-plus fa-2x"></i>
						</a>
					</div>';
		}

		?>
			

	



<!--footer area start-->
	<?php include('../admin/includes/footer.php')?>
<!--footer area end-->