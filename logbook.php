<!DOCTYPE html>
<html>

<head>
    <title>Log Drive</title>
    <meta charset="utf-8">
    <meta name="Authors" content=" Callum and Michael">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
</head>

<body>
    <?php require_once "inc/menu.inc.php"; ?>
    <h2>Log Drive</h2>
    <hr>
    <br>
    <div class="row">
        <div class="column">
            <div>
                <label class="section-header">Date</label>
                <input type="date" required />
            </div>
            <br>
            <br>
            <div>
                <label for="timeForm" class="section-header">Time</label>
                <form id="timeForm">
                    <div>
                        <label>Start</label>
                        <input type="time" id="time1" required>
                    </div>
                    <div>
                        <label>Finish</label>
                        <input type="time" id="time2" required>
                    </div>
                    <div>
                        <label>Duration</label>
                        <input type="text" id="resultBox" readonly>
                    </div>
                </form>
            </div>
            <br>
            <br>

            <label class="section-header">Route</Label>
            <div>
                <label>From</label>
                <input type="text" required>
            </div>
            <div>
                <label>To</label>
                <input type="text" required>
            </div>
            <br>
            <br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d418336.63960122806!2d138.2815111742472!3d-35.000321384801715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab735c7c526b33f%3A0x4033654628ec640!2sAdelaide%20SA!5e0!3m2!1sen!2sau!4v1694003301837!5m2!1sen!2sau" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <br>
            <br>
            <label class="section-header">Conditions</label>
            <div>
                <label for="Road Type For">Road Type</label>
                <select id="RoadTypeID" name="Road Type Name">
                    <option value="S">Sealed</option>
                    <option value="U">Unsealed</option>
                    <option value="Q">Quiet Street</option>
                    <option value="B">Busy Road</option>
                    <option value="ML">Multi-laned Road</option>
                </select>
            </div>
            <div>
                <label for="Weather For">Weather</label>
                <select id="WeatherID" name="Weather Name">
                    <option value="D">Dry</option>
                    <option value="W">Wet</option>
                </select>
            </div>
            <div>
                <label for="Traffic Density For">Traffic Density</label>
                <select id="TrafficDensityID" name="Traffic Density Name">
                    <option value="L">Light</option>
                    <option value="M">Medium</option>
                    <option value="H">Heavy</option>
                </select>
            </div>
        </div>

        <div class="column">
            <label class="section-header">E-Signature</label>
            <p>Draw your signature below:</p>

            <div id="signature-container">
                <div id="signature-pad">
                    <canvas></canvas>
                </div>
            </div>
            <br>
            <button class="sub-button">Submit Drive</button>
        </div>
</body>

</html>