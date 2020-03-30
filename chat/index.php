<!DOCTYPE html>
<html lang="en">

<head>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <?php
    include("includes.php");
    include("conn.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VCF_SimpleChat Login/Register Page</title>


    <script>
         $(document).ready(function () {
            $('.reg-form').hide();
            $('#log').click(function(){
                $('.login-form').show();
                $('.reg-form').hide();
            });
            $('#reg').click(function(){
                $('.reg-form').show();
                $('.login-form').hide();
            });
        });
       var vid = document.getElementById("videos1");
       var vuttonis = document.getElementById("clicked");
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
</head>

<body>
<div>
    <div class="jumbotron text-center" >
        <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bolder;"> VCF Simple Chat WebApp </h1>
    </div>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-sm-3">
                <ul class="padding-1" style="list-style-type: none;">
                    <li> <input type="button" id="log" value="Login" class="btn btn-primary btn-lg">
                    </li>
                    <br>
                    <li> <input type="button" id="reg" value="register" class="btn btn-info btn-lg"></li>
                </ul>
            </div>
            <?php 
    if(isset($_POST['submit-log']))
    {
        $username = $_POST['username1'];
        $password = $_POST['password1'];
        
        $select = "SELECT username, password FROM users WHERE username = '".$username."' and password='".$password."'";
        $query = mysqli_query($conn,$select);
        if(mysqli_num_rows($query) > 0){
            session_start();
            $_SESSION['username'] = $username;
            header("location:chat");
        }

    }

?>
            <div class="col-lg-6 border login-form">
                <h2 class="lead padding-1 ">Login</h2> <br>
                <form method="POST">
                    <div class="form-group text-left">
                        <label for="uname">Username: </label>
                        <input type="text" name="username1" id="username1" class="form-control"></div>
                    <div class="form-group text-left">
                        <label for="pwd">Password</label>
                        <input type="text" name="password1" id="password1" class="form-control">
                    </div>

                    <input type="submit" value="Log in" id="submit-log" name="submit-log" class="btn btn-success btn-lg">
                </form>
            </div>
        <!-- <script>
            $('#reg-form').submit(function(e){
                e.preventDefault();
                var form = $(this);
                var url = "register.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data){
                        alert(data);
                    }
                });
            });
        </script> -->

        <?php 
    if(isset($_POST['submit-reg']))
    {
        $username = $_POST['username2'];
        $password = $_POST['password2'];
        $email = $_POST['email'];

        $q = "INSERT INTO users(username, password, email)
                VALUES('".$username."', '".$password."','".$email."')";
        $q2 = "SELECT username from users where username = '".$username."'";
        if(mysqli_num_rows(mysqli_query($conn, $q2)) == 0){
        if(mysqli_query($conn,$q)){
            echo "Successully registered";
        }
    }
    else{
        echo "username taken";
    }
    }

?>

            <div class="col-lg-6 border reg-form">
                <h2 class="lead padding-1 ">Register</h2> <br>
                <form method="POST" id="reg-form">
                    <div class="form-group text-left">
                        <label for="uname">Username: </label>
                        <input type="text" name="username2" id="username2" class="form-control"></div>
                    <div class="form-group text-left">
                        <label for="pwd">Password</label>
                        <input type="text" name="password2" id="password2" class="form-control">
                    </div>
                    <div class="form-group text-left">
                        <label for="pwd">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>

                    <input type="submit" name="submit-reg" id="submit-reg"value="Register" class="btn btn-success btn-lg">
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>