<!DOCTYPE html>

<head>
    <title>Unit 1: Task 4 – Stopping and securing the vehicle</title>
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
               WHERE ct.student_id = ? AND ct.unit_id = 1 AND ct.task_id = 4";

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
                    <p>(1) The learner will bring the vehicle to a smooth and controlled stop at the left kerb from 30-60km/h with safety, without stalling and when requested; and </p>
                    <p>(2) The learner will correctly secure the vehicle to avoid rolling.</p>

                </td>
            </tr>
            <tr>
                <th>Assessment Standard</th>
                <td>
                    <p>The learner will accurately perform this task without assistance</p>
                    <p>The assessment will be a demonstration on at least two consecutive but separate occasions.</p>
                </td>
            </tr>
        </table>
        <br>

        <table id="cbta-table">
            <thead>
                <tr>
                    <th class="large-column">Task 4 Requirements</th>
                    <th class="small-column" colspan="2"><center>Homework</center></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="large-column"><b>(1) Stopping the vehicle (including slowing)</b></td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(a) Select appropriate stopping position;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Check the centre mirror, then the left mirror (for cyclists etc.) and signal left ;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Smoothly slow the vehicle (to just above engine idle speed) using the footbrake operated by the right foot</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) (For manuals) push the clutch down just before reaching engine idle speed to prevent stalling while maintaining light pressure on the footbrake;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) Bring vehicle to a smooth stop without jerking the vehicle; and</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(f) Perform all steps 1(a) to 1 (e) in sequence</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column"><b>(2) Securing the vehicle (to prevent rolling)</b></td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(a) Check that the vehicle has stopped (as above) and correctly apply the park brake to prevent rolling;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Select ‘Neutral’ (manuals) or ‘Park’ (automatics);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Release the brake pedal and then (for manuals) release the clutch;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) Perform all steps 2(a) to 2(c) in sequence; and</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) Cancel any signal after stopping.</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="column">
        <form id="cbta">
            <h2 class="cbta-header">Task Assessment Records</h2>

            <p>(1) Stop the vehicle (including slowing)
                <input type="checkbox" class="checkboxs" name="checkbox1" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>
            <p>(2) Secure the vehicle to prevent rolling (a prolonged stop)
                <input type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?> disabled>
            </p>

            <p><b>Note:</b> This procedure may change due to manufacturer's requirements</p>
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