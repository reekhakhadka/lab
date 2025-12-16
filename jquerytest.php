<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>jQuery Test</h1>
    <button id="h">hide</button>
    <button id="s">show</button>
    <p>My name is ninja.i have two legsand two eyes,my friend naame is yumiko</p>
    <script src="jquery.min.js"></script>
    <script>
        /*
        $(selector).method();
        hide,show,toggle,slideup,slidedown,slidetoggle,fadeout,fadein,toggle,animate
        */
       $(document).ready(function(){
        $('button#h').click(function(){
            $('p').hide();
        });
        
        $('button#s').click(function(){
            $('p').show();
        });
       });
    </script>
</body>
</html>