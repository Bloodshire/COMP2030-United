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
        array(8, "Review all basic driving procedures (T1 – T7)", "review_basic_procedures.php")
    ));
    $unit_id = isset($_GET['unit']) ? $_GET['unit'] : '';
    $task_id = isset($_GET['task']) ? $_GET['task'] : '';
    if (isset($_GET['unit']) && isset($_GET['task'])) {
        $taskName = $unitTasks[$unit_id - 1][$task_id - 1][1];
        $heading = "CBT&A Unit $unit_id: Task $task_id - $taskName";
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

    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<span id='notification' class='notification fade-out'>CBT&A Task has been updated <b>successfully</b>!</span>";
    }

    if (isset($_GET['unit']) && isset($_GET['task'])) {
        $unit = $_GET['unit'];
        $task = $_GET['task'];
    }

    $student_user_id = isset($_SESSION['student_user_id']) ? $_SESSION['student_user_id'] : '';
    $student_given_name = isset($_SESSION['student_given_name']) ? $_SESSION['student_given_name'] : '';
    $student_surname = isset($_SESSION['student_surname']) ? $_SESSION['student_surname'] : '';
    $student_license_no = isset($_SESSION['student_license_no']) ? $_SESSION['student_license_no'] : '';

    $studentId = $_SESSION['student_user_id'];
    $selectQuery = "SELECT ct.elements, ct.completion_date, ct.instructor_id, u.given_name, u.surname
               FROM cbta_tasks ct
               LEFT JOIN users u ON ct.instructor_id = u.user_id
               WHERE ct.student_id = ? AND ct.unit_id = ? AND ct.task_id = ?";

    $selectStmt = $conn->prepare($selectQuery);
    $selectStmt->bind_param("iii", $studentId, $unit, $task);
    $selectStmt->execute();
    $selectStmt->bind_result($elementsJson, $completionDate, $instructorId, $instructorGivenName, $instructorSurname);


    if ($selectStmt->fetch()) {
        // Decode the JSON data
        $elementsData = json_decode($elementsJson, true);
    }
    $selectStmt->close();

    ?>

    <div class="cbta-container container centre-div">
        <p><?php echo "<i class=\"fa-solid fa-user-graduate\"></i> Student: " . $student_given_name . " " . $student_surname ?></p>
        <p><i class="fa-solid fa-marker"></i> Last updated: <?php echo isset($completionDate) ? $completionDate : 'Never'; ?><br>
            <?php echo isset($instructorId) ? "<i class=\"fa-solid fa-user-tie\"></i> Instructor: $instructorGivenName $instructorSurname" : ''; ?></p>
        <?php

        if (isset($_GET['unit']) && isset($_GET['task'])) {
            $unit = $_GET['unit'];
            $task = $_GET['task'];

            echo "
            <form id=\"cbta\" action=\"update_cbta_task.php?unit=$unit&task=$task\" method=\"POST\">
                        <h2 class=\"cbta-header\">Task Assesment Records</h2>
                        ";

            if ($unit == 1) {
                if ($task == 1) {
        ?>
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
                <?php } else if ($task == 2) {
                ?>
                    <p>(1)Starting the engine
                        <input name="checkbox1" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?>>
                        <input name="checkbox2" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?>>
                    </p>
                    <br>
                    <p>(2)Shutting down the engine
                        <input name="checkbox3" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?>>
                        <input name="checkbox4" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?>>
                    </p>
                <?php } else if ($task == 3) {
                ?>
                    <p>Move off from the kerb
                        <input type="checkbox" name="checkbox1" class="checkboxs" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?>>
                        <input type="checkbox" name="checkbox2" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?>>
                    </p>
                <?php } else if ($task == 4) {
                ?>
                    <p>(1) Stop the vehicle (including slowing)
                        <input type="checkbox" name="checkbox1" class="checkboxs" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?>>
                        <input type="checkbox" name="checkbox2" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?>>
                    </p>
                    <br>
                    <p>(2) Secure the vehicle to prevent rolling (a prolonged stop)
                        <input type="checkbox" name="checkbox3" class="checkboxs" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?>>
                        <input type="checkbox" name="checkbox4" class="checkboxs" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?>>
                    </p>

                    <p><b>Note:</b> This procedure may change due to manufacturer's requirements</p>
                <?php } else if ($task == 5) {
                ?>
                    <p>Stop and go (using the park brake)
                        <input type="checkbox" class="checkboxs" name="checkbox1" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox2" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?>>
                    </p>
                <?php } else if ($task == 6) {
                ?>
                    <p>Change gears up and down (100% accurate and a minimum of 5 demonstrations)<br>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox1" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox2" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox3" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox4" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox5" <?php echo isset($elementsData['checkbox5']) && $elementsData['checkbox5'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox6" <?php echo isset($elementsData['checkbox6']) && $elementsData['checkbox6'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox7" <?php echo isset($elementsData['checkbox7']) && $elementsData['checkbox7'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox8" <?php echo isset($elementsData['checkbox8']) && $elementsData['checkbox8'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox9" <?php echo isset($elementsData['checkbox9']) && $elementsData['checkbox9'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox10" <?php echo isset($elementsData['checkbox10']) && $elementsData['checkbox10'] ? 'checked' : ''; ?>>
                    </p>
                    <br>
                    <p>(2) Accurately select appropriate gears for varying speeds (100% accuracy and a minimum of 5 demonstrations)<br>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox11" <?php echo isset($elementsData['checkbox11']) && $elementsData['checkbox11'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox12" <?php echo isset($elementsData['checkbox12']) && $elementsData['checkbox12'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox13" <?php echo isset($elementsData['checkbox13']) && $elementsData['checkbox13'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox14" <?php echo isset($elementsData['checkbox14']) && $elementsData['checkbox14'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox15" <?php echo isset($elementsData['checkbox15']) && $elementsData['checkbox15'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox16" <?php echo isset($elementsData['checkbox16']) && $elementsData['checkbox16'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox17" <?php echo isset($elementsData['checkbox17']) && $elementsData['checkbox17'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox18" <?php echo isset($elementsData['checkbox18']) && $elementsData['checkbox18'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox19" <?php echo isset($elementsData['checkbox19']) && $elementsData['checkbox19'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs float-left" name="checkbox20" <?php echo isset($elementsData['checkbox20']) && $elementsData['checkbox20'] ? 'checked' : ''; ?>>
                    </p>
                    <br><br>
                    <p><b>Note:</b> This procedure may change due to manufacturer's requirements</p>
                <?php } else if ($task == 7) {
                ?>
                    <p><b>Demonstration 1</b></p>
                    <p>(1) Steer in a forward direction <i>(minimum of 4 left and 4 right turns)</i></p>
                    <li>100% <i>(left)</i>
                        <input type="checkbox" class="checkboxs" name="checkbox1" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox2" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox3" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox4" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?>>
                    </li>
                    <br>
                    <li>100% <i>(right)</i>
                        <input type="checkbox" class="checkboxs" name="checkbox5" <?php echo isset($elementsData['checkbox5']) && $elementsData['checkbox5'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox6" <?php echo isset($elementsData['checkbox6']) && $elementsData['checkbox6'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox7" <?php echo isset($elementsData['checkbox7']) && $elementsData['checkbox7'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox8" <?php echo isset($elementsData['checkbox8']) && $elementsData['checkbox8'] ? 'checked' : ''; ?>>
                    </li>

                    </p>
                    <br>
                    <p>(2) Steer in reverse <i>(minimum of 1 left reverse)</i></p>
                    <li>100% <i>(left reverse)</i>
                        <input type="checkbox" class="checkboxs" name="checkbox9" <?php echo isset($elementsData['checkbox9']) && $elementsData['checkbox9'] ? 'checked' : ''; ?>>
                    </li>
                    <br>
                    <hr>
                    <p><b>Demonstration 2</b></p>
                    <p>(1) Steer in a forward direction <i>(minimum of 4 left and 4 right turns)</i></p>
                    <li>100% <i>(left)</i>
                        <input type="checkbox" class="checkboxs" name="checkbox9" <?php echo isset($elementsData['checkbox9']) && $elementsData['checkbox9'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox10" <?php echo isset($elementsData['checkbox10']) && $elementsData['checkbox10'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox11" <?php echo isset($elementsData['checkbox11']) && $elementsData['checkbox11'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox12" <?php echo isset($elementsData['checkbox12']) && $elementsData['checkbox12'] ? 'checked' : ''; ?>>
                    </li>
                    <br>
                    <li>100% <i>(right)</i>
                        <input type="checkbox" class="checkboxs" name="checkbox13" <?php echo isset($elementsData['checkbox13']) && $elementsData['checkbox13'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox14" <?php echo isset($elementsData['checkbox14']) && $elementsData['checkbox14'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox15" <?php echo isset($elementsData['checkbox15']) && $elementsData['checkbox15'] ? 'checked' : ''; ?>>
                        <input type="checkbox" class="checkboxs" name="checkbox16" <?php echo isset($elementsData['checkbox16']) && $elementsData['checkbox16'] ? 'checked' : ''; ?>>
                    </li>

                    </p>
                    <br>
                    <p>(2) Steer in reverse <i>(minimum of 1 left reverse)</i></p>
                    <li>100% <i>(left reverse)</i>
                        <input type="checkbox" class="checkboxs" name="checkbox17" <?php echo isset($elementsData['checkbox17']) && $elementsData['checkbox17'] ? 'checked' : ''; ?>>
                    </li>
                    <br>
                <?php } else if ($task == 8) {
                ?>
                    <p class="float-right">(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b)&nbsp;&nbsp;</p>
                    <br>
                    <br>

                    <p><b>Task 1</b> - cabin drill and controls
                        <input type="checkbox" name="checkbox1" class="checkboxs left-space" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?>>
                    </p>
                    <br>
                    <p><b>Task 2</b> - starting up and shutting down the engine
                        <input type="checkbox" name="checkbox2" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?>>
                        <input type="checkbox" name="checkbox3" class="checkboxs" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?>>
                    </p>
                    <br>
                    <p><b>Task 3</b> - starting up and shutting down the engine
                        <input type="checkbox" name="checkbox4" class="checkboxs left-space" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?>>
                    </p>
                    <br>
                    <p><b>Task 4</b> - stopping and securing the vehicle
                        <input type="checkbox" name="checkbox5" class="checkboxs" <?php echo isset($elementsData['checkbox5']) && $elementsData['checkbox5'] ? 'checked' : ''; ?>>
                        <input type="checkbox" name="checkbox6" class="checkboxs" <?php echo isset($elementsData['checkbox6']) && $elementsData['checkbox6'] ? 'checked' : ''; ?>>
                    </p>
                    <br>
                    <p><b>Task 5</b> - stop and go <i>(using the park brake) </i>
                        <input type="checkbox" name="checkbox7" class="checkboxs left-space" <?php echo isset($elementsData['checkbox7']) && $elementsData['checkbox7'] ? 'checked' : ''; ?>>
                    </p>
                    <br>
                    <p><b>Task 6</b> - gear changing <i>(up and down) </i>
                        <input type="checkbox" name="checkbox8" class="checkboxs" <?php echo isset($elementsData['checkbox8']) && $elementsData['checkbox8'] ? 'checked' : ''; ?>>
                        <input type="checkbox" name="checkbox9" class="checkboxs" <?php echo isset($elementsData['checkbox9']) && $elementsData['checkbox9'] ? 'checked' : ''; ?>>
                    </p>
                    <br>
                    <p><b>Task 7</b> - gear changing <i>(up and down) </i>
                        <input type="checkbox" name="checkbox10" class="checkboxs" <?php echo isset($elementsData['checkbox10']) && $elementsData['checkbox10'] ? 'checked' : ''; ?>>
                        <input type="checkbox" name="checkbox11" class="checkboxs" <?php echo isset($elementsData['checkbox11']) && $elementsData['checkbox11'] ? 'checked' : ''; ?>>
                    </p>
            <?php }
            }
            ?>
            <br>
            <div class="cbta-container cbta-outline">
                <h2 class="cbta-header">Authorised Examiner Notes</h2>
                <textarea id="examinernotes" maxlength="250" name="examinernotes" rows="10" cols="50"><?php echo isset($elementsData['examinernotes']) ? $elementsData['examinernotes'] : ''; ?></textarea>
            </div>
            <br>
            <div class="center">
                <?php
                $unit = 1;
                $currentTask = $task;

                // Define the URLs for the "Prev" and "Next" buttons
                $prevURL = "manage_cbta.php?unit=$unit&task=" . ($currentTask - 1);
                $nextURL = "manage_cbta.php?unit=$unit&task=" . ($currentTask + 1);

                // Determine whether to disable the "Prev" button
                $disablePrev = ($currentTask == 1) ? 'disabled' : '';

                // Determine whether to disable the "Next" button
                $disableNext = ($currentTask == 8) ? 'disabled' : '';
                ?>

                <a href="<?php echo $prevURL; ?>"><button type="button" class="btn-custom btn-blue btn-cbta2" <?php echo $disablePrev; ?>><i class="fa-solid fa-chevron-left"></i> Prev</button></a>
                <button class="btn-custom btn-cbta1">Update</button>
                <a href="<?php echo $nextURL; ?>"><button type="button" class="btn-custom btn-blue btn-cbta3" <?php echo $disableNext; ?>>Next <i class="fa-solid fa-chevron-right"></i></button></a>
            </div>


            </form>
        <?php
        } else {
            echo "<p>No unit and task selected.</p>";
            echo '<a href="manage_student.php"><button class="btn-custom btn-black"><i class="fa-solid fa-arrow-left"></i> Go Back</button></a>';
            exit;
        }
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