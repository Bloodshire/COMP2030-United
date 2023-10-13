<?php
session_start();

require_once "../../inc/dbconn.inc.php";


// Extract data from the form
$date = $_POST["date"];
$start_time = $_POST["start_time"];
$finish_time = $_POST["finish_time"];
$duration = $_POST["duration"];
$from_location = $_POST["from_location"];
$to_location = $_POST["to_location"];
$road_condition = $_POST["road_type"];
$weather_condition = $_POST["weather"];
$traffic_condition = $_POST["traffic_density"];

// Extract instructor name and license number
$instructor_name = $_POST["instructor_name"];
$instructor_license = $_POST["instructor_license"];

// Extract start_time and finish_time as strings from the form
$start_time_str = $_POST["start_time"];
$finish_time_str = $_POST["finish_time"];

// Convert start_time and finish_time to DateTime objects
$start_time_1 = new DateTime($start_time_str);
$finish_time_1 = new DateTime($finish_time_str);

// Calculate the duration in minutes
$duration = $start_time_1->diff($finish_time_1)->format('%H') * 60 + $start_time_1->diff($finish_time_1)->format('%i');

// Look up instructor ID based on the provided license number
$instructor_id = 0; // Initialize to a default value

// Perform a database query to find the instructor ID
$query = "SELECT user_id FROM users WHERE license_no = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $instructor_license);
$stmt->execute();
$stmt->bind_result($instructor_id);
$stmt->fetch();
$stmt->close();



// Check if the instructor ID was found
if ($instructor_id != 0) {
    // Perform the database insert into the logbook table
    $sql = "INSERT INTO logbook (student_id, approver_id, date, start_time, finish_time, duration, from_location, to_location, road_condition, weather_condition, traffic_condition)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // You should replace these placeholders with the actual user ID for the student
    $student_id = $_SESSION["user_id"];

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssssssss", $student_id, $instructor_id, $date, $start_time, $finish_time, $duration, $from_location, $to_location, $road_condition, $weather_condition, $traffic_condition);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Insertion into logbook succeeded; now insert a corresponding entry into the approvals table
        $logbook_entry_id = $stmt->insert_id; // Get the ID of the inserted logbook entry

        $sql_approvals = "INSERT INTO approvals (logbook_entry_id, approver_id, approval_date, approved)
                         VALUES (?, ?, NOW(), 0)";

        // Prepare the SQL statement for approvals
        $stmt_approvals = $conn->prepare($sql_approvals);
        $stmt_approvals->bind_param("ii", $logbook_entry_id, $instructor_id);

        if ($stmt_approvals->execute()) {
            echo "Drive logged successfully, awaiting approval.";
        } else {
            echo "Error: " . $stmt_approvals->error;
        }

        // Close the statement for approvals
        $stmt_approvals->close();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement for logbook
    $stmt->close();
} else {
    echo "Instructor with the provided license number not found.";
}

// Close the database connection
$conn->close();