<?php
include("./DBconnection.php");
 // ✅ Make sure this connects to your database

if (isset($_POST["submit"])) {
    // Get form data safely
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Insert into database
    $query = "INSERT INTO feedback (name, email, subject, message) 
              VALUES ('$name', '$email', '$subject', '$message')";
              $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Thank you for your feedback! 💖'); window.location.href='Homeloged.php';</script>";
    } 
}
?>
