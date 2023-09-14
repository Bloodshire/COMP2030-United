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
    <form>
    <div>
        <label class="section-header">Card number</label>
        <input type="number" placeholder="5555 5555 5555 4444" required>
    </div>
    <br>
    <div>
        <label class="section-header">Expiry date</label>
        <input type="text" placeholder="MM/DD" required>
    </div>
    <br>
    <div>
        <label class="section-header">Card security number</label>
        <input type="number" placeholder="333" required>
    </div>
    <br>
    <div>
        <label class="section-header">Amount</label>
        <input type="number" placeholder="$105.05" required>
    </div>
    <br>
    <br>
    <label class="section-header bold">Recipient</label>
    <br>
    <br>
    <div>
        <label class="section-header">BSB</label>
        <input type="text" placeholder="306-123" required>
    </div>
    <br>
    <div>
        <label class="section-header">Account number</label>
        <input type="number" placeholder="0001234" required>
    </div>
    <br>
    <br>
    <a href="payments.php"><button type="button" class="btn-custom btn-black"><i class="fa-solid fa-chevron-left"></i> Back</button></a>
    <button class="btn-custom bold"><i class="fa-solid fa-check"></i> Submit</button>
</form>
</body>

</html>