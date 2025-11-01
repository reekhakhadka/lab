<!DOCTYPE html>
<html>
<head>
    <title>Circle Area Calculator</title>
</head>
<body>
    <h2>Circle Area Calculator</h2>
    
    <!-- HTML Form to input radius -->
    <form method="POST" action="">
        <label for="radius">Enter Radius:</label>
        <input type="number" id="radius" name="radius" step="any" required>
        <button type="submit">Calculate Area</button>
    </form>

    <?php
    // Define PI as constant
    define('PI', 3.14159265359);
    
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get radius from form input
        $radius = floatval($_POST['radius']);
        
        // Validate radius
        if ($radius > 0) {
            // Calculate area of circle
            $area = PI * $radius * $radius;
            
            // Display result
            echo "<h3>Result:</h3>";
            echo "<p>Radius: " . $radius . "</p>";
            echo "<p>Area of Circle: " . number_format($area, 2) . "</p>";
        } else {
            echo "<p style='color: red;'>Please enter a positive radius value.</p>";
        }
    }
    ?>
</body>
</html>