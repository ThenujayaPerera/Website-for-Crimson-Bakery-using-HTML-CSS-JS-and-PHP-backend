<?php
session_start();
include("./DBconnection.php");


if(!isset($_SESSION["userlogin"])) {
    echo "<script>alert('Login First'); window.location.href='Userlogin.php';</script>";
    
    exit();
}

$user_email = $_SESSION["userlogin"];
$user_query = "SELECT user_id FROM users WHERE email='$user_email'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);
$user_id = $user["user_id"];
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crimson Bakery - Shopping Cart</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>

* { box-sizing:border-box; margin:0; padding:0; font-family: Arial, sans-serif; }
body { background:#f4f4f4;
    background-image: url("Backimage.png"); 
    background-repeat: repeat; 
   background-position: center;
 }


.bar { height:120px;
     background-color:rgb(161,30,56); 
     display:flex; 
     align-items:center; 
     justify-content:space-between; 
     padding:0 20px; 
     border-radius:5px; 
    }
.logo img { width:200px;
     max-width:50vw; 
    }
.cart-page-content { max-width:1200px; 
    margin:50px auto 50px; 
    padding:0 20px;
 }
.cart-page-content h1 { text-align:center; 
    color:rgb(161,30,56);
     margin-bottom:30px; 
     font-size:2rem;
     }


.cart-container { display:flex; 
    gap:20px; flex-wrap:wrap;
 }


.cart-items { flex:2; 
    background:#fff; 
    padding:20px; 
    border-radius:8px; 
    box-shadow:0 4px 8px rgba(0,0,0,0.05); 
}
.cart-item { display:flex; 
    flex-wrap:wrap; 
    align-items:center; 
    justify-content:space-between; 
    margin-bottom:15px; 
    padding-bottom:15px; 
    border-bottom:1px solid #eee; 
}
.item-image img { width:80px;
     height:80px; 
     object-fit:cover;
      border-radius:4px;
       margin-right:15px;
     }
.item-details { flex:1;
     min-width:150px;
      margin-right:15px;
     }
.item-details h3 { margin-bottom:5px;
     font-size:1rem; 
     color:#333; 
    }
.item-details p { font-weight:bold; 
    color:rgb(161,30,56);
 }
.item-quantity { display:flex; 
    align-items:center; 
    gap:10px; 
    margin-right:10px; 
}
.item-quantity-input { width:50px;
     padding:5px;
      border-radius:4px;
      border:1px solid #ccc;
       text-align:center; 
    }
.remove-item-btn { 
    background:transparent;
     border:none; 
     color:rgb(161,30,56);
      cursor:pointer;
       font-size:1.2em; 
    }

/* Cart Summary */
.cart-summary { flex:1; 
    background:#fff; 
    padding:20px; 
    border-radius:8px; 
    box-shadow:0 4px 8px rgba(0,0,0,0.05); 
    height:max-content; 
}
.cart-summary h2 { margin-bottom:15px;
     color:rgb(161,30,56);
     }
.summary-details div { display:flex; 
    justify-content:space-between; 
    margin-bottom:10px; 
    font-size:1rem; 
}
.summary-details .total { font-weight:bold;
     border-top:2px solid rgb(161,30,56);
      padding-top:10px;
       margin-top:10px; 
       color:rgb(161,30,56); 
       font-size:1.1rem;
     }
.checkout-btn { 
    width:100%; 
    padding:12px; 
    background-color:rgb(161,30,56); 
    color:white; border:none; 
    border-radius:4px; 
    cursor:pointer;
     font-weight:bold; 
     margin-top:15px;
     }
.checkout-btn:hover {
     background-color:#8b0705; 
    }

/* Payment Form */
#payment-form-container { 
    display:none;
     margin-top:20px; 
     background:#fff;
      padding:20px; 
      border-radius:8px; 
      box-shadow:0 4px 8px rgba(0,0,0,0.05);
     }
#payment-form-container h2 { 
    text-align:center;
     margin-bottom:20px; color:rgb(161,30,56); }
#payment-form {
    display: flex;
    flex-direction: column;
    align-items: center; /* centers children horizontally */
}

#payment-form input {
    width: 600px;
    max-width: 100%;  /* responsive: will shrink on small screens */
    padding: 8px;
    margin-bottom: 15px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.item-quantity {
    display: flex;
    align-items: center;
    gap: 10px;
}

.qty-btn {
    background-color: #ff6b6b;
    border: none;
    color: white;
    font-size: 18px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    cursor: pointer;
}

.qty-btn:hover {
    background-color: #e74c3c;
}

.quantity-value {
    font-weight: bold;
    font-size: 16px;
    min-width: 20px;
    text-align: center;
    display: inline-block;
}

.payment-btn {
     width:100%;
    max-width: 400px; 
    padding:12px; 
    background-color:rgb(161,30,56); 
    color:white; border:none; 
    border-radius:4px; 
    cursor:pointer; 
    font-weight:bold; }
