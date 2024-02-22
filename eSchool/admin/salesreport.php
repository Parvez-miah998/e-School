<?php
    session_start();
    include('includes/dbconnection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generate_pdf']) && isset($_SESSION['sales_table_data'])) {
        $tableData = $_SESSION['sales_table_data'];

        require_once(__DIR__ . '/vendor/autoload.php'); // Ensure the correct path to autoload.php
        $mpdf = new \Mpdf\Mpdf();

        // Generate the HTML table from the retrieved data
        $html = '<div class="container">';
        $html .= '<h1 style="background-color: #bfe0e0;text-align:center;">Kryzotech</h1>';
        $html .= '<h3>Sales Report</h3>';
        $html .= '<table border="1" cellspacing="0" cellpadding="2">';
        $html .= '<tr><th>Order ID</th><th>Course ID</th><th>Student Email</th><th>Payment Status</th><th>Amount</th><th>Order Date</th></tr>';

        foreach ($tableData as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row['order_id'] . '</td>';
            $html .= '<td>' . $row['c_id'] . '</td>';
            $html .= '<td>' . $row['stu_email'] . '</td>';
            $html .= '<td>' . $row['status'] . '</td>';
            $html .= '<td>' . $row['amount'] . '</td>';
            $html .= '<td>' . $row['order_date'] . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';
        $html .= '</div>';

        // Generate PDF content from the HTML
        $mpdf->WriteHTML($html);

        // Output the PDF
        $mpdf->Output('sales_report.pdf', 'I'); // 'D' for force download
    }
?>

