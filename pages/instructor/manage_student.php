<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Manage Student</title>
    <script src="../../scripts/script.js" defer></script>
    <a href="students.php" id="menu-selected"></a>
</head>

<body>
    <h1 id="heading-back-btn"><a href="students.php"><i class="hover fa-solid fa-arrow-left"></i></a></h1>
    <?php
    require_once "../../inc/main.inc.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $student_id = $_POST['user_id'];
        $student_given_name = $_POST['given_name'];
        $student_surname = $_POST['surname'];
        $student_license_no = $_POST['license_no'];
    } else {
        echo "No user_id provided.";
        exit;
    }
    ?>

    <h2><?php echo $student_given_name . " " . $student_surname?></h2>

    <h3>CBT&A Units and Tasks</h3>
    <!-- Add content for managing CBT&A units and tasks here -->

    <h3>Log Drives</h3>
    <!-- Add content for logging drives here -->

    <h3>Approve Drives</h3>
    <!-- Add content for approving drives here -->

    <!-- You can include forms, tables, and other elements to manage the student -->
</body>

</html>