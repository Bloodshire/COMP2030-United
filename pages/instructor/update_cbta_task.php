<?php
require_once "../../inc/main.inc.php";
require_once "../../inc/dbconn.inc.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unit = isset($_GET['unit']) ? $_GET['unit'] : '';
    $task = isset($_GET['task']) ? $_GET['task'] : '';

    // Check if the entry already exists in the database
    $checkQuery = "SELECT task_id FROM cbta_tasks WHERE unit_id = ? AND task_id = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ii", $unit, $task);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // The entry already exists, so update it
        $checkStmt->close();

        // Retrieve form data
        $checkbox1 = isset($_POST['checkbox1']) ? 1 : 0;
        $checkbox2 = isset($_POST['checkbox2']) ? 1 : 0;
        $checkbox3 = isset($_POST['checkbox3']) ? 1 : 0;
        $checkbox4 = isset($_POST['checkbox4']) ? 1 : 0;
        $group1 = isset($_POST['group1']) ? $_POST['group1'] : '';
        $checkbox5 = isset($_POST['checkbox5']) ? 1 : 0;
        $checkbox6 = isset($_POST['checkbox6']) ? 1 : 0;
        $group2 = isset($_POST['group2']) ? $_POST['group2'] : '';
        $checkbox7 = isset($_POST['checkbox7']) ? 1 : 0;
        $checkbox8 = isset($_POST['checkbox8']) ? 1 : 0;
        $group3 = isset($_POST['group3']) ? $_POST['group3'] : '';
        $examinerNotes = isset($_POST['examinernotes']) ? $_POST['examinernotes'] : '';

        // Sample JSON data
        $elementsData = '{
            "checkbox1": ' . ($checkbox1 ? 'true' : 'false') . ',
            "checkbox2": ' . ($checkbox2 ? 'true' : 'false') . ',
            "checkbox3": ' . ($checkbox3 ? 'true' : 'false') . ',
            "checkbox4": ' . ($checkbox4 ? 'true' : 'false') . ',
            "group1": "' . $group1 . '",
            "checkbox5": ' . ($checkbox5 ? 'true' : 'false') . ',
            "checkbox6": ' . ($checkbox6 ? 'true' : 'false') . ',
            "group2": "' . $group2 . '",
            "checkbox7": ' . ($checkbox7 ? 'true' : 'false') . ',
            "checkbox8": ' . ($checkbox8 ? 'true' : 'false') . ',
            "group3": "' . $group3 . '"
        }';

        // Get the current user's student ID and instructor ID
        $studentId = isset($_SESSION['student_user_id']) ? $_SESSION['student_user_id'] : 0;
        $instructorId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        // Get the current date
        $completionDate = date('Y-m-d');

        // Update the JSON data in the elements field and set other fields
        $updateQuery = "UPDATE cbta_tasks SET elements = ?, student_id = ?, instructor_id = ?, completion_date = ? WHERE unit_id = ? AND task_id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("siissi", $elementsData, $studentId, $instructorId, $completionDate, $unit, $task);

        if ($updateStmt->execute()) {
            echo "CBT&A Unit 1, Task 1 updated successfully!";
        } else {
            echo "Error updating CBT&A Unit 1, Task 1: " . $conn->error;
        }

        $updateStmt->close();
    } else {
        // The entry doesn't exist, so insert a new one
        $checkStmt->close();

        // Retrieve form data
        $checkbox1 = isset($_POST['checkbox1']) ? 1 : 0;
        $checkbox2 = isset($_POST['checkbox2']) ? 1 : 0;
        $checkbox3 = isset($_POST['checkbox3']) ? 1 : 0;
        $checkbox4 = isset($_POST['checkbox4']) ? 1 : 0;
        $group1 = isset($_POST['group1']) ? $_POST['group1'] : '';
        $checkbox5 = isset($_POST['checkbox5']) ? 1 : 0;
        $checkbox6 = isset($_POST['checkbox6']) ? 1 : 0;
        $group2 = isset($_POST['group2']) ? $_POST['group2'] : '';
        $checkbox7 = isset($_POST['checkbox7']) ? 1 : 0;
        $checkbox8 = isset($_POST['checkbox8']) ? 1 : 0;
        $group3 = isset($_POST['group3']) ? $_POST['group3'] : '';
        $examinerNotes = isset($_POST['examinernotes']) ? $_POST['examinernotes'] : '';

        // Sample JSON data
        $elementsData = '{
            "checkbox1": ' . ($checkbox1 ? 'true' : 'false') . ',
            "checkbox2": ' . ($checkbox2 ? 'true' : 'false') . ',
            "checkbox3": ' . ($checkbox3 ? 'true' : 'false') . ',
            "checkbox4": ' . ($checkbox4 ? 'true' : 'false') . ',
            "group1": "' . $group1 . '",
            "checkbox5": ' . ($checkbox5 ? 'true' : 'false') . ',
            "checkbox6": ' . ($checkbox6 ? 'true' : 'false') . ',
            "group2": "' . $group2 . '",
            "checkbox7": ' . ($checkbox7 ? 'true' : 'false') . ',
            "checkbox8": ' . ($checkbox8 ? 'true' : 'false') . ',
            "group3": "' . $group3 . '"
        }';

        // Get the current user's student ID and instructor ID
        $studentId = isset($_SESSION['student_user_id']) ? $_SESSION['student_user_id'] : 0;
        $instructorId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        // Get the current date
        $completionDate = date('Y-m-d');

        // Insert the new entry into the database, including the additional fields
        $insertQuery = "INSERT INTO cbta_tasks (unit_id, task_id, elements, student_id, instructor_id, completion_date) VALUES (?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("iissis", $unit, $task, $elementsData, $studentId, $instructorId, $completionDate);

        if ($insertStmt->execute()) {
            echo "CBT&A Unit 1, Task 1 inserted successfully!";
        } else {
            echo "Error inserting CBT&A Unit 1, Task 1: " . $conn->error;
        }

        $insertStmt->close();
    }
} else {
    echo "No form submitted.";
}
?>
