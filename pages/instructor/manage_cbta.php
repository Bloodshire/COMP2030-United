<!DOCTYPE html>
<html>

<head>
    <?php

    $unitTasks = array(array(
        array(1, "Cabin Drill and Control", "cabin_drill_and_control.php"),
        array(2, "Starting Up and Shutting down the Engine", "starting_up_and_shutting_down_engine.php"),
        array(3, "Moving off from the Kerb", "Moving_off_from_kerb.php"),
        array(4, "Stopping and Securing the Vehicle", "stopping_and_securing_vehicle.php"),
        array(5, "Stop and go (Using the park brake)", "stop_and_go.php"),
        array(6, "Gear Changing (Up and Down)", "gear_changing.php"),
        array(7, "Steering (Forward and Reverse)", "steering.php"),
        array(8, "Review of all basic procedures", "review_basic_procedures.php")
    ));
    $unit_id = isset($_GET['unit']) ? $_GET['unit'] : '';
    $task_id = isset($_GET['task']) ? $_GET['task'] : '';
    if (isset($_GET['unit']) && isset($_GET['task'])) {
        $taskName = $unitTasks[$unit_id - 1][$task_id - 1][1];
        $heading = "CBT&A Unit $unit_id, Task $task_id: $taskName";
    } else {
        $taskName = '';
        $heading = "No unit & task selected.";
    }


    ?>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <title><?php echo $heading ?></title>
    <script src="../../scripts/script.js" defer></script>
    <a href="students.php" id="menu-selected"></a>
</head>

