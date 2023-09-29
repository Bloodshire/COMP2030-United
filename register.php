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

        <form id="registrationForm" method="POST" action="adduser.php">

            <h1>Register</h1>
            <div id="loginInputs">
                <p><i>Please give information as stated on your permit/licence</i></p>

                <h2>Personal Information</h2>

                <label for="givenName">Given Name</label>
                <input type="text" name="givenName" id="givenName" required>

                <label for="givenName">Surname</label>
                <input type="text" name="surname" id="surname" required>

                <label for="DOB">Date of Birth</label>
                <input type="date" name="DOB" id="DOB" min="1923-01-01" max="2006-01-01" required>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>

                <label for="emailConfirm">Confirm Email</label>
                <input type="email" name="emailConfirm" id="emailConfirm" required>

                <h2>Address Information</h2>

                <label for="streetAddress">Street Address</label>
                <input type="text" name="streetAddress" id="streetAddress" required>

                <label for="suburb">Suburb</label>
                <input type="text" name="suburb" id="suburb" required>

                <label for="state">State</label>
                <select id="state" name="state" id="state" required>
                    <option id="SA">SA</option>
                    <option id="SA">WA</option>
                    <option id="SA">NT</option>
                    <option id="SA">QLD</option>
                    <option id="SA">NSW</option>
                    <option id="SA">VIC</option>
                    <option id="SA">TAS</option>
                </select>

                <label for="postcode">Postcode</label>
                <input type="postal" name = "postcode" id="postcode" required>

                <h2>Licence Information</h2>

                <p class="labelish">User Type:</p>
                <div id="radioContainer" name="radioContainer" class="radioOptions">

                    <div id="student" class="floatBlock">
                        <label for="student"> <input id="studentIn" name="userType" type="radio" value="Student" />  Student </label>
                    </div>

                    <div id="instructor" class="floatBlock">
                        <label for="instructor"> <input id="instructorIn" name="userType" type="radio" value="Instructor" /> Instructor </label>
                    </div>

                    <div id="QSD" class="floatBlock">
                        <label for="QSD"> <input id="QSDIn" name="userType" type="radio" value="Supervising Driver"/> Supervising Driver </label>
                    </div>

                </div>

                <div id="learnerInput" class="show-hide">
                    <label for="learnerPermit">Permit Number</label>
                    <input type="text" id="learnerPermit" name="learnerPermit" required>
                    <label for="expiry">Expiry Date</label>
                    <input type="date" name="expiry" id="expiry" required>
                </div>

                <div id="instructorInput" class="show-hide">
                    <label for="instructorLicence">Licence Number</label>
                    <input type="text" id="instructorLicence" name="instructorLicence" required>
                    <label for="expiry">Expiry Date</label>
                    <input type="date" name="expiry" id="expiry" required>
                </div>

                <div id="qsdInput" class="show-hide">
                    <label for="qsdLicence">Licence Number</label>
                    <input type="text" id="qsdLicence" name="qsdLicence" required>
                    <label for="expiry">Expiry Date</label>
                    <input type="date" name="expiry" id="expiry" required>
                </div>

                <h2>Password Information</h2>

                <label for="password">Password</label>
                <input type="password" id="password" name ="password" required>

                <label for="passwordConfirm">Confirm Password</label>
                <input type="password" id="passwordConfirm" name="passwordConfirm" required>
            </div>
            <input type="submit" value="REGISTER">
        </form>

    </div>
    
</body>


</html>