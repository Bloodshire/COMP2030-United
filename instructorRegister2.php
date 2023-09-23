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
                <input type="email" placeholder="Email" name="email" id="email" required>
                <input type="email" placeholder="Confirm Email" name="email" id="emailConfirm" required>
            </div>
            <input type="submit" value="BACK" formaction="studentRegister.php">          
            <input type="submit" value="NEXT" formaction="studentRegister3.php">
        </form>

    </div>
    
</body>

</html>