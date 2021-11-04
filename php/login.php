<?php

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "admin" && $password == "12345")
{
    header('location:../page/table_page.php');
}
else
{
    header('location:../page/index.php');
}
