<?php
include 'connection.php';

// Add to Cart Functionality
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
        // Insert new product into the cart
        $insert_products = mysqli_query($con, "INSERT INTO `cart`(name, price, image, quantity) VALUES ('$products_name', '$products_price', '$products_image', '$product_quantity')");
        $display_message[] = "Product added to the cart!";
    }
}

// Fetch cart item count
$select_product = mysqli_query($con, "SELECT * FROM `cart`") or die("query failed");
$row_count = mysqli_num_rows($select_product);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/336-3360895_delight-bakery-logo-bakery-clipart.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('images/gal2.png');
        }

        .products1 .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .products1 .box-container form {
            flex: 1 1 calc(25% - 1rem);
            max-width: calc(25% - 1rem);
            min-width: 200px;
            margin-top: 70px;
        }

        .products1 .box-container .edit_form {
            background: #fff;
            text-align: center;
            padding: 1rem;
            border: 2px solid rgba(238, 172, 30, 0.942);
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .products1 .box-container .edit_form:hover {
            transform: translateY(-5px);
        }

        .products1 .box-container .edit_form img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .products1 .box-container .edit_form h3 {
            font-size: 1.7rem;
            font-weight: 600;
            color: black;
            margin-bottom: 7px;
        }

        .products1 .box-container .edit_form .price {
            font-size: 1.5rem;
            font-weight: 500;
            color: #ab5d04;
        }

        .edit_form .submit-btn1 {
            padding: 9px 20px;
            font-size: 1.4rem;
            background-color: black;
            color: #f9af10;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 70%;
            margin-top: 10px;
        }

        .edit_form .submit-btn1:hover {
            background-color: #6c3b02;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<?php include('productheader.php'); ?>

<form action="search.php" method="get">
    <div id="search-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeSearchModal()">&times;</span>
            <input type="search" name="search" id="search-input" placeholder="Type to search..." required>
            <button type="submit" class="btn1">Search</button>
        </div>
    </div>
</form>

<section id="CupCakes" class="products1">
    <div class="box-container">
        <?php
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search_term = $_GET['search'];
            $search_query = mysqli_query($con, "SELECT * FROM `products` WHERE `name` LIKE '%$search_term%'");

            if (mysqli_num_rows($search_query) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($search_query)) {
                    ?>
                    <form action="" method="post">
                        <div class="edit_form">
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
                echo "<script>alert('No products found for \"$search_term\".');
                window.location.href = 'index.php';
                </script>";
                
            }
        } else {
            echo "<p>Please enter a search term.</p>";
        }
        ?>
    </div>
</section>
<script src="main.js"></script>
</body>
</html>
