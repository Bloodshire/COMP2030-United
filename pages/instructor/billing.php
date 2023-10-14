<!DOCTYPE html>

<head>
    <title>Billing & Payments</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="billing.php" id="menu-selected"></a>
</head>

<html>

<body>

    <?php
    require_once "../../inc/main.inc.php";

    // Check if success parameter is set to 1 in the URL
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<span id='notification' class='notification fade-out'>Invoice has been <b>sent</b>!</span>";
    }
    ?>

    <div class="centre">
        <h2>Create Invoice for Student</h2>

        <?php
        require_once "../../inc/dbconn.inc.php";
        // Retrieve a list of current students for this instructor
        $instructor_id = $_SESSION['user_id'];
        $query = "SELECT user_id, given_name, surname FROM users WHERE instructor_id = ? AND role_id = 3";
        $stmt = $conn->prepare($query);
        $stmt->execute([$instructor_id]);
        $result = $stmt->get_result();
        ?>

        <form action="process_invoice.php" method="post">
            <label for="student">Select Student:</label>
            <select name="student" id="student" required>
                <?php
                while ($student = $result->fetch_assoc()) {
                    echo '<option value="' . $student['user_id'] . '">' . $student['given_name'] . ' ' . $student['surname'] . '</option>';
                }
                ?>
            </select>

            <label for="invoice_date">Invoice Date:</label>
            <input type="date" name="invoice_date" id="invoice_date" required>

            <label for="cost">Invoice Amount:</label>
            <input type="number" name="cost" id="cost" step="0.01" required>

            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date" required>

            <input type="submit" value="Create Invoice">
        </form>
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