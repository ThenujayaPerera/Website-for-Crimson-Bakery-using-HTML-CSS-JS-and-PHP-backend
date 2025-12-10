<?php
session_start();
if(!isset($_SESSION["user_login"])){
    header("location:Adminlogin.html");
    exit();
    
}
if(isset($_POST["logout"])){
    session_destroy();
    header("Location:Adminlogin.html");
    exit();
}
$name = $_SESSION["name"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crimson Bakery - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css">
    <style>
        
        
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    background-image: url("Backimage.png"); 
    background-repeat: repeat;
    background-position: center;
}

/* NAVIGATION BAR  */
.bar {
    height: 100px;
    background-color: rgb(161, 30, 56);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
}

.logo img {
    margin-left:75px;
    width: 220px;
    height: auto;
}

.header-links {
    display: flex;
    align-items: center;
    gap: 25px;
}

.header-links a, 
.header-links button {
    color: white;
    background: none;
    border: none;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    transition: color 0.3s;
}

.header-links a:hover,
.header-links button:hover {
    color: #fbbaba;
}

/* Welcome text (left side) */
.welcome-text {
    color: white;
    font-weight: bold;
    font-size: 16px;
}

/* main content */
.admin-main-content {
    padding-top: 120px;
    display: flex;
    justify-content: center;
    min-height: 100vh;
}

.content-area {
    width: 100%;
    max-width: 1200px;
    padding: 0 20px 40px 20px;
}

/* dashboard cards */
.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
    gap: 20px;
}

.dashboard-card {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.dashboard-card h3 {
    color: #8b0705;
    margin-top: 0;
}

.dashboard-card p {
    font-size: 30px;
    font-weight: bold;
    color: rgb(161, 30, 56);
}

/* section headers */
.section-header {
    color: rgb(161, 30, 56);
    border-bottom: 3px solid #fbbaba;
    padding-bottom: 10px;
    margin: 40px 0 20px 0;
}

/* table styling */
.data-table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    border-radius: 8px;
    overflow: hidden;
    font-size: 14px;
}

.data-table th, .data-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    word-wrap: break-word;
}

