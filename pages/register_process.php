<?php
require_once "../inc/dbconn.inc.php";


// Get user input
$given_name = $_POST['given_name'];
$surname = $_POST['surname'];
$date_of_birth = $_POST['date_of_birth'];
$email = $_POST['email'];
$street_address = $_POST['street_address'];
$suburb = $_POST['suburb'];
$state = $_POST['state'];
$postcode = $_POST['postcode'];
$role_id = $_POST['role_id'];
$password = $_POST['password'];


// Initialize the license_no variable
$license_no = '';

// Check the selected role_id and set the license_no accordingly
if ($role_id == 1) { // Instructor
    $license_no = $_POST['instructor_license_no'];
} elseif ($role_id == 2) { // QSD
    $license_no = $_POST['qsd_license_no'];
} elseif ($role_id == 3) { // Student
    $license_no = $_POST['learner_license_no'];
}

// Hash the password (assuming it's stored as a hashed value in the database)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query the database to check if the user exists
$query = "SELECT user_id, email FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if a user with the provided email exists
if ($stmt->num_rows == 1) {
    // User with the provided email already exists, show an error message
    echo "A user was found with that email.<br> <a href='register.php'>Try again</a>";
    
} else {
    // INSERT user with respective data

    
    // Define the INSERT query
    $insert_query = "INSERT INTO users (given_name, surname, date_of_birth, email, street_address, suburb, state, postcode, role_id, password, license_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the INSERT statement
    $insert_stmt = $conn->prepare($insert_query);

    // Bind parameters
    $insert_stmt->bind_param("sssssssssss", $given_name, $surname, $date_of_birth, $email, $street_address, $suburb, $state, $postcode, $role_id, $hashed_password, $license_no);

    // Execute the INSERT statement
    if ($insert_stmt->execute()) {
        // User registration successful
        header("Location: register_success.php");
    } else {
        // Error in user registration
        echo "Error: User registration failed. Please try again later.";
    }

    // Close the INSERT statement
    $insert_stmt->close();
}

// Close the database connection
$stmt->close();
$conn->close();
?>
