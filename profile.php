<!DOCTYPE html>
<head>
    <title>Log Drive</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Callum">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
    <script src="scripts/edit-and-save-details.js" defer></script>

</head>

<html>
<body>
    <?php require_once "inc/menu.inc.php"; ?>
    <h1>Profile</h1>
    <hr>
    <br>
    <label>First Name</label>
    <br>
    <br>
    <input type="text" value="John" id="firstName" readonly>
    <br>
    <br>
    <label>Last Name</label>
    <br>
    <br>
    <input type="text" value="Doe" id="lastName" readonly>
    <br>
    <br>
    <label>Email</label>
    <br>
    <br>
    <input type="text" value="example@gmail.com" id="email" readonly>
    <br>
    <br>
    <label>Password</label>
    <br>
    <br>
    <input type="text" value="********" id="password" readonly>
    <br>
    <br>
    <label>Permit Number</label>
    <br>
    <br>
    <input type="text" value="T1876" id="permitNumber" readonly>
    <br>
    <br>
    <button class="edit-details-button" type="button" onclick="enableEdit()">Edit Details</button>
    <br>
    <br>
    <button class="save-details-button" type="button" onclick="saveDetails()">Save Details</button>
</body>
</html>
