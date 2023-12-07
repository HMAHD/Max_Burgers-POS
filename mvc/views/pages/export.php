<?php
/* -- Real Function commented to go with random genarated dataset 🥲
// Include necessary files and configurations
include_once "./mvc/models/tbl_order.php";

// Initialize the tbl_order model
$orderModel = new tbl_order();



// Check if there are orders to export
if ($orders && mysqli_num_rows($orders) > 0) {
    // Set headers for CSV download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="order_data.csv"');

    // Create a file handle for writing to output
    $output = fopen('php://output', 'w');

    // Output CSV headers
    fputcsv($output, array('ID', 'Product ID', 'Table ID', 'Quantity', 'Created At'));

    // Output each order as a CSV row
    while ($row = mysqli_fetch_assoc($orders)) {
        fputcsv($output, $row);
    }

    // Close the file handle
    fclose($output);

    // Exit to prevent further output
    exit;
} else {
    // No data available
    echo "No data available for export.";
}

*/

// Include necessary files and configurations
include_once "./mvc/models/tbl_order.php";

// Function to generate random order data
function generateRandomOrderData($numRows)
{
    $data = array();

    for ($i = 1; $i <= $numRows; $i++) {
        $data[] = array(
            'ID' => $i,
            'Product ID' => rand(1, 10), // Adjust range as needed
            'Table ID' => rand(1, 5), // Adjust range as needed
            'Quantity' => rand(1, 10), // Adjust range as needed
            'Created At' => date('Y-m-d H:i:s', strtotime('-' . rand(1, 365) . ' days')), // Random date within the last year
        );
    }

    return $data;
}

// Check if the export button is clicked
if (isset($_POST['export'])) {
    // Number of random rows to generate
    $numRows = 50; // You can adjust this as needed

    // Generate random order data
    $orders = generateRandomOrderData($numRows);

    // Check if $orders is not empty
    if (!empty($orders)) {
        // Set headers for CSV download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="order_data.csv"');

        // Create a file handle for writing to output
        $output = fopen('php://output', 'w');

        // Output CSV headers
        fputcsv($output, array('ID', 'Product ID', 'Table ID', 'Quantity', 'Created At'));

        // Output each order as a CSV row
        foreach ($orders as $row) {
            fputcsv($output, $row);
        }

        // Close the file handle
        fclose($output);

        // Exit to prevent further output
        exit;
    } else {
        // No data available
        echo "No data available for export.";
    }
}
