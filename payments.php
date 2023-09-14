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
    <div class="centre">
    <label><b>Payment options</b></label>
    <br>
    <button class="btn-custom btn-black" type="button">Paypal</button>
    <a href="mastercard.php"><button class="btn-custom btn-black" type="button">Mastercard</button></a>
    <button class="btn-custom btn-black" type="button">Visa</button>
    <br>    
    <br>
    <button class="btn-custom btn-black" type="button">Venmo</button>
    <button class="btn-custom btn-black" type="button">Apple Pay</button>
    <button class="btn-custom btn-black" type="button">Efpos</button>
    </div>
</body>
</html>