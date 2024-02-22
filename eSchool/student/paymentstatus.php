	<?php

	// Start the session
	session_start();

	// Include necessary files
	include_once('includes/header.php');
	include_once('includes/dbconnection.php');
	if (isset($_SESSION['stuEmail'])) {
        $stuEmail = $_SESSION['stuEmail'];
    }
    else {
    	echo "<script>location.href='../index.php';</script>";
        exit; // Exit to prevent further execution
    }

?>

	<div class="col-sm-10 mt-5" style="background-color: #f7cfff;">
    <div class="container">
        <h2 class="text-center my-4">Payment Status</h2>
        <form action="" method="post">
            <div class="form-group row">
                <label class="offset-sm-3 col-form-label" style="padding: 10px !important;margin-left: 10px!important;">Order ID: </label>
                <div class="offset-sm-3 col-form-label" style="padding: 5px !important;margin-left: 0px!important;margin-bottom: 10px!important;">
                    <input type="text" class="form-control mx-3" name="order_id" style="width: 250px;">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary mx-4" value="Submit" name="submit">
                </div>
            </div>
        </form>
    </div>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    if (isset($_POST['order_id'])) {
	        $order_id = $_POST['order_id'];

	        // Query to fetch payment data based on order_id using prepared statement
	        $query = "SELECT * FROM courseorder WHERE order_id = ?";
	        $stmt = $conn->prepare($query);
	        $stmt->bind_param("s", $order_id);
	        $stmt->execute();
	        $result = $stmt->get_result();

	        if ($result->num_rows > 0) {
	            // Displaying payment data
	            echo "<div class='col-sm-10 mt-5' style='background-color: #f7cfff;'>";
	            echo "<div class='container'>";
	            echo "<h2 class='text-center my-4'>Payment Details</h2>";
	            echo "<table class='table'>";
	            echo "<thead><tr><th>Order ID</th><th>Student Email</th><th>Course ID</th><th>Payment Status</th><th>Amount</th><th>Order Date</th><th>Print</th></tr></thead>";
	            echo "<tbody>";

	            while ($row = $result->fetch_assoc()) {
	                // Displaying payment information in rows
	                echo "<tr>";
	                echo "<td>" . $row['order_id'] . "</td>";
	                echo "<td>" . $row['stu_email'] . "</td>";
	                echo "<td>" . $row['c_id'] . "</td>";
	                echo "<td>" . $row['status'] . "</td>";
	                echo "<td>" . $row['amount'] . "</td>";
	                echo "<td>" . $row['order_date'] . "</td>";
	                echo "<td>
					        <form action='report.php' method='post' target='_blank'>
					            <input type='hidden' name='order_id' value='" . $row['order_id'] . "'>
					            <button type='submit' class='btn btn-secondary' name='generate_pdf'>
					                <i class='fa-solid fa-print'></i> PDF
					            </button>
					        </form>
					      </td>";
	                echo "</tr>";
	            }

	            echo "</tbody></table>";
	            echo "</div>";
	            echo "</div>";
	        } else {
	            echo "No payment data found for the provided order ID.";
	        }
	    }
	}
?>
</div>
				

</div>
</div>


<!--Footer Start-->
<?php include('includes/footer.php');?>
<!--Footer end-->
	