.payment-btn:hover {
     background-color:#8b0705; 
}


#confirmation-message { 
    display:none; 
    text-align:center;
     padding:30px; 
     background:#e8f5e9; 
     border:2px solid #4CAF50; 
     color:#4CAF50; 
     border-radius:8px; 
     margin-top:20px;
     }


@media(max-width:900px) {
    .cart-container { flex-direction:column; }
    .cart-summary { width:100%; }
    .cart-item { flex-direction:column; align-items:flex-start; }
    .item-quantity { margin:10px 0; }
    .header-links { justify-content:center; }
    .bar { flex-direction:column; height:auto; padding:15px; gap:10px; }
    .logo img { margin-bottom:10px; }


    
}

.header-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px; 
    margin-bottom: 10px;
}

.header-links a {
    color: rgb(255, 255, 255);
    text-decoration: none;
    font-size: 14px; 
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.header-links a:hover {
    color: #410d0c;
    background-color: #fbbaba;
}
</style>
</head>
<body>

<div class="bar">
    <div class="logo"><a href="Homeloged.php"><img src="logo.jpg" alt="Crimson Bakery Logo"></a></div>
    <div class="header-links">
        <a href="Homeloged.php" >Home</a>
        <a href="Homeloged.php#about">About Us</a>
        <a href="Homeloged.php#contact"><i class="fa-solid fa-phone"></i> Contact Us</a>
    </div>
</div>

<div class="cart-page-content">
    <h1>Your Shopping Cart</h1>
    <div class="cart-container">
        <div class="cart-items" id="cart-items">
        <?php
        $total=0;
         $subtotal= 0;
        $total_amount= 0;
        $cart_query = "SELECT * FROM cart WHERE user_id='$user_id'";
        $cart_result = mysqli_query($conn, $cart_query);
        

        if(mysqli_num_rows($cart_result) == 0){
            echo '<p>Your cart is empty. <a href="Homeloged.php">Start shopping now!</a></p>';
        }
        else{

        while($row = mysqli_fetch_array($cart_result)){
            $item_id = $row['item_id'];
            $quantity = $row['quantity'];
            $item_query = "SELECT * FROM shop_items WHERE id=$item_id";
            $item_result = mysqli_query($conn, $item_query);
            $item = mysqli_fetch_array($item_result);
            
            $total= $item["price"] * $quantity;
            $subtotal += $total;
            $total_amount = $subtotal + 500; 

            echo '<div class="cart-item" data-price="'.$item['price'].'">
                    <div class="item-image"><img src="'.htmlspecialchars($item['image_path']).'" alt="'.htmlspecialchars($item['item_name']).'"></div>
                    <div class="item-details">
                        <h3>'.htmlspecialchars($item['item_name']).'</h3>
                        <p>Price: RS '.$item['price'].'.00</p>
                    </div>
                    <div class="item-quantity">
                    <form action="updateQuantity.php" method="POST" class="quantity-form">
                
                <input type="hidden" name="item_id" value="'.$item_id.'">
                <button type="submit" name="action" value="decrease" class="qty-btn">-</button>
                <span class="quantity-value">'.$quantity.'</span>
                <button type="submit" name="action" value="increase" class="qty-btn">+</button>
            </form>
                        
                        
                    </div>
                    <form action="Cartadd.php" method="POST">
                        <button type="submit" class="remove-item-btn" name="remove_item" value="'.$item_id.'"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>';
        }
       echo'<div class="cart-summary">
    <h2>Order Summary</h2>
    

    <div class="summary-details">
        <div><span>Total</span><span>RS '.$subtotal.'</span></div>
        <div><span>Shipping</span><span>RS 500</span></div>
        <div class="total"><span>Subtotal</span><span>RS '.$total_amount.'</span></div>
    </div>

    
        <button type="submit" class="checkout-btn" name="checkout">Proceed to Checkout</button>
    
</div> ';
       
    }
    ?>
        
        </div>

        

    </div>
</div>
<div id="payment-form-container">
    <h2>Payment & Delivery Details</h2>
    <form id="payment-form" action="Cartadd.php" method="POST">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="credit_card" placeholder="Credit Card Number" required>
        <input type="text" name="expiry" placeholder="Expiry MM/YY" required>
        <input type="text" name="cvc" placeholder="CVC" required>
         <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
        <button type="submit" name="payment-details" class="payment-btn">Confirm Payment</button>
    </form>
</div>



<script>
document.addEventListener('DOMContentLoaded', () => {
    const checkoutBtn = document.querySelector('.checkout-btn');
    const paymentFormContainer = document.getElementById('payment-form-container');
    const cartContainer = document.querySelector('.cart-container');

    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', (e) => {
            e.preventDefault(); // prevent form submission or reload
            cartContainer.style.display = 'none';
            paymentFormContainer.style.display = 'block';
        });
    }
});
</script>



</body>
</html>
