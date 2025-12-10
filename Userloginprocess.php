<?php
session_start();
include ("./DBconnection.php");
if (isset($_POST["login-button"])){
    $email=$_POST['Email'];
    $password=md5($_POST['password']);
    $query="SELECT * FROM users WHERE Email='$email' AND password='$password'";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0){
        $_SESSION["userlogin"]=$email;
        $row = mysqli_fetch_assoc($result);
        $_SESSION["name"] = $row["firstname"];
        header("location:Homeloged.php");

    } else {
        echo "<script>alert('Login Failed'); window.location.href='Userlogin.php';</script>";
    }
    

}
?>