<!DOCTYPE html>

<head>
    <title>Unit 1: Task 3 – Moving off from the kerb</title>
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
               WHERE ct.student_id = ? AND ct.unit_id = 1 AND ct.task_id = 3";

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
                        The learner will be able to move off from the left kerb in a safe and efficient manner with the vehicle under full control at the first attempt.
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
                    <th class="large-column">Task 3 Requirements</th>
                    <th class="small-column" colspan="2"><center>Homework</center></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="large-column">(a) If the park brake is not applied, correctly apply it;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Check the centre mirror, then the right mirror, then signal right for at least 5 seconds; </td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Push clutch pedal down (manuals) / Right foot on footbrake (automatics);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Check gear lever in ‘Neutral’ (manuals) or ‘Neutral/Park’ (automatics)</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) Select 1st gear (manuals) / Select ‘Drive’ (automatics);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) Apply appropriate power, (and for manuals) clutch to ‘friction point’;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(f) Check the centre mirror again, then the right mirror, then over the right shoulder(blind spot check) for traffic (from driveways, roads opposite or U-turning traffic);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(g) If safe, look forward and release the park brake;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(h) Accelerate smoothly away from the kerb without stalling or rolling back, and cancel the signal; and</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(i) Perform all steps (a) to (h) in sequence</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
            </tbody>
        </table>

        <p><b>Note:</b> This procedure may change due to manufacturer's requirements</p>
    </div>

    <div class="column">
        <form id="cbta">
            <h2 class="cbta-header">Task Assessment Records</h2>
            <p>Move off from the kerb
                <input type="checkbox" name="checkbox1" class="checkboxs" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" name="checkbox2" class="checkboxs" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?> disabled>
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