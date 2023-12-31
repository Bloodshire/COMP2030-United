<!DOCTYPE html>

<head>
    <title>Students</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="students.php" id="menu-selected"></a>
</head>

<html>

<body>
    <?php
    require_once "../../inc/main.inc.php";

    // Check if success parameter is set to 1 in the URL
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<span id='notification' class='notification fade-out'>Student has been added <b>successfully</b>!</span>";
    } else if (isset($_GET['success']) && $_GET['success'] == 2) {
        echo "<span id='notification' class='notification fade-out'>Student has been removed <b>successfully</b>!</span>";
    }
    ?>

    <h2>List of Current Students</h2>

    <table id="tldr-table">
        <thead>
            <tr>
                <th>Given Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>License No</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database (assuming you have a db connection)
            // Replace 'your_db_connection' with the actual database connection code
            // ...

            // Fetch data from the 'users' table for students under the instructor's ID
            $query = "SELECT user_id, given_name, surname, email, license_no FROM users WHERE role_id = 3 AND instructor_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if there are rows to display
            if ($result->num_rows > 0) {
                // Loop through the results and display them in the table
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['given_name'] . "</td>";
                    echo "<td>" . $row['surname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['license_no'] . "</td>";
                    echo "<td>";
                    echo "<button class='btn-custom btn-blue btn-small' onclick='manageStudent(" . $row['user_id'] . ', "' . $row['given_name'] . '", "' . $row['surname'] . '", "' . $row['license_no'] . '"' . ")'><i class='fa-solid fa-arrow-right-from-bracket'></i> Manage</button>";
                    echo "<button class='btn-custom btn-red btn-small' onclick='removeStudent(" . $row['user_id'] . ")'><i class='fa-solid fa-xmark'></i> Remove Student</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                // Display a message if there are no current students
                echo "<tr><td colspan='5'>You have no current students.</td></tr>";
            }

            // Close the database connection
            $stmt->close();
            $conn->close();
            ?>
        </tbody>
    </table>
    <br>
    <a href="add_student.php"><button id="addStudentButton" class="btn-custom"><i class="fa-solid fa-plus"></i> Add Student</button></a>
    <br>
    <br>


    <script>
        var notification = document.getElementById("notification");
        if (notification) {
            // Remove the element after the animation ends
            notification.addEventListener("animationend", function() {
                notification.remove();
            });
        }

        // JavaScript function to remove a student
        function removeStudent(userId) {
            fetch('remove_student.php?user_id=' + userId, {
                    method: 'POST'
                })
                .then(response => {
                    // Redirect to students.php with success=2
                    window.location.href = "students.php?success=2";
                })
                .catch(error => {
                    // Handle errors if needed
                });
        }

        function manageStudent(userId, givenName, surname, licenseNo) {
            const formData = new FormData();
            formData.append('user_id', userId);
            formData.append('given_name', givenName);
            formData.append('surname', surname);
            formData.append('license_no', licenseNo);

            // Create a hidden form element and submit it
            const form = document.createElement('form');
            form.method = 'post';
            form.action = 'manage_student.php';
            form.style.display = 'hidden';

            // Append the form data to the form
            for (var pair of formData.entries()) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = pair[0];
                input.value = pair[1];
                form.appendChild(input);
            }

            // Append the form to the document body and submit it
            document.body.appendChild(form);
            form.submit();
        }


        // Add an event listener to the "Add Student" button (you can handle the addition of a student)
        document.getElementById('addStudentButton').addEventListener('click', function() {
            // You can add your logic for adding a student here
            // For example, display a form or trigger a modal
        });
    </script>

</body>

</html>