<!DOCTYPE html>
<html>
<head>
    <title>Marksheet Generator</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        table { border-collapse: collapse; width: 60%; margin: auto; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        h2, h3 { text-align: center; }
        .container { width: 60%; margin: auto; }
        input[type=text], input[type=number] { width: 100%; padding: 5px; }
        .center { text-align: center; }
    </style>
</head>
<body>

<?php
if (isset($_POST['submit'])) {
    // Collect data
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $subjects = [
        "English" => $_POST['english'],
        "Nepali" => $_POST['nepali'],
        "Math" => $_POST['math'],
        "Science" => $_POST['science'],
        "Computer" => $_POST['computer']
    ];

    // Calculate total and percentage
    $total = array_sum($subjects);
    $percentage = $total / count($subjects);

    // Determine division
    if ($percentage >= 80) $division = "Distinction";
    elseif ($percentage >= 60) $division = "First Division";
    elseif ($percentage >= 45) $division = "Second Division";
    elseif ($percentage >= 32) $division = "Third Division";
    else $division = "Fail";

    // Display Marksheet
    echo "<h2>Tribhuvan University</h2>";
    echo "<h3>Mark Sheet</h3>";
    echo "<table>
            <tr><td><b>Name:</b></td><td>$name</td></tr>
            <tr><td><b>Roll No:</b></td><td>$roll</td></tr>
            <tr><td><b>Class:</b></td><td>$class</td></tr>
          </table><br>";

    echo "<table>
            <tr><th>Subject</th><th>Full Marks</th><th>Pass Marks</th><th>Obtained Marks</th></tr>";
    foreach ($subjects as $sub => $marks) {
        echo "<tr><td>$sub</td><td>100</td><td>32</td><td>$marks</td></tr>";
    }
    echo "<tr><th colspan='3'>Total</th><th>$total</th></tr>";
    echo "</table><br>";

    echo "<table>
            <tr><td><b>Percentage:</b></td><td>" . number_format($percentage, 2) . "%</td></tr>
            <tr><td><b>Division:</b></td><td>$division</td></tr>
          </table>";

    echo "<br><div class='center'><b>Result Generated Successfully ✅</b></div>";
} else {
?>

<div class="container">
    <h2>Enter Student Marks</h2>
    <form method="post">
        <label>Full Name:</label><input type="text" name="name" required><br><br>
        <label>Roll No:</label><input type="text" name="roll" required><br><br>
        <label>Class:</label><input type="text" name="class" required><br><br>

        <h3>Enter Marks (Out of 100)</h3>
        English: <input type="number" name="english" min="0" max="100" required><br><br>
        Nepali: <input type="number" name="nepali" min="0" max="100" required><br><br>
        Math: <input type="number" name="math" min="0" max="100" required><br><br>
        Science: <input type="number" name="science" min="0" max="100" required><br><br>
        Computer: <input type="number" name="computer" min="0" max="100" required><br><br>

        <div class="center">
            <input type="submit" name="submit" value="Generate Marksheet">
        </div>
    </form>
</div>

<?php } ?>
</body>
</html>