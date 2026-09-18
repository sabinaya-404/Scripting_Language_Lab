<!DOCTYPE html>
<html>
<head>
    <title>AJAX Text File</title>
</head>
<body>

<h2>BCA Information</h2>
<button onclick="loadText()">Load File</button>

<p id="result"></p>

<script>
function loadText() {
    let xhr = new XMLHttpRequest();

    xhr.open("GET", "bca.txt", true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById("result").innerText = xhr.responseText;
        }
    };

    xhr.send();
}
</script>

</body>
</html>