<?php
session_start();

if(isset($_POST["logout"])){
    session_destroy();
    header("Location:Homeloged.php");
    exit();
}
$name = isset($_SESSION["name"]) ? $_SESSION["name"] : null;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crimson Bakery - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css">
    
<style>

body {
    margin: 0;
    font-family: 'Inter', Arial, sans-serif;
    background-color: #f4f4f4;
    /* Use a better fallback background property for mobile efficiency */
    background-image: url("Backimage.png"); 
    background-repeat: repeat; /* Allows image to tile if needed */
   background-position: center;
    
}

/* Header/Navigation Bar - Switched to fixed positioning for better mobile scrolling */
.bar {
    background-color: rgb(161, 30, 56);
    padding: 10px 5px;
    position: sticky; /* Sticky is better than absolute for scrolling */
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    display: flex;
    flex-direction: column; /* Stack elements vertically on mobile */
    align-items: center;
}

.logo img {
    width: 150px; /* Reduced size for mobile */
    height: auto;
    display: block;
    margin: 0 auto 10px; /* Center logo and add bottom margin */
}

/* Navigation Links - Stacked and centered on mobile */
.header-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px; /* Reduced gap for mobile */
    margin-bottom: 10px;
}

.header-links a {
    color: rgb(255, 255, 255);
    text-decoration: none;
    font-size: 14px; /* Smaller font for mobile */
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.header-links a:hover {
    color: #410d0c;
    background-color: #fbbaba;
}

/* Search Bar - Full width on mobile, centered */
.search-bar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 90%;
    max-width: 400px;
    margin: 0 auto;
    gap: 5px;
}

.search-bar-box input {
    padding: 10px;
    border: 2px solid #bc1010;
    border-radius: 6px;
    font-size: 16px;
    box-shadow: 0 2px 4px rgba(139, 7, 5, 0.2);
    background-color: #eeb8b7fe;
    width: 100%; /* Take full available width */
}

.search-bar-button button {
    padding: 12px 12px;
    background-color: rgb(161, 30, 56);
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
}

.search-bar-button button:hover {
    background-color: #8b0705;
}

/* =======================================================
    MAIN CONTENT FLOW (Removed all absolute positioning based on fixed pixel tops)
    ======================================================= 
*/
.main-content {
    padding-top: 5px;
}

/* Slider - Fluid and centered */
.image-slider {
    position: relative;
    width: 95%; /* Fluid width */
    max-width: 1000px; /* Max size for large screens */
    margin: 20px auto;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    aspect-ratio: 2 / 1; /* Maintains a nice 2:1 aspect ratio */
}

.slide-image {
    display: none;
    width: 100%;
    height: 100%;
}

.slide-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: auto;
    padding: 10px; /* Smaller padding for mobile */
    color: white;
    font-weight: bold;
    font-size: 16px; 
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 10;
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}
.prev {
    left: 0;
    border-radius: 0 3px 3px 0;
}

.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}


.section-header-container {
    margin: 150px 0 20px;
    text-align: center;
}

.shop-by-category h1, .shop h1 {
    color: rgb(161, 30, 56);
    font-weight: 1000;
    font-size: 2em; /* Use em for scaling */
    margin: 0;
}

.shop-by-category1 p {
    color: rgb(161, 30, 56);
    font-weight: bolder;
    font-size: 1.1em;
    margin-top: 5px;
}

/* Category & Item Layout - Use Flexbox for fluid wrapping */
.categories, .items, .items1, .items2, .items3, .items4 {
    display: flex;
    justify-content: center;
    gap: 20px; /* Adjusted gap */
    flex-wrap: wrap;
    padding: 0 10px;
    margin-bottom: 40px;
}

.category, .item {
    background-color: rgb(161, 30, 56);
    max-width: 200px; /* Cap size on large screens */
    height: auto; /* Let content define height */
    padding:  10px;
    padding-bottom: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
}
.categories a {
  text-decoration: none;
  color: black;
}

.category img, .item img {
    width: 100%;
    height: 150px; /* Adjusted height for mobile */
    object-fit: cover;
    border-radius: 5px;
}

