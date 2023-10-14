<!DOCTYPE html>
<head>
    <title>Bills & Payments</title>
    <meta charset="utf-8">
    <meta name="Authors" content= "Callum and Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="payments.php" id="menu-selected"></a>
</head>

<html>
<body>
    <?php require_once "../../inc/main.inc.php"; ?>
    <div class="centre">
    <label><b>Payment options</b></label>
    <br>
    <button class="btn-custom btn-black" type="button"><i class="fa-brands fa-paypal"></i> Paypal</button>
    <a href="mastercard.php"><button class="btn-custom btn-black" type="button"><i class="fa-brands fa-cc-mastercard"></i> Mastercard</button></a>
    <button class="btn-custom btn-black" type="button"><i class="fa-brands fa-cc-visa"></i> Visa</button>
    <br>    
    <br>
    <button class="btn-custom btn-black" type="button">Venmo</button>
    <button class="btn-custom btn-black" type="button"><i class="fa-brands fa-apple"></i> Apple Pay</button>
    <button class="btn-custom btn-black" type="button">Eftpos</button>
    </div>
</body>
</html>