<?php
session_start();
include ("./DBconnection.php");
if (isset($_POST["login-button"])){
    $email=$_POST['username'];
    $password=md5($_POST['password']);
    $query="SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0){
        $_SESSION["user_login"]=$email;
        $row = mysqli_fetch_assoc($result);
        $_SESSION["name"] = $row["name"];
        header("location: admin_dashboard.php");

    } else {
        echo "<script>alert('Login Failed'); window.location.href='Adminlogin.html';</script>";
    }
    

}
?>