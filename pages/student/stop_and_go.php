<!DOCTYPE html>

<head>
    <title>Unit 1: Task 5 – Stop and go (using the park brake)</title>
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
               WHERE ct.student_id = ? AND ct.unit_id = 1 AND ct.task_id = 5";

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
                    <p>The learner will be able to bring the vehicle to a smooth stop in first gear (manuals only) and, with the aid of the park brake, immediately move off smoothly while maintaining full control of the vehicle.</p>
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
                    <th class="large-column">Task 5 Requirements</th>
                    <th class="small-column" colspan="2"><center>Homework</center></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="large-column">(a) Select the suitable stopping position on the road (e.g. – stop lines, positioning for view and proximity to other vehicles);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Check the centre mirror, (then if required the appropriate side mirror), and if required signal intention;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Slow the vehicle smoothly using the footbrake only;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) For manuals only, when the vehicle slows to just above stalling speed, push the clutch down;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) For manuals only, just as the vehicle is stopping, select first gear;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(f) When the vehicle comes to a complete stop, apply the park brake (holding the handbrake button in, where possible*) and release the footbrake (right foot placed over accelerator);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(g) Check that it is safe to move off and apply appropriate power (and for manuals, clutch to friction point);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(h) If safe, look forward and release the park brake which results in the vehicle immediately moving off in a smooth manner without stalling and under full control; and</td>
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
    </div>

    <div class="column">
        <form id="cbta">
            <h2 class="cbta-header">Task Assessment Records</h2>
            <p>Stop and go (using the park brake)
                <input type="checkbox" class="checkboxs" name="checkbox1" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs" name="checkbox2" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>

            <p><b>Authorised Examiners Note:</b> This exercise is not 'stopping at the kerb' / 'moving off from the kerb' but may be assessed when stopping and moving away from a stop line, or stopping and moving away when turning right or left, or when momentarily stopping on a slight gradient in a line of traffic</p>

            <p><b>Note:</b> This procedure may change due to manufacturer's requirements e.g. hill hold</p>

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