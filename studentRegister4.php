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

                <input type="text" placeholder="Permit Number" id="permitNumber" name="permitNumber" required>

                <label for="expiry">Expiry Date</label>
                <input type="date" name="expiry" id="expiry" required>

            </div>        
            <input type="submit" value="BACK" formaction="studentRegister3.php"> 
            <input type="submit" value="NEXT" formaction="studentRegister5.php">
        </form>

    </div>
    
</body>

</html>