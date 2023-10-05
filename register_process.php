<!-- Copied from login_process.php -->

<?php
session_start();

define("DB_HOST", "localhost");
define("DB_NAME", "TLDR");
define("DB_USER", "dbadmin");
define("DB_PASS", "");

$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    // Something went wrong...
    echo "Error: Unable to connect to database.<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}


// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password (assuming it's stored as a hashed value in the database)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query the database to check if the user exists
$query = "SELECT user_id, email, password, full_name FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if a user with the provided email exists
if ($stmt->num_rows == 1) {
    $stmt->bind_result($user_id, $db_email, $db_password, $db_full_name);
    $stmt->fetch();

    // Verify the hashed password
    if ($hashed_password = $db_password) {
        // Password is correct, start a session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $db_email;
        $_SESSION['user_full_name'] = $db_full_name;
        // Redirect to a welcome or dashboard page
        header("Location: dashboard.php");
    } else {
        // Password is incorrect, show an error message
        echo "Incorrect password. <a href='login.php'>Try again</a>";
    }
} else {
    // User with the provided email does not exist, show an error message
    echo "No user found with this email. <a href='login.php'>Try again</a>";
}

// Close the database connection
$stmt->close();
$conn->close();
?>
