<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registration Form</h1>
    <form action="">
        <label for="username" id="username">
        <span id="err_username"></span>
</form>
    <script src="./jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#username').keyup(function(){
            let data = $(this).val();
            $.ajax({
                url:'check_username.php',
                data:{'username':data},
                method:'post',
                dataType:'text',
                success:function(resp){
                    $('#err_username').html(resp);
                }
            });
        })
    });
    </script>
</body>
</html>
    