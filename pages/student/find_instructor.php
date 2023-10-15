<!DOCTYPE html>
<html>

<head>
    <title>Log a Drive</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="logbook.php" id="menu-selected"></a>
</head>

<body>
    <h1 id="heading-back-btn"><a href="logbook.php"><i class="heading-back-btn fa-solid fa-arrow-left"></i></a></h1>

    <?php require_once "../../inc/main.inc.php"; ?>

    <div class="centre">
        <h2>Select a Supervising Driver</h2>
        <?php
        require_once "../../inc/dbconn.inc.php";
        // Get the current student's user_id
        $studentId = $_SESSION['user_id'];

        // Query the database to retrieve the instructor's name and surname for the current student
        $query = "SELECT u.given_name, u.surname, u.license_no
                  FROM users AS u
                  JOIN users AS s ON u.user_id = s.instructor_id
                  WHERE s.user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $studentId);
        $stmt->execute();
        $stmt->bind_result($instructorGivenName, $instructorSurname, $instructorLicenseNo);
        $stmt->fetch();
        $stmt->close();
        ?>
        <div class="container centre-div">
            <form id="invoiceForm" action="logdrive.php" method="post">
                
                    <?php if ($instructorGivenName != "") { ?>
                        <p><strong>Current Instructor:</strong> <?php echo $instructorGivenName . " " . $instructorSurname; ?></p>
                        <input type="hidden" name="instructor_name" value="<?php echo $instructorGivenName . " " . $instructorSurname; ?>">
                        <input type="hidden" name="instructor_license" value="<?php echo $instructorLicenseNo ?>">
                        <button class="btn-custom"><i class="fa-solid fa-user-tie"></i> Use Current Instructor</button>
                    <?php } else {
                    ?>
                        <p><strong>You do not have a delegated Instructor.</strong></p>
                    <?php } ?>
                

            </form>
        </div>
        <br>
        <h3>OR</h3>
        <br>
        <div class="container centre-div">
            <form id="searchForm" action="#" method="post">
                <h3>Find a QSD</h3>
                <label for="student_license">QSD License No</label>
                <input type="text" name="student_license" id="student_license" required>
                <br>
                <button class="btn-custom btn-blue"><i class="fa-solid fa-magnifying-glass"></i> Search QSD</button>
            </form>
        </div>
    </div>
</body>

</html>