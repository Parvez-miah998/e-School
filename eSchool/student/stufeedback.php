<?php
// Start or resume a session
    session_start();


    // Include necessary files
    include_once('includes/header.php');
    include_once('includes/dbconnection.php');

    // Check if the user is logged in
    if (!isset($_SESSION['stuEmail'])) {
        echo "<script>location.href='../index.php';</script>";
        exit; // Exit to prevent further execution
    }

    $stuEmail = $_SESSION['stuEmail'];

    // Retrieve student details
    $sql = "SELECT * FROM student WHERE stu_email = '{$stuEmail}'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stuid = $row['stu_id'];
    }

    $passmsg = ''; // Initialize $passmsg variable

    // Process form submission
    if (isset($_POST['submitFeedbackBtn'])) {
        if (empty($_POST['f_content'])) {
            $passmsg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5">All Fields are Required !</div>';
        } else {
            $fcontent = $_POST['f_content'];
            $sql = "INSERT INTO feedback (f_content, stu_id) VALUES (?, ?)";
            
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("si", $fcontent, $stuid);
                if ($stmt->execute()) {
                    $passmsg = '<div class="alert alert-success col-sm-6 mt-2 ml-5">Submitted Successfully!</div>';
                } else {
                    $passmsg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5">Unable to Submit</div>';
                }
                $stmt->close();
            } else {
                $passmsg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5">Error in Database Query</div>';
            }
        }
}
?>

        <!-- HTML form -->
        <div class="col-sm-6 mt-5">
            <h1 class="text-center mt-2">Student Feedback</h1>
            <form class="mx-5" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="stuId">Student ID</label>
                    <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if (isset($stuid)) {echo $row['stu_id'];} ?>" readonly>
                </div><br>
                <div class="form-group">
                    <label for="f_content">Feedback</label>
                    <textarea class="form-control" id="f_content" name="f_content" rows="2"></textarea>
                </div><br>
                <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Submit</button>
                <?php echo $passmsg; ?>
            </form>
        </div>
    </div>
</div>

<!--Footer Start-->
<?php include('includes/footer.php');?>
<!--Footer end-->
