<?php

	// Start the session
	session_start();

	// Include necessary files
	include_once('includes/header.php');
	include_once('includes/dbconnection.php');
	if (isset($_SESSION['is_admin_login'])) {
        
    }
    else {
    	echo "<script>location.href='../index.php';</script>";
        exit; // Exit to prevent further execution
    }

?>
<div class="col-sm-9 mt-5 mx-3" style="margin-left:20px !important;">
	  <h2 class="text-center my-4 bg-light">Sales Report</h2>
	    <div class="container-fluid">
	        <form action="" method="post" class="d-print-none">
	            <div class="form-row">
	                <div class="form-group col-md-2">
	                	<label class="offset-sm-3 col-form-label" style="padding: 0px !important;margin-left: 0px!important;"><b>Start Date</b></label>
	                	<input type="date" class="form-control" id="startdate" name="startdate">
	                </div><br>
	                <div class="form-group col-md-2">
	                	<label class="offset-sm-3 col-form-label" style="padding: 0px !important;margin-left: 0px!important;"><b>End Date</b></label>
	                	<input type="date" class="form-control" id="enddate" name="enddate">
	                </div><br>
	                <div class="form-group">
	                	<input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
	                </div>
	            </div><br>
	        </form><br><br>
	    <?php

			if (isset($_REQUEST['searchsubmit'])) {
	    	$startdate = $_REQUEST['startdate'];
	    	$enddate = $_REQUEST['enddate'];

	    	$sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";
	    	$result = $conn->query($sql);
	    	if ($result->num_rows > 0) {
	    		$tableData = array();
	    		echo '
	    		<p class="bg-dark text-white p-2 mt4">Details</p>
	    		<table class="table">
	    			<thead>
	    				<tr>
	    					<th scope="col">Order ID</th>
	    					<th scope="col">Course ID</th>
	    					<th scope="col">Student Email</th>
	    					<th scope="col">Payment Status</th>
	    					<th scope="col">Amount</th>
	    					<th scope="col">Order Date</th>
	    				</tr>
	    			</thead>
	    			<tbody>';
	    			while($row = $result->fetch_assoc()){
	    				$tableData[] = $row;
	    				echo '<tr>
	    					<th scope="row">'.$row["order_id"].'</th>
	    					<td>'.$row["c_id"].'</td>
	    					<td>'.$row["stu_email"].'</td>
	    					<td>'.$row["status"].'</td>
	    					<td>'.$row["amount"].'</td>
	    					<td>'.$row["order_date"].'</td>
	    				</tr>';
	    			}
		            $_SESSION['sales_table_data'] = $tableData;

	    			echo '
	    			</tbody>
	    		</table>';
	    		// echo '
	    		// 	<form action="salesreport.php" method="post" target="_blank"><button type="submit" class="btn btn-secondary" name="generate_pdf"><i class="fa-solid fa-print"></i> PDF</button></form>';

	    		 echo '
				    <form action="salesreport.php" method="post" target="_blank">
				        <button type="submit" class="btn btn-secondary" id="generate_pdf" name="generate_pdf"><i class="fa-solid fa-print"></i> PDF</button>
				    </form>';
	    		
	    	}
	    	else {
	    		echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Records Found!</div>";
	    	}
	    }
		?>
	</div>

		
</div>
</div>
<!--footer area start-->
	<?php include('../admin/includes/footer.php')?>
<!--footer area end-->

