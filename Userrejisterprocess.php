<?php
include("./DBconnection.php");
if(isset($_POST["submit"])){
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    $phone=$_POST["phone"];
    $query="INSERT INTO users(firstname,lastname,email,password,phone,address) VALUES('$firstname','$lastname','$email','$password','$phone','$address')";
    $result=mysqli_query($conn,$query);
   if($result){
       session_start();
       $_SESSION['email'] = $email;
       echo "<script>alert('You have registered successfully'); window.location.href='Homeloged.php';</script>";
    } else {
        echo "<script>alert('Registration Failed'); window.location.href='Userrejister.php';</script>";
    }

}





?>