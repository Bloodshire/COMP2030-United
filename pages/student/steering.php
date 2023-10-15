<!DOCTYPE html>

<head>
    <title>Unit 1: Task 7 – Steering (forward and reverse)</title>
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
               WHERE ct.student_id = ? AND ct.unit_id = 1 AND ct.task_id = 7";

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
                    <p>(1) The learner will be able to competently and accurately steer the vehicle on a straight course, and turn to the right and to the left through 90 degrees when travelling in a forward direction while maintaining full vehicle control; and</p>
                    <p>(2) The learner will be able to competently steer the vehicle on a straight course, and turn to the left through approximately 90 degrees, when travelling in reverse.</p>
                </td>
            </tr>
            <tr>
                <th>Assessment Standard</th>
                <td>
                    <p>The learner will accurately perform parts (1) and (2) of this task without assistance.</p>
                    <p>The assessment will be a demonstration on at least two consecutive but separate occasions.</p>
                </td>
            </tr>
        </table>
        <br>

        <table id="cbta-table">
            <thead>
                <tr>
                    <th class="large-column">Task 7 Requirements</th>
                    <th class="small-column" colspan="2">Homework</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="large-column"> (1) Steering in a forward direction</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(a) Maintain a straight course of at least 100 metres between turns with the hands placed in approximately the “10 to 2” clock position on the steering wheel with a light grip pressure;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Demonstrate turning to the left and right through 90 degrees using either the “Pull-Push” or “Hand over Hand” method of steering while maintaining full vehicle control without over-steering;and</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Look in the direction where the driver is intending to go when turning (First Rule of Observation - Aim high in steering).</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column"> (2) Steering in reverse</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(a) Reverse the vehicle in a straight line for a minimum of 20 metres with a deviation not exceeding 1 metre, followed by step 2(b);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Reverse the vehicle through an angle of approximately 90 degrees to the left followed by reversing in a straight line for 5 metres with a deviation not exceeding half a metre (500mm); and;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column"> (c) Look in the appropriate directions and to the rear while reversing.</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
            </tbody>
        </table>

        <p><b>*NOTE: The exercise is to reverse through approximately 90 degrees and then recover to a straight position. It is a steering control exercise and NOT a ‘Reversing Around a Corner’ manoeuvre although a quiet corner may be used.<br><br> Reversing cameras and other factory fitted driving aids do not replace required observations. However, they may be used as a reference.</b></p>
    </div>

    <div class="column">
        <form id="cbta">
            <h2 class="cbta-header">Task Assessment Records</h2>
            <p><b>Demonstration 1</b></p>
            <p>(1) Steer in a forward direction <i>(minimum of 4 left and 4 right turns)</i></p>
            <li>100% <i>(left)</i>
                <input type="checkbox" class="checkboxs" name="checkbox1" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox2" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox3" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox4" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?> disabled>
            </li>
            <br>
            <li>100% <i>(right)</i>
                <input type="checkbox" class="checkboxs" name="checkbox5" <?php echo isset($elementsData['checkbox5']) && $elementsData['checkbox5'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox6" <?php echo isset($elementsData['checkbox6']) && $elementsData['checkbox6'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox7" <?php echo isset($elementsData['checkbox7']) && $elementsData['checkbox7'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox8" <?php echo isset($elementsData['checkbox8']) && $elementsData['checkbox8'] ? 'checked' : ''; ?> disabled>
            </li>

            </p>
            <br>
            <p>(2) Steer in reverse <i>(minimum of 1 left reverse)</i></p>
            <li>100% <i>(left reverse)</i>
                <input type="checkbox" class="checkboxs" name="checkbox9" <?php echo isset($elementsData['checkbox9']) && $elementsData['checkbox9'] ? 'checked' : ''; ?> disabled>
            </li>
            <br>
            <hr>
            <p><b>Demonstration 2</b></p>
            <p>(1) Steer in a forward direction <i>(minimum of 4 left and 4 right turns)</i></p>
            <li>100% <i>(left)</i>
                <input type="checkbox" class="checkboxs" name="checkbox9" <?php echo isset($elementsData['checkbox9']) && $elementsData['checkbox9'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox10" <?php echo isset($elementsData['checkbox10']) && $elementsData['checkbox10'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox11" <?php echo isset($elementsData['checkbox11']) && $elementsData['checkbox11'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox12" <?php echo isset($elementsData['checkbox12']) && $elementsData['checkbox12'] ? 'checked' : ''; ?> disabled>
            </li>
            <br>
            <li>100% <i>(right)</i>
                <input type="checkbox" class="checkboxs" name="checkbox13" <?php echo isset($elementsData['checkbox13']) && $elementsData['checkbox13'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox14" <?php echo isset($elementsData['checkbox14']) && $elementsData['checkbox14'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox15" <?php echo isset($elementsData['checkbox15']) && $elementsData['checkbox15'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox16" <?php echo isset($elementsData['checkbox16']) && $elementsData['checkbox16'] ? 'checked' : ''; ?> disabled>
            </li>

            </p>
            <br>
            <p>(2) Steer in reverse <i>(minimum of 1 left reverse)</i></p>
            <li>100% <i>(left reverse)</i>
                <input type="checkbox" class="checkboxs" name="checkbox17" <?php echo isset($elementsData['checkbox17']) && $elementsData['checkbox17'] ? 'checked' : ''; ?> disabled>
            </li>
            <br>
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