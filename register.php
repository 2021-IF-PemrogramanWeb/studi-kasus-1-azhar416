<?php
require './function/function.php';

if (isset($_POST["register"]))
{
    if ( regis($_POST) > 0 )
    {
        echo "<script>alert('Registration Success')</script>";
    }
    else
    {
        echo mysqli_error($conn);
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/styleregis.css">

    <title>REGIS</title>
</head>

<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
        </div>
        <h3 class="text-whitesmoke">REGISTER</h3>
        <div class="container-content">
            <form class="margin-t" action="" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="confpassword" class="form-control" placeholder="Confirm Password" required="">
                </div>
                <button type="submit" name="register" class="form-button button-l margin-b">Sign UP</button>

                <p class="text-whitesmoke text-center"><small>Already have an account? <a class="text-darkyellow" href="./login.php"><small>Log In</small></a> </small></p>

            </form>
        </div>
    </div>
</body>

</html>