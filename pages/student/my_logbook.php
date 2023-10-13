<!DOCTYPE html>

<head>
    <title>My Logbook</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Callum and Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="logbook.php" id="menu-selected"></a>
</head>

<html>

<body>
    <h1 id="heading-back-btn"><a href="logbook.php"><i class="heading-back-btn fa-solid fa-arrow-left"></i></a></h1>
    <?php
    require_once "../../inc/main.inc.php";
    require_once "../../inc/dbconn.inc.php";

    $userId = $_SESSION['user_id']; 
    $query = "SELECT * FROM LOGBOOK WHERE student_id = ? AND entry_id NOT IN (SELECT logbook_entry_id FROM approvals)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display logbook entries in a table
    if ($result->num_rows > 0) {
        echo "<h2>My Logbook Entries</h2>";
        echo "<table id='tldr-table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Date</th>";
        echo "<th>Start Time</th>";
        echo "<th>Finish Time</th>";
        echo "<th>Duration (mins)</th>";
        echo "<th>From Location</th>";
        echo "<th>To Location</th>";
        echo "<th>Road Condition</th>";
        echo "<th>Weather Condition</th>";
        echo "<th>Traffic Condition</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['start_time'] . "</td>";
            echo "<td>" . $row['finish_time'] . "</td>";
            echo "<td>" . $row['duration'] . "</td>";
            echo "<td>" . $row['from_location'] . "</td>";
            echo "<td>" . $row['to_location'] . "</td>";
            echo "<td>" . $row['road_condition'] . "</td>";
            echo "<td>" . $row['weather_condition'] . "</td>";
            echo "<td>" . $row['traffic_condition'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No logbook entries found.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
    ?>
</body>

</html>