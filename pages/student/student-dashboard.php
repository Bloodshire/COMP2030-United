<!DOCTYPE html>

<head>
    <title>Student Dashboard</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="student-dashboard.php" id="menu-selected"></a>

</head>

<html>

<body>
    <?php require_once "../../inc/main.inc.php"; ?>
    <?php
    // Display the welcome message
    echo "<p>Welcome, " . $user_given_name . "!</p>";
    ?>

    <div class="column c-ib">
        <div class="container">

            <a href="my_logbook.php">
                <h3 class="hover">Driving Hours <i class="fa-solid fa-angles-right "></i></h3>
            </a>
            <?php
            require_once "../../inc/dbconn.inc.php";

            // Check if the user is logged in as a student
            // Get the currently logged-in student's user_id
            $loggedStudentId = $_SESSION['user_id'];

            // Query the database to retrieve the total driving hours for the student
            $query = "SELECT SUM(duration) AS total_minutes FROM logbook WHERE student_id = ? AND entry_id IN (SELECT logbook_entry_id FROM approvals WHERE approved=1)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $loggedStudentId);
            $stmt->execute();
            $stmt->bind_result($totalMinutes);
            $stmt->fetch();

            // Fetch the sunrise and sunset times (replace these with actual values)
            $sunriseTime = "06:00:00"; // Example sunrise time
            $sunsetTime = "18:00:00";  // Example sunset time

            // Calculate total day and night hours
            $totalHours = floor($totalMinutes / 60);
            $remainingMinutes = $totalMinutes % 60;

            // Calculate day and night hours
            $totalDayMinutes = 0;
            $totalNightMinutes = 0;

            // Close the database connection
            $stmt->close();

            // Iterate through each driving entry to determine day and night hours
            // Replace this with your actual data retrieval logic
            $query = "SELECT start_time, finish_time FROM logbook WHERE student_id = ? AND entry_id IN (SELECT logbook_entry_id FROM approvals WHERE approved=1)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $loggedStudentId);
            $stmt->execute();
            $stmt->bind_result($startTime, $finishTime);

            while ($stmt->fetch()) {
                // Calculate the driving duration for this entry
                $entryDuration = strtotime($finishTime) - strtotime($startTime);

                // Check if the driving entry falls within the day or night
                if ($startTime >= $sunriseTime && $finishTime <= $sunsetTime) {
                    $totalDayMinutes += $entryDuration / 60;
                } else {
                    $totalNightMinutes += $entryDuration / 60;
                }
            }

            // Close the database connection
            $stmt->close();

            // Display the results
            $totalDayHours = floor($totalDayMinutes / 60);
            $remainingDayMinutes = $totalDayMinutes % 60;

            $totalNightHours = floor($totalNightMinutes / 60);
            $remainingNightMinutes = $totalNightMinutes % 60;


            if ($totalMinutes == "") {
                echo "You don't have any logged drives.";
            } else {
                $totalHours = floor($totalMinutes / 60);
                $remainingMinutes = $totalMinutes % 60;

                echo "Completed $totalHours / 75 hours!</h4>";
                echo "<br>";

                echo '<progress max="75" value="' . $totalHours . '"></progress>';

                echo "<br>";
                echo "<br>";
                echo "<hr>";


                echo "<div class='column c-ib'>";
                echo "<h4><i class='fa-regular fa-sun fa-2xl'></i> Day Hours</h4><p>$totalDayHours hours and $remainingDayMinutes minutes</p>";
                echo "</div>";
                echo "<div class='column c-ib'>";

                echo "<h4><i class='fa-solid fa-moon fa-2xl'></i> Night Hours</h4><p>$totalNightHours hours and $remainingNightMinutes minutes</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <div class="column c-ib">

        <div class="container">
            <a href="payments.php">
                <h3 class="hover">Outstanding Bills <i class="fa-solid fa-angles-right "></i></h3>
            </a>
            <?php
            $query = "SELECT COUNT(*) as bill_count FROM payments WHERE student_id = ? AND payment_status = 0;";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_bills = $row['bill_count'];
            } else {
                $total_bills = 0; // Set to 0 if no results found
            }

            echo "You have " . $total_bills . " outstanding bills.";


            // Close the database connection
            $stmt->close();
            $conn->close();


            ?>
        </div>
        <!-- </a> -->
        <br>
        <br>

        <div class="container">

            <a href="cbta.php">
                <h3 class="hover">CBT&A Units & Tasks <i class="fa-solid fa-angles-right "></i></h3>
            </a>
            <b>Unit 1 </b>
            &nbsp; You have completed 3/8 tasks.
            <br><b>Unit 2 </b>
            &nbsp; Not started.
            <br><b>Unit 3 </b>
            &nbsp; Not started.
            <br><b>Unit 4 </b>
            &nbsp; Not started.
        </div>
    </div>
    <!-- <div class="column c-ib">
        <div class="container">
            <h3>Conditions</h3>
        </div>
    </div> -->
    <div class="column-full c-ib">
        <div class="container">
            <h3>Drive Map</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d418336.63960122806!2d138.2815111742472!3d-35.000321384801715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab735c7c526b33f%3A0x4033654628ec640!2sAdelaide%20SA!5e0!3m2!1sen!2sau!4v1694003301837!5m2!1sen!2sau" width="100%" height="400" style="border:0;" allowfullscreen="" loading="l" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>

</body>

</html>