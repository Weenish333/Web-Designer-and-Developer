<?php
include 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$display_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_temp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'images/' . $product_image;

    // Prepare SQL statement
    $stmt = $con->prepare("INSERT INTO `products` (name, price, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $product_name, $product_price, $product_image);

    if ($stmt->execute()) {
        if (move_uploaded_file($product_image_temp_name, $product_image_folder)) {
            $display_message = "Product inserted successfully!";
        } else {
            $display_message = "Product inserted, but image upload failed!";
        }
    } else {
        $display_message = "Error in inserting product: " . $stmt->error;
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/336-3360895_delight-bakery-logo-bakery-clipart.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakery Products</title>
    <!-- CSS file -->
    <link rel="stylesheet" href="productstyles.css">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<!-- Include header -->
<?php include('adminproductheader.php'); ?>

<div class="container">
    <!-- message display -->
    <?php
    if (isset($display_message)) {
        echo "<div class='display_message1'>
            <span>$display_message</span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=\"none\";'></i>
        </div>";
    }
    ?>

    <section>
        <h3 class="heading1">Add Products</h3>
        <form action="productindex.php" class="add_product" method="post" enctype="multipart/form-data">
            <input type="text" name="product_name" class="input_fields" placeholder="Enter product name" required>
            <input type="number" name="product_price" min="0" class="input_fields" placeholder="Enter product price" required>
            <input type="file" name="product_image" class="input_fields" required accept="image/png, image/jpg, image/jpeg">
             <input type="submit" name="add_product" class="submit-btn" value="Add product">
        </form>
    </section>
</div>


<!-- JS file -->
<script>
    // Auto-hide message after 5 seconds
    document.addEventListener("DOMContentLoaded", function () {
        const messageBox = document.querySelector(".display_message1");
        if (messageBox) {
            setTimeout(function () {
                messageBox.style.display = "none";
            }, 5000); // Hide after 3 seconds
        }
    });
</script>
</body>
</html>
