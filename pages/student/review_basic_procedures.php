<!DOCTYPE html>

<head>
    <title>Unit 1: Task 8 - Review all basic driving procedures (T1 - T7)</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Connor">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="cbta.php" id="menu-selected"></a>

</head>

<html>

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
               WHERE ct.student_id = ? AND ct.unit_id = 1 AND ct.task_id = 8";

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
                        The learner will competently demonstrate each of the learning outcomes from Tasks 1 to 7.
                    </p>
                </td>
            </tr>
            <tr>
                <th>Assessment Standard</th>
                <td>
                    <p>The learner will perform one complete example of each of the learning outcomes for Tasks 1 to 7 without assistance. Any learning outcome that does not meet the standard for the task must be re-trained and re-assessed in accordance with the assessment method and standard for that original task.</p>
                </td>
            </tr>
        </table>
        <br>

        <table id="cbta-table">
            <thead>
                <tr>
                    <th class="large-column">Task 3 Requirements</th>
                    <th class="small-column" colspan="2">
                        <center>Homework</center>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="large-column">(a) Demonstrate Task 1 - cabin drill and controls</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Demonstrate Task 2 - starting up and shutting down the engine</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Demonstrate Task 3 - moving off from the kerb</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) Demonstrate Task 4 - stopping and securing the vehicle</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) Demonstrate Task 5 - stop and go (using the park brake)</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(f) Demonstrate Task 6 - gear changing (up and down)/td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(g) Demonstrate Task 7 - control of the steering (forward and reverse)</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="column">
        <form id="cbta">
            <h2 class="cbta-header">Task Assessment Records</h2>
            <p class="float-right">(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b)&nbsp;&nbsp;</p>
            <br>
            <br>

            <p><b>Task 1</b> - cabin drill and controls
                <input type="checkbox" name="checkbox1" class="checkboxs left-space" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>
            <p><b>Task 2</b> - starting up and shutting down the engine
                <input type="checkbox" name="checkbox2" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" name="checkbox3" class="checkboxs" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>
            <p><b>Task 3</b> - starting up and shutting down the engine
                <input type="checkbox" name="checkbox4" class="checkboxs left-space" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>
            <p><b>Task 4</b> - stopping and securing the vehicle
                <input type="checkbox" name="checkbox5" class="checkboxs" <?php echo isset($elementsData['checkbox5']) && $elementsData['checkbox5'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" name="checkbox6" class="checkboxs" <?php echo isset($elementsData['checkbox6']) && $elementsData['checkbox6'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>
            <p><b>Task 5</b> - stop and go <i>(using the park brake) </i>
                <input type="checkbox" name="checkbox7" class="checkboxs left-space" <?php echo isset($elementsData['checkbox7']) && $elementsData['checkbox7'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>
            <p><b>Task 6</b> - gear changing <i>(up and down) </i>
                <input type="checkbox" name="checkbox8" class="checkboxs" <?php echo isset($elementsData['checkbox8']) && $elementsData['checkbox8'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" name="checkbox9" class="checkboxs" <?php echo isset($elementsData['checkbox9']) && $elementsData['checkbox9'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>
            <p><b>Task 7</b> - gear changing <i>(up and down) </i>
                <input type="checkbox" name="checkbox10" class="checkboxs" <?php echo isset($elementsData['checkbox10']) && $elementsData['checkbox10'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" name="checkbox11" class="checkboxs" <?php echo isset($elementsData['checkbox11']) && $elementsData['checkbox11'] ? 'checked' : ''; ?> disabled>
            </p>
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