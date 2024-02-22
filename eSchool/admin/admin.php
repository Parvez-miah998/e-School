<?php

 
    // Admin Login verification code

    session_start();
    include_once('../admin/includes/dbconnection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['adminlogemail']) && !empty($_POST['adminlogpass'])) {
            $adminlogemail = $_POST['adminlogemail'];
            $adminlogpass = $_POST['adminlogpass'];

            $sql = "SELECT a_password FROM admin WHERE a_email = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("s", $adminlogemail);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 1) {
                    $row = $result->fetch_assoc();

                    // Previous condition for plaintext passwords
                    if ($adminlogpass === $row['a_password']) {
                        $_SESSION['is_admin_login'] = true;
                        $_SESSION['adminlogemail'] = $adminlogemail;
                        echo json_encode(["status" => "OK", "message" => "Login Successful"]);
                        exit();
                    } elseif (password_verify($adminlogpass, $row['a_password'])) {
                        // New condition for hashed passwords
                        $_SESSION['is_admin_login'] = true;
                        $_SESSION['adminlogemail'] = $adminlogemail;
                        echo json_encode(["status" => "OK", "message" => "Login Successful"]);
                        exit();
                    } else {
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