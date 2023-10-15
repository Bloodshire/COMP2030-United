<!DOCTYPE html>

<head>
    <title>QSD Search</title>
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
            $instructor_id = $_SESSION['user_id'];

            // Query the database to find the student based on the provided license number
            require_once "../../inc/dbconn.inc.php";

            $query = "SELECT * FROM users WHERE license_no = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $student_license);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $student = $result->fetch_assoc();

                // Check if the student already has an instructor
                if (!is_null($student['instructor_id'])) {
                    // Query the database to get the instructor's name
                    $query = "SELECT given_name, surname, email FROM users WHERE user_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $student['instructor_id']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $instructor = $result->fetch_assoc();

                    if ($student['instructor_id'] == $_SESSION['user_id']) {
                        echo "<h3> You already have this student.</h3>";
                    } else {
                        echo "<h3>" . $instructor['given_name'] . " " . $instructor['surname'] . " already has this student.</h3>";
                        echo "<p>For further information, contact " . $instructor['email'] . "</p>";
                    }
                    echo '<a href="add_student.php"><button class="btn-custom btn-black"><i class="fa-solid fa-arrow-left"></i> Go Back</button></a>';
                } else {
                    // Display the student's details
                    echo '<h3>Student Details</h3>';
                    echo '<p>Name: ' . $student['given_name'] . ' ' . $student['surname'] . '</p>';
                    echo '<p>License No: ' . $student['license_no'] . '</p>';

                    // Add a button to confirm adding the student
                    echo '<form action="process_add_student.php" method="post">';
                    echo '<input type="hidden" name="student_id" value="' . $student['user_id'] . '">';
                    echo '<button class="btn-custom"><i class="fa-solid fa-plus"></i> Confirm Add Student</button>';
                    echo '</form>';
                }
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