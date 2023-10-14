<!DOCTYPE html>
<html>

<head>
    <title>Reports: Instructors</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Harrison">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="reports.php" id="menu-selected"></a>
</head>

<body>
    <?php require_once "../../inc/main.inc.php";?>

        <form class="reportContainer" method="POST" action="studentList.php">
    <h2>IN CONSTRUCTION</h2>
            
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