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
<h1 id="heading-back-btn"><a href="payments.php"><i class="heading-back-btn fa-solid fa-arrow-left"></i></a></h1>

    <?php require_once "../../inc/main.inc.php"; ?>
    <div class="centre">
        <h2>Payment Details</h2>

        <?php

        if (isset($_GET['payment_id'])) {
            $payment_id = $_GET['payment_id'];

            // Query the database to retrieve payment details
            require_once "../../inc/dbconn.inc.php";
            $query = "SELECT p.payment_id, u.given_name, u.surname, p.invoice_amount, p.due_date FROM payments p
                      JOIN users u ON p.instructor_id = u.user_id
                      WHERE p.payment_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $payment_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $payment = $result->fetch_assoc();

                // Display payment details
                echo '<p>Instructor: ' . $payment['given_name'] . ' ' . $payment['surname'] . '</p>';
                echo '<p>Amount: ' . $payment['invoice_amount'] . '</p>';
                echo '<p>Due Date: ' . $payment['due_date'] . '</p>';

                // Add your payment processing logic here (e.g., payment gateway integration)

                // Example: Display a "Pay Now" button
                echo '<form action="process_payment.php" method="post">';
                echo '<input type="hidden" name="payment_id" value="' . $payment_id . '">';
                echo '<button class="btn-custom btn-blue">Pay Now</button>';
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
