<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/336-3360895_delight-bakery-logo-bakery-clipart.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dreamy Delights -- Bakery</title>
     <!-- Font Awesome CDN Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Custom CSS File Link -->
      <link rel="stylesheet" href="style.css">
</head>
<body>
     <!-- Header Section Start -->
     <header class="header">
        <a href="#" class="logo">
            <i class = "fas fa-shopping-basket"></i>
             <img src="images/dreamy-1024x665.png" alt="">
            </a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#category">Shop</a>
            <a href="#about">About</a>
            <a href="#review">Review</a>
            <a href="#blog">Blog</a>
            <a href="#contact">Contact</a>
        </nav>
        
        <div class="icons">
    
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search" onclick="openModal('')"></div>
            <!-- Shopping-cart icon on index.html -->
            <div><a href="addtocart.php" class="fas fa-shopping-cart"></a>
            <span id="quantity">0</span>
            </div>
            <!-- Heart icon on index.html -->
            <div id="heart-btn" class="fas fa-heart">
            <span id="like-count">0</span> <!-- This span will display the like count --></div>
            <!-- Logout form -->
            
</body>
</html>