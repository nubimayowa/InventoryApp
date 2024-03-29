<?php
// echo hash("SHA256", "admin@123");
session_start();
if (isset($_SESSION['userlogin'])){
    header("Location: index.php");
}
$cost = 10;
$password = password_hash('admin@123', PASSWORD_BCRYPT, ["cost" => $cost]);
echo $password;        
?>
<!DOCTYPE html>
<html  lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="./styles/main.css"  rel="stylesheet" media="screen" />
    <title>Login Page</title>
</head>

<body>
  <div class="attendant-block ">
  
        <div class="logo">
            <img alt="Admin profile icon" src="./images/21.png" />
        </div>
        <form  class="form" method="post" >
        <input type="text" placeholder="Employee ID" id="username" name="empId" class="username"  />
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
        $("#login").click(async function(e){
          

            var valid= this.form.checkValidity();

            if (valid){

                var username = $('#username').val();
                var password = $('#password').val();
            }

            e.preventDefault();
            const response = await fetch('jslogin.php', {
                method: 'POST',
                body: JSON.stringify({empId: username, password: password})
            })
            alert('Trying to Log in...')
            if(+response.status === 200) {
                setTimeout(() =>  window.location.href="index.php", 2000)
            } else if(+response.status === 400) {
                const error = await response.json();
                // debugger
                alert(error.msg)
            } else {
                alert("An error occurred!")
            }
        });
    });

    
    </script>


</body>

</html>