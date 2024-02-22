<?php

    session_start();
    include_once('includes/dbconnection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stuname = $_POST['stuname'];
        $stucontact = $_POST['stucontact'];
        $stuemail = $_POST['stuemail'];
        $stuinsname = $_POST['stuinsname'];
        $stumajor = $_POST['stumajor'];
        $stupass = $_POST['stupass'];
        $stuconfirmpass = $_POST['stuconfirmpass'];

        // Check if any of the required fields are empty
        if (empty($stuname) || empty($stucontact) || empty($stuemail) || empty($stuinsname) || empty($stumajor) || empty($stupass) || empty($stuconfirmpass)) {
            echo json_encode(["status" => "Failed", "message" => "Please fill in all required fields."]);
            exit();
        }

        // Check if the email already exists in the database
        $sql = "SELECT stu_email FROM student WHERE stu_email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $stuemail);
        $stmt->execute();
        $result = $stmt->get_result(); // Get the result set

        if ($result->num_rows > 0) {
            echo json_encode(["status" => "Failed", "message" => "This Email is already registered."]);
            exit();
        }
        if ($stupass !== $stuconfirmpass) {
            echo json_encode(["status" => "Failed", "message" => "Passwords do not match"]);
            exit();
        }

        // Hash the password
        $hashedPassword = password_hash($stupass, PASSWORD_DEFAULT);

        // Prepare the SQL statement for registration
        $sql = "INSERT INTO student(stu_name, stu_contact, stu_email, stu_insname, stu_major, stu_password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('ssssss', $stuname, $stucontact, $stuemail, $stuinsname, $stumajor, $hashedPassword);

            if ($stmt->execute()) {
                echo json_encode(["status" => "OK", "message" => "Registration Successful"]);
                exit();
            } else {
                echo json_encode(["status" => "Failed", "message" => "This Email is already registered."]);
            }

            $stmt->close();
        } else {
            echo json_encode(["status" => "Failed", "message" => "Prepare statement failed."]);
        }
    } else {
        echo json_encode(["status" => "Failed", "message" => "Invalid request method"]);
    }



?>


<!--Registration part-->
