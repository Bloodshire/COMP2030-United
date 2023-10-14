<!DOCTYPE html>

<head>
    <title>Add a Student</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="students.php" id="menu-selected"></a>
</head>

<html>

<body>
<h1 id="heading-back-btn"><a href="students.php"><i class="heading-back-btn fa-solid fa-arrow-left"></i></a></h1>

    <?php require_once "../../inc/main.inc.php"; ?>

    
    
    <div id="addStudentForm" class="centre">
            <form id="invoiceForm" action="find_student.php" method="post">
                <h3>Find a Student</h3>
                <label for="student_license">Student's License No</label>
                <input type="text" name="student_license" id="student_license" required>

                <br><button class="btn-custom btn-blue"><i class="fa-solid fa-magnifying-glass"></i> Find Student</button>
            </form>
    </div>

</body>

</html>