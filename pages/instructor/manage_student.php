<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Manage Student</title>
    <script src="../../scripts/script.js" defer></script>
    <a href="students.php" id="menu-selected"></a>
</head>

<body>
    <h1 id="heading-back-btn"><a href="students.php"><i class="heading-back-btn fa-solid fa-arrow-left"></i></a></h1>
    <?php
    require_once "../../inc/main.inc.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $student_id = $_POST['user_id'];
        $student_given_name = $_POST['given_name'];
        $student_surname = $_POST['surname'];
        $student_license_no = $_POST['license_no'];
        
        $_SESSION['student_user_id'] = $_POST['user_id'];
        $_SESSION['student_given_name'] = $_POST['given_name'];
        $_SESSION['student_surname'] = $_POST['surname'];
        $_SESSION['student_license_no'] = $_POST['license_no'];

    } else if (isset($_SESSION['student_user_id'])) {
        $student_id = $_SESSION['student_user_id'];
        $student_given_name = $_SESSION['student_given_name'];
        $student_surname = $_SESSION['student_surname'];
        $student_license_no = $_SESSION['student_license_no'];
    } else {
        echo "No user_id provided.";
        exit;
    }
    ?>
    <div class="centre">
        <h1><i class="fa-solid fa-circle-user fa-2xl"></i></h1>
        <h2><?php echo $student_given_name . " " . $student_surname ?></h2>

        <button class="accordion">CBT&A Units & Tasks</button>
        <div class="panel">
            <button class="tablink" onclick="openPage('unit-1', this, 'black')" id="defaultOpen">Unit 1</button>
            <button class="tablink" onclick="openPage('unit-2', this, 'black')">Unit 2</button>
            <button class="tablink" onclick="openPage('unit-3', this, 'black')">Unit 3</button>
            <button class="tablink" onclick="openPage('unit-4', this, 'black')">Unit 4</button>

            <div id="unit-1" class="tabcontent">
                <div class="vertical-menu">
                    <a href="manage_cbta.php?unit=1&task=1">Task 1</a>
                    <a href="manage_cbta.php?unit=1&task=2">Task 2</a>
                    <a href="manage_cbta.php?unit=1&task=3">Task 3</a>
                    <a href="manage_cbta.php?unit=1&task=4">Task 4</a>
                    <a href="manage_cbta.php?unit=1&task=5">Task 5</a>
                    <a href="manage_cbta.php?unit=1&task=6">Task 6</a>
                    <a href="manage_cbta.php?unit=1&task=7">Task 7</a>
                    <a href="manage_cbta.php?unit=1&task=8">Task 8</a>
                </div>
            </div>

            <div id="unit-2" class="tabcontent">
                <div class="vertical-menu">
                    <a href="#">Task 1</a>
                    <a href="#">Task 2</a>
                    <a href="#">Task 3</a>
                    <a href="#">Task 4</a>
                    <a href="#">Task 5</a>
                </div>
            </div>

            <div id="unit-3" class="tabcontent">
                <div class="vertical-menu">
                    <a href="#">Task 1</a>
                    <a href="#">Task 2</a>
                    <a href="#">Task 3</a>
                </div>
            </div>

            <div id="unit-4" class="tabcontent">
                <div class="vertical-menu">
                    <a href="#">Task 1</a>
                    <a href="#">Task 2</a>
                    <a href="#">Task 3</a>
                    <a href="#">Task 4</a>
                    <a href="#">Task 5</a>
                    <a href="#">Task 6</a>
                </div>
            </div>
        </div>

        <button class="accordion">Log Drives</button>
        <div class="panel">
            <p>Under construction.</p>
        </div>

        <button class="accordion">Approved & Disapproved Drives</button>
        <div class="panel">
            <p>Under construciton.</p>
        </div>

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }

            function openPage(pageName, elmnt, color) {
                // Hide all elements with class="tabcontent" by default */
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Remove the background color of all tablinks/buttons
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }

                // Show the specific tab content
                document.getElementById(pageName).style.display = "block";

                // Add the specific color to the button used to open the tab content
                elmnt.style.backgroundColor = color;
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
</body>

</html>