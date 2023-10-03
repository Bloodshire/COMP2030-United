<!DOCTYPE html>
<html>

<head>
    <title>Reports</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Harrison">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
    <a href="dashboard.php" id="menu-selected"></a>
</head>

<body>
    <?php require_once "inc/menu.inc.php"; ?>

    <div class="bigReportContainer">
        <div class="reportContainer">
            <p class="rHead">Instructor Name</p>
            <div id="insIncome" class="reportItem">
                <p>$$$</p>
            </div>
            <div id="insHours" class="reportItem">
                <p>H:MM</p>
            </div>
            <div id="insDriveCount" class="reportItem">
                <p>XX</p>
            </div>
            <a href="studentList.php">Students</a>
        </div>
        <div class="reportContainer">
            <p class="rHead">Instructor Name</p>
            <div id="insIncome" class="reportItem">
                <p>$$$</p>
            </div>
            <div id="insHours" class="reportItem">
                <p>H:MM</p>
            </div>
            <div id="insDriveCount" class="reportItem">
                <p>XX</p>
            </div>
            <a href="studentList.php">Students</a>
        </div>
        <div class="reportContainer">
            <p class="rHead">Instructor Name</p>
            <div id="insIncome" class="reportItem">
                <p>$$$</p>
            </div>
            <div id="insHours" class="reportItem">
                <p>H:MM</p>
            </div>
            <div id="insDriveCount" class="reportItem">
                <p>XX</p>
            </div>
            <a href="studentList.php">Students</a>
        </div>
    </div>

</body>

</html>