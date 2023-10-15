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
    <?php
    require_once "../../inc/main.inc.php";
    echo "<p>Welcome, " . $user_given_name . "!</p>";

    $query = "SELECT COUNT(*) as student_count FROM users WHERE role_id = 3 AND instructor_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_students = $row['student_count'];
    } else {
        $total_students = 0; // Set to 0 if no results found
    }

    // Fetch the number of drives awaiting approval
    $query_drives_approval = "SELECT COUNT(*) as drives_count FROM approvals WHERE approver_id = ? AND approved = 0";

    $stmt_drives = $conn->prepare($query_drives_approval);
    $stmt_drives->bind_param("i", $_SESSION['user_id']);
    $stmt_drives->execute();
    $result_drives = $stmt_drives->get_result();

    if ($result_drives->num_rows > 0) {
        $row_drives = $result_drives->fetch_assoc();
        $total_drives_awaiting_approval = $row_drives['drives_count'];
    } else {
        $total_drives_awaiting_approval = 0; // Set to 0 if no results found
    }

    // Close the database connection
    $stmt_drives->close();


    // Close the database connection
    $stmt->close();
    $conn->close();


    ?>

    <div class="column3">
        <a href="students.php">
            <div class="container dashboard" id="one">
                <h2><i class="fa-solid fa-graduation-cap fa-2xl"></i> <span><?php echo $total_students; ?></span></h2>
                <h3>Total Students</h3>
            </div>
        </a>
    </div>

    <div class="column3">
        <a href="approvals.php">
            <div class="container dashboard" id="two">
                <h2><i class="fa-solid fa-stamp fa-xl"></i> <span><?php echo $total_drives_awaiting_approval; ?></span></h2>
                <h3>Drives Awaiting Approval</h3>
            </div>
        </a>
    </div>

</body>

</html>