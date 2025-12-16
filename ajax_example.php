<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajax Example</h1>
    <button>Send</button>
    <p id='Padmakanya multiple campus'></p>
    <script>
        let button = document.querySelector('button');
        button.addEventListener('click',function(){
            let xhttp = new XMLHttpRequest();
            xhttp.open('GET','info.txt',true);
            xhttp.send();
            xhttp.onreadyStatechange = function(){
    if (this.readyState == 4 && this.status == 200) {d
      document.getElementById('message').textContent = this.responseTest;
    }
}
})
</script>
</body>
</html>