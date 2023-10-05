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
            <label for="email">Email:</label>
            <input type="email" name="email" required placeholder="required">

            <label for="email">Given Name:</label>
            <input type="text" name="givenName" required placeholder="required">

            <label for="email">Middle Name/s:</label>
            <input type="text" name="givenName">

            <label for="email">Surname:</label>
            <input type="text" name="surname" required placeholder="required">

            <input type="button" id="nextButton" value="NEXT">
        </form>

    </div>
    
</body>

</html>