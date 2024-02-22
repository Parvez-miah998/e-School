<?php

session_start();

include_once('includes/dbconnection.php');

//Student Login verification code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['stulogemail']) && !empty($_POST['stulogpass'])) {
        $stuemail = $_POST['stulogemail'];
        $stupass = $_POST['stulogpass'];

        $sql = "SELECT stu_password FROM student WHERE stu_email = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $stuemail);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                
                if (password_verify($stupass, $row['stu_password'])) {
                    // Start the session if it's not already started
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }

                    // Set the session variable to indicate successful login
                    $_SESSION['is_login'] = true;
                    $_SESSION['stuEmail'] = $stuemail;

                    echo json_encode(["status" => "OK", "message" => "Login Successful"]);
                    exit();
                }  
                else {
                    echo json_encode(["status" => "Failed", "message" => "Incorrect password"]);
                    exit();
                }
            } else {
                echo json_encode(["status" => "Failed", "message" => "Email not found"]);
                exit();
            }
        } else {
            echo json_encode(["status" => "Failed", "message" => "Database error"]);
            exit();
        }
    } else {
        echo json_encode(["status" => "Failed", "message" => "Please enter both email and password."]);
        exit();
    }
} else {
    echo json_encode(["status" => "Failed", "message" => "Invalid request method"]);
    exit();
}
?>
