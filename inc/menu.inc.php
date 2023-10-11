<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<?php
// Start a session
session_start();

// Set $role_id to equal the current users role_id
$role_id = $_SESSION['role_id'];

// Check if the current user is a Student (role_id 3)
if ($role_id == 3) {
    echo '<div id="menu" class="sidenav">
    <h1 class="nav-bar-title">TLDR</h1>
    <ul>
        <li><a href="dashboard.php"><i class="fa-xl fa-solid fa-house"></i><br>Dashboard</a></li>
        <li><a href="logbook.php"><i class="fa-xl fa-solid fa-car-side"></i><br>Log Book</a></li>
        <li><a href="cbta.php"><i class="fa-xl fa-solid fa-book"></i><br>CBT&A</a></li>
        <!-- <li><a href="progresshours.php"><i class="fa-xl fa-solid fa-chart-line"></i><br>Progress & Hours</a></li> -->
        <li><a href="drivesummary.php"><i class="fa-xl fa-regular fa-clipboard"></i><br>Drive Summary</a></li>
        <li><a href="payments.php"><i class="fa-solid fa-xl fa-dollar-sign"></i><br>Payments</a></li>
        <li><a href="profile.php"><i class="fa-xl fa-solid fa-user"></i><br>Profile</a></li>
    </ul>
    <div class="logout"><a href="logout.php"><i class="fa-xl fa-solid fa-right-from-bracket"></i><br>Logout</a></div>
</div>';

// Check if current user is a QSD (role_id 2)
} else if ($role_id == 2) {
    echo '<div id="menu" class="sidenav">
    <h1 class="nav-bar-title">TLDR</h1>
    <ul>
        <li><a href="dashboard.php"><i class="fa-xl fa-solid fa-house"></i><br>Dashboard</a></li>
        <li><a href="logbook.php"><i class="fa-xl fa-solid fa-car-side"></i><br>Log Book</a></li>
        <li><a href="cbta.php"><i class="fa-xl fa-solid fa-book"></i><br>CBT&A</a></li>
        <!-- <li><a href="progresshours.php"><i class="fa-xl fa-solid fa-chart-line"></i><br>Progress & Hours</a></li> -->
        <li><a href="drivesummary.php"><i class="fa-xl fa-regular fa-clipboard"></i><br>Drive Summary</a></li>
        <li><a href="payments.php"><i class="fa-solid fa-xl fa-dollar-sign"></i><br>Payments</a></li>
        <li><a href="profile.php"><i class="fa-xl fa-solid fa-user"></i><br>Profile</a></li>
    </ul>
    <div class="logout"><a href="logout.php"><i class="fa-xl fa-solid fa-right-from-bracket"></i><br>Logout</a></div>
</div>';

// Check if current user is an Instructor (role_id 1)
} else if ($role_id == 1) {
    echo '<div id="menu" class="sidenav">
    <h1 class="nav-bar-title">TLDR</h1>
    <ul>
        <li><a href="dashboard.php"><i class="fa-xl fa-solid fa-house"></i><br>Dashboard</a></li>
        <li><a href="logbook.php"><i class="fa-xl fa-solid fa-car-side"></i><br>Log Book</a></li>
        <li><a href="cbta.php"><i class="fa-xl fa-solid fa-book"></i><br>CBT&A</a></li>
        <!-- <li><a href="progresshours.php"><i class="fa-xl fa-solid fa-chart-line"></i><br>Progress & Hours</a></li> -->
        <li><a href="drivesummary.php"><i class="fa-xl fa-regular fa-clipboard"></i><br>Drive Summary</a></li>
        <li><a href="payments.php"><i class="fa-solid fa-xl fa-dollar-sign"></i><br>Payments</a></li>
        <li><a href="profile.php"><i class="fa-xl fa-solid fa-user"></i><br>Profile</a></li>
    </ul>
    <div class="logout"><a href="logout.php"><i class="fa-xl fa-solid fa-right-from-bracket"></i><br>Logout</a></div>
</div>';
}
?>

<h1 id="page-heading"></h1>
<?php require_once "inc/dbconn.inc.php"; ?>

<?php

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an access denied message
    header("Location: login.php");
    exit;
}

// Get the user's full name from the session data
$user_given_name = isset($_SESSION['user_given_name']) ? $_SESSION['user_given_name'] : "Unknown User";

// Display the welcome message
echo "Welcome, " . $user_given_name . "!";
?>
<hr>