<!-- Including php logic- connecting to database -->
<?php include('connection.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/336-3360895_delight-bakery-logo-bakery-clipart.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View_Products</title>
    <link rel="stylesheet" href="productstyles.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Include header -->
    <?php include('adminproductheader.php')?>
    <!-- container -->
    <div class="container2">
    <section class="display_product1">
      <tbody>
            <?php
            $display_product = mysqli_query($con, "SELECT * FROM `products`");
            if (mysqli_num_rows($display_product) > 0) {
               echo " <table>
                <thead>
                    <tr>
                        <th>S1-No</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Action</th>
                    </tr>
                </thead>";
                $serial_no = 1;
                while ($row = mysqli_fetch_assoc($display_product)) {
            ?>
                <tr>
                    <td><?php echo $serial_no++; ?></td>
                    <td><img class="product-img" src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>PKR <?php echo $row['price']; ?>/-</td>
                    <td>
                        <a href="delete.php?delete=<?php echo $row['id'];?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete this product');">
                        <i class="fas fa-trash"></i></a>
                        <a href="update.php?edit=<?php echo $row['id'];?>" class="update_product_btn">
                        <i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo " <div class='empty_text'><tr><td colspan='5'>No Products Available</td></tr> </div>";
            }
            ?>
        </tbody>
    </table>
</section>


    </div>

    <script src="script.js"></script>

</body>
</html>