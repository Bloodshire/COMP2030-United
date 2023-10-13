<!DOCTYPE html>
<html>

<head>
    <title>Approvals</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="approvals.php" id="menu-selected"></a>
</head>

<body>
    <?php
    require_once "../../inc/main.inc.php";
    require_once "../../inc/dbconn.inc.php";

    // Check if the user is logged in and is an instructor (you can customize this check)
    $instructor_id = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle the approval process when the form is submitted
        if (isset($_POST['approve_entry_id'])) {
            $entry_id = $_POST['approve_entry_id'];
            $approval_status = 1; // Set to approved

            // Update the approval status in the "approvals" table
            $update_query = "UPDATE approvals SET approved = ? WHERE logbook_entry_id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("ii", $approval_status, $entry_id);
            if ($stmt->execute()) {
                // Approval status updated successfully
                echo "Logbook entry approved!";
                echo '<br>';
                echo '<br>';
            } else {
                echo "Error updating approval status: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    // Query to select logbook entries that need approval
    $query = "SELECT l.entry_id, l.date, l.start_time, l.finish_time, l.duration, l.from_location, l.to_location, l.road_condition, l.weather_condition, l.traffic_condition, u.given_name, u.surname
          FROM logbook AS l
          JOIN approvals AS a ON l.entry_id = a.logbook_entry_id
          JOIN users AS u ON l.student_id = u.user_id
          WHERE l.approver_id = ? AND a.approved = 0";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $instructor_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    // Check if there are rows to display
    if ($result->num_rows > 0) {
        echo "
         <h2>List of Drives Awaiting Approval</h2>
        
        <table id='tldr-table' class='tldr-table-blue'>
        <thead>
            <tr>
                <th>Date</th>
                <th>Start Time</th>
                <th>Finish Time</th>
                <th>Duration (minutes)</th>
                <th>From Location</th>
                <th>To Location</th>
                <th>Road Condition</th>
                <th>Weather Condition</th>
                <th>Traffic Condition</th>
                <th>Student Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";

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
            echo "<td>" . $row['given_name'] . " " . $row['surname'] . "</td>";
            echo "<td>
                <form method='post'>
                    <input type='hidden' name='approve_entry_id' value='" . $row['entry_id'] . "'>
                    <button class='btn-custom btn-blue btn-small' type='submit'>Approve</button>
                </form>
            </td>";
            echo "</tr>";
        }

        echo "</tbody>
    </table>";
    } else {
        echo "No drives awaiting approval.";
    }

    ?>
    </tbody>
    </table>
</body>

</html>