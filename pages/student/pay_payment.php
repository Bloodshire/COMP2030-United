<!DOCTYPE html>

<head>
    <title>Bills & Payments</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Callum and Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="payments.php" id="menu-selected"></a>
</head>

<html>

<body>
    <?php require_once "../../inc/main.inc.php"; ?>
    <div class="centre">
        <h2>Payment Details</h2>

        <?php
        // Handle the payment processing here

        // Check if the user is logged in (replace with your authentication logic)
        // Check if the payment_id is provided in the URL
        if (isset($_GET['payment_id'])) {
            $payment_id = $_GET['payment_id'];

            // Query the database to retrieve payment details
            require_once "../../inc/dbconn.inc.php";
            $query = "SELECT * FROM payments WHERE payment_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $payment_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $payment = $result->fetch_assoc();

                // Display payment details
                echo '<p>Payment ID: ' . $payment['payment_id'] . '</p>';
                echo '<p>Instructor: ' . $payment['instructor_id'] . '</p>';
                echo '<p>Amount: ' . $payment['invoice_amount'] . '</p>';
                echo '<p>Due Date: ' . $payment['due_date'] . '</p>';

                // Add your payment processing logic here (e.g., payment gateway integration)

                // Example: Display a "Pay Now" button
                echo '<form action="process_payment.php" method="post">';
                echo '<input type="hidden" name="payment_id" value="' . $payment_id . '">';
                echo '<input type="submit" value="Pay Now">';
                echo '</form>';
            } else {
                echo "Payment not found.";
            }
        } else {
            echo "Payment ID is missing.";
        }
        ?>
    </div>
</body>

</html>