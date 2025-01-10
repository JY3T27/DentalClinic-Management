<?php
include('config.php');

$id = "";
$paymentMethod = "";
$paymentAmount = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["pid"];
    $paymentMethod = $_POST["method"];
    $paymentAmount = $_POST["amount"];
    $date = date("Y-m-d");

    // Check if a record exists for the user
    $sqlCheck = "SELECT * FROM payment WHERE payment_ID =" . $id;
    $resultCheck = mysqli_query($conn, $sqlCheck);
    
    if (mysqli_num_rows($resultCheck) > 0) {
        // Record exists, perform UPDATE
        $sqlUpdate = "UPDATE payment 
            SET payment_date = '$date',
                payment_method = '$paymentMethod',
                payment_amount = '$paymentAmount',
                payment_status = 1 
            WHERE payment_ID = $id";
        mysqli_query($conn, $sqlUpdate);

        // Display a pop-up box using JavaScript
        echo '<script type="text/javascript" src="js/main.js"></script>';
        echo '<script type="text/javascript">';
        echo 'showPaymentAlert("Payment successful! Thank you for your payment.", "transaction.php");'; // Replace "your_redirect_page.php" with the page you want to redirect after the alert
        echo '</script>';
    } else {
        // Record doesn't exist
        echo "Transaction fail.";
    }
    mysqli_close($conn);
} else {
    echo "Database connection error";
}
