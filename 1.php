<!DOCTYPE html>
<html>
<head>
    <title>Interest Calculator</title>
</head>
<body>
    <h2>Interest Calculator</h2>
    <form method="post" action="">
        <label>Principal Amount:</label>
        <input type="number" name="principal" step="0.01" required><br><br>

        <label>Rate of Interest (%):</label>
        <input type="number" name="rate" step="0.01" required><br><br>

        <label>Time (in years):</label>
        <input type="number" name="time" step="0.01" required><br><br>

        <input type="submit" name="simple" value="Calculate Simple Interest">
        <input type="submit" name="compound" value="Calculate Compound Interest">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $principal = $_POST['principal'];
        $rate = $_POST['rate'];
        $time = $_POST['time'];

        if (isset($_POST['simple'])) {
            // Calculate Simple Interest
            $simpleInterest = ($principal * $rate * $time) / 100;
            echo "<h3>Simple Interest: Rs. " . round($simpleInterest, 2) . "</h3>";
        }

        if (isset($_POST['compound'])) {
            // Calculate Compound Interest
            $compoundInterest = $principal * pow((1 + $rate / 100), $time) - $principal;
            echo "<h3>Compound Interest: Rs. " . round($compoundInterest, 2) . "</h3>";
        }
    }
    ?>
</body>
</html>