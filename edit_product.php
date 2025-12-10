<?php
session_start();
if(!isset($_SESSION["user_login"])){
    header("location:Adminlogin.html");
    exit();
}
include("./DBconnection.php");

$id = intval($_GET['id']);
$product_sql = "SELECT * FROM shop_items WHERE id='$id'";
$product_res = mysqli_query($conn, $product_sql);
$product = mysqli_fetch_assoc($product_res);

if (!$product) {
    echo "<script>alert('Product not found'); window.location.href='admin_dashboard.php';</script>";
    exit();
}

// Handle form submission
if (isset($_POST['update_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);

    $update_sql = "UPDATE shop_items SET item_name='$name', category='$category', price='$price', stock='$stock' WHERE id='$id'";
    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Product updated successfully'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to update product'); window.location.href='admin_dashboard.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 80px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            color: rgb(161, 30, 56);
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 15px;
            color: #333;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        button {
            margin-top: 25px;
            width: 100%;
            background-color: rgb(161, 30, 56);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #8b0705;
        }

        .fa-save {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        <form method="POST">
            <label>Item Name:</label>
            <input type="text" name="item_name" value="<?php echo htmlspecialchars($product['item_name']); ?>" required>

            <label>Category:</label>
            <input type="text" name="category" value="<?php echo htmlspecialchars($product['category']); ?>" required>

            <label>Price:</label>
            <input type="number" name="price" value="<?php echo $product['price']; ?>" step="0.01" required>

            <label>Stock:</label>
            <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required>

            <button type="submit" name="update_product">
                <i class="fa-solid fa-save"></i> Update Product
            </button>
        </form>
    </div>
</body>
</html>
