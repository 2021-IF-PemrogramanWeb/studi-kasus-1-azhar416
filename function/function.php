<?php
$conn = mysqli_connect("localhost", "root", "", "employees");
// $conn = mysqli_connect("localhost", "id17884817_root", "Kiki4t4tk4k1!", "id17884817_azhar416");

function regis($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confpassword = mysqli_real_escape_string($conn, $data["confpassword"]);
    
    $result = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");
    if (mysqli_fetch_assoc($result))
    {
        echo "<script>alert('Username Telah Dipakai')</script>";
        return false;
    }

    if ($password !== $confpassword)
    {
        echo "<script>alert('Konfirmasi Password Tidak Sesuai')</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO login VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

?>