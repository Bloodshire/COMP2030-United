<!DOCTYPE html>
<html>

<head>
    <title>Reports: Instructors</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Harrison">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
    <a href="dashboard.php" id="menu-selected"></a>
</head>

<body>
    <?php require_once "inc/main.inc.php";?>

        <form class="reportContainer" method="POST" action="studentList.php">
            <div class="selectWrapper">
                <select id="insName" name="insName">
                    <option>Hans Zimmer</option>
                    <option>Christopher Nolan</option>
                </select>
            </div>

            <div id="insIncome" class="reportItem">
                    <p>Total Income: $$$</p>
            </div>

            <div id="insHours" class="reportItem">
                <p>Total Hours: H:MM</p>
            </div>

            <div id="insDriveCount" class="reportItem">
                <p>Total Signed Drives: XX</p>
            </div>

            <button>Students</button>
        </form>
    </div>
</body>

</html>