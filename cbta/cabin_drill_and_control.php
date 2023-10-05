<!DOCTYPE html>
<head>
    <title>Task 1: Cabin Drill and Control</title>
    <meta charset="utf-8">
    <meta name="Authors" content="Connor">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js" defer></script>
    <a href="cbta.php" id="menu-selected"></a>

</head>

<html>
<body>
    <?php require_once "inc/menu.inc.php"; ?>

    <h2>Learning Outcome</h2>
    <p>The learner will be able to set up the cabin of the vehicle in order to safely, efficiently and effectively drive the vehicle (cabin drill) and be able to locate and identify all controls</p>

    <h2>Assesment Standard</h2>
    <p>The learner will accurately perform this task without assistance.</p>
    <p>The assessment will be a demonstration on at least two consecutive but separate occasions.</p>
    <p></p>

    <table>
        <thead>
            <tr>
                <th class="large-column">Task 1 Requirements</th>
                <th class="small-column">Homework</th>
                <th class="small-column">Homework</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="large-column">(a) Ensure the doors are closed (and locked for security and safety – optional);</td>
                <td class="small-column"></td>
                <td class="small-column"></td>
            </tr>
            <tr>
                <td class="large-column">(b) Check that the park brake is firmly applied;</td>
                <td class="small-column"></td>
                <td class="small-column"></td>
            </tr>
            <tr>
                <td class="large-column">(c) Adjust the seat, head restraint and steering wheel (as required);</td>
                <td class="small-column"></td>
                <td class="small-column"></td>
            </tr>
            <tr>
                <td class="large-column">(d) Adjust all mirrors (electric mirrors, if fitted, may be adjusted after ‘starting the engine’ – Task 2);</td>
                <td class="small-column"></td>
                <td class="small-column"></td>
            </tr>
            <tr>
                <td class="large-column">(e) Locate, identify and be able to use all vehicle controls (as required) when driving (including ‘climate’ controls);</td>
                <td class="small-column"></td>
                <td class="small-column"></td>
            </tr>
            <tr>
                <td class="large-column">(f) Perform all steps (a) to (e) in sequence;</td>
                <td class="small-column"></td>
                <td class="small-column"></td>
            </tr>
            <tr>
                <td class="large-column">(g) Ensure all required seat belts are fastened correctly.</td>
                <td class="small-column"></td>
                <td class="small-column"></td>
            </tr>
        </tbody>
    </table>

    <h2>Control List</h2>
    <p> The learner may be asked to explain the function of one control from each of the groups below. </p>

    <div class="task_column">
        <h3>Group 1 (any 1)</h3>
        <ul class="task_list">
            <li>Brake</li>
            <li>Accelerator</li>
            <li>Steering wheel</li>
            <li>Gear lever (including autos)</li>
        </ul>
    </div>
    
    <div class="task_column">
        <h3>Group 2 (any 1)</h3>
        <ul class="task_list">
            <li>Clutch(Manuals only)</li>
            <li>Park brake</li>
            <li>Warning device</li>
            <li>Signals</li>
        </ul>
    </div>
    
    <div class="task_column">
        <h3>Group 3 (any 1)</h3>
        <ul class="task_list">
            <li>Heater/demister</li>
            <li>Wipers and washers</li>
            <li>Warning lights (any 3)</li>
            <li>Vehicle lights</li>
            <li>Gauges</li>
        </ul>
    </div>

    <p><b>Note:</b> This procedure may change due to manufacturer's requirements</p>

    <h2>Task Assesment Records</h2>
    <p>Cabin Drill</p><input type="checkbox" class="checkboxs">  <input type="checkbox" class="checkboxs">  
    <p>Controls (Selected from the respective group)</p>
    <div>
        <label for="Group 1">Group 1 - Control Name</label><input type="checkbox" class="checkboxs">  <input type="checkbox" class="checkboxs">  
        <select id="group1ID" name="Group 1 Control" required>
            <option value="">Select</option>
            <option>Brake</option>
            <option>Accelerator</option>
            <option>Steering Wheel</option>
            <option>Gear Level</option>
        </select>
    </div>
    <p></p>
    <div>
        <label for="Group 2">Group 2 - Control Name</label><input type="checkbox" class="checkboxs">  <input type="checkbox" class="checkboxs">  
        <select id="group2ID" name="Group 2 Control" required>
            <option value="">Select</option>
            <option>Clutch</option>
            <option>Park Brake</option>
            <option>Warning Device</option>
            <option>Signals</option>
        </select>
    </div>
    <p></p>
    <div>
        <label for="Group 3">Group 3 - Control Name</label><input type="checkbox" class="checkboxs">  <input type="checkbox" class="checkboxs">  
        <select id="group3ID" name="Group 3 Control" required>
            <option value="">Select</option>
            <option>Heater/Demister</option>
            <option>Wipers and Washers</option>
            <option>Warning Lights</option>
            <option>Guages</option>
        </select>
    </div>

    <h2>Task 1 Sign Off</h2>
    <p>Driver Namer:</p>
    <p>Licence Number:</p>
    <p>Learner Driver's Signature:</p>
    <div id="signature-container">
        <div id="signature-pad">
            <canvas></canvas>
        </div>
    </div>

    <p>Authorised Examiner's Name:</p>
    <p>Authorised Examiner's Signature:</p>
    <div id="signature-container">
        <div id="signature-pad">
            <canvas></canvas>
        </div>
    </div>







</body>
</html>