<!DOCTYPE html>

<head>
    <title>Unit 1: Task 2 – Starting up and shutting down the engine</title>
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
               WHERE ct.student_id = ? AND ct.unit_id = 1 AND ct.task_id = 2";

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
                    <p>(1) The learner will be able to safely start the engine of the vehicle; and</p>
                    <p>(2) The learner will be able to safely shut down the engine of the vehicle</p>

                </td>
            </tr>
            <tr>
                <th>Assessment Standard</th>
                <td>
                    <p>The learner will accurately perform parts (1) and (2) of this task without assistance. </p>
                    <p>The assessment will be a demonstration on at least two consecutive but separate occasions</p>
                </td>
            </tr>
        </table>
        <br>

        <table id="cbta-table">
            <thead>
                <tr>
                    <th class="large-column">Task 2 Requirements</th>
                    <th class="small-column" colspan="2"><center>Homework</center></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="large-column"><b>(1) Starting the engine;</b></td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(a) If the park brake is not on, correctly apply it;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Clutch down to the floor and keep it down (manuals only);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Check gear lever in ‘Neutral’ (manuals) or ‘Neutral/Park’ (automatics)</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) Switch the ignition (key) to the ‘ON’ position;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) Check all gauges and warning lights for operation;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(f) Start the engine;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(g) Check all gauges and warning lights again for operation; and</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(h) Performs all steps 1(a) to 1(g) in sequence</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column"><b>(b) Shutting down the engine</b></td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(a) Bring the vehicle to a complete stop (clutch down-manuals);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Secure the vehicle using the park brake;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Select ‘Neutral’ (manuals) or ‘Neutral/Park’ (automatics);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) Release brake pedal (to check for rolling);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) Release clutch pedal (manuals only); </td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(f) Switch off appropriate controls (eg lights, air conditioner etc);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(g) Check all gauges and warning lights for operation;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(h) Turn ignition to ‘OFF’ or ‘LOCK’ position; and </td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(i) Perform all steps 2(a) to 2(h) in sequence.</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
            </tbody>
        </table>

        <p><b>Note:</b> This procedure may change due to manufacturer's requirements</p>

    </div>
    <div class="column">
        <form id="cbta">
            <h2 class="cbta-header">Task Assesment Records</h2>
            <p>(1)Starting the engine
                <input name="checkbox1" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?> disabled>
                <input name="checkbox2" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>
            <p>(2)Shutting down the engine
                <input name="checkbox3" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?> disabled>
                <input name="checkbox4" type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?> disabled>
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