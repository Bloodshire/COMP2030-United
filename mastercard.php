<!DOCTYPE html>

<head>
    <title>Log Drive</title>
    <meta charset="utf-8">
    <meta name="Authors" content=" Callum and Michael">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
    <a href="payments.php" id="menu-selected"></a>
</head>

<html>

<body>
    <?php require_once "inc/menu.inc.php"; ?>
    <h1>Mastercard</h1>
    <hr>
    <br>
    <div>
        <label class="section-header">Card number</label>
        <input type="text" value="Card Number" required>
    </div>
    <br>
    <div>
        <label class="section-header">Expiry date</label>
        <input type="text" value="MM/YY" required>
    </div>
    <br>
    <div>
        <label class="section-header">Card security number</label>
        <input type="text" value="MM/YY" required>
    </div>
    <br>
    <div>
        <label class="section-header">Amount</label>
        <input type="number" value="amount" required>
    </div>
    <br>
    <br>
    <label class="section-header bold">Recipient</label>
    <br>
    <br>
    <div>
        <label class="section-header">BSB</label>
        <input type="text" value="BSB" required>
    </div>
    <br>
    <div>
        <label class="section-header">Account number</label>
        <input type="text" value="Account Number" required>
    </div>
    <br>
    <br>
    <a href="payments.php"><button class="btn-custom btn-black">Back</button></a>
    <input type="submit" class="btn-custom" value="Submit" />

</body>

</html>