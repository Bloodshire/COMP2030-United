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
                <h2>Pending & Rejected Drives</h2>

                <?php
                require_once "../../inc/dbconn.inc.php";
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_entry_id'])) {
                    // Handle the deletion process
                    $entry_id = $_POST['delete_entry_id'];

                    // First, delete the entry from the approvals table
                    $delete_approvals_query = "DELETE FROM approvals WHERE logbook_entry_id = ?";
                    $stmt_approvals = $conn->prepare($delete_approvals_query);
                    $stmt_approvals->bind_param("i", $entry_id);

                    if ($stmt_approvals->execute()) {
                        // Deletion from approvals table succeeded
                        // Now, delete the entry from the logbook table
                        $delete_logbook_query = "DELETE FROM logbook WHERE entry_id = ?";
                        $stmt_logbook = $conn->prepare($delete_logbook_query);
                        $stmt_logbook->bind_param("i", $entry_id);

                        if ($stmt_logbook->execute()) {
                            echo "<span id='notification' class='notification fade-out'>Entry deleted successfully.</span>";
                        } else {
                            echo "Error deleting entry from logbook table: " . $stmt_logbook->error;
                        }

                        $stmt_logbook->close();
                        $stmt_approvals->close();
                    }
                }

                // Query for logbook entries that are pending approval or have been disapproved
                $query = "SELECT l.*, u.given_name AS instructor_given_name, u.surname AS instructor_surname, a.approved
FROM logbook l
LEFT JOIN approvals a ON l.entry_id = a.logbook_entry_id
LEFT JOIN users u ON a.approver_id = u.user_id
WHERE l.student_id = ? AND (l.entry_id IN (SELECT logbook_entry_id FROM approvals WHERE a.approved = 0) OR a.approved = 2)";

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
                    echo "<th>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr";
                        if ($row['approved'] === 2) {
                            // Add a class for disapproved rows (you can style this class in your CSS)
                            echo " class='disapproved-row'";
                        }
                        echo ">";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['start_time'] . "</td>";
                        echo "<td>" . $row['finish_time'] . "</td>";
                        echo "<td>" . $row['duration'] . "</td>";
                        echo "<td>" . $row['from_location'] . "</td>";
                        echo "<td>" . $row['to_location'] . "</td>";

                        if ($row['approved'] === 0) {
                            // This drive is pending approval
                            echo "<td>Pending approval from " . $row['instructor_given_name'] . " " . $row['instructor_surname'] . "</td>";
                            echo "<td></td>";
                        } elseif ($row['approved'] === 2) {
                            // This drive has been disapproved
                            // This drive has been disapproved
                            echo "<td>Disapproved by " . $row['instructor_given_name'] . " " . $row['instructor_surname'] . "</td>";

                            // Add a button to delete the disapproved entry
                            echo "<td><form method='post'>
                  <input type='hidden' name='delete_entry_id' value='" . $row['entry_id'] . "'>
                  <button class='btn-custom btn-red btn-small' type='submit'>Remove</button>
              </form></td>";
                        }

                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>No drives awaiting approval or disapproved drives.</p>";
                }

                // Close the database connection
                $stmt->close();
                $conn->close();
                ?>

    </div>
    <script>
        var notification = document.getElementById("notification");
        if (notification) {
            // Remove the element after the animation ends
            notification.addEventListener("animationend", function() {
                notification.remove();
            });
        }
    </script>
</body>

</html>