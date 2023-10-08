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
    <?php require_once "inc/menu.inc.php"; ?>

        <form class="reportContainer" method="POST" action="studentList.php">
            <div class="selectWrapper">
                <select id="insName" name="insName">
                    <option>Instructor1</option>
                    <option>Instructor2</option>
                    <option>Instructor3</option>
                </select>
            </div>
            <div id="insIncome" class="reportItem">
                <p>$$$</p>
            </div>
            <div id="insHours" class="reportItem">
                <p>H:MM</p>
            </div>
            <div id="insDriveCount" class="reportItem">
                <p>XX</p>
            </div>
            <button>Students</button>
        </form>
    </div>
</body>

</html>