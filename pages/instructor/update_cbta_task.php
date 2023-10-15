<?php
session_start();
require_once "../../inc/dbconn.inc.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unit = isset($_GET['unit']) ? $_GET['unit'] : '';
    $task = isset($_GET['task']) ? $_GET['task'] : '';

    // Check if the entry already exists in the database
    $checkQuery = "SELECT entry_id FROM cbta_tasks WHERE unit_id = ? AND task_id = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ii", $unit, $task);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // The entry already exists, so update it
        $checkStmt->close();

        // Retrieve form data
        $elementsData = [];

        foreach ($_POST as $key => $value) {
            $elementsData[$key] = $_POST[$key];
        }

        // Get the current user's student ID and instructor ID
        $studentId = $_SESSION['student_user_id'];
        $instructorId = $_SESSION['user_id'];

        // Get the current date
        $completionDate = date('Y-m-d');

        // Encode the dynamic JSON data
        $elementsJson = json_encode($elementsData);

        // Update the JSON data in the elements field and set other fields
        $updateQuery = "UPDATE cbta_tasks SET elements = ?, student_id = ?, instructor_id = ?, completion_date = ? WHERE unit_id = ? AND task_id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("siisii", $elementsJson, $studentId, $instructorId, $completionDate, $unit, $task);

        if ($updateStmt->execute()) {
            header("Location: manage_student.php?success=1");
        } else {
            echo "Error updating CBT&A Unit 1, Task 1: " . $conn->error;
        }

        $updateStmt->close();
    } else {
        // The entry doesn't exist, so insert a new one
        $checkStmt->close();

        // Retrieve form data
        $elementsData = [];

        foreach ($_POST as $key => $value) {
            $elementsData[$key] = $_POST[$key];
        }

        // Get the current user's student ID and instructor ID
        $studentId = isset($_SESSION['student_user_id']) ? $_SESSION['student_user_id'] : 0;
        $instructorId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        // Get the current date
        $completionDate = date('Y-m-d');

        // Encode the dynamic JSON data
        $elementsJson = json_encode($elementsData);

        // Insert the new entry into the database, including the additional fields
        $insertQuery = "INSERT INTO cbta_tasks (unit_id, task_id, elements, student_id, instructor_id, completion_date) VALUES (?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("iisiis", $unit, $task, $elementsJson, $studentId, $instructorId, $completionDate);

        if ($insertStmt->execute()) {
            header("Location: manage_student.php?success=1");
        } else {
            echo "Error inserting CBT&A Unit 1, Task 1: " . $conn->error;
        }

        $insertStmt->close();
    }
} else {
    echo "No form submitted.";
}
?>
