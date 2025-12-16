<!DOCTYPE html>
<html>
<head>
    <title>jQuery Effects Demo</title>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        #box {
            width: 200px;
            height: 200px;
            background-color: lightblue;
            margin: 20px 0;
            position: relative;
        }

        button {
            margin: 3px;
        }
    </style>
</head>
<body>

    <h2>jQuery Effect Methods</h2>

    <button id="hide">Hide</button>
    <button id="show">Show</button>
    <button id="toggle">Toggle</button>

    <button id="fadeIn">Fade In</button>
    <button id="fadeOut">Fade Out</button>
    <button id="fadeToggle">Fade Toggle</button>

    <button id="slideUp">Slide Up</button>
    <button id="slideDown">Slide Down</button>
    <button id="slideToggle">Slide Toggle</button>

    <button id="animate">Animate</button>

    <div id="box"></div>

    <script>
        $(document).ready(function(){

            $("#hide").click(function(){
                $("#box").hide();
            });

            $("#show").click(function(){
                $("#box").show();
            });

            $("#toggle").click(function(){
                $("#box").toggle();
            });

            $("#fadeIn").click(function(){
                $("#box").fadeIn();
            });

            $("#fadeOut").click(function(){
                $("#box").fadeOut();
            });

            $("#fadeToggle").click(function(){
                $("#box").fadeToggle();
            });

            $("#slideUp").click(function(){
                $("#box").slideUp();
            });

            $("#slideDown").click(function(){
                $("#box").slideDown();
            });

            $("#slideToggle").click(function(){
                $("#box").slideToggle();
            });

            $("#animate").click(function(){
                $("#box").animate({
                    left: '250px',
                    height: '150px',
                    width: '150px'
                });
            });

        });
    </script>

</body>
</html>