.category h3, .item h3, .item .price {
    color: white;
    margin: 5px 0 0;
    font-size: 1em;
}

.category:hover, .item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgb(119, 7, 7);
    cursor: pointer;
    background-color: rgb(134, 10, 35);
}

.item {
    position: relative;
}

.item .cart-icon {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background: white;
    color: rgb(161, 30, 56);
    padding: 8px;
    border-radius: 50%;
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s;
}

.item .cart-icon:hover {
    background: rgb(161, 30, 56);
    color: white;
}

/* Long Images - Fluid and centered */
.long-image1, .long-image2 {
    width: 95%;
    margin: 150px auto;
    display: block;
}
.long-image1 img, .long-image2 img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* About Section - Using Flexbox for layout */
.about {
    width: 90%;
    max-width: 1200px;
    margin: 40px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column; /* Stack image and text vertically on mobile */
    align-items: center;
    text-align: center;
}

.about img {
    width: 100%; /* Full width on mobile */
    max-width: 400px;
    height: auto;
    border-radius: 8px;
    margin-bottom: 20px;
}

.about-content {
    /* Container for title and paragraph */
    text-align: left;
    padding: 0 10px;
}

.about h1 { 
    color: rgb(161, 30, 56); 
    font-weight: bolder;
    font-size: 2em;
    margin-bottom: 10px;
}

.about p {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    text-align: justify; 
    margin: 0;
}

/* Feedback/Contact - Flow naturally */
.feedback, .contact {
    width: 90%;
    max-width: 800px;
    margin: 40px auto;
    background: #fefefe;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
}

.feedback h1, .contact h1 {
    color: rgb(161, 30, 56);
    margin-bottom: 20px;
    font-weight: bolder;
    font-size: 2em;
}

.feedback form {
    max-width: 500px;
    margin: 0 auto;
       
}

.feedbackinput {
  margin-bottom: 15px;
}

.feedbackinput label {
  display: block;
  margin-bottom: 5px;
  color: #b22222;
  font-weight: bold;
}

.feedbackinput input,
.feedbackinput textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.feedbackinput textarea {
  height: 100px;
  resize: vertical;
}

.feedbacksubmit {
  text-align: center;
  margin-top: 15px;
}

.feedbacksubmit button {
  background-color: #b22222;
  color: white;
  border: none;
  padding: 10px 25px;
  border-radius: 5px;
  cursor: pointer;
}

.feedbacksubmit button:hover {
  background-color: #681507f8;
}


/* Footer - Flow naturally at the bottom */
footer {
    background: rgb(161, 30, 56);
    color: white;
    padding: 30px 20px;
    text-align: center;
    width: 100%;
    box-sizing: border-box;
    margin-top: 40px; /* Space above footer */
}


@media (min-width: 768px) {
    
    /* Header (Revert to horizontal layout) */
    .bar {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }
    
    .logo img {
        width: 250px;
        margin: 0;
    }

    .header-links {
        position: absolute;
        top: 10px;
        right: 20px;
        margin: 0;
        gap: 25px;
        font-size: 16px;
    }

    .search-bar {
        position: absolute;
        top: 130px;
        right: 20px;
        width: auto;
        max-width: none;
        margin: 0;
    }

    .image-slider {
        margin-top: 100px; /* Push down content to clear the sticky/fixed header */
    }

    /* Category & Shop Items (3 items per row) */
    .item {
        width: calc(33.333% - 15px); /* 3 items per row on tablet */
    }

    /* About Section (Horizontal layout) */
    .about {
        flex-direction: row;
        text-align: left;
        gap: 30px;
        padding: 40px;
    }
    
    .about img {
        width: 40%;
        max-width: 500px;
        margin-bottom: 0;
    }

    .about-content {
        flex: 1;
    }
}


@media (min-width: 1024px) {
    
    
    
    
    .item {
         width: calc(16.666% - 16px); /* 6 items per row for shop items */
    }
}
.stafflogin{
    text-align: end;
    justify-content: end;
    text-decoration: none;
    font-size: 14px;
}
.stafflogin a {
  color: white;
  text-decoration: none;
  margin-left: 5px;
}
.stafflogin a:hover {
  color: #ccc;
}

