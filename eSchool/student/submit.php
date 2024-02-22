<?php

require('config.php');
\Stripe\Stripe::setVerifySslCerts(false);
include('includes/dbconnection.php');

try {
    // Retrieve the token and course price from the POST data
    $token = $_POST['stripeToken'];
    $coursePrice = $_POST['coursePrice'];
    $orderID = $_POST['ORDER_ID'];
    $studentEmail = $_POST['CUST_ID'];
    $cid = $_POST['CourseID'];

    // Create the Stripe charge
    $data = \Stripe\Charge::create(array(
        "amount" => $coursePrice * 100,
        "currency" => "usd",
        "description" => "eSchool",
        "source" => $token,
    ));

    if (isset($stuEmail)) {
        $sql = "SELECT c_id FROM courses WHERE c_id = '$cid'"; 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cid = $row["c_id"];
        }
    }
    // Insert into the courseorder table
    $insertQuery = "INSERT INTO courseorder (order_id, stu_email, c_id, status, respmsg, amount, order_date) VALUES ('$orderID', '$studentEmail', '$cid', 'Success', 'Payment Complete', '$coursePrice', NOW())";

    // Execute the query
    // Replace $conn with your database connection variable
    $result = mysqli_query($conn, $insertQuery);


    if ($result) {
    // Display success message
    echo "<!DOCTYPE html>
            <html>
            <head>
                <title>Payment Success</title>
                
            <style>
                body {
                    font-family: Arial, sans-serif;
                    text-align: center;
                    background-color: #f5f5f5;
                    margin: 0;
                    padding: 0;
                    overflow: hidden; /* hide overflowing fireworks */
                }

                .container {
                    margin: 100px auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 5px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    max-width: 400px;
                }

                h1 {
                    font-size: 32px;
                    margin-bottom: 15px;
                    color: #487eb0;
                }

                p {
                    font-size: 20px;
                    color: #434a54;
                    margin-bottom: 20px;
                }

                .firework {
                    position: absolute;
                    top: -20px; /* start off screen */
                    left: random(0, 100) + '%'; /* random horizontal position */
                    animation: blast 2s ease-out; /* animation for the blast */
                    transform: scale(0); /* start small */
                }
                .dot {
                    position: absolute;
                    top: random(0, 100) + '%';
                    left: random(0, 100) + '%';
                    background-color: #f00; /* red */
                    border-radius: 50%;
                    width: 10px;
                    height: 10px;
                    animation: spark 2s ease-out; /* animation for the sparks */
                    transform: scale(0); /* start small */
                }

                @keyframes blast {
                    0% { transform: scale(0); }
                    50% { transform: scale(1.5); }
                    100% { transform: scale(0); }
                }

                @keyframes spark {
                    0% { transform: scale(0); }
                    50% { transform: scale(1); opacity: 1; }
                    100% { transform: scale(0); opacity: 0; }
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Thank You!</h1>
                <h2>Payment successful!</h2>
                <p>Your payment was successful. </p>
            </div>

            <script>
                for (let i = 0; i < 10; i++) {
                    const firework = document.createElement('div');
                    firework.classList.add('firework');
                    document.body.appendChild(firework);

                    for (let j = 0; j < 10; j++) {
                        const dot = document.createElement('div');
                        dot.classList.add('dot');
                        firework.appendChild(dot);
                    }
                }
            </script>

            <script>
                setTimeout(function() {
                    window.location.href = '../index.php';
                }, 5000); // 5 seconds
            </script>
        </body>
    </html>";
} else {
        echo "Error: Failed to insert into the database.";
        exit;
    }
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Handle Stripe exception
    echo "Error: " . $e->getMessage();
    exit;
} catch (\Exception $e) {
    // Handle other errors
    echo "Error: " . $e->getMessage();
    exit;
}

?>

<!-- require('config.php');
\Stripe\Stripe::setVerifySslCerts(false);

try {
    // Retrieve the token and course price from the POST data
    $token = $_POST['stripeToken'];
    $coursePrice = $_POST['coursePrice'];

    // Create the Stripe charge
    $data = \Stripe\Charge::create(array(
        "amount" => $coursePrice * 100,
        "currency" => "usd",
        "description" => "eSchool",
        "source" => $token,
    ));

    // Display success message
    echo "<!DOCTYPE html>
            <html>
            <head>
                <title>Payment Success</title>
                
            <style>
                body {
                    font-family: Arial, sans-serif;
                    text-align: center;
                    background-color: #f5f5f5;
                    margin: 0;
                    padding: 0;
                    overflow: hidden; /* hide overflowing fireworks */
                }

                .container {
                    margin: 100px auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 5px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    max-width: 400px;
                }

                h1 {
                    font-size: 32px;
                    margin-bottom: 15px;
                    color: #487eb0;
                }

                p {
                    font-size: 20px;
                    color: #434a54;
                    margin-bottom: 20px;
                }

                .firework {
                    position: absolute;
                    top: -20px; /* start off screen */
                    left: random(0, 100) + '%'; /* random horizontal position */
                    animation: blast 2s ease-out; /* animation for the blast */
                    transform: scale(0); /* start small */
                }
                .dot {
                    position: absolute;
                    top: random(0, 100) + '%';
                    left: random(0, 100) + '%';
                    background-color: #f00; /* red */
                    border-radius: 50%;
                    width: 10px;
                    height: 10px;
                    animation: spark 2s ease-out; /* animation for the sparks */
                    transform: scale(0); /* start small */
                }

                @keyframes blast {
                    0% { transform: scale(0); }
                    50% { transform: scale(1.5); }
                    100% { transform: scale(0); }
                }

                @keyframes spark {
                    0% { transform: scale(0); }
                    50% { transform: scale(1); opacity: 1; }
                    100% { transform: scale(0); opacity: 0; }
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Thank You!</h1>
                <h2>Payment successful!</h2>
                <p>Your payment was successful. </p>
            </div>

            <script>
                for (let i = 0; i < 10; i++) {
                    const firework = document.createElement('div');
                    firework.classList.add('firework');
                    document.body.appendChild(firework);

                    for (let j = 0; j < 10; j++) {
                        const dot = document.createElement('div');
                        dot.classList.add('dot');
                        firework.appendChild(dot);
                    }
                }
            </script>

            <script>
                setTimeout(function() {
                    window.location.href = '../index.php';
                }, 5000); // 5 seconds
            </script>
        </body>
    </html>";
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Handle Stripe exception
    echo "Error: " . $e->getMessage();
    exit;
} catch (\Exception $e) {
    // Handle other errors
    echo "Error: " . $e->getMessage();
    exit;
}
 -->