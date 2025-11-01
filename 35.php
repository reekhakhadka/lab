<!DOCTYPE html>
<html>
<head>
    <title>Simple Interest Calculator</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        .container { width: 40%; margin: auto; border: 1px solid #ccc; padding: 20px; border-radius: 10px; }
        input[type=number] { width: 100%; padding: 8px; margin: 5px 0; }
        input[type=submit] { padding: 10px 20px; }
        h2, h3 { text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <h2>💰 Simple Interest Calculator</h2>

    <form method="post">
        <label>Principal Amount (Rs):</label>
        <input type="number" name="principal" step="0.01" required><br>

        <label>Rate of Interest (%):</label>
        <input type="number" name="rate" step="0.01" required><br>

        <label>Time (Years):</label>
        <input type="number" name="time" step="0.01" required><br>

        <input type="submit" name="calculate" value="Calculate Interest">
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        // Get form inputs
        $p = $_POST['principal'];
        $r = $_POST['rate'];
        $t = $_POST['time'];

        // Calculate Simple Interest
        $si = ($p * $r * $t) / 100;
        $total = $p + $si;

        echo "<hr>";
        echo "<h3>📄 Simple Interest Result</h3>";
        echo "Principal Amount: Rs. $p <br>";
        echo "Rate of Interest: $r % <br>";
        echo "Time: $t years <br>";
        echo "<b>Simple Interest: Rs. " . number_format($si, 2) . "</b><br>";
        echo "<b>Total Amount: Rs. " . number_format($total, 2) . "</b>";
    }
    ?>
</div>

</body>
</html>