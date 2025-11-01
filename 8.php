<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Legs Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f5e8;
            border-radius: 5px;
            border-left: 4px solid #4CAF50;
        }
        .error {
            color: #d32f2f;
            background-color: #ffebee;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐓 Animal Legs Calculator 🐄</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="chickens">Number of Chickens (2 legs each):</label>
                <input type="number" id="chickens" name="chickens" min="0" value="<?php echo isset($_POST['chickens']) ? htmlspecialchars($_POST['chickens']) : '0'; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="cows">Number of Cows (4 legs each):</label>
                <input type="number" id="cows" name="cows" min="0" value="<?php echo isset($_POST['cows']) ? htmlspecialchars($_POST['cows']) : '0'; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="pigs">Number of Pigs (4 legs each):</label>
                <input type="number" id="pigs" name="pigs" min="0" value="<?php echo isset($_POST['pigs']) ? htmlspecialchars($_POST['pigs']) : '0'; ?>" required>
            </div>
            
            <button type="submit">Calculate Total Legs</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get input values
            $chickens = isset($_POST['chickens']) ? (int)$_POST['chickens'] : 0;
            $cows = isset($_POST['cows']) ? (int)$_POST['cows'] : 0;
            $pigs = isset($_POST['pigs']) ? (int)$_POST['pigs'] : 0;
            
            // Validate inputs
            $errors = [];
            
            if ($chickens < 0) {
                $errors[] = "Number of chickens cannot be negative.";
            }
            if ($cows < 0) {
                $errors[] = "Number of cows cannot be negative.";
            }
            if ($pigs < 0) {
                $errors[] = "Number of pigs cannot be negative.";
            }
            
            // If no errors, calculate total legs
            if (empty($errors)) {
                $chicken_legs = $chickens * 2;
                $cow_legs = $cows * 4;
                $pig_legs = $pigs * 4;
                
                $total_legs = $chicken_legs + $cow_legs + $pig_legs;
                $total_animals = $chickens + $cows + $pigs;
                
                echo "<div class='result'>";
                echo "<h3>📊 Results:</h3>";
                echo "<p><strong>Total Animals:</strong> " . $total_animals . "</p>";
                echo "<p><strong>Chicken Legs:</strong> " . $chickens . " chickens × 2 legs = " . $chicken_legs . " legs</p>";
                echo "<p><strong>Cow Legs:</strong> " . $cows . " cows × 4 legs = " . $cow_legs . " legs</p>";
                echo "<p><strong>Pig Legs:</strong> " . $pigs . " pigs × 4 legs = " . $pig_legs . " legs</p>";
                echo "<p style='font-size: 18px; color: #2e7d32; font-weight: bold;'>";
                echo "🦵 Total Legs: " . $total_legs . " legs";
                echo "</p>";
                echo "</div>";
            } else {
                // Display errors
                echo "<div class='error'>";
                echo "<h3>❌ Error:</h3>";
                foreach ($errors as $error) {
                    echo "<p>" . $error . "</p>";
                }
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>