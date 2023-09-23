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

    <div id="registrationContainer">

        <form id="registrationForm" method="POST">

            <h1>Register</h1>
            <div id="loginInputs">
                <p><i>Please give information as stated on your permit</i></p>
                <input type="text" placeholder="Given Name" name="givenName" id="givenName" required>
                <input type="text" placeholder="Surname" name="givenName" id="surname" required>
                <label for="DOB">Date of Birth</label>
                <input type="date" name="DOB" id="DOB" min="1923-01-01" max="2006-01-01" required>
            </div>          
            <input type="submit" value="NEXT" formaction="studentRegister2.php">
        </form>

    </div>
    
</body>


</html>