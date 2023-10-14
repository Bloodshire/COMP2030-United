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
    <?php
    require_once "../../inc/main.inc.php";
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<span id='notification' class='notification fade-out'>Invoice has been <b>paid</b>!</span>";
    }
    ?>
    <div class="centre">

        <h2>Outstanding Bills</h2>

        <?php
        require_once "../../inc/dbconn.inc.php";

        $student_id = $_SESSION['user_id'];

        // Query the database to get unpaid payments with instructor's names
        $query = "SELECT payments.*, CONCAT(users.given_name, ' ', users.surname) AS instructor_name FROM payments
                  JOIN users ON payments.instructor_id = users.user_id
                  WHERE payments.student_id = ? AND payments.payment_status = 0";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there are any outstanding payments
        if ($result->num_rows > 0) {
            echo '<table id="tldr-table">';
            echo '<tr><th>Instructor</th><th>Amount</th><th>Due Date</th><th>Action</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['instructor_name'] . '</td>';
                echo '<td>' . $row['invoice_amount'] . '</td>';
                echo '<td>' . $row['due_date'] . '</td>';
                echo '<td><a href="pay_payment.php?payment_id=' . $row['payment_id'] . '"><button class="btn-custom btn-blue btn-small"><i class="fa-solid fa-angles-right fa-lg"></i> Pay Now</button></a></td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'You have no outstanding bills.';
        }
        ?>


        <!-- <label><b>Payment options</b></label>
    <br>
    <button class="btn-custom btn-black" type="button"><i class="fa-brands fa-paypal"></i> Paypal</button>
    <a href="mastercard.php"><button class="btn-custom btn-black" type="button"><i class="fa-brands fa-cc-mastercard"></i> Mastercard</button></a>
    <button class="btn-custom btn-black" type="button"><i class="fa-brands fa-cc-visa"></i> Visa</button>
    <br>    
    <br>
    <button class="btn-custom btn-black" type="button">Venmo</button>
    <button class="btn-custom btn-black" type="button"><i class="fa-brands fa-apple"></i> Apple Pay</button>
    <button class="btn-custom btn-black" type="button">Eftpos</button> -->

    </div>

    <script>
        var notification = document.getElementById("notification");
        if (notification) {
            // Remove the element after the animation ends
            notification.addEventListener("animationend", function() {
                notification.remove();
            });
        }
    </script>
</body>

</html>