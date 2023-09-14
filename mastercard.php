<!DOCTYPE html>
<head>
    <title>Log Drive</title>
    <meta charset="utf-8">
    <meta name="Authors" content=" Callum and Michael">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
</head>

<html>
<body>
    <?php require_once "inc/menu.inc.php"; ?>
    <h1>Mastercard</h1>
    <hr>
    <br>
    <label>Card Number</label>
    <br>
    <br>
    <input type="text" value="Card Number" required>
    <br>
    <br>
    <label>Expiry Date</label>
    <br>
    <br>
    <input type="text" value="MM/YY" required>
    <br>
    <br>
    <label>Card Security Number</label>
    <br>
    <br>
    <input type="text" value="Card Security Number" required>
    <br>
    <br>
    <label>Amount</label>
    <br>
    <br>
    <input type="number" value="amount" required>
    <br>
    <br>
    <label><b>Recipient</b></label>
    <br>
    <br>
    <label>BSB</label>
    <br>
    <br>
    <input type="text" value="BSB" required>
    <br>
    <br>
    <label>Account Number</label>
    <br>
    <br>
    <input type="text" value="Account Number" required>
    <br>
    <br>
    <input type="submit" class="sub-button-payments" value="Submit Drive" />

</body>
</html>