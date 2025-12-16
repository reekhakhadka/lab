<!DOCTYPE html>
<html>
<head>
    <title>Load BCA Description</title>
</head>
<body>

<h2>BCA Description</h2>
<button onclick="loadContent()">Load Content</button>
<div id="content" style="margin-top: 10px; border: 1px solid #ccc; padding: 10px; width: 500px;"></div>

<script>
function loadContent() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "bca.txt", true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200){
            document.getElementById("content").innerText = xhr.responseText;
        }
    };
    xhr.send();
}
</script>

</body>
</html>