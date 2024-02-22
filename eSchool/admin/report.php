<?php

include('includes/dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generate_pdf'])) {
    if (isset($_POST['order_id'])) {
        $order_id = $_POST['order_id'];

        // Fetch data for the specified order_id from courseorder table
        $sql = "SELECT * FROM courseorder WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $order_id);
        $stmt->execute();
        $orderData = $stmt->get_result()->fetch_assoc();

        if ($orderData) {
            // Fetch student details from the student table using stu_email from courseorder
            $sql_student = "SELECT * FROM student WHERE stu_email = ?";
            $stmt_student = $conn->prepare($sql_student);
            $stmt_student->bind_param("s", $orderData['stu_email']);
            $stmt_student->execute();
            $studentData = $stmt_student->get_result()->fetch_assoc();

            // Fetch course details from the courses table using c_id from courseorder
            $sql_course = "SELECT * FROM courses WHERE c_id = ?";
            $stmt_course = $conn->prepare($sql_course);
            $stmt_course->bind_param("s", $orderData['c_id']);
            $stmt_course->execute();
            $courseData = $stmt_course->get_result()->fetch_assoc();

            // Fetch lessons for the specified c_id
            // $sql_lessons = "SELECT * FROM lessons WHERE c_id = ?";
            // $stmt_lessons = $conn->prepare($sql_lessons);
            // $stmt_lessons->bind_param("s", $orderData['c_id']);
            // $stmt_lessons->execute();
            // $lessonsData = $stmt_lessons->get_result()->fetch_all(MYSQLI_ASSOC);

            // HTML content to display order data
            $html = '<div class="container">';
            $html .= '<h1 style="background-color: #bfe0e0;text-align:center;">Kryzotech</h1>';
            $html .= '<h3>Course Orders Report</h3>';
            $html .= '<table border="1" cellspacing="0" cllpadding="2">';
            $html .= '<tr><th>Order ID</th><th>Student Name</th><th>Student Email</th><th>Student Contact</th><th>Course ID</th><th>Course Name</th><th>Amount</th><th>Status</th><th>Order Date</th></tr>';

            // Displaying data in the table
            $html .= '<tr>';
            $html .= '<td>' . $orderData['order_id'] . '</td>';
            $html .= '<td>' . $studentData['stu_name'] . '</td>';
            $html .= '<td>' . $orderData['stu_email'] . '</td>';
            $html .= '<td>' . $studentData['stu_contact'] . '</td>';
            $html .= '<td>' . $courseData['c_id'] . '</td>';
            $html .= '<td>' . $courseData['c_name'] . '</td>';
            $html .= '<td>' . $orderData['amount'] . '</td>';
            $html .= '<td>' . $orderData['status'] . '</td>';
            $html .= '<td>' . $orderData['order_date'] . '</td>';
            $html .= '</tr>';

            // Displaying lesson details
            // if ($lessonsData) {
            //     $html .= '<tr><td colspan="8"><strong>Lessons</strong></td></tr>';
            //     foreach ($lessonsData as $lesson) {
            //         $html .= '<tr>';
            //         $html .= '<td colspan="2">' . $lesson['lesson_name'] . '</td>';
            //         $html .= '<td colspan="6">' . $lesson['lesson_description'] . '</td>';
            //         $html .= '</tr>';
            //     }
            // } else {
            //     $html .= '<tr><td colspan="8">No lessons found for this course.</td></tr>';
            // }

            $html .= '</table>';
            $html .= '</div>';

            // Output HTML content
            echo $html;

            // Generate the PDF using mPDF
            require_once(__DIR__ . '/vendor/autoload.php');
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output('payment.pdf', 'I');
        } else {
            echo "No data found for the provided order ID.";
        }
    }
}

        // include('includes/dbconnection.php');
        // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generate_pdf'])) {
        //     if (isset($_POST['order_id'])) {
        //         $order_id = $_POST['order_id'];

        //         // Fetch data for the specified order_id
        //         $sql = "SELECT * FROM courseorder WHERE order_id = ?";
        //         $stmt = $conn->prepare($sql);
        //         $stmt->bind_param("s", $order_id);
        //         $stmt->execute();
        //         $orderData = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        //         // Rest of your existing code to generate PDF based on the fetched data for this order_id
        //         // HTML content to display order data
        //         $html = '<div class="container" >';

        //         if ($orderData) {
        //             $html .= '<h1 style="background-color: #bfe0e0;text-align:center;">Kryzotech</h1>';
        //             $html .= '<h3>Course Orders Report</h3>';
        //             $html .= '<table border="1">';
        //             $html .= '<tr><th>Order ID</th><th>Course ID</th><th>Student Email</th><th>Amount</th><th>Status</th><th>Order Date</th></tr>';

        //             // Loop through the fetched data and generate table rows
        //             foreach ($orderData as $row) {
        //                 $html .= '<tr>';
        //                 $html .= '<td>' . $row['order_id'] . '</td>';
        //                 $html .= '<td>' . $row['c_id'] . '</td>';
        //                 $html .= '<td>' . $row['stu_email'] . '</td>';
        //                 $html .= '<td>' . $row['amount'] . '</td>';
        //                 $html .= '<td>' . $row['status'] . '</td>';
        //                 $html .= '<td>' . $row['order_date'] . '</td>';
        //                 $html .= '</tr>';
        //             }

        //             $html .= '</table>';
        //         } else {
        //             $html .= '<p>No course orders found</p>';
        //         }

        //         $html .= '</div>';

        //         // Output HTML content
        //         echo $html;

        //         // Generate the PDF using mPDF
        //         require_once(__DIR__ . '/vendor/autoload.php'); // Ensure the correct path to autoload.php
        //         $mpdf = new \Mpdf\Mpdf();

        //         // Generate PDF content from the HTML
        //         $mpdf->WriteHTML($html);

        //         // Output the PDF
        //         $mpdf->Output('payment.pdf', 'I'); // Output the PDF as 'payment.pdf' in the browser
        //     }
        // }

?>
