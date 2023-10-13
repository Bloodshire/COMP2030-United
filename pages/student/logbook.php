<!DOCTYPE html>

<head>
    <title>Log Book</title>
    <meta charset="utf-8">
    <meta name="Authors" content=" Callum and Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="logbook.php" id="menu-selected"></a>
</head>

<html>

<body>
    <?php require_once "../../inc/main.inc.php"; ?>
    <div class="centre">
        <h2>Logbook options<h2>
                <a href="my_logbook.php">
                    <button class="btn-custom" type="button"><i class="fa-solid fa-table"></i> View My Logbook</button>
                </a>
                <a href="logdrive.php">
                    <button class="btn-custom" type="button"><i class="fa-solid fa-xl fa-square-plus"></i> Log a Drive</button>
                </a>

                <br>
                <br>
                <h2>Drives Awaiting Approval</h2>

                <?php
                require_once "../../inc/dbconn.inc.php";
                // Query for logbook entries that haven't been approved yet
                $query = "SELECT l.*, u.given_name AS instructor_given_name, u.surname AS instructor_surname
          FROM logbook l
          JOIN approvals a ON l.entry_id = a.logbook_entry_id
          JOIN users u ON a.approver_id = u.user_id
          WHERE l.student_id = ? AND l.entry_id IN (SELECT logbook_entry_id FROM approvals WHERE approved = 0)";

                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $_SESSION['user_id']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<table id='tldr-table' class='tldr-table-blue'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Date</th>";
                    echo "<th>Start Time</th>";
                    echo "<th>Finish Time</th>";
                    echo "<th>Duration (mins)</th>";
                    echo "<th>From Location</th>";
                    echo "<th>To Location</th>";
                    echo "<th>Approval Status</th>";
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
                        echo "<td>Awaiting approval from " . $row['instructor_given_name'] . " " . $row['instructor_surname'] . "</td>";

                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>No drives awaiting approval.</p>";
                }

                // Close the database connection
                $stmt->close();
                $conn->close();
                ?>
    </div>
</body>

</html>





























</body>

</html>