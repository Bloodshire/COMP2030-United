<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<?php
// Start a session
session_start();

// Set $role_id to equal the current users role_id
$role_id = $_SESSION['role_id'];

// Define a list of allowed URIs
$student_allowed_uris = [
    '/drivesummary.php',
    '/logbook.php',
    '/logdrive.php',
    '/profile.php',
    '/student-dashboard.php',
    '/cbta.php',
    '/payments.php',
    '/cabin_drill_and_control.php',
    '/stop_and_go.php',
    '/starting_up_and_shutting_down_engine.php',
    '/Moving_off_from_kerb.php',
    '/stopping_and_securing_vehicle.php',
    '/gear_changing.php',
    '/steering.php',
    '/review_basic_procedures.php',
    '/mastercard.php',
    '/my_logbook.php',
    '/logdrive_process.php',
    '/pay_payment.php',
    '/process_payment.php',
    '/find_instructor.php'
];
$qsd_allowed_uris = [
    '/reports.php',
    '/qsd-dashboard.php',
    '/profile.php',

];
$instructor_allowed_uris = [
    '/reports.php',
    '/instructor-dashboard.php',
    '/profile.php',
    '/studentList.php',
    '/students.php',
    '/billing.php',
    '/manage_student.php',
    '/approvals.php',
    '/add_student.php',
    '/find_student.php',
    '/process_add_student.php',
    '/manage_cbta.php',
    '/update_cbta_task.php'
];
$government_allowed_uris = [
    '/reports.php',
    '/government-dashboard.php',
    '/profile.php'
];

// Get the current REQUEST_URI
$current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Check if the current user has access to the current page
if ($role_id == 3) {
    // Check the user's role
    $has_permission = false;
    foreach ($student_allowed_uris as $allowed_uri) {
        if (strpos($current_uri, $allowed_uri) !== false) {
            $has_permission = true;
            break;
        }
    }
    if (!$has_permission) {
        // Show the page
        echo "You do not have permission to access this page as a Student.";
        exit;
    }
} else if ($role_id == 2) {
    // Check the user's role
    $has_permission = false;
    foreach ($qsd_allowed_uris as $allowed_uri) {
        if (strpos($current_uri, $allowed_uri) !== false) {
            $has_permission = true;
            break;
        }
    }
    if (!$has_permission) {
        // Show the page
        echo "You do not have permission to access this page as a QSD.";
        exit;
    }
} else if ($role_id == 1) {
    // Check the user's role
    $has_permission = false;
    foreach ($instructor_allowed_uris as $allowed_uri) {
        if (strpos($current_uri, $allowed_uri) !== false) {
            $has_permission = true;
            break;
        }
    }
    if (!$has_permission) {
        // Show the page
        echo "You do not have permission to access this page as an Instructor.";
        exit;
    }
} else if ($role_id == 4) {
    // Check the user's role
    $has_permission = false;
    foreach ($government_allowed_uris as $allowed_uri) {
        if (strpos($current_uri, $allowed_uri) !== false) {
            $has_permission = true;
            break;
        }
    }
    if (!$has_permission) {
        // Show the page
        echo "You do not have permission to access this page as a Government user.";
        exit;
    }
}

// Check if the current user is a Student (role_id 3)
if ($role_id == 3) {
    echo '<div id="menu" class="sidenav">
    <h1 class="nav-bar-title">TLDR</h1>
    <ul>
        <li><a href="student-dashboard.php"><i class="fa-xl fa-solid fa-house"></i><br>Dashboard</a></li>
        <li><a href="logbook.php"><i class="fa-xl fa-solid fa-car-side"></i><br>Log Book</a></li>
        <li><a href="cbta.php"><i class="fa-xl fa-solid fa-book"></i><br>CBT&A</a></li>
        <!-- <li><a href="progresshours.php"><i class="fa-xl fa-solid fa-chart-line"></i><br>Progress & Hours</a></li> -->
        <!-- <li><a href="drivesummary.php"><i class="fa-xl fa-regular fa-clipboard"></i><br>Drive Summary</a></li> -->
        <li><a href="payments.php"><i class="fa-solid fa-xl fa-file-invoice-dollar"></i><br>Bills & Payments</a></li>
        <li><a href="profile.php"><i class="fa-xl fa-solid fa-user"></i><br>Profile</a></li>
    </ul>
    <div class="logout"><a href="../logout.php"><i class="fa-xl fa-solid fa-right-from-bracket"></i><br>Logout</a></div>
</div>';
}

