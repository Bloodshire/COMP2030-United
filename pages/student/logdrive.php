<!DOCTYPE html>
<html>

<head>
    <title>Log Drive</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Michael">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/script.js" defer></script>
    <a href="logbook.php" id="menu-selected"></a>
</head>

<body>
    <?php require_once "../../inc/main.inc.php"; ?>
    <div class="row">
        <div class="column c-ib">
            <form id="logbook-entry" method="POST" action="logdrive_process.php">
                <div>
                    <label class="section-header">Date</label>
                    <input type="date" name="date" required />
                </div>
                <br>
                <br>
                <div>
                    <label for="timeForm" class="section-header">Time</label>
                    <div>
                        <label>Start</label>
                        <input type="time" id="time1" name="start_time" required>
                    </div>
                    <div>
                        <label>Finish</label>
                        <input type="time" id="time2" name="finish_time" required>
                    </div>
                    <div>
                        <label>Duration</label>
                        <input type="text" id="resultBox" name="duration" readonly>
                    </div>
                </div>
                <br>
                <br>
                <label class="section-header">Route</Label>
                <div>
                    <label>From</label>
                    <input type="text" name="from_location" placeholder="e.g. Mt Barker" required>
                </div>
                <div>
                    <label>To</label>
                    <input type="text" name="to_location" placeholder="e.g. Port Adelaide" required>
                </div>
                <br>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d418336.63960122806!2d138.2815111742472!3d-35.000321384801715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab735c7c526b33f%3A0x4033654628ec640!2sAdelaide%20SA!5e0!3m2!1sen!2sau!4v1694003301837!5m2!1sen!2sau" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <br>
                <br>
                <label class="section-header">Conditions</label>
                <div>
                    <label for="Road Type For">Road Type</label>
                    <select id="RoadTypeID" name="road_type" required>
                        <option value="">Select</option>
                        <option value="S">Sealed</option>
                        <option value="U">Unsealed</option>
                        <option value="Q">Quiet Street</option>
                        <option value="B">Busy Road</option>
                        <option value="ML">Multi-laned Road</option>
                    </select>
                </div>
                <div>
                    <label for="Weather For">Weather</label>
                    <select id="WeatherID" name="weather" required>
                        <option value="">Select</option>
                        <option value="D">Dry</option>
                        <option value="W">Wet</option>
                    </select>
                </div>
                <div>
                    <label for="Traffic Density For">Traffic Density</label>
                    <select id="TrafficDensityID" name="traffic_density" required>
                        <option value="">Select</option>
                        <option value="L">Light</option>
                        <option value="M">Medium</option>
                        <option value="H">Heavy</option>
                    </select>
                </div>
        </div>

        <div class="column c-ib">
            <label class="section-header">Instructor / QSD</label>
                <div>
                    <label>Name</label>
                    <input type="text" placeholder="" value="" name="instructor_name" required>
                </div>
                <div>
                    <label>License No.</label>
                    <input type="text" placeholder="" value="" name="instructor_license" required>
                </div>
                <br>
                
            <br>
            <br>

            <label class="section-header">Signature</label>
            <p class="subtext">Draw your signature below:</p>
            <div id="signature-container">
                <div id="signature-pad">
                    <canvas></canvas>
                </div>
            </div>
            <br>
            <a href="logbook.php"><button class="btn-custom btn-black" type="button"><i class="fa-solid fa-chevron-left"></i> Back</button></a>
            <a href="#modal1" class="button"><button type="button" class="btn-custom bold"><i class="fa-solid fa-check"></i> Submit Drive</button></a>
        </div>

        <div id="modal1" class="overlay">
            <a class="cancel" href="#"></a>
            <div class="modal centre">
                <!-- <a href="#"><span class="close">&times;</span></a> -->
                <h2>Are you sure you want to submit the drive?</h2>
                <div class="content">
                    <a href="#"><button class="btn-custom btn-red" type="button"><i class="fa-solid fa-xmark"></i> Cancel</button></a>
                    <button class="btn-custom bold"><i class="fa-solid fa-check"></i> Submit</button>
                </div>
            </div>
        </div>

        <div id="modal2" class="overlay">
            <a class="cancel" href="#"></a>
            <div class="modal centre">
                <!-- <a href="#"><span class="close">&times;</span></a> -->
                <h2>Add QSD</h2>
                <div class="content">
                    <a href="#"><button class="btn-custom btn-red" type="button"><i class="fa-solid fa-xmark"></i> Cancel</button></a>
                    <button class="btn-custom bold"><i class="fa-solid fa-check"></i> Submit</button>
                </div>
            </div>
        </div>

        </form>
</body>

</html>