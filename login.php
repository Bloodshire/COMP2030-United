<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Harrison">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
</head>

<body class="loginBody">

    <div id="loginContainer">

        <form id="loginForm" method="POST" action="login_process.php">
            <h1>Login</h1>
            <div id="loginInputs">
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password "required>
                <input type="submit" value="LOGIN">
            </div>
            <a href="register.php">Register</a>
            <a href="forgot.php">Forgot Password</a>

        </form>

    </div>

</body>

</html>