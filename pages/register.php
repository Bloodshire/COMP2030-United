<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Harrison and Michael">
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../scripts/registration.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body class="loginBody">

    <div id="registrationContainer">

        <form id="registrationForm" method="POST" action="register_process.php">


            
            <h1><a href="login.php"><i class="top-left heading-back-btn fa-solid fa-arrow-left"></i></a> Register</h1>

            <div id="loginInputs">
                <p><i>Please give information as stated on your permit/licence</i></p>

                <h2>Personal Information</h2>

                <label for="givenName">Given Name</label>
                <input type="text" name="given_name" id="givenName" maxlength="20" required>

                <label for="givenName">Surname</label>
                <input type="text" name="surname" id="surname" maxlength="20" required>

                <label for="DOB">Date of Birth</label>
                <input type="date" name="date_of_birth" id="DOB" min="1923-01-01" max="2006-01-01" required>

                <div id="emailContainer">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>

                    <label for="emailConfirm">Confirm Email</label>
                    <input type="email" name="emailConfirm" id="emailConfirm" required onchange="emailVal()">
                    <p id="eWarning"></p>
                </div>

                <h2>Address Information</h2>

                <label for="streetAddress">Street Address</label>
                <input type="text" name="street_address" id="streetAddress" required>

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
                <input type="number" name="postcode" id="postcode" max="9999" min="0000" placeholder="5555" required>

                <h2>Licence Information</h2>

                <div id="radioContainer" name="radioContainer" class="radioOptions">

                    <div id="student" class="floatBlock" onclick="show()">
                        <label for="studentIn">
                            <input id="studentIn" name="role_id" type="radio" value="3" />
                            Student</label>
                    </div>

                    <div id="instructor" class="floatBlock" onclick="show()">
                        <label for="instructorIn">
                            <input id="instructorIn" name="role_id" type="radio" value="1" />
                            Instructor</label>
                    </div>

                    <div id="QSD" class="floatBlock" onclick="show()">
                        <label for="QSDIn">
                            <input id="QSDIn" name="role_id" type="radio" value="2" />
                            Supervising Driver</label>
                    </div>

                </div>



                <div id="learnerInput">
                    <label for="learnerPermit">Permit Number</label>
                    <input type="text" id="learnerPermit" name="learner_license_no">
                    <label for="permitExpiry">Expiry Date</label>
                    <input type="date" name="learner_license_expiry">
                </div>

                <div id="instructorInput">
                    <label for="instructorLicence">MDI Licence Number</label>
                    <input type="text" id="instructorLicence" name="instructor_license_no">
                    <label for="iLicenceExpiry">Expiry Date</label>
                    <input type="date" name="instructor_license_expiry">
                </div>

                <div id="qsdInput">
                    <label for="qsdLicence">Licence Number</label>
                    <input type="text" id="qsdLicence" name="qsd_license_no">
                    <label for="qLicenceExpiry">Expiry Date</label>
                    <input type="date" name="qsd_license_expiry">
                </div>

                <h2>Password Information</h2>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" minlength="10" oninput="passStr()">

                <div>
                    <img src="../images/no-pass.png" id="strengthImg">
                </div>

                <div id="passwordContainer">
                    <label for="passwordConfirm">Confirm Password</label>
                    <input type="password" id="passwordConfirm" name="passwordConfirm" onchange="passVal()">
                    <p id="pWarning"></p>
                </div>

            </div>
            <input type="submit" value="REGISTER">
        </form>

    </div>

</body>

</html>