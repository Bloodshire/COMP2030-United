<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Harrison">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
</head>

<body id="loginBody">

    <div id="loginContainer">

        <form id="loginForm" method="POST" action="dashboard.php">
            <h1>Login</h1>
            <div id="loginInputs">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
            </div>
            <a href="register.php">Register</a>
            <a href="forgot.php">Forgot Password</a>

        </form>

    </div>

</body>

</html>