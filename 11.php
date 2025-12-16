<!DOCTYPE html>
<html>
<head>
    <title>Display Content using AJAX</title>
    <style>
        #content {
            width: 600px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 20px;
            font-family: Arial;
        }
        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2>BCA Description</h2>

<button onclick="loadContent()">Load Content</button>

<div id="content">
    <!-- Content from bea.txt will appear here -->
</div>

<script>
function loadContent() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "bca.txt", true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("content").innerText = xhr.responseText;
        }
    };
    xhr.send();
}
</script>

</body>
</html>