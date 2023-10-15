<!DOCTYPE html>
<html>

<head>
    <title>Unit 1: Task 1 - Cabin Drill and Control</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Connor">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="cbta.php" id="menu-selected"></a>
</head>

<body>
    <h1 id="heading-back-btn"><a href="cbta.php"><i class="heading-back-btn fa-solid fa-arrow-left"></i></a></h1>

    <?php
    require_once "../../inc/main.inc.php";
    require_once "../../inc/dbconn.inc.php";


    // If the form is not submitted, fetch data from the database
    $studentId = $_SESSION['user_id'];
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

        <table id="cbta-table">
            <tr>
                <th class="black-border">Learning Outcome</th>
                <td>
                    <p>
                        The learner will be able to set up the cabin of the vehicle in order to safely, efficiently and effectively drive the vehicle (cabin drill) and be able to locate and identify all controls
                    </p>
                </td>
            </tr>
            <tr>
                <th>Assessment Standard</th>
                <td>
                    <p>The learner will accurately perform this task without assistance.</p>
                    <p>The assessment will be a demonstration on at least two consecutive but separate occasions.</p>
                </td>
            </tr>
        </table>
        <br>

        <table id="cbta-table">
            <thead>
                <tr>
                    <th class="large-column">Task 1 Requirements</th>
                    <th class="small-column" colspan="2"><center>Homework</center></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="large-column">(a) Ensure the doors are closed (and locked for security and safety – optional);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Check that the park brake is firmly applied;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Adjust the seat, head restraint and steering wheel (as required);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) Adjust all mirrors (electric mirrors, if fitted, may be adjusted after ‘starting the engine’ – Task 2);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) Locate, identify and be able to use all vehicle controls (as required) when driving (including ‘climate’ controls);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(f) Perform all steps (a) to (e) in sequence;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(g) Ensure all required seat belts are fastened correctly.</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
            </tbody>
        </table>
        <br>
        <h2 class="cbta-header">Controls List</h2>
        <p> The learner may be asked to explain the function of one control from each of the groups below. </p>

        <div class="task_column">
            <h3>Group 1 (any 1)</h3>
            <ul class="task_list">
                <li>Brake</li>
                <li>Accelerator</li>
                <li>Steering wheel</li>
                <li>Gear lever (including autos)</li>
            </ul>
        </div>

        <div class="task_column">
            <h3>Group 2 (any 1)</h3>
            <ul class="task_list">
                <li>Clutch(Manuals only)</li>
                <li>Park brake</li>
                <li>Warning device</li>
                <li>Signals</li>
            </ul>
        </div>

        <div class="task_column">
            <h3>Group 3 (any 1)</h3>
            <ul class="task_list">
                <li>Heater/demister</li>
                <li>Wipers and washers</li>
                <li>Warning lights (any 3)</li>
                <li>Vehicle lights</li>
                <li>Gauges</li>
            </ul>
        </div>

        <p><b>Note:</b> This procedure may change due to manufacturer's requirements</p>
    </div>

    <div class="column">
        <form id="cbta">
            <h2 class="cbta-header">Task Assessment Records</h2>
            <p>Cabin Drill
                <input name="checkbox1" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?> disabled>
                <input name="checkbox2" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?> disabled>
            </p>
            <p>Controls (Selected from the respective group)</p>
            <div>
                <label for="group1">Group 1 - Control Name</label>
                <select id="group1ID" name="group1" disabled>
                    <option value=""></option>
                    <option <?php echo isset($elementsData['group1']) && $elementsData['group1'] === 'Brake' ? 'selected' : ''; ?>>Brake</option>
                    <option <?php echo isset($elementsData['group1']) && $elementsData['group1'] === 'Accelerator' ? 'selected' : ''; ?>>Accelerator</option>
                    <option <?php echo isset($elementsData['group1']) && $elementsData['group1'] === 'Steering Wheel' ? 'selected' : ''; ?>>Steering Wheel</option>
                    <option <?php echo isset($elementsData['group1']) && $elementsData['group1'] === 'Gear Level' ? 'selected' : ''; ?>>Gear Level</option>
                </select>
                <input name="checkbox3" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?> disabled>
                <input name="checkbox4" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?> disabled>
            </div>

            <!-- Group 2 -->
            <div>
                <label for="group2">Group 2 - Control Name</label>
                <select id="group2ID" name="group2" disabled>
                    <option value=""></option>
                    <option <?php echo isset($elementsData['group2']) && $elementsData['group2'] === 'Clutch' ? 'selected' : ''; ?>>Clutch</option>
                    <option <?php echo isset($elementsData['group2']) && $elementsData['group2'] === 'Park Brake' ? 'selected' : ''; ?>>Park Brake</option>
                    <option <?php echo isset($elementsData['group2']) && $elementsData['group2'] === 'Warning Device' ? 'selected' : ''; ?>>Warning Device</option>
                    <option <?php echo isset($elementsData['group2']) && $elementsData['group2'] === 'Signals' ? 'selected' : ''; ?>>Signals</option>
                </select>
                <input name="checkbox5" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox5']) && $elementsData['checkbox5'] ? 'checked' : ''; ?> disabled>
                <input name="checkbox6" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox6']) && $elementsData['checkbox6'] ? 'checked' : ''; ?> disabled>
            </div>

            <!-- Group 3 -->
            <div>
                <label for="group3">Group 3 - Control Name</label>
                <select id="group3ID" name="group3" disabled>
                    <option value=""></option>
                    <option <?php echo isset($elementsData['group3']) && $elementsData['group3'] === 'Heater/Demister' ? 'selected' : ''; ?>>Heater/Demister</option>
                    <option <?php echo isset($elementsData['group3']) && $elementsData['group3'] === 'Wipers and Washers' ? 'selected' : ''; ?>>Wipers and Washers</option>
                    <option <?php echo isset($elementsData['group3']) && $elementsData['group3'] === 'Warning Lights' ? 'selected' : ''; ?>>Warning Lights</option>
                    <option <?php echo isset($elementsData['group3']) && $elementsData['group3'] === 'Gauges' ? 'selected' : ''; ?>>Gauges</option>
                </select>
                <input name="checkbox7" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox7']) && $elementsData['checkbox7'] ? 'checked' : ''; ?> disabled>
                <input name="checkbox8" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox8']) && $elementsData['checkbox8'] ? 'checked' : ''; ?> disabled>
            </div>

            <br>
            <div class="cbta-container cbta-outline">
                <h2 class="cbta-header">Authorised Examiner Notes</h2>
                <textarea id="examinernotes" maxlength="250" name="examinernotes" rows="10" cols="50" readonly><?php echo isset($elementsData['examinernotes']) ? $elementsData['examinernotes'] : ''; ?></textarea>
            </div>
            <p><i class="fa-solid fa-marker"></i> Last updated: <?php echo isset($completionDate) ? $completionDate : 'Never'; ?><br>
                <?php echo isset($instructorId) ? "<i class=\"fa-solid fa-user-tie\"></i> Instructor: $instructorGivenName $instructorSurname" : ''; ?></p>
        </form>
    </div>



</body>

</html>