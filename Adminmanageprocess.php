<?php
include("./Dbconnection.php");
session_start();
if(!isset($_SESSION["user_login"])){
    header("location:Adminlogin.html");
    exit();
}
if(isset($_POST["add_admin"])){
    $name=$_POST["full_name"];
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    $role=$_POST["role"];
    $address=$_POST["address"];
    $query="INSERT INTO admin (name,email,PASSWORD,role,address) 
            VALUES ('$name','$email','$password','$role','$address')";
    $result=mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('New admin added successfully'); window.location.href='Adminmanage.php';</script>";
    } else {
        echo "<script>alert('Failed to add new admin'); window.location.href='Adminmanage.php';</script>";
    }
}
if (isset($_POST["delete_admin"])){
    $id=$_POST["delete_admin"];
    $query="DELETE FROM admin WHERE id='$id'";
    $result=mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Admin deleted successfully'); window.location.href='Adminmanage.php';</script>";
    } else {
        echo "<script>alert('Failed to delete admin'); window.location.href='Adminmanage.php';</script>";

}
}



if (isset($_POST["edit_admin"])){
    $id = $_POST["edit_admin"];
    
    // Get all potential fields. Using a null coalescing operator or checking isset/empty is crucial
    // if these fields might not be present in the POST data, but for an 'edit' form, they usually are.
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    $role = $_POST["role"];
    $address = $_POST["address"];
    $password_raw = $_POST["password"]; 

    // --- Start Building the SET Clause ---
    $update_fields = [];

    // 1. Handle Password (needs MD5 hashing and is optional)
    if (!empty($password_raw)) {
        $password_hashed = md5($password_raw);
        $update_fields[] = "password='$password_hashed'";
    }
    
    // 2. Handle other fields (check if they are non-empty for update)
    // NOTE: This logic assumes an empty value means "don't update."
    // If you need to allow fields to be cleared/set to empty string, adjust this logic.
    if (!empty($name)) {
        $update_fields[] = "name='$name'";
    }
    if (!empty($email)) {
        $update_fields[] = "email='$email'";
    }
    if (!empty($role)) {
        $update_fields[] = "role='$role'";
    }
    if (!empty($address)) {
        $update_fields[] = "address='$address'";
    }

    // --- Execute the Query ---
    if (count($update_fields) > 0) {
        $set_clause = implode(", ", $update_fields);
        
        // Final combined query
        $query = "UPDATE admin SET " . $set_clause . " WHERE id='$id'";
        
        $result = mysqli_query($conn, $query);
        
        // Check for success: $result must be true AND the number of affected rows must be 0 or more
        // (0 affected rows means the update succeeded but no data was changed)
        if($result && mysqli_affected_rows($conn) >= 0){ 
            echo "<script>alert('Admin details updated successfully'); window.location.href='Adminmanage.php';</script>";
        } else {
            // Include an error message for debugging
            echo "<script>alert('Failed to update admin details. MySQL Error: " . mysqli_error($conn) . "'); window.location.href='Adminmanage.php';</script>";
        }
    } else {
        // Handle case where no fields were provided for update
        echo "<script>alert('No changes detected for update'); window.location.href='Adminmanage.php';</script>";
    }







    if (isset($_POST["edit_admin"])){
         $id=$_POST["edit_admin"];
          $name=$_POST["name"]; 
          $email=$_POST["email"]; 
          $role=$_POST["role"]; 
          $address=$_POST["address"]; 
          $password=md5($_POST["password"]);
           if($password!=null){ 
            $query= "UPDATE admin SET password='$password' WHERE id='$id'";
            $result=mysqli_query($conn,$query);
             } 
             if($name!=null){ 
                $query="UPDATE admin SET name='$name' WHERE id='$id'"; 
                $result=mysqli_query($conn,$query); 
                } 
            if($email!=null){ 
                $query="UPDATE admin SET email='$email' WHERE id='$id'";
             $result=mysqli_query($conn,$query); }
              if($role!=null){ 
                $query="UPDATE admin SET role='$role' WHERE id='$id'"; 
              $result=mysqli_query($conn,$query); } 
              if($address!=null){
                 $query="UPDATE admin SET address='$address' WHERE id='$id'"; 
              $result=mysqli_query($conn,$query); } 
              if($result){ 
                echo "<script>alert('Admin details updated successfully'); window.location.href='Adminmanage.php';</script>"; }

                 else {
                     echo "<script>alert('Failed to update admin details'); window.location.href='Adminmanage.php';</script>"; }
                  } 
                  
                }
                ?>
                  