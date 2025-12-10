<?php
session_start();
include("./DBconnection.php");


if (!isset($_SESSION["userlogin"])) {
    echo "<script>alert('Please log in first!'); window.location.href='Userlogin.php';</script>";
    exit();
}

if (isset($_POST['submit'])) {
    $item_id = $_POST['submit'];
    $user_email = $_SESSION["userlogin"];

    
    $user_query = "SELECT user_id FROM users WHERE email='$user_email'";
    $user_result = mysqli_query($conn, $user_query);
    $user = mysqli_fetch_assoc($user_result);
    $user_id = $user["user_id"];

    
    $check = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id' AND item_id='$item_id'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Item already in your cart!'); window.location.href='Homeloged.php';</script>";
    } else {
        $query = "INSERT INTO cart (user_id, item_id) VALUES ('$user_id', '$item_id')";
        mysqli_query($conn, $query);
        echo "<script>alert('Item added to cart!'); window.location.href='Homeloged.php';</script>";
    }

}

if (isset($_POST["remove_item"])) {
    $item_id = $_POST["remove_item"];
    $user_email = $_SESSION["userlogin"];

    
    $user_query = "SELECT user_id FROM users WHERE email='$user_email'";
    $user_result = mysqli_query($conn, $user_query);
    $user = mysqli_fetch_assoc($user_result);
    $user_id = $user["user_id"];

    
    $remove_query = "DELETE FROM cart WHERE user_id='$user_id' AND item_id='$item_id'";
    mysqli_query($conn, $remove_query);
    echo "<script>alert('Item removed from cart!'); window.location.href='Cart.php';</script>";
}

if (isset($_POST["payment-details"])) {
    $user_email = $_SESSION["userlogin"];
    $user_query = "SELECT user_id, phone FROM users WHERE email='$user_email'";
    $user_result = mysqli_query($conn, $user_query);
    $user = mysqli_fetch_assoc($user_result);
    $user_id = $user["user_id"];
    $phone = $user["phone"];

    $name = $_POST["full_name"];
    $address = $_POST["address"];
    $total_amount = $_POST["total_amount"]; 

    
    $query = "INSERT INTO orders (user_id, name, address, phone, total_amount) 
              VALUES ('$user_id', '$name', '$address', '$phone', '$total_amount')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        
        $order_id = mysqli_insert_id($conn);

        
        $query = "INSERT INTO order_items (order_id, item_id, quantity, price)
                  SELECT '$order_id', c.item_id, c.quantity, s.price
                  FROM cart c
                  JOIN shop_items s ON c.item_id = s.id
                  WHERE c.user_id = '$user_id'";
        mysqli_query($conn, $query);

        
        $delete_cart_query = "DELETE FROM cart WHERE user_id='$user_id'";
        mysqli_query($conn, $delete_cart_query);

        echo "<script>alert('Order placed successfully!'); window.location.href='Homeloged.php';</script>";
    } else {
        echo "<script>alert('Error placing order!'); window.location.href='Cart.php';</script>";
    }
}


?>