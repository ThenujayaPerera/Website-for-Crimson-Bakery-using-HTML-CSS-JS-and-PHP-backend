<?php
include("./DBconnection.php");
session_start();

if(!isset($_SESSION["userlogin"])) {
    header("Location: LOGIN.HTML");
    exit();
}

$email = $_SESSION["userlogin"];
$user_query = "SELECT user_id FROM users WHERE email='$email'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);
$user_id = $user["user_id"];

$item_id = $_POST["item_id"];
$action = $_POST["action"];

// Get current quantity
$get_quantity_query = "SELECT quantity FROM cart WHERE user_id='$user_id' AND item_id='$item_id'";
$result = mysqli_query($conn, $get_quantity_query);
$row = mysqli_fetch_assoc($result);
$current_qty = $row["quantity"];

if ($action == "increase") {
    $new_qty = $current_qty + 1;
} elseif ($action == "decrease") {
    $new_qty = max(1, $current_qty - 1); // prevent going below 1
}

// Update quantity in DB
$update_query = "UPDATE cart SET quantity='$new_qty' WHERE user_id='$user_id' AND item_id='$item_id'";
mysqli_query($conn, $update_query);

// Redirect back to cart
header("Location: cart.php");
exit();
?>
