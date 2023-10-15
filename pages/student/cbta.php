<!DOCTYPE html>

<head>
    <title>CBT&A Units</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Connor and Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="cbta.php" id="menu-selected"></a>

</head>

<html>

<body>
    <?php
    require_once "../../inc/main.inc.php";

    // Define the unit and task information
    $tasks = [
        [1, "Cabin Drill and Control", "cabin_drill_and_control.php"],
        [2, "Starting Up and Shutting down the Engine", "starting_up_and_shutting_down_engine.php"],
        [3, "Moving off from the Kerb", "Moving_off_from_kerb.php"],
        [4, "Stopping and Securing the Vehicle", "stopping_and_securing_vehicle.php"],
        [5, "Stop and go (Using the park brake)", "stop_and_go.php"],
        [6, "Gear Changing (Up and Down)", "gear_changing.php"],
        [7, "Steering (Forward and Reverse)", "steering.php"],
        [8, "Review of all basic procedures", "review_basic_procedures.php"]
    ];
    ?>

    <div class="column">

        <div class="cbta-Container1">
            <h1 class="cbta-h1">Unit 1 - Basic Driving Procedures</h1>
            <hr>

            <ol class="cbta-list1">
                <?php
                $unitId = 1;  // Change this to the unit ID you want to retrieve

                // Loop through tasks and set checkboxes based on database entries
                foreach ($tasks as $index => $task) {
                    $taskId = $task[0];
                    $taskName = $task[1];
                    $taskUrl = $task[2];

                    // Check if the task is completed (exists in cbta_tasks)
                    $sql = "SELECT * FROM cbta_tasks WHERE unit_id = $unitId AND task_id = $taskId AND student_id = " . $_SESSION['user_id'];
                    $result = $conn->query($sql);

                    $isChecked = $result->num_rows > 0 ? 'checked' : '';

                    echo '<div class="list-item">';
                    echo "<a href=\"$taskUrl\"><li class=\"hover no-padding\">$taskName</li></a>";
                    echo "<input type=\"checkbox\" class=\"checkboxs\" disabled $isChecked>";
                    echo '</div>';
                    echo '<p></p>';
                }
                ?>
            </ol>
        </div>
    </div>
    <div class="column">

        <div class="cbta-Container1">
            <h1 class="cbta-h1">Unit 2 - Example Placeholder</h1>
            <hr>

            <ol class="cbta-list1">
                <?php
                $unitId = 1;  // Change this to the unit ID you want to retrieve

                // Loop through tasks and set checkboxes based on database entries
                foreach ($tasks as $index => $task) {
                    $taskId = $task[0];
                    $taskName = $task[1];
                    $taskUrl = $task[2];

                    // Check if the task is completed (exists in cbta_tasks)
                    $sql = "SELECT * FROM cbta_tasks WHERE unit_id = $unitId AND task_id = $taskId AND student_id = " . $_SESSION['user_id'];
                    $result = $conn->query($sql);

                    $isChecked = $result->num_rows > 0 ? 'checked' : '';

                    echo '<div class="list-item">';
                    echo "<a href=\"$taskUrl\"><li class=\"hover no-padding\">$taskName</li></a>";
                    echo "<input type=\"checkbox\" class=\"checkboxs\" disabled $isChecked>";
                    echo '</div>';
                    echo '<p></p>';
                }
                ?>
            </ol>
        </div>
    </div>
    <div class="column">

        <div class="cbta-Container1">
            <h1 class="cbta-h1">Unit 3 - Example Placeholder</h1>
            <hr>

            <ol class="cbta-list1">
                <?php
                $unitId = 1;  // Change this to the unit ID you want to retrieve

                // Loop through tasks and set checkboxes based on database entries
                foreach ($tasks as $index => $task) {
                    $taskId = $task[0];
                    $taskName = $task[1];
                    $taskUrl = $task[2];

                    // Check if the task is completed (exists in cbta_tasks)
                    $sql = "SELECT * FROM cbta_tasks WHERE unit_id = $unitId AND task_id = $taskId AND student_id = " . $_SESSION['user_id'];
                    $result = $conn->query($sql);

                    $isChecked = $result->num_rows > 0 ? 'checked' : '';

                    echo '<div class="list-item">';
                    echo "<a href=\"$taskUrl\"><li class=\"hover no-padding\">$taskName</li></a>";
                    echo "<input type=\"checkbox\" class=\"checkboxs\" disabled $isChecked>";
                    echo '</div>';
                    echo '<p></p>';
                }
                ?>
            </ol>
        </div>
    </div>
    <div class="column">

        <div class="cbta-Container1">
            <h1 class="cbta-h1">Unit 4 - Example Placeholder</h1>
            <hr>

            <ol class="cbta-list1">
                <?php
                $unitId = 1;  // Change this to the unit ID you want to retrieve

                // Loop through tasks and set checkboxes based on database entries
                foreach ($tasks as $index => $task) {
                    $taskId = $task[0];
                    $taskName = $task[1];
                    $taskUrl = $task[2];

                    // Check if the task is completed (exists in cbta_tasks)
                    $sql = "SELECT * FROM cbta_tasks WHERE unit_id = $unitId AND task_id = $taskId AND student_id = " . $_SESSION['user_id'];
                    $result = $conn->query($sql);

                    $isChecked = $result->num_rows > 0 ? 'checked' : '';

                    echo '<div class="list-item">';
                    echo "<a href=\"$taskUrl\"><li class=\"hover no-padding\">$taskName</li></a>";
                    echo "<input type=\"checkbox\" class=\"checkboxs\" disabled $isChecked>";
                    echo '</div>';
                    echo '<p></p>';
                }
                ?>
            </ol>
        </div>
    </div>

</body>

</html>