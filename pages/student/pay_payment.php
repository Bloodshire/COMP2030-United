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
                echo '<p>Amount: $' . $payment['invoice_amount'] . '</p>';
                echo '<p>Due Date: ' . $payment['due_date'] . '</p>';

                // Add your payment processing logic here (e.g., payment gateway integration)

                // Example: Display the payment form
                echo '<form id="invoiceForm" action="process_payment.php" method="post">
                    <br><h2>Credit Card Details</h2>
                    <div>
                        <label class="section-header">Card number</label>
                        <input type="number" placeholder="5555 5555 5555 4444" required>
                    </div>
                    <div>
                        <label class="section-header">Expiry date</label>
                        <input type="text" placeholder="MM/DD" required>
                    </div>
                    <div>
                        <label class="section-header">Card security number</label>
                        <input type="number" placeholder="333" required>
                    </div>
                    <button class="btn-custom btn-small btn-yellow" type="button"><i class="fa-brands fa-paypal"></i> Pay with PayPal</button>
                    <br>
                    <button class="btn-custom btn-blue" type="submit"><i class="fa-solid fa-check"></i> Confirm Pay</button>
                </form>';
            } else {
                echo "<p>Payment not found.</p>";
                echo '<a href="payments.php"><button class="btn-custom btn-black"><i class="fa-solid fa-arrow-left"></i> Go Back</button></a>';

            }
        } else {
            echo "Payment ID is missing.";
        }
        ?>
    </div>
</body>

</html>