<!DOCTYPE html>

<head>
    <title>Instructor Dashboard</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="instructor-dashboard.php" id="menu-selected"></a>

</head>

<html>

<body>
    <?php require_once "../../inc/main.inc.php"; ?>
    <?php
    // Display the welcome message
    echo "<p>Welcome, " . $user_given_name . "!</p>";
    ?>

</body>

</html>