.logout-button button {
    background-color: transparent;
    border: none;
    color: rgb(255, 255, 255);
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
    cursor: pointer;
}

.logout-button button:hover {
    color: #410d0c;
    background-color: #fbbaba;
}







</style>
</head>
<body>
    <div class="container">
        <!-- HEADER / NAVIGATION (Sticky/Fixed) -->
        <div class="bar">
            <div class="logo">
                <img src="img/logo.jpg" alt="Crimson Bakery Logo">
            </div>
            <div class="header-links">
                <?php if(isset($_SESSION['userlogin'])): ?>
    <span style="color:white; font-weight:bold; margin-right:10px;">
        Welcome, <?php echo $name; ?>
    </span>
    
                <a href="#about">About Us</a>
                <a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
                <a href="#contact"><i class="fa-solid fa-phone"></i> Contact Us</a>
    <form method="POST" style="display:inline;">
        <div class="logout-button"><button type="submit" name="logout" >Logout</button></div>
    </form>
<?php else: ?>

                <a href="Userlogin.php">Login</a>
                <a href="Userrejister.php">Register</a>
                <a href="#about">About Us</a>
                <a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
                <a href="#contact"><i class="fa-solid fa-phone"></i> Contact Us</a>
                <?php endif; ?>
            </div>
            <div class="search-bar">
                <div class="search-bar-box">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="search-bar-button">
                    <button type="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- Slider -->
        <div class="image-slider">
            <!-- Image URLs are placeholders and need to be valid paths to work -->
            <div class="slide-image fade"><img src="img/choc cake.png"  alt="Chocolate Cake"></div>
            <div class="slide-image fade"><img src="img/orangecalke.png"  alt="Orange Cake"></div>
            <div class="slide-image fade"><img src="img/rice.png"  alt="Rice Pudding"></div>
            <div class="slide-image fade"><img src="img/pizza.png"  alt="Pizza"></div>
            <div class="slide-image fade"><img src="img/stawberrycake.png"  alt="Strawberry Cake"></div>
            <div class="slide-image fade"><img src="img/buns.png"  alt="Buns"></div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        
        <div class="line-2"></div> <!-- Retained for aesthetic separation -->

        <!-- Shop by category -->
        <div class="section-header-container">
            <div class="shop-by-category"><h1>Shop by Category</h1></div>
            <div class="shop-by-category1"><p>Discover your favorites – from fresh brews to sweet treats.</p></div>
        </div>
        
        <div class="categories">
            <a href="#items"><div class="category"><img src="img/type (1).png"  alt="Pastries"><h3>Pastries</h3></div></a>
            <a href="#items"><div class="category"><img src="img/type (2).png"  alt="Cakes"><h3>Cakes</h3></div></a>
            <a href="#items"><div class="category"><img src="img/type (3).png"  alt="Coffee"><h3>Coffee</h3></div></a>
            <a href="#items"><div class="category"><img src="img/type (4).png"  alt="Bread"><h3>Bread</h3></div></a>
            <a href="#items"><div class="category"><img src="img/type (5).png"  alt="Others"><h3>Others</h3></div></a>
        </div>

        <!-- Long image 1 -->
        <div class="long-image1"> 
            <img src="img/long cake.jpg" alt="Promotional Banner 1"> 
        </div>
        
        <div class="line-6"></div> <!-- Retained for aesthetic separation -->

        <!-- Shop -->
        <div class="section-header-container">
            <div class="shop"><h1>Shop</h1></div>
        </div>
        <div class="items" id="items">
        <?php
        include("./DBconnection.php");
        $query="SELECT * FROM shop_items";
        $result=mysqli_query($conn,$query);
        
        while($row=mysqli_fetch_array($result)){
            echo "<div class=\"item\"><img src=\"".$row['image_path']."\"  alt=\"".$row['item_name']."\"><h3>".$row['item_name']."</h3><p class=\"price\">Rs ".$row['price']."</p>";
            echo "<form method=\"POST\" action=\"Cartadd.php\">";
    echo "<button type=\"submit\" name=\"submit\" value=\"".$row['id']."\" style=\"background:none;border:none;cursor:pointer;\">";
    echo "<i class=\"fa-solid fa-cart-plus\" style=\"color:white;font-size:22px;\"></i>";
    echo "</button>";
    echo "</form>";

    echo "</div>";  
        }

         ?>
        </div>
        <!-- Long image 2 -->
        <div class="long-image2"> 
            <img src="img/Cakeslong.jpg"  alt="Promotional Banner 2"> 
        </div>

        <!-- About Us -->
        <section id="about" class="about">
            <img src="img/pexels-zvolskiy-2253643.jpg"  alt="About Us">
            <div class="about-content">
                <h1>About Us</h1>
                <p>Crimson Bakery, part of the LAUGFS Group in Sri Lanka, has become a beloved name in the country’s baking and confectionery industry. From its early beginnings, the bakery has focused on bringing people together through the joy of freshly baked goods prepared with passion and care. Today, Crimson is more than just a bakery – it is a destination where tradition blends seamlessly with innovation to create flavors that customers love and trust. The bakery offers an impressive variety of products including breads, buns, pastries, sandwiches, cakes, and beverages, all made using the finest ingredients and perfected recipes. Each item reflects a commitment to freshness, quality, and taste, making Crimson a favorite choice for daily indulgence as well as special occasions. Whether it’s a quick bite, a family gathering, or a festive celebration, customers know they can rely on Crimson for delicious, comforting treats. Beyond its retail outlets, including the well-known branch in Battaramulla, Crimson also provides catering and custom cake services for weddings, birthdays, and corporate events. With its dedication to excellence and a vision to continually innovate, Crimson Bakery stands as a true symbol of Sri Lankan hospitality and flavor.</p>
            </div>
        </section>

        <!-- Feedback Section -->
        <section id="feedback" class="feedback">
            <h1>Share Your Feedback 💖</h1>
            <form action="feedback.php" method="POST">
               <div class="feedbackinput">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">
               </div>
               <div class="feedbackinput">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email address">
                </div>
                <div class="feedbackinput">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required placeholder="e.g., Cake Quality, Service, Website Issue">
                </div>
                <div class="feedbackinput">
                <label for="message">Feedback / Message:</label>
                <textarea id="message" name="message" required placeholder="Tell us about your experience!"></textarea>
                </div>
    <div class="feedbacksubmit">
                <button type="submit" name="submit" value="Submit Feedback">Submit Feedback</button>
            </form>
        </section>

        <!-- Contact Us -->
        <section id="contact" class="contact">
            <h1>Contact Us</h1>
            <p>📍 Location: 123 Main Street, Colombo</p>
            <p>📞 Phone: +94 77 123 4567</p>
            <p>📧 Email: info@crimsonbakery.com</p>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        
        <div class="social-icons">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>
        <p>&copy; 2025 Crimson Bakery. All rights reserved.</p>
        <div class ="stafflogin"><a href="Adminlogin.html"><i class ="fa-solid fa-user"> Staff Login</i></a></div>
    </footer>
    

<script>
    /*
        SLIDER JAVASCRIPT
        This script manages the automatic and manual transitions of the image slider.
    */
    let slideIndex = 1;
    let autoSlideInterval;

    // Initial call to set up the slider
    window.onload = function() {
        showSlides(slideIndex);
        startAutoSlide();
    }

    function plusSlides(n) { 
        stopAutoSlide();
        showSlides(slideIndex += n); 
        startAutoSlide(); // Restart timer after manual change
    }
    
    // function currentSlide(n) { showSlides(slideIndex = n); } // Not used by the current design

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("slide-image");
        if (n > slides.length) { slideIndex = 1; }
        if (n < 1) { slideIndex = slides.length; }
        
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        
        // Ensure index is valid before showing
        if (slides.length > 0) {
            slides[slideIndex - 1].style.display = "block";
        }
    }

    function startAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
        }
        autoSlideInterval = setInterval(function() {
            showSlides(slideIndex += 1);
        }, 3000); // 3 seconds per slide
    }

    function stopAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
        }
    }
</script>
</body>
</html>