// Check if current user is a QSD (role_id 2)
else if ($role_id == 2) {
    echo '<div id="menu" class="sidenav">
    <h1 class="nav-bar-title">TLDR</h1>
    <ul>
        <li><a href="qsd-dashboard.php"><i class="fa-xl fa-solid fa-house"></i><br>Dashboard</a></li>
        <li><a href="logbook.php"><i class="fa-xl fa-solid fa-car-side"></i><br>Log Book</a></li>
        <li><a href="cbta.php"><i class="fa-xl fa-solid fa-book"></i><br>CBT&A</a></li>
        <!-- <li><a href="progresshours.php"><i class="fa-xl fa-solid fa-chart-line"></i><br>Progress & Hours</a></li> -->
        <li><a href="drivesummary.php"><i class="fa-xl fa-regular fa-clipboard"></i><br>Drive Summary</a></li>
        <li><a href="payments.php"><i class="fa-solid fa-xl fa-dollar-sign"></i><br>Payments</a></li>
        <li><a href="profile.php"><i class="fa-xl fa-solid fa-user"></i><br>Profile</a></li>
    </ul>
    <div class="logout"><a href="../logout.php"><i class="fa-xl fa-solid fa-right-from-bracket"></i><br>Logout</a></div>
</div>';
}

// Check if current user is an Instructor (role_id 1)
else if ($role_id == 1) {
    echo '<div id="menu" class="sidenav">
    <h1 class="nav-bar-title">TLDR</h1>
    <ul>
        <li><a href="instructor-dashboard.php"><i class="fa-xl fa-solid fa-house"></i><br>Dashboard</a></li>
        <li><a href="students.php"><i class="fa-xl fa-solid fa-user-graduate"></i><br>Students</a></li>
        <li><a href="approvals.php"><i class="fa-xl fa-solid fa-stamp"></i><br>Approvals</a></li>
        <li><a href="billing.php"><i class="fa-solid fa-xl fa-file-invoice-dollar"></i><br>Billing & Payments</a></li>

        <li><a href="reports.php"><i class="fa-xl fa-solid fa-file-invoice"></i><br>Reports</a></li>
        <li><a href="profile.php"><i class="fa-xl fa-solid fa-user"></i><br>Profile</a></li>
    </ul>
    <div class="logout"><a href="../logout.php"><i class="fa-xl fa-solid fa-right-from-bracket"></i><br>Logout</a></div>
</div>';
}
// Check if current user is the government (role_id 4)

else if ($role_id == 4) {
    echo '<div id="menu" class="sidenav">
    <h1 class="nav-bar-title">TLDR</h1>
    <ul>
        <li><a href="government-dashboard.php"><i class="fa-xl fa-solid fa-house"></i><br>Dashboard</a></li>
        <li><a href="logbook.php"><i class="fa-xl fa-solid fa-user-graduate"></i><br>Students</a></li>
        <li><a href="cbta.php"><i class="fa-xl fa-solid fa-file-invoice"></i><br>Repors</a></li>
        <li><a href="payments.php"><i class="fa-solid fa-xl fa-dollar-sign"></i><br>Billing & Payments</a></li>
        <!-- <li><a href="progresshours.php"><i class="fa-xl fa-solid fa-chart-line"></i><br>Progress & Hours</a></li> -->
        <li><a href="drivesummary.php"><i class="fa-xl fa-regular fa-clipboard"></i><br>Drive Summary</a></li>
    </ul>
    <div class="logout"><a href="../logout.php"><i class="fa-xl fa-solid fa-right-from-bracket"></i><br>Logout</a></div>
</div>';
}
?>

<h1 id="page-heading"></h1>
<?php require_once __DIR__ . "/dbconn.inc.php"; ?>

<?php

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an access denied message
    header("Location: /www/TLDR/pages/login.php");
    exit;
}

// Get the user's full name from the session data
$user_given_name = isset($_SESSION['user_given_name']) ? $_SESSION['user_given_name'] : "Unknown User";
?>
<hr>