<?php

$cities = [
    "Nepal" => ["Kathmandu", "Pokhara", "Lalitpur"],
    "India" => ["Delhi", "Mumbai", "Kolkata"],
    "USA" => ["New York", "Chicago", "Boston"]
];

if (isset($_GET["country"])) {
    $country = $_GET["country"];

    if (isset($cities[$country])) {
        echo json_encode($cities[$country]);
    } else {
        echo json_encode([]);
    }

    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Country City</title>
</head>
<body>

<h2>Country and City</h2>

<select id="country" onchange="loadCities()">
    <option value="">Select Country</option>
    <option value="Nepal">Nepal</option>
    <option value="India">India</option>
    <option value="USA">USA</option>
</select>

<select id="city">
    <option value="">Select City</option>
</select>

<script>
function loadCities() {
    let country = document.getElementById("country").value;
    let city = document.getElementById("city");

    city.innerHTML = '<option value="">Select City</option>';

    if (country === "") {
        return;
    }

    let xhr = new XMLHttpRequest();

    xhr.open("GET", "q14.php?country=" + encodeURIComponent(country), true);

    xhr.onload = function() {
        let data = JSON.parse(xhr.responseText);

        data.forEach(function(item) {
            city.innerHTML += `<option value="${item}">${item}</option>`;
        });
    };

    xhr.send();
}
</script>

</body>
</html>