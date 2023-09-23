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

                <input type="password" placeholder="Password" id="password" name ="password" required>
                <input type="password" placeholder="Confirm Password" id="passwordConfirm" name="passwordConfirm" required>

            </div>        
            <input type="submit" value="BACK" formaction="studentRegister4.php"> 
            <input type="submit" value="REGISTER" formaction="login.php">
        </form>

    </div>
    
</body>

</html>