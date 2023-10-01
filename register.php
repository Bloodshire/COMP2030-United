<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Harrison">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/registration.js" defer></script>
</head>

<body class="loginBody">

    <div id="loginContainer">

        <form id="registrationForm" method="POST">
            <!-- <h1>Are you a:</h1> -->
            <button id="student" formaction="studentRegister.php">Student</button>
            <button id="instructor" formaction="instructorRegister.php">Instructor</button>
            <button id="QSD" formaction="QSDRegister.php">Supervising Driver</button>

        </form>

    </div>

</body>

</html>