<?php
session_start();

require_once "../inc/dbconn.inc.php";


// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password (assuming it's stored as a hashed value in the database)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query the database to check if the user exists
$query = "SELECT user_id, email, password, given_name, surname, license_no, date_of_birth, role_id FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if a user with the provided email exists
if ($stmt->num_rows == 1) {
    $stmt->bind_result($user_id, $db_email, $db_password, $db_given_name, $db_surname, $db_license, $db_date_of_birth, $db_role_id);
    $stmt->fetch();

    // Verify the hashed password
    if (password_verify($password, $db_password)) {
        // Password is correct, start a session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $db_email;
        $_SESSION['user_given_name'] = $db_given_name;
        $_SESSION['user_surname'] = $db_surname;
        $_SESSION['user_password'] = $db_password;
        $_SESSION['user_license'] = $db_license;
        $_SESSION['user_date_of_birth'] = $db_date_of_birth;
        $_SESSION['role_id'] = $db_role_id;


        // Retrieve and store the instructor ID
        $query_instructor = "SELECT instructor_id FROM users WHERE user_id = ?";
        $stmt_instructor = $conn->prepare($query_instructor);
        $stmt_instructor->bind_param("s", $user_id);
        $stmt_instructor->execute();
        $stmt_instructor->bind_result($instructor_id);
        $stmt_instructor->fetch();
        $_SESSION['instructor_id'] = $instructor_id;

        if ($db_role_id == 1) {
            // Redirect to a welcome or dashboard page
            header("Location: instructor/instructor-dashboard.php");
        } else if ($db_role_id == 2) {
            // Redirect to a welcome or dashboard page
            header("Location: qsd/qsd-dashboard.php");
        } else if ($db_role_id == 3) {
            // Redirect to a welcome or dashboard page
            header("Location: student/student-dashboard.php");
        } else if ($db_role_id == 4) {
            // Redirect to a welcome or dashboard page
            header("Location: government/government-dashboard.php");
        }
    } else {
        // Password is incorrect, show an error message
        header("Location: login_failed_incorrect_password.php");
    }
} else {
    // User with the provided email does not exist, show an error message
    header("Location: login_failed_no_user_found.php");
}

// Close the database connection
$stmt->close();
$conn->close();
