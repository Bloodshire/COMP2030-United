<!DOCTYPE html>

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Callum">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <script src="../../scripts/edit-and-save-details.js" defer></script>
    <a href="profile.php" id="menu-selected"></a>
</head>

<html>

<body>
    <?php require_once "../../inc/main.inc.php"; ?>
    <div>
        <?php
        // Get the user's full name from the session data
        $user_given_name = isset($_SESSION['user_given_name']) ? $_SESSION['user_given_name'] : "Unknown";
        $user_surname = isset($_SESSION['user_surname']) ? $_SESSION['user_surname'] : "Unknown";
        $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "Unknown";
        $user_password = isset($_SESSION['user_password']) ? $_SESSION['user_password'] : "Unknown";
        $user_license = isset($_SESSION['user_license']) ? $_SESSION['user_license'] : "Unknown";
        $user_date_of_birth = isset($_SESSION['user_date_of_birth']) ? $_SESSION['user_date_of_birth'] : "Unknown";

        ?>
        <label class="section-header">Given name</label>
        <input type="text" value="<?php echo $user_given_name ?>" id="firstName" readonly>
    </div>
    <br>
    <div>
        <label class="section-header">Surname</label>
        <input type="text" value="<?php echo $user_surname ?>" id="lastName" readonly>
    </div>
    <br>
    <div>
        <label class="section-header">Email</label>
        <input type="email" value="<?php echo $user_email ?>" id="email" readonly>
    </div>
    <br>
    <div>
        <label class="section-header">Date of Birth</label>
        <input type="text" value="<?php echo $user_date_of_birth ?>" id="dob" readonly>
    </div>
    <br>
    <div>
        <label class="section-header">Password</label>
        <input type="password" value="password123" id="password" readonly>
    </div>
    <br>
    <div>
        <label class="section-header">Permit number</label>
        <input type="text" value="<?php echo $user_license ?>" id="permitNumber" readonly>
    </div>
    <br>
    <button class="btn-custom btn-black" type="button" onclick="enableEdit()"><i class="fa-solid fa-pen-to-square"></i> Edit Details</button>
    <button class="btn-custom btn-black" type="button" onclick="saveDetails()" disabled><i class="fa-solid fa-floppy-disk"></i> Save Details</button>
</body>

</html>