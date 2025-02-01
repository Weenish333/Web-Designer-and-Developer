<?php
include 'connection.php';
//update query
if(isset($_POST['update_product_quantity']))
{
  $update_value=$_POST['update_quantity'];
  $update_id=$_POST['update_quantity_id'];
  //query
  $update_quantity_query=mysqli_query($con, "update `cart` set quantity=$update_value where id= $update_id");
  if($update_quantity_query)
  {
    header('location:cart.php');
  }
}

if(isset($_GET['remove']))
{
  $remove_id=$_GET['remove'];
   mysqli_query($con, "delete from `cart` where id=$remove_id");
   header('location:cart.php');

}

if(isset($_GET['delete_all']))
{
  mysqli_query($con, "delete from `cart`");
  header('location:cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="images/336-3360895_delight-bakery-logo-bakery-clipart.png" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Cart</title>
  <!-- Font Awesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<!-- Custom CSS File Link -->
<link rel="stylesheet" href="productstyles.css">

</head>
<body>
 <header class="header">
        <a href="#" class="logo">
            <i class = "fas fa-shopping-basket"></i>
             <img src="images/dreamy-1024x665.png" alt="">
            </a>

        <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="index.php#about">About</a>
        <a href="index.php#review">Review</a>
        <a href="Products.php">Shop</a>
        <a href="index.php#contact">Contact</a>
        </nav>
</header>
 <!-- container -->
 <div class="container1">
    <section class="display_product">
    <h3 class="heading">MY CART</h3>
      <table>
        <?php
$select_cart_products=mysqli_query($con, "select * from `cart`" );
$grand_total=0;
if(mysqli_num_rows($select_cart_products)>0)
{
echo "<thead>
          <th>S1-No</th>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Product Image</th>
          <th>Product Quantity</th>
          <th>Total Price</th>
          <th>Action</th>
        </thead>
        <tbody>";
        $serial_no = 1;
        while($fetch_cart_products=mysqli_fetch_assoc($select_cart_products))
        {
          ?>
 
        <tr>
          <td><?php echo $serial_no++; ?></td>
          <td><?php echo $fetch_cart_products['name']?></td>
          <td><img  class="product-img" src="images/<?php echo $fetch_cart_products['image']?>" alt="cupcake"></td>
          <td>PKR <?php echo $fetch_cart_products['price']?>/-</td>
          <td>
            <form action="" method="post">
              <input type="hidden" value="<?php echo $fetch_cart_products['id']?>" name="update_quantity_id">
            <div class="quantity">
              <input type="number" min="1" value="<?php echo $fetch_cart_products['quantity']?>" name="update_quantity">
              <input type="submit" class="update quantity" value="Update" name="update_product_quantity">
            </div>
            </form>
          </td>
          <td>PKR <?php echo $subtotal=number_format($fetch_cart_products['price'] * $fetch_cart_products['quantity'])?>/-</td>
          <td>
            <a href="cart.php?remove=<?php echo $fetch_cart_products['id']?>" onclick="return confirm('Are you sure you want to delete this item?')">
              <i class="fas fa-trash"></i>Remove
            </a>
          </td>
  </tr>


<?php
$grand_total+=($fetch_cart_products['price'] * $fetch_cart_products['quantity']);
}
}
else{
  echo "<div class='empty_text'> Cart is Empty!</div>";
}
?>
      </tbody>
      </table>
      <?php
      if($grand_total>0)
      {
        echo "<!-- Bottom area -->
        <div class='table-bottom'>
         <a href='Products.php' class='bottom-btn1'>Continue Shopping</a>
         <h3 class='bottom-btn2'>Grand Total: $<span>$grand_total/-</span></h3>
         <a href='checkout.php' class='bottom-btn3'>Proceed to checkout</a>
        </div>
        ";
      
      ?>
      
       <a href="cart.php?delete_all" class="delete_all_btn">
        <i class="fas fa-trash"></i>Delete All
      </a>
      <?php
      }
      else
      {
        echo"";
      }
      ?>
</section>


    </div>




</body>
</html>