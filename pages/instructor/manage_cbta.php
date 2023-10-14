<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Manage CBT&A Unit <?php echo isset($_GET['unit']) ? $_GET['unit'] : ''; ?>: Task <?php echo isset($_GET['task']) ? $_GET['task'] : ''; ?></title>
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

    ?>

    <div class="column">
        <h2><?php echo "Student: " . $student_given_name . " " . $student_surname ?></h2>

        <?php

        if (isset($_GET['unit']) && isset($_GET['task'])) {
            $unit = $_GET['unit'];
            $task = $_GET['task'];
            if ($unit == 1) {
                if ($task == 1) {
                    echo '
                    <div class="cbta-container">
                        <form id="cbta">
                            <h2 class="cbta-header">Task Assesment Records</h2>
                            <p>Cabin Drill
                            <input name="checkbox1" type="checkbox" class="checkboxs">
                            <input name="checkbox2" type="checkbox" class="checkboxs"></p>
                            <p>Controls (Selected from the respective group)</p>
                            <div>
                                <label for="group1">Group 1 - Control Name</label>
                                <select id="group1ID" name="group1">
                                    <option value="">Select</option>
                                    <option>Brake</option>
                                    <option>Accelerator</option>
                                    <option>Steering Wheel</option>
                                    <option>Gear Level</option>
                                </select>
                                <input name="checkbox3" type="checkbox" class="checkboxs">
                                <input name="checkbox4" type="checkbox" class="checkboxs">
                            </div>
                            <p></p>
                            <div>
                                <label for="group2">Group 2 - Control Name</label>
                                <select id="group2ID" name="group2">
                                    <option value="">Select</option>
                                    <option>Clutch</option>
                                    <option>Park Brake</option>
                                    <option>Warning Device</option>
                                    <option>Signals</option>
                                </select>
                                <input name="checkbox5" type="checkbox" class="checkboxs">
                                <input name="checkbox6" type="checkbox" class="checkboxs">
                            </div>
                            <p></p>
                            <div>
                                <label for="group3">Group 3 - Control Name</label>
                                <select id="group3ID" name="group">
                                    <option value="">Select</option>
                                    <option>Heater/Demister</option>
                                    <option>Wipers and Washers</option>
                                    <option>Warning Lights</option>
                                    <option>Guages</option>
                                </select>
                                <input name="checkbox7" type="checkbox" class="checkboxs">
                                <input name="checkbox8" type="checkbox" class="checkboxs">
                            </div>
                            <br>
                            <div class="cbta-container cbta-outline">
                                <h2 class="cbta-header">Authorised Examiner Notes</h2>
                                <textarea id="examinernotes" maxlength="250" name="notes" rows="10" cols="50"></textarea>
                            </div>
                            <br>
                            <button class="btn-custom btn-cbta">UPDATE</button>
                        </form>
                    </div>
                ';
                }
            }
        } else {
            echo "No unit and task selected.";
            exit;
        }
        ?>
    </div>

</body>

</html>