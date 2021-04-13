<?php

session_start();
if (isset($_SESSION['userlogin'])){
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Store Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" media="screen" href="./styles/main.css" />
</head>

<body>
  <div class="attendant-block admin-box">
  
        <div class="logo">
            <img src="./images/21.png" />
        </div>
        <form action="" class="form" method="post" >
        <input type="text" placeholder="Username" id="username" name="username"  class="username"  autofocus="true"/>
            <input type="password" placeholder="Password"  id="password" name="password" class="password"  />
            <input type="submit" value="Login" id="login"  name="login"
                    class="login" />
        </form>
        <!-- <p class="have-account">Not an Admin ? <strong id="hide">Login as Attendant</strong></p> -->
    </div>
 
    <script src="/js/main.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script>
    $(function(){
        $("#login").click(function(e){
          

            var valid= this.form.checkValidity();

            if (valid){

                var username = $('#username').val();
                var password = $('#password').val();
            }

            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "jslogin.php",
                data: {username: username, password: password},
                success: function(data){
                    alert(data);
                    if ($.trim(data) === "Login Successful. Redirecting..."){
                        setTimeout('window.location.href = "index.php"', 2000);
                        
                        
                    }
                },

                error: function(data){
                    alert("An error occured");
                }
            })

        
        });
    });

    
    </script>


</body>

</html>