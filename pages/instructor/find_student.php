<!DOCTYPE html>

<head>
    <title>Find Student</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="students.php" id="menu-selected"></a>

</head>

<html>

<body>
    <h1 id="heading-back-btn"><a href="add_student.php"><i class="heading-back-btn fa-solid fa-arrow-left"></i></a></h1>

    <?php require_once "../../inc/main.inc.php"; ?>

    <div class="centre">
        <?php
        if (isset($_POST['student_license'])) {
            $student_license = $_POST['student_license'];

            // Query the database to find the student based on the provided license number
            require_once "../../inc/dbconn.inc.php";

            $query = "SELECT * FROM users WHERE license_no = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $student_license);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $student = $result->fetch_assoc();

                // Display the student's details
                echo '<h3>Student Details</h3>';
                echo '<p>Name: ' . $student['given_name'] . ' ' . $student['surname'] . '</p>';
                echo '<p>License No: ' . $student['license_no'] . '</p>';

                // Add a button to confirm adding the student
                echo '<form action="process_add_student.php" method="post">';
                echo '<input type="hidden" name="student_id" value="' . $student['user_id'] . '">';
                echo '<button class="btn-custom"><i class="fa-solid fa-plus"></i> Confirm Add Student</button>';
                echo '</form>';
            } else {
                echo "<h3>Student not found.</h3>";
                echo '<a href="add_student.php"><button class="btn-custom btn-black"><i class="fa-solid fa-arrow-left"></i> Go Back</button></a>';
            }
        } else {
            echo "Student license number is missing.";
        }
        ?>
    </div>
</body>

</html>