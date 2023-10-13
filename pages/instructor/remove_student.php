<?php
// Check if the user_id is provided in the URL
if (isset($_GET['user_id'])) {
    // Retrieve the user_id from the URL
    $user_id = $_GET['user_id'];

    // Connect to Database
    require_once "../../inc/dbconn.inc.php";

    // Prepare and execute an UPDATE query to set instructor_id to NULL of specific student
    $query = "UPDATE users SET instructor_id = NULL WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // Instructor assignment removed successfully
        header("Location: instructor/students.php");
    } else {
        // Error occurred while removing the instructor assignment
        echo "Error removing instructor assignment.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // If user_id is not provided in the URL, display an error message
    echo "User ID not provided.";
}
?>
This script updates the instructor_id field of the user with the provided user_id to NULL, effectively removing the instructor assignment without deleting the entire user. Don't forget to replace 'your_db_connection' with your actual database connection code.





