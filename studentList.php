<!DOCTYPE html>
<html>

<head>
    <title>Reports: Students</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Harrison">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
    <a href="dashboard.php" id="menu-selected"></a>
</head>

<body>

    <?php require_once "inc/menu.inc.php";?>

    <form class="reportContainer" method="POST" action="reports.php">
            <div class="selectWrapper">
                <select id="insName" name="insName">
                    <option>Student1</option>
                    <option>Student2</option>
                    <option>Student3</option>
                </select>
            </div>
            <div id="timeWithIns" class="reportItem">
                <p>H:MM</p>
            </div>
            <div id="signedDrives" class="reportItem">
                <p>XX</p>
            </div>
            <div id="totalStudentPayment" class="reportItem">
                <p>$$$</p>
            </div>
            <button>Back</button>
        </form>

</body>

</html>