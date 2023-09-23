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

                <input type="text" placeholder="Street Address" id="streetAddress" required>

                <input type="text" placeholder="Suburb" id="suburb" required>

                <label for="state">State</label>
                <select id="state" name="state" required>
                    <option id="SA">SA</option>
                    <option id="SA">WA</option>
                    <option id="SA">NT</option>
                    <option id="SA">QLD</option>
                    <option id="SA">NSW</option>
                    <option id="SA">VIC</option>
                    <option id="SA">TAS</option>
                </select>
                
                <label for="postcode">Postcode</label>
                <input type="postal" id="postcode" required>

            </div>        
            <input type="submit" value="BACK" formaction="studentRegister2.php"> 
            <input type="submit" value="NEXT" formaction="studentRegister4.php">
        </form>

    </div>
    
</body>

</html>