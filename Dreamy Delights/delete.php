<!-- delete logic -->
 <?php
 include 'connection.php';

  if(isset($_GET['delete']))
  {
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($con, "Delete from `products` where id=$delete_id") or
    die("query failed");
    if($delete_query)
    {
        echo "Products deleted ";
        header('location:View_products.php');
    }
    else 
    {
        echo "Products not deleted ";
        header('location:View_products.php');
    }
   
  }
 ?>