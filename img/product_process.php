<?php
session_start();
if(!isset($_SESSION["user_login"])){
    header("location:Adminlogin.html");
    exit();
}

include("./DBconnection.php");

// --- ADD NEW PRODUCT ---
if (isset($_POST["add_product"])) {
    $name = mysqli_real_escape_string($conn, $_POST["item_name"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $price = floatval($_POST["price"]);
    $stock = intval($_POST["stock"]);

    $query = "INSERT INTO shop_items (item_name, category, price, stock) 
              VALUES ('$name', '$category', '$price', '$stock')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product added successfully'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to add product'); window.location.href='admin_dashboard.php';</script>";
    }
}

// --- DELETE PRODUCT ---
if (isset($_POST["delete_product"])) {
    $id = intval($_POST["delete_product"]);
    $query = "DELETE FROM shop_items WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product deleted successfully'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to delete product'); window.location.href='admin_dashboard.php';</script>";
    }
}

// --- EDIT PRODUCT ---
if (isset($_POST["edit_product"])) {
    $id = intval($_POST["edit_product"]);
    // Redirect to an edit page with the product id
    header("Location: edit_product.php?id=$id");
    exit();
}
?>
