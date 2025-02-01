<?php
// Include the connection file
include 'connection.php';
session_start();

// Initialize an array to store messages
$display_message = [];

// Handle the "Add to Cart" logic
if (isset($_POST['add_to_cart'])) {
    $products_name = $_POST['product_name'];
    $products_price = $_POST['product_price'];
    $products_image = $_POST['product_image'];
    $product_quantity = 1;

    // Check if the product is already in the cart
    $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name='$products_name'");
    if (mysqli_num_rows($select_cart) > 0) {
        $display_message[] = "Product already added to cart!";
    } else {
        // Insert the product into the cart
        $insert_products = mysqli_query($con, "INSERT INTO `cart` (name, price, image, quantity) VALUES ('$products_name', '$products_price', '$products_image', '$product_quantity')");
        $display_message[] = "Product added to the cart!";
    }

    // Check login status and redirect if not logged in
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        echo "
            <script>
                alert('Please login to add products to your cart');
                window.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/336-3360895_delight-bakery-logo-bakery-clipart.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="productstyles.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Include header -->
    <?php include('productheader.php'); ?>

    <!-- Product Section -->
    <section id="CupCakes" class="products">
        <?php
        // Display messages if there are any
        if (!empty($display_message)) {
            echo '<div class="container">';
            foreach ($display_message as $message) {
                echo "<div class='display_message'>
                        <span>$message</span>
                        <i class='fas fa-times' onclick='this.parentElement.style.display=\"none\";'></i>
                      </div>";
            }
            echo '</div>';
        }
        ?>
        <h1 class="title"> Shop<span>it</span> </h1>

        <div class="box-container">
            <?php
            // Fetch products from the database
            $select_products = mysqli_query($con, "SELECT * FROM `products`");
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                    ?>
                    <form action="" method="post">
                        <div class="edit_form">
                            <i class="fas fa-heart" title="Add to Wishlist"></i>
                            <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                            <h3><?php echo $fetch_product['name']; ?></h3>
                            <div class="price">Price: PKR <?php echo $fetch_product['price']; ?>/-</div>
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                            <input type="submit" class="submit-btn1 cart-btn" value="Add to cart" name="add_to_cart">
                        </div>
                    </form>
                    <?php
                }
            } else {
                echo "<div class='empty_text'><tr><td colspan='5'>No Products Available</td></tr></div>";
            }
            ?>
        </div>
    </section>

    <!-- Back Section -->
    <section id="BrownBread" class="products">
        <div class="box-container">
            <a href="index.php" class="btn"> << Back </a>
        </div>
    </section>

    <!-- Footer Section -->
    <section class="credit">
        <p>&copy; 2024 Dreamy Delights Bakery. All rights reserved.</p>
    </section>

    <script src="main.js"></script>
</body>
</html>
