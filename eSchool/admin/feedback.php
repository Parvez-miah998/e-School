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
		<p class="text-center bg-dark text-white p-2">List of Feedback</p>
		<?php 
			$sql = "SELECT * FROM feedback";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    echo '
			    <table class="text-center table">
			        <thead>
			            <tr>
			                <th scope="col">Feedback</th>
			                <th scope="col">Content</th>
			                <th scope="col">Student ID</th>
			                <th scope="col">Action</th>
			            </tr>
			        </thead>
			        <tbody>';
			    while ($row = $result->fetch_assoc()) {
			        echo '<tr>';
			        echo '<th scope="row">' . $row["f_id"] . '</th>';
			        echo '<td>' . $row["f_content"] . '</td>';
			        echo '<td>' . $row["stu_id"] . '</td>';
			        echo '<td>
			            <form action="" method="POST" class="d-inline">
			                <input type="hidden" name="id" value=' . $row["f_id"] . '>
			                <button class="btn btn-secondary" name="delete" value="Delete">
			                    <i class="far fa-trash-alt"></i>
			                </button>
			            </form>
			        </td>';
			        echo '</tr>';
			    }
			    echo '</tbody>
			    </table>';
			}
			else{
				echo "0 Result";
			}

			//Delete code for feedback
			if (isset($_REQUEST['delete'])) {
				$sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
				if ($conn->query($sql) == TRUE) {
					echo '<meta http-equiv ="refresh" content= "0;url=?deleted" />';
				}
				else{
					echo "Unable to Delete Data !";
				}
			}
		?>
	</div>


<!--footer area start-->
	<?php include('../admin/includes/footer.php')?>
<!--footer area end-->