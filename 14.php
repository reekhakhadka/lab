<?php
// ---------- AJAX PART ----------
if (isset($_GET['country'])) {

    $country = $_GET['country'];
    $cities = [];

    if ($country === "Nepal") {
        $cities = ["Kathmandu", "Pokhara", "Biratnagar"];
    } elseif ($country === "India") {
        $cities = ["Delhi", "Mumbai", "Bangalore"];
    } elseif ($country === "USA") {
        $cities = ["New York", "Los Angeles", "Chicago"];
    }

    foreach ($cities as $city) {
        echo "<option value=\"$city\">$city</option>";
    }

    exit; // 🚨 VERY IMPORTANT: stop HTML output
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Country-City Dropdown</title>
</head>
<body>

<h2>Select Country and City</h2>

Country:<br>
<select id="country" onchange="loadCities()">
    <option value="">--Select Country--</option>
    <option value="Nepal">Nepal</option>
    <option value="India">India</option>
    <option value="USA">USA</option>
</select><br><br>

City:<br>
<select id="city">
    <option value="">--Select City--</option>
</select>

<script>
function loadCities() {
    var country = document.getElementById("country").value;
    var cityDropdown = document.getElementById("city");

    if (country === "") {
        cityDropdown.innerHTML = "<option value=''>--Select City--</option>";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "14.php?country=" + encodeURIComponent(country), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            cityDropdown.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>

</body>
</html>