.data-table th {
    background-color: rgb(161, 30, 56);
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

.data-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.data-table tr:hover {
    background-color: #f1f1f1;
}

/* button */
.action-button {
    padding: 6px 12px;
    margin: 2px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 13px;
    transition: background-color 0.3s;
}

.edit-btn {
    background-color: #b92828ff;
    color: white;
}

.edit-btn:hover {
    background-color: #8b0705;
}

.delete-btn {
    background-color: #d23327ff;
    color: white;
}

.delete-btn:hover {
    background-color: #8b0705;
}

.add-new-btn {
    background-color: rgb(161, 30, 56);
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    display: inline-block;
    text-decoration: none;
    font-weight: bold;
}

.add-new-btn:hover {
    background-color: #8b0705;
}

/* media queries */
@media (max-width: 1024px) {
    .bar {
        height: auto;
        flex-direction: column;
        align-items: center;
        padding: 10px;
    }

    .header-links {
        margin-top: 5px;
        gap: 15px;
    }

    .logo img {
        width: 180px;
    }
}

@media (max-width: 768px) {
    .dashboard-card p {
        font-size: 24px;
    }

    .data-table th, .data-table td {
        padding: 8px;
        font-size: 12px;
    }

    .action-button {
        padding: 4px 8px;
        font-size: 12px;
    }
}

@media (max-width: 600px) {
    .bar {
        padding: 8px;
    }

    .header-links {
        flex-direction: column;
        gap: 8px;
        text-align: center;
    }

    .welcome-text {
        font-size: 14px;
    }

    .data-table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    .add-new-btn {
        display: block;
        width: 100%;
        text-align: center;
        margin-top: 10px;
    }
}

        
    </style>
</head>
<body>
    <div class="container">
        <div class="bar">
            <div class="logo"><a href="Homeloged.php">
                <img src="img/logo.jpg" alt="Crimson Bakery Admin Logo"></a>
            </div>
            <div class="header-links">
                <a href="Adminmanage.php"><i class="fa-solid fa-cog"></i>Admin</a>
                
                <form method="post" style="display:inline;">
    <button type="submit" name="logout" 
        style="background:none; border:none; color:white; font-weight:bold; cursor:pointer;">
        <i class="fa-solid fa-sign-out-alt"></i> Logout
    </button>
</form>

            </div>
            
            <div style="position:absolute; top:35px; left:20px; color:white; font-weight:bold; font-size:16px;">
                Welcome, <?php echo htmlspecialchars($name); ?>
            </div>
        </div>
    </div>

    <div class="admin-main-content">
        
        <div class="content-area">
            <section id="dashboard">
    <h1 class="section-header">Dashboard</h1>

    <?php
    include("./DBconnection.php");

    // ✅ Total Products
    $product_query = "SELECT COUNT(*) AS total_products FROM shop_items";
    $product_result = mysqli_fetch_assoc(mysqli_query($conn, $product_query));
    $total_products = $product_result['total_products'];

    // ✅ Pending Orders (placed within last hour)
    $pending_query = "SELECT COUNT(*) AS pending_orders 
                      FROM orders 
                      WHERE order_status='Pending' 
                      AND order_date >= NOW() - INTERVAL 1 HOUR";
    $pending_result = mysqli_fetch_assoc(mysqli_query($conn, $pending_query));
    $pending_orders = $pending_result['pending_orders'];

    // ✅ New Customers (created within 7 days)
    $new_customers_query = "SELECT COUNT(*) AS new_customers 
                            FROM users 
                            WHERE created_at >= NOW() - INTERVAL 7 DAY";
    $new_customers_result = mysqli_fetch_assoc(mysqli_query($conn, $new_customers_query));
    $new_customers = $new_customers_result['new_customers'];

    // ✅ Total Revenue
    $revenue_query = "SELECT IFNULL(SUM(total_amount),0) AS total_revenue FROM orders";
    $revenue_result = mysqli_fetch_assoc(mysqli_query($conn, $revenue_query));
    $total_revenue = $revenue_result['total_revenue'];
    ?>

    <div class="card-container">
        <div class="dashboard-card" style="flex: 1;">
            <h3>Total Products</h3>
            <p><?php echo $total_products; ?></p>
        </div>
        <div class="dashboard-card" style="flex: 1;">
            <h3>Pending Orders (Last Hour)</h3>
            <p><?php echo $pending_orders; ?></p>
        </div>
        <div class="dashboard-card" style="flex: 1;">
            <h3>New Customers (7 Days)</h3>
            <p><?php echo $new_customers; ?></p>
        </div>
        <div class="dashboard-card" style="flex: 1;">
            <h3>Total Revenue</h3>
            <p>Rs <?php echo number_format($total_revenue, 2); ?></p>
        </div>
    </div>
</section>
<section id="products" style="margin-top: 40px;">
    <h1 class="section-header">Products Management</h1>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Price (Rs)</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
<?php
$product_sql = "SELECT * FROM shop_items";
$product_res = mysqli_query($conn, $product_sql);
while ($product = mysqli_fetch_assoc($product_res)) {
    echo "<tr>
        <td>{$product['id']}</td>
        <td>{$product['item_name']}</td>
        <td>{$product['category']}</td>
        <td>{$product['price']}</td>
        <td>{$product['stock']}</td>
        <td>
            <form method='POST' action='product_process.php' style='display:inline;'>
                <button class='action-button edit-btn' name='edit_product' value='{$product['id']}' type='submit'>
                    <i class='fa-solid fa-edit'></i> Edit
                </button>
                <button class='action-button delete-btn' name='delete_product' value='{$product['id']}' type='submit' onclick=\"return confirm('Delete this product?');\">
                    <i class='fa-solid fa-trash-alt'></i> Delete
                </button>
            </form>
        </td>
    </tr>";
}
?>
<tr class="new-product-row">
    <form method="POST" action="product_process.php">
        <td>-</td>
        <td><input type="text" name="item_name" placeholder="Item Name" required></td>
        <td><input type="text" name="category" placeholder="Category" required></td>
        <td><input type="number" name="price" placeholder="Price" step="0.01" required></td>
        <td><input type="number" name="stock" placeholder="Stock" required></td>
        <td>
            <button class="action-button add-new-btn" type="submit" name="add_product">
                <i class="fa-solid fa-plus"></i> Add New
            </button>
        </td>
    </form>
</tr>
</tbody>


    </table>
</section>
<section id="orders" style="margin-top: 40px;">
    <h1 class="section-header">Orders Management</h1>
    <table class="data-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total</th>
                <th>Items (with Quantity)</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $order_sql = "
    SELECT 
        o.*, 
        CONCAT(u.firstname, ' ', u.lastname) AS name, 
        u.email, 
        u.phone 
    FROM orders o
    JOIN users u ON o.user_id = u.user_id
";
            $order_res = mysqli_query($conn, $order_sql);
            
            while ($order = mysqli_fetch_assoc($order_res)) {
                $order_id = $order['order_id'];
                
                // Get items for this order
                $items_sql = "SELECT s.item_name, oi.quantity 
                              FROM order_items oi
                              JOIN shop_items s ON oi.item_id = s.id
                              WHERE oi.order_id = '$order_id'";
                $items_res = mysqli_query($conn, $items_sql);
                $item_details = "";
                while ($it = mysqli_fetch_assoc($items_res)) {
                    $item_details .= htmlspecialchars($it['item_name']) . " (x" . $it['quantity'] . "), ";
                }
                $item_details = rtrim($item_details, ', ');
                
                echo "<tr>
                    <td>#{$order['order_id']}</td>
                    <td>{$order['name']}</td>
                    <td>{$order['order_date']}</td>
                    <td>Rs {$order['total_amount']}</td>
                    <td>{$item_details}</td>
                    <td><span style='font-weight:bold;color:".($order['order_status']=='Pending'?'orange':($order['order_status']=='Delivered'?'green':'red')).";'>{$order['order_status']}</span></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</section>
<section id="feedback" style="margin-top:40px;">
    <h1 class="section-header">Customer Feedback</h1>
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fb_sql = "SELECT * FROM feedback ORDER BY submitted_at DESC";
            $fb_res = mysqli_query($conn, $fb_sql);
            while ($fb = mysqli_fetch_assoc($fb_res)) {
                echo "<tr>
                    <td>{$fb['feedback_id']}</td>
                    <td>".htmlspecialchars($fb['name'])."</td>
                    <td>".htmlspecialchars($fb['email'])."</td>
                    <td>".htmlspecialchars($fb['subject'])."</td>
                    <td>".htmlspecialchars($fb['message'])."</td>
                    <td>{$fb['submitted_at']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</section>

            

        </div>
    </div>

    </body>
</html>