<body>
    <h1 id="heading-back-btn"><a href="manage_student.php"><i class="heading-back-btn fa-solid fa-arrow-left"></i></a></h1>
    <?php
    require_once "../../inc/main.inc.php";

    $student_user_id = isset($_SESSION['student_user_id']) ? $_SESSION['student_user_id'] : '';
    $student_given_name = isset($_SESSION['student_given_name']) ? $_SESSION['student_given_name'] : '';
    $student_surname = isset($_SESSION['student_surname']) ? $_SESSION['student_surname'] : '';
    $student_license_no = isset($_SESSION['student_license_no']) ? $_SESSION['student_license_no'] : '';

    $studentId = $_SESSION['student_user_id'];
    $selectQuery = "SELECT ct.elements, ct.completion_date, ct.instructor_id, u.given_name, u.surname
               FROM cbta_tasks ct
               LEFT JOIN users u ON ct.instructor_id = u.user_id
               WHERE ct.student_id = ? AND ct.unit_id = 1 AND ct.task_id = 1";

    $selectStmt = $conn->prepare($selectQuery);
    $selectStmt->bind_param("i", $studentId);
    $selectStmt->execute();
    $selectStmt->bind_result($elementsJson, $completionDate, $instructorId, $instructorGivenName, $instructorSurname);


    if ($selectStmt->fetch()) {
        // Decode the JSON data
        $elementsData = json_decode($elementsJson, true);
    }
    $selectStmt->close();

    ?>

    <div class="column">
        <h2><?php echo "Student: " . $student_given_name . " " . $student_surname ?></h2>
        <p>Last updated: <?php echo isset($completionDate) ? $completionDate : 'Never'; ?><br>
            <?php echo isset($instructorId) ? "By $instructorGivenName $instructorSurname" : ''; ?></p>
        <?php

        if (isset($_GET['unit']) && isset($_GET['task'])) {
            $unit = $_GET['unit'];
            $task = $_GET['task'];
            if ($unit == 1) {
                if ($task == 1) {
        ?>
                    <div class="cbta-container">
                        <form id="cbta" action="update_cbta_task.php?unit=1&task=1" method="POST">
                            <h2 class="cbta-header">Task Assessment Records</h2>
                            <p>Cabin Drill
                                <input name="checkbox1" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?>>
                                <input name="checkbox2" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?>>
                            </p>
                            <p>Controls (Selected from the respective group)</p>
                            <div>
                                <label for="group1">Group 1 - Control Name</label>
                                <select id="group1ID" name="group1">
                                    <option value="">Select</option>
                                    <option <?php echo isset($elementsData['group1']) && $elementsData['group1'] === 'Brake' ? 'selected' : ''; ?>>Brake</option>
                                    <option <?php echo isset($elementsData['group1']) && $elementsData['group1'] === 'Accelerator' ? 'selected' : ''; ?>>Accelerator</option>
                                    <option <?php echo isset($elementsData['group1']) && $elementsData['group1'] === 'Steering Wheel' ? 'selected' : ''; ?>>Steering Wheel</option>
                                    <option <?php echo isset($elementsData['group1']) && $elementsData['group1'] === 'Gear Level' ? 'selected' : ''; ?>>Gear Level</option>
                                </select>
                                <input name="checkbox3" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?>>
                                <input name="checkbox4" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?>>
                            </div>
                            <div>
                                <label for="group2">Group 2 - Control Name</label>
                                <select id="group2ID" name="group2">
                                    <option value="">Select</option>
                                    <option <?php echo isset($elementsData['group2']) && $elementsData['group2'] === 'Clutch' ? 'selected' : ''; ?>>Clutch</option>
                                    <option <?php echo isset($elementsData['group2']) && $elementsData['group2'] === 'Park Brake' ? 'selected' : ''; ?>>Park Brake</option>
                                    <option <?php echo isset($elementsData['group2']) && $elementsData['group2'] === 'Warning Device' ? 'selected' : ''; ?>>Warning Device</option>
                                    <option <?php echo isset($elementsData['group2']) && $elementsData['group2'] === 'Signals' ? 'selected' : ''; ?>>Signals</option>
                                </select>
                                <input name="checkbox5" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox5']) && $elementsData['checkbox5'] ? 'checked' : ''; ?>>
                                <input name="checkbox6" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox6']) && $elementsData['checkbox6'] ? 'checked' : ''; ?>>
                            </div>
                            <div>
                                <label for="group3">Group 3 - Control Name</label>
                                <select id="group3ID" name="group3">
                                    <option value="">Select</option>
                                    <option <?php echo isset($elementsData['group3']) && $elementsData['group3'] === 'Heater/Demister' ? 'selected' : ''; ?>>Heater/Demister</option>
                                    <option <?php echo isset($elementsData['group3']) && $elementsData['group3'] === 'Wipers and Washers' ? 'selected' : ''; ?>>Wipers and Washers</option>
                                    <option <?php echo isset($elementsData['group3']) && $elementsData['group3'] === 'Warning Lights' ? 'selected' : ''; ?>>Warning Lights</option>
                                    <option <?php echo isset($elementsData['group3']) && $elementsData['group3'] === 'Gauges' ? 'selected' : ''; ?>>Gauges</option>
                                </select>
                                <input name="checkbox7" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox7']) && $elementsData['checkbox7'] ? 'checked' : ''; ?>>
                                <input name="checkbox8" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox8']) && $elementsData['checkbox8'] ? 'checked' : ''; ?>>
                            </div>

                            <br>
                            <div class="cbta-container cbta-outline">
                                <h2 class="cbta-header">Authorised Examiner Notes</h2>
                                <textarea id="examinernotes" maxlength="250" name="examinernotes" rows="10" cols="50"><?php echo isset($elementsData['examinernotes']) ? $elementsData['examinernotes'] : ''; ?></textarea>
                            </div>
                            <br>
                            <button class="btn-custom btn-cbta">UPDATE</button>
                        </form>
                    </div>
        <?php
                }
            }
        } else {
            echo "<p>No unit and task selected.</p>";
            echo '<a href="manage_student.php"><button class="btn-custom btn-black"><i class="fa-solid fa-arrow-left"></i> Go Back</button></a>';
            exit;
        }
        ?>
    </div>

</body>

</html>