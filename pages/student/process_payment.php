<?php
require_once "../../inc/main.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['payment_id'])) {
        $payment_id = $_POST['payment_id'];

        // Query the database to get payment details
        require_once "../../inc/dbconn.inc.php";
        
        $query = "SELECT * FROM payments WHERE payment_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $payment_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {            
            $updateQuery = "UPDATE payments SET payment_status = 1 WHERE payment_id = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("i", $payment_id);

            if ($updateStmt->execute()) {
                // Payment successful
                header("Location: payments.php?success=1"); // Redirect to the payments page
                exit();
            } else {
                // Payment failed, handle accordingly
                echo "Payment processing failed. Please try again or contact support.";
            }
        } else {
            echo "Payment not found.";
        }
    } else {
        echo "Payment ID is missing.";
    }
} else {
    echo "Invalid request.";
}
