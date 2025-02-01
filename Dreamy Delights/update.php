<?php
include 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

//update logic
if(isset($_POST['update_product']))
{
    $update_product_id=$_POST['update_product_id'];
    $update_product_name=$_POST['update_product_name'];
    $update_product_price=$_POST['update_product_price'];
    $update_product_image=$_FILES['update_product_image']['name'];
    $update_product_image_tmp_name=$_FILES['update_product_image']['tmp_name'];
    $update_product_image_folder='images/'.$update_product_image;

    //update query
    $update_products=mysqli_query($con, "Update `products` set name='$update_product_name', 
    price='$update_product_price', image='$update_product_image' where id=$update_product_id");
    if($update_products)
    {
        move_uploaded_file($update_product_image_tmp_name,$update_product_image_folder);
        $display_message = "Product updated successfully!";
    }
    else
    {
        $display_message = "Error in updating product: " ;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/336-3360895_delight-bakery-logo-bakery-clipart.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
     <!-- CSS file -->
     <link rel="stylesheet" href="productstyles.css">

<!-- Font Awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Include header -->
    <?php include('adminproductheader.php')?>
    <div class="container">
        <!-- php code -->
         <?php
             if(isset($_GET['edit']))
             {
                $edit_id=$_GET['edit'];
                $edit_query=mysqli_query($con, "Select * from `products` where id= $edit_id");
                if(mysqli_num_rows($edit_query)>0)
                {
                  $fetch_data=mysqli_fetch_assoc($edit_query);
                  //$row=$fetch_data['price'];
                  // echo $row;

                  if (isset($display_message)) {
                    echo "<div class='display_message'>
                        <span>$display_message</span>
                        <i class='fas fa-times' onclick='this.parentElement.style.display=\"none\";'></i>
                    </div>";
                }
                    ?>
<form action="" class="update_product" method="post" enctype="multipart/form-data">
    <img class="product-img" src="images/<?php echo $fetch_data['image'] ?>" alt="">
    <input type="hidden" value="<?php echo $fetch_data['id']?>" name="update_product_id">
    <input type="text" class="input_fields" required value="<?php echo $fetch_data['name']?>" name="update_product_name">
    <input type="number" class="input_fields" required value="<?php echo $fetch_data['price']?>" name="update_product_price">
    <input type="file" class="input_fields" required accept="image/png, image/jpg, image/jpeg" name="update_product_image">
    <div class="btns">
        <input type="submit" value="Update Product" name="update_product" class="edit-btn"> 
        <!-- Added the onclick event to the cancel button to redirect -->
        <input type="reset" id="close-edit" value="Cancel" class="cancel-btn" onclick="window.location.href='view_products.php'; return false;">
    </div>
</form>

                    <?php
                }
             }
         ?>
    
    </div>
    
</body>
</html>