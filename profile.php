<!DOCTYPE html>

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Callum">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
    <script src="scripts/edit-and-save-details.js" defer></script>
    <a href="profile.php" id="menu-selected"></a>
</head>

<html>

<body>
    <?php require_once "inc/menu.inc.php"; ?>
    <div>
        <label class="section-header">First name</label>
        <input type="text" value="John" id="firstName" readonly>
    </div>
    <br>
    <div>
        <label class="section-header">Last name</label>
        <input type="text" value="Doe" id="lastName" readonly>
    </div>
    <br>
    <div>
        <label class="section-header">Email</label>
        <input type="text" value="example@gmail.com" id="email" readonly>
    </div>
    <br>
    <div>
        <label class="section-header">Password</label>
        <input type="password" value="password123" id="password" readonly>
    </div>
    <br>
    <div>
        <label class="section-header">Permit number</label>
        <input type="text" value="T1876" id="permitNumber" readonly>
    </div>
    <br>
    <button class="btn-custom btn-black" type="button" onclick="enableEdit()"><i class="fa-solid fa-pen-to-square"></i> Edit Details</button>
    <button class="btn-custom btn-black" type="button" onclick="saveDetails()" disabled><i class="fa-solid fa-floppy-disk"></i> Save Details</button>
</body>

</html>