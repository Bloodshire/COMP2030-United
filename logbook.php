<!DOCTYPE html>
<html>

<head>
    <title>Add Drive</title>
    <meta charset="utf-8">
    <meta name="Authors" content=" Callum and Michael">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php require_once "inc/menu.inc.php"; ?>
    
    <div class="main">
        <h2>Log Drive</h2>
        <hr>
        <br>
        <label>Date</label>
        <br>
        <input type="Date" required>
        <br>
        <br>
        <label>Time</label>
        <br>
        <br>
        <label>Start&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Finish&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duration</label>
        <br>
        <Form id="timeForm">
        <label for="time1"></label>
        <input type="time" id="time1" required>
        <label for="time2"></label>
        <input type="time" id="time2" required>
        <input type="text" id="resultBox" readonly>
        </Form>

        


        <script>
        const time1Input = document.getElementById('time1');
        const time2Input = document.getElementById('time2');
        const resultBox = document.getElementById('resultBox');

        time1Input.addEventListener('input', calculateTimeDifference);
        time2Input.addEventListener('input', calculateTimeDifference);

        function calculateTimeDifference() {
            const time1 = new Date(`2023-09-05T${time1Input.value}`);
            const time2 = new Date(`2023-09-05T${time2Input.value}`);

            if (isNaN(time1.getTime()) || isNaN(time2.getTime())) {
                resultBox.value = 'Invalid input';
            } else {
                const timeDifference = Math.abs(time2 - time1);
                const hours = Math.floor(timeDifference / 3600000); // 1 hour = 3600000 milliseconds
                const minutes = Math.floor((timeDifference % 3600000) / 60000); // 1 minute = 60000 milliseconds
                resultBox.value = `${hours} hours and ${minutes} minutes`;
            }
        }
         </script>
        <br>
        </div>
</body>
    </body>
</html>