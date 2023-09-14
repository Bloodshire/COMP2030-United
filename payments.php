<!DOCTYPE html>
<head>
    <title>Log Drive</title>
    <meta charset="utf-8">
    <meta name="Authors" content= "Callum">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
</head>

<html>
<body>
    <?php require_once "inc/menu.inc.php"; ?>
    <h1>Payments</h1>
    <hr>
    <br>
    <div class="centre-payments">
    <label><b>Payment options</b></label>
    <br>
    <button class="paypal" type="button">Paypal</button>
    <a href="mastercard.php">
    <button class="mastercard" type="button">Mastercard</button>
    </a>
    <button class="visa" type="button">Visa</button>
    <br>    
    <br>
    <button class="venmo" type="button">Venmo</button>
    <button class="apple-pay" type="button">Apple Pay</button>
    <button class="efpos" type="button">Efpos</button>
    </div>
</body>
</html>