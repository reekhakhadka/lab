<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Points Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
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
        .points-info {
            background-color: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #2196F3;
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
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #1976D2;
        }
        .result {
            margin-top: 20px;
            padding: 20px;
            background-color: #e8f5e8;
            border-radius: 5px;
            border-left: 4px solid #4CAF50;
        }
        .error {
            color: #d32f2f;
            background-color: #ffebee;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
            border-left: 4px solid #f44336;
        }
        .calculation-steps {
            background-color: #fff3e0;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }
        .total-points {
            font-size: 24px;
            font-weight: bold;
            color: #2e7d32;
            text-align: center;
            margin: 15px 0;
            padding: 10px;
            background-color: #c8e6c9;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>⚽ Football Points Calculator</h1>
        
        <div class="points-info">
            <h3>📊 Points System:</h3>
            <p>• <strong>Win:</strong> 3 points</p>
            <p>• <strong>Draw:</strong> 1 point</p>
            <p>• <strong>Loss:</strong> 0 points</p>
        </div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="wins">Number of Wins:</label>
                <input type="number" id="wins" name="wins" min="0" value="<?php echo isset($_POST['wins']) ? htmlspecialchars($_POST['wins']) : '0'; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="draws">Number of Draws:</label>
                <input type="number" id="draws" name="draws" min="0" value="<?php echo isset($_POST['draws']) ? htmlspecialchars($_POST['draws']) : '0'; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="losses">Number of Losses:</label>
                <input type="number" id="losses" name="losses" min="0" value="<?php echo isset($_POST['losses']) ? htmlspecialchars($_POST['losses']) : '0'; ?>" required>
            </div>
            
            <button type="submit">Calculate Total Points</button>
        </form>

        <?php
        // Function to calculate total points
        function calculatePoints($wins, $draws, $losses) {
            $winPoints = $wins * 3;
            $drawPoints = $draws * 1;
            $lossPoints = $losses * 0;
            
            return [
                'total' => $winPoints + $drawPoints + $lossPoints,
                'winPoints' => $winPoints,
                'drawPoints' => $drawPoints,
                'lossPoints' => $lossPoints
            ];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get input values
            $wins = isset($_POST['wins']) ? (int)$_POST['wins'] : 0;
            $draws = isset($_POST['draws']) ? (int)$_POST['draws'] : 0;
            $losses = isset($_POST['losses']) ? (int)$_POST['losses'] : 0;
            
            // Validate inputs
            $errors = [];
            
            if ($wins < 0) {
                $errors[] = "Number of wins cannot be negative.";
            }
            if ($draws < 0) {
                $errors[] = "Number of draws cannot be negative.";
            }
            if ($losses < 0) {
                $errors[] = "Number of losses cannot be negative.";
            }
            
            // If no errors, calculate total points
            if (empty($errors)) {
                $points = calculatePoints($wins, $draws, $losses);
                $totalGames = $wins + $draws + $losses;
                
                echo "<div class='result'>";
                echo "<h3>📈 Team Performance Summary:</h3>";
                echo "<p><strong>Total Games Played:</strong> " . $totalGames . "</p>";
                echo "<p><strong>Record:</strong> " . $wins . "W - " . $draws . "D - " . $losses . "L</p>";
                
                echo "<div class='calculation-steps'>";
                echo "<h4>🔢 Points Calculation:</h4>";
                echo "<p>• Wins: " . $wins . " × 3 points = <strong>" . $points['winPoints'] . " points</strong></p>";
                echo "<p>• Draws: " . $draws . " × 1 point = <strong>" . $points['drawPoints'] . " points</strong></p>";
                echo "<p>• Losses: " . $losses . " × 0 points = <strong>" . $points['lossPoints'] . " points</strong></p>";
                echo "</div>";
                
                echo "<div class='total-points'>";
                echo "🏆 Total Points: " . $points['total'] . " points";
                echo "</div>";
                
                // Additional statistics
                if ($totalGames > 0) {
                    $winPercentage = round(($wins / $totalGames) * 100, 1);
                    $unbeatenPercentage = round((($wins + $draws) / $totalGames) * 100, 1);
                    
                    echo "<div style='margin-top: 15px;'>";
                    echo "<h4>📊 Additional Statistics:</h4>";
                    echo "<p>• Win Rate: " . $winPercentage . "%</p>";
                    echo "<p>• Unbeaten Rate: " . $unbeatenPercentage . "%</p>";
                    echo "<p>• Points per Game: " . round($points['total'] / $totalGames, 2) . "</p>";
                    echo "</div>";
                }
                
                echo "</div>";
            } else {
                // Display errors
                echo "<div class='error'>";
                echo "<h3>❌ Input Error:</h3>";
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