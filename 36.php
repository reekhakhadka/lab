<!DOCTYPE html>
<html>
<head>
    <title>Tax Calculator</title>
    <style>
        body { font-family: Arial; margin: 40px; background: #f9f9f9; }
        .container {
            width: 50%; margin: auto; background: #fff;
            border: 1px solid #ccc; padding: 25px; border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2, h3 { text-align: center; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        input[type=submit] {
            width: auto; display: block; margin: 20px auto;
            background: #007bff; color: white; border: none; padding: 10px 20px; cursor: pointer;
            border-radius: 5px;
        }
        input[type=submit]:hover { background: #0056b3; }
        .result { background: #eef; padding: 15px; border-radius: 8px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>💼 Income Tax Calculator (Nepal)</h2>

    <form method="post">
        <label>Full Name:</label>
        <input type="text" name="name" required>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="">--Select Gender--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label>Marital Status:</label>
        <select name="status" required>
            <option value="">--Select Status--</option>
            <option value="married">Married</option>
            <option value="unmarried">Unmarried</option>
        </select>

        <label>Annual Income (Rs):</label>
        <input type="number" name="income" min="0" step="0.01" required>

        <input type="submit" name="calculate" value="Calculate Tax">
    </form>

<?php
if (isset($_POST['calculate'])) {
    $name = $_POST['name'];
    $gender = strtolower($_POST['gender']);
    $status = strtolower($_POST['status']);
    $income = $_POST['income'];
    $tax = 0;

    // ----- Married -----
    if ($status == "married") {
        if ($income <= 450000) {
            $tax = $income * 0.01;
        } elseif ($income <= 550000) {
            $tax = (450000 * 0.01) + (($income - 450000) * 0.10);
        } elseif ($income <= 750000) {
            $tax = (450000 * 0.01) + (100000 * 0.10) + (($income - 550000) * 0.20);
        } elseif ($income <= 1300000) {
            $tax = (450000 * 0.01) + (100000 * 0.10) + (200000 * 0.20) + (($income - 750000) * 0.30);
        } else {
            $tax = (450000 * 0.01) + (100000 * 0.10) + (200000 * 0.20) + (550000 * 0.30) + (($income - 1300000) * 0.35);
        }
    }

    // ----- Unmarried -----
    else {
        if ($income <= 400000) {
            $tax = $income * 0.01;
        } elseif ($income <= 500000) {
            $tax = (400000 * 0.01) + (($income - 400000) * 0.10);
        } elseif ($income <= 750000) {
            $tax = (400000 * 0.01) + (100000 * 0.10) + (($income - 500000) * 0.20);
        } elseif ($income <= 1300000) {
            $tax = (400000 * 0.01) + (100000 * 0.10) + (250000 * 0.20) + (($income - 750000) * 0.30);
        } else {
            $tax = (400000 * 0.01) + (100000 * 0.10) + (250000 * 0.20) + (550000 * 0.30) + (($income - 1300000) * 0.35);
        }
    }

    // ----- Female Discount -----
    if ($gender == "female") {
        $discount = $tax * 0.10;  // 10% discount
        $tax -= $discount;
    }

    // ----- Output -----
    echo "<div class='result'>";
    echo "<h3>📄 Tax Calculation Result</h3>";
    echo "<b>Name:</b> $name<br>";
    echo "<b>Gender:</b> " . ucfirst($gender) . "<br>";
    echo "<b>Marital Status:</b> " . ucfirst($status) . "<br>";
    echo "<b>Annual Income:</b> Rs. " . number_format($income, 2) . "<br>";
    echo "<b>Total Tax Payable:</b> Rs. " . number_format($tax, 2) . "<br>";

    if ($gender == "female") {
        echo "<small>(Includes 10% discount for female taxpayer)</small>";
    }

    echo "</div>";
}
?>
</div>
</body>
</html>