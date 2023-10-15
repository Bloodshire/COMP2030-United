<!DOCTYPE html>

<head>
    <title>Unit 1: Task 6 – Gear changing (up and down)</title>
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
               WHERE ct.student_id = ? AND ct.unit_id = 1 AND ct.task_id = 6";

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
                    <p>(1) The learner will be able to change gears (in either a manual or automatic vehicle) up and down in the transmission in a reasonably smooth manner without looking at the gear lever while maintaining full steering control; and</p>
                    <p>(2) The learner will be able to accurately select any appropriate gear on demand without looking at the gear lever (including automatics).</p>

                </td>
            </tr>
            <tr>
                <th>Assessment Standard</th>
                <td>
                    <p>The learner will accurately perform parts (1) and (2) of this task without assistance. </p>
                    <p>The assessment will be a demonstration on at least two consecutive but separate occasions.</p>

                </td>
            </tr>
        </table>
        <br>

        <table id="cbta-table">
            <thead>
                <tr>
                    <th class="large-column">Task 6 Requirements</th>
                    <th class="small-column" colspan="2"><center>Homework</center></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="large-column"><b>(1) Changing gears (up and down, manual and automatics)</b></td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(a) Move off smoothly from a stationary position in first gear (manuals) or (automatics);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) Adjust the speed of the vehicle prior to selecting the new gear;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Change gears, one at a time from first gear (manuals) or the lowest gear (automatics) through to the highest gear without clashing, missing the gear, unnecessarily jerking the vehicle OR looking at the gear lever;</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) Change gear from a high gear (4th, 5th or ‘Drive’) to various appropriate gears without significantly jerking the vehicle OR looking at the gear lever/selector; and</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) Demonstrate full control (including steering) over the vehicle during gear changing.</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column"><b>(2) Accurate selection of appropriate gears for varying speeds</b></td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(a) Adjust the speed of the vehicle up and down and then select the appropriate gear for that speed (manuals and automatics);</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(b) When the vehicle is moving, demonstrate all gear selections without looking at the gear lever or gear selector; and</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(c) Demonstrate accurate selection of the gears without significant jerking of the vehicle or clashing of gears.</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(d) Demonstrate the selection of appropriate gears, whilst descending and ascending gradients; and</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
                <tr>
                    <td class="large-column">(e) Be able to select an appropriate gear to avoid unnecessary braking on descents and to have control on ascents.</td>
                    <td class="small-column"></td>
                    <td class="small-column"></td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="column">
        <form id="cbta">
            <h2 class="cbta-header">Task Assessment Records</h2>
            <p>Change gears up and down (100% accurate and a minimum of 5 demonstrations)<br>
                <input type="checkbox" class="checkboxs float-left" name="checkbox1" <?php echo isset($elementsData['checkbox1']) && $elementsData['checkbox1'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox2" <?php echo isset($elementsData['checkbox2']) && $elementsData['checkbox2'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox3" <?php echo isset($elementsData['checkbox3']) && $elementsData['checkbox3'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox4" <?php echo isset($elementsData['checkbox4']) && $elementsData['checkbox4'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox5" <?php echo isset($elementsData['checkbox5']) && $elementsData['checkbox5'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox6" <?php echo isset($elementsData['checkbox6']) && $elementsData['checkbox6'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox7" <?php echo isset($elementsData['checkbox7']) && $elementsData['checkbox7'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox8" <?php echo isset($elementsData['checkbox8']) && $elementsData['checkbox8'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox9" <?php echo isset($elementsData['checkbox9']) && $elementsData['checkbox9'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox10" <?php echo isset($elementsData['checkbox10']) && $elementsData['checkbox10'] ? 'checked' : ''; ?> disabled>
            </p>
            <br>
            <p>(2) Accurately select appropriate gears for varying speeds (100% accuracy and a minimum of 5 demonstrations)<br>
                <input type="checkbox" class="checkboxs float-left" name="checkbox11" <?php echo isset($elementsData['checkbox11']) && $elementsData['checkbox11'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox12" <?php echo isset($elementsData['checkbox12']) && $elementsData['checkbox12'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox13" <?php echo isset($elementsData['checkbox13']) && $elementsData['checkbox13'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox14" <?php echo isset($elementsData['checkbox14']) && $elementsData['checkbox14'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox15" <?php echo isset($elementsData['checkbox15']) && $elementsData['checkbox15'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox16" <?php echo isset($elementsData['checkbox16']) && $elementsData['checkbox16'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox17" <?php echo isset($elementsData['checkbox17']) && $elementsData['checkbox17'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox18" <?php echo isset($elementsData['checkbox18']) && $elementsData['checkbox18'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox19" <?php echo isset($elementsData['checkbox19']) && $elementsData['checkbox19'] ? 'checked' : ''; ?> disabled>
                <input type="checkbox" class="checkboxs float-left" name="checkbox20" <?php echo isset($elementsData['checkbox20']) && $elementsData['checkbox20'] ? 'checked' : ''; ?> disabled>
            </p>
            <br><br>
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