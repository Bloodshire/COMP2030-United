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
        <label>Start&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Finish&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duration</label>
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
        <Label>Route</Label>
        <br>
        <br>
        <label>From</label>
        <input type="text" required> 
        <label>To</label>
        <input type="text" required> 
        <br>
        <br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d418336.63960122806!2d138.2815111742472!3d-35.000321384801715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab735c7c526b33f%3A0x4033654628ec640!2sAdelaide%20SA!5e0!3m2!1sen!2sau!4v1694003301837!5m2!1sen!2sau" 
        width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <br>
        <br>
        <label>Conditions</label>
        <br>
        <br>
        
        <label for="Road Type For">Road Type</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="Weather For">Weather</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="Traffic Density For">Traffic Density</label>
        <br>
        <select id="RoadTypeID" name="Road Type Name">
        <option value="S">Sealed</option>
        <option value="U">Unsealed</option>
        <option value="Q">Quiet Street</option>
        <option value="B">Busy Road</option>
        <option value="ML">Multi-laned Road</option>
        </select>
        
        <select id="WeatherID" name="Weather Name">
        <option value="D">Dry</option>
        <option value="W">Wet</option>
        </select>
        
        <select id="TrafficDensityID" name="Traffic Density Name">
        <option value="L">Light</option>
        <option value="M">Medium</option>
        <option value="H">Heavy</option>
        </select>
        <label>E-Signature</label>
    <p>Please draw your signature below:</p>

    <div id="signature-container">
        <div id="signature-pad">
            <canvas></canvas>
        </div>
        <button id="clear-button">Clear</button>
    </div>

    <form action="your-server-side-script.php" method="POST">
        <input type="hidden" name="signature" id="signature-data">
        <button type="submit">Submit Signature</button>
    </form>

    <script>
        const canvas = document.querySelector("canvas");
        const signaturePad = new SignaturePad(canvas);
        const clearButton = document.querySelector("#clear-button");
        const signatureDataInput = document.querySelector("#signature-data");

        clearButton.addEventListener("click", () => {
            signaturePad.clear();
        });

        document.querySelector("form").addEventListener("submit", (e) => {
            e.preventDefault();
            const signatureData = signaturePad.toDataURL();
            signatureDataInput.value = signatureData;
        });
    </script>
        </div>
</body>
    </body>
</html>