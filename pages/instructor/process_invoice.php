<?php
session_start();
// Check if the user is logged in as an instructor
if ($_SESSION['role_id'] == 1) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Include your database connection code
            require_once '../../inc/dbconn.inc.php'; // Replace with your actual database connection code

            // Retrieve form data
            $student_id = $_POST['student'];
            $invoice_date = $_POST['invoice_date'];
            $cost = $_POST['cost'];
            $due_date = $_POST['due_date'];

            // Set payment_status to 0 (Outstanding payment) and instructor_id to $_SESSION['user_id']
            $payment_status = 0;
            $instructor_id = $_SESSION['user_id'];

            // Insert the invoice details into the payments table
            $query = "INSERT INTO payments (instructor_id, student_id, invoice_amount, due_date, payment_status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$instructor_id, $student_id, $cost, $due_date, $payment_status]);

            // Redirect back to the invoice creation page with a success message
            header("Location: billing.php?success=1");
            exit();
        } catch (PDOException $e) {
            // Handle database error
            echo 'Database error: ' . $e->getMessage();
        }
    } else {
        // Redirect to the invoice creation page with an error message if accessed through GET
        header("Location: billing.php?error=1");
        exit();
    }
} else {
    // Redirect to the login page if the user is not logged in as an instructor
    header("Location: login.php");
    exit();
}
?>
