<?php
require_once "../../inc/main.inc.php";

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    // Ensure the student ID and instructor ID are valid (You should add further validation)
    if (!empty($student_id) && !empty($_SESSION['user_id'])) {
        require_once "../../inc/dbconn.inc.php";

        // Update the student's instructor_id
        $query = "UPDATE users SET instructor_id = ? WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $_SESSION['user_id'], $student_id);

        if ($stmt->execute()) {
            // Successfully added the student to the instructor
            // You can add a success message or redirect back to the instructor's students page
            header("Location: students.php?success=1");
            exit();
        } else {
            // Failed to update the student
            // You can add an error message or redirect back to the previous page
            header("Location: add_student.php?error=1");
            exit();
        }
    } else {
        // Missing student ID or instructor ID
        // You can add an error message or redirect back to the previous page
        header("Location: add_student.php?error=1");
        exit();
    }
} else {
    // Student ID is missing
    // You can add an error message or redirect back to the previous page
    header("Location: add_student.php?error=1");
    exit();
}
