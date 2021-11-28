<?php
require './function/function.php';
session_start();

function error($message)
{
    // Display the alert box 
    echo "<script>alert('$message')</script>";
}

if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) )
{
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM login WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if ($key === hash('sha256', $row['username']) )
    {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header('location: ./page/table_page.php');
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1)
    {
        $row = mysqli_fetch_assoc($result);
        
        if ( password_verify($password, $row["password"]) )
        {
            $_SESSION["login"] = true;
        
            if (isset($_POST['remember']))
            {
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $username), time() + 60);
            }
        
            header('location: ./page/table_page.php');
            exit;
        }
        else
        {
            error("Username atau Password Salah!");
            $error = 1;
        }
    }
    else
    {
        error("Username atau Password Salah!");
        $error = 1;
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
    <link rel="stylesheet" href="./css/stylelogin.css">

    <title>LOGIN</title>
</head>

<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Log In</h3>
        <div class="container-content">
            <form class="margin-t" action="" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" style="color: white">Remember Me</label>
                </div>
                <button type="submit" name="login" class="form-button button-l margin-b">Log In</button>

                <p class="text-whitesmoke text-center"><small>Do not have an account? <a class="text-darkyellow" href="./register.php"><small>Register</small></a> </small></p>

            </form>
        </div>
    </div>
</body>

</html>