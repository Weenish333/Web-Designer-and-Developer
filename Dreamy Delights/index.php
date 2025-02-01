<?php require('connection.php');
session_start() ;
?>
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
            <a href="index.php">Home</a>
            <a href="#category">Shop</a>
            <a href="#about">About</a>
            <a href="#review">Review</a>
            <a href="#blog">Blog</a>
            <a href="#contact">Contact</a>
        </nav>
        
        <div class="icons">
    
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search" onclick="openModal('')"></div>
            <!-- Heart icon on index.html -->
            <div id="heart-btn" class="fas fa-heart">
            <span id="like-count">0</span> <!-- This span will display the like count --></div>
            <!-- Logout form -->
            
            <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']===true): ?>
            <div id="logout-form">
            <h3>Welcome, <?php echo htmlspecialchars($_SESSION['Username']); ?>!</h3>
            <form method="post" action="logout.php">
            <button type="submit" class="logout-btn">Logout</button>
            </form>
            <?php else: ?>
            <!-- user icon -->
            <div id="login-btn" class="fas fa-user" onclick="showModal()"></div>
            <?php endif; ?>
     </div>
     </div>
      

<!-- Search Modal -->
<form action="search.php?search" method="get">
    <div id="search-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeSearchModal()">&times;</span>
            <input type="search" name="search" id="search-input" placeholder="Type to search..."required>
            <button type="submit" class="btn1 ">Search</button>
        </div>
    </div>
</form>

<!-- User Modal -->
<div class="modal" id="user-modal" style="display: none;">
  <div class="modal-content">
    <span class="close" onclick="closeUserModal()">&times;</span>
    
    
    <!-- Sign In Form -->
    <div id="sign-in-form">
      <h1 class="form-title">Sign In</h1>
      <form method="post" action="login_register.php">
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="text" name="email_username" id="email" placeholder="Email or Username" required>
          <label for="email">Email_Username</label>
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <p class="recover" onclick="showRecoveryBox()">
          <a href="#">Recover Password</a>
        </p>
        <input type="submit" class="btn1" value="Sign In" name="SignIn">
      </form>
      <p class="or">----------or--------</p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Don't have an account yet?</p>
        <button id="signUpButton" onclick="switchToSignUp()">Sign Up</button>
      </div>
    </div>
    

   <!-- Register Form -->
<div id="register-form" style="display: none;">
  <h1 class="form-title">Register</h1>
  <form method="post" action="login_register.php">
    <div class="input-group">
      <i class="fas fa-user"></i>
      <input type="text" name="username" id="username" placeholder="Username" required>
      <label for="username">Username</label>
    </div>
    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <input type="email" name="email" id="email" placeholder="Email" required>
      <label for="email">Email</label>
    </div>
    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input type="password" name="password" id="password" placeholder="Password" required>
      <label for="password">Password</label>
      <span class="password-hint">Max 6 characters, include special chars</span>
    </div>
    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
      <label for="confirmPassword">Confirm Password </label>
      </div>
      <div class="input-group">
      <label for="role_selection">Select Role:</label>
    <select class="role_selection" name="user_type" id="role_selection">
        <option value="Admin">Admin</option>
        <option value="User">User</option>
    </select>
   
</div>


    <input type="submit" class="btn1" value="Sign Up" name="SignUp">
  </form>
  <div class="links">
    <p>Already have an account?</p>
    <button id="signInButton" onclick="switchToSignIn()">Sign In</button>
  </div>
</div>


    <!-- Password Recovery Box -->
    <div class="recovery-box" id="recovery-box" style="display: none;">
      <div class="recovery-content">
        <h1 class="form-title">Reset Password</h1>
        <form method="post" action="forgotpassword.php">
          <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <label for="recoveryEmail">Email</label>
          </div>
          <input type="submit" class="btn1" value="Send link" name="Sendlink">
        </form>
      </div>
    </div>
    </div>
</div>




<!-- Modal Structure for products like -->
<div id="liked-products-modal" class="modal">
    <div class="modal-content">
    <span class="close-btn" onclick="closelikeModal()">&times;</span>
        <h2>Your Whishlist Products</h2>
        <div id="liked-products-list"></div>
        <input type="number" id="remove-product-index" placeholder="Enter product number to remove">
        <button id="remove-product-btn">Remove Product</button>
    </div>
</div>
</header>

   
    <!-- home section Start -->
    <section class ="home" id = "home">
        <div class = "slides-container">

            <div class="slide active">
                <div class ="content">
                    <span> Have a cake-A-Licious</span>
                    <h3>upto 50% off</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img src="images/pic 2.png" alt="">
                </div>
            </div>

            <div class="slide">
                <div class ="content">
                    <span> Have a cake-A-Licious</span>
                    <h3>upto 30% off</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img src="images/home1.png" alt="">
                </div>
            </div>

            <div class="slide">
                <div class ="content">
                    <span> Have a cake-A-Licious</span>
                    <h3>upto 20% off</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img src="images/pic 1.png" alt="">
                </div>
            </div>
        </div>
       <div id="next-slide" class ="fas fa-angle-right" onclick="next()"> </div>
       <div id="prev-slide" class ="fas fa-angle-left" onclick="prev()"></div>

    </section>

    <section class = "banner-container">
      <div class="banner">
         <img src="images/cake-background-8vm6gxa8rgslrjl5.jpg" alt="">
         <div class ="content">
         <span>Limited Sales</span>
         <h3>upto 50% off</h3>
         <a href="#" class = "btn">Shop Now</a>
        </div>
       </div>

       <div class="banner">
        <img src="images/983077.jpg" alt="">
        <div class ="content">
        <span>Limited Sales</span>
        <h3>upto 50% off</h3>
        <a href="#" class = "btn">Shop Now</a>
       </div>
      </div>

      <div class="banner">
        <img src="images/banner3.jpg" alt="">
        <div class ="content">
        <span>Limited Sales</span>
        <h3>upto 50% off</h3>
        <a href="#" class = "btn">Shop Now</a>
       </div>
      </div>

    </section>

<!-- Category section -->
<div class ="heading" id="category">
    <h1>Our Shop</h1>
  </div>
 
    <section class="category" >
    <h1 class="title"> Our <span>Category</span> <a href="Products.php">View All >> </a> </h1>

    <div class="box-container">
    <?php
       // Fetch categories from the database
       $query = "SELECT * FROM categories";
       $result = mysqli_query($con, $query); // $con is the database connection object

       // Check if categories exist
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
          <a href="<?php echo $row['link']?>" class="box">
            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['cate_name']; ?>">
            <h3><?php echo $row['cate_name']; ?></h3>
           </a>
            <?php
        }
} else {
    echo "";
}
?>
    </div>
</section>


<!-- About section Start -->
<div class  = "heading" id="about">
    <h1>About us</h1>
 </div>
 <section class ="about">
    <div class="img ">
        <img src="images/about.jpg" alt="">
    </div>
    <div class ="content">
        <span>Welcome to our products</span>
        <h3>Cake-A-Licious products</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt labore sit soluta ipsam nihil atque, itaque architecto error quia aut voluptatum, dolorum, iste id! Voluptatibus nisi necessitatibus dolorum obcaecati quis.</p>
         <a href="about.php" class= "btn">Read more >></a>
    </div>

 </section>

 <!-- Gallery section Start -->
  <section class ="gallery">
    <h1 class="title"> Our <span>Gallery</span><a href="">View All >></a></h1>
   <div class="box-container">

     <div class=" box">
        <img src="images/attachment-GettyImages-518468635.jpg" alt="">
        <div class="icons">
            <a href="#" class ="fas fa-eye"></a>
            <a href="#" class ="fas fa-heart"></a>
            <a href="#" class ="fas fa-share"></a>
        </div>
     </div>

     <div class=" box">
        <img src="images/gal2.png" alt="">
        <div class="icons">
            <a href="#" class ="fas fa-eye"></a>
            <a href="#" class ="fas fa-heart"></a>
            <a href="#" class ="fas fa-share"></a>
        </div>
     </div>

     <div class=" box">
        <img src="images/gal3.webp" alt="">
        <div class="icons">
            <a href="#" class ="fas fa-eye"></a>
            <a href="#" class ="fas fa-heart"></a>
            <a href="#" class ="fas fa-share"></a>
        </div>
     </div>
     <div class=" box">
        <img src="images/gal41.jpg" alt="">
        <div class="icons">
            <a href="#" class ="fas fa-eye"></a>
            <a href="#" class ="fas fa-heart"></a>
            <a href="#" class ="fas fa-share"></a>
        </div>
     </div>
 
     <div class=" box">
        <img src="images//gal5.jpeg" alt="">
        <div class="icons">
            <a href="#" class ="fas fa-eye"></a>
            <a href="#" class ="fas fa-heart"></a>
            <a href="#" class ="fas fa-share"></a>
        </div>
     </div>
     <div class=" box">
        <img src="images/gal6.jpg" alt="">
        <div class="icons">
            <a href="#" class ="fas fa-eye"></a>
            <a href="#" class ="fas fa-heart"></a>
            <a href="#" class ="fas fa-share"></a>
        </div>
     </div>
</div>

</section>

<!-- Review's section -->

  <div class ="heading" id="review">
    <h1>Client's Review</h1>
  </div>

  <section class="info-container">

    <div class="info">
        <img src="images/rev1.webp" alt="">
        <div class="content">
        <h3>Fast delivery</h3>
        <span> within 30 minutes</span>
    </div>
</div>

    <div class="info">
        <img src="images/rev2.png" alt="">
        <div class="content">
        <h3>24 / 7 available</h3>
        <span> Call us anytime</span>
    </div>
    </div>

    <div class="info">
        <img src="images/rev3.png" alt="">
        <div class="content">
        <h3>Easy payment</h3>
        <span>Cash or credit</span>
    </div>
    </div>
</section>

 <section class="review">

     <div class="box">
        <div class ="user">
            <img src="images/4bce6b.jpg" alt="">
           <div class = "info">
            <h3>Redward bey</h3>
            <span>happ client</span>
           </div>
         </div>
         <p>Lorem ipsum dolor sit eligea placeat adipisci tenetur accusamus ut! Id placeat aliquid alias.</p>
     </div>

     <div class="box">
        <div class ="user">
            <img src="images/cl2.jpg" alt="">
           <div class = "info">
            <h3>Redward bey</h3>
            <span>happ client</span>
           </div>
         </div>
         <p>Lorem ipsum dolor sit eligendi rem esse ad! tenetur accusamus ut! Id placeat aliquid alias.</p>
     </div>

     <div class="box">
        <div class ="user">
            <img src="images/cl3.webp" alt="">
           <div class = "info">
            <h3>Redward bey</h3>
            <span>happ client</span>
           </div>
         </div>
         <p>Lorem ipsum dolor sit eligendi rem esse ad! tenetur accusamus ut! Id placeat aliquid alias.</p>
     </div>

     <div class="box">
        <div class ="user">
            <img src="images/cl4.webp" alt="">
           <div class = "info">
            <h3>Redward bey</h3>
            <span>happ client</span>
           </div>
         </div>
         <p>Lorem ipsum dolor sit eligendi rem esse ad! tenetur accusamus ut! Id placeat aliquid alias.</p>
     </div>

     <div class="box">
        <div class ="user">
            <img src="images/cl5.jpg" alt="">
           <div class = "info">
            <h3>Redward bey</h3>
            <span>happ client</span>
           </div>
         </div>
         <p>Lorem ipsum dolor sit eligendi rem esse ad!  tenetur accusamus ut! Id placeat aliquid alias.</p>
     </div>

     <div class="box">
        <div class ="user">
            <img src="images/D984_9_422_1200.jpg" alt="">
           <div class = "info">
            <h3>Redward bey</h3>
            <span>happ client</span>
           </div>
         </div>
         <p>Lorem ipsum dolor sit eligendi rem esse ad! Expeditaaccusamus ut! Id placeat aliquid alias.</p>
     </div>
 </section>

 <!-- Blog section -->
 <div class ="heading" id="blog">
    <h1>Our blogs</h1>
  </div>

  <section class="blogs">
    <h1 class="title"> our <span>blogs</span> <a href="#">View All >></a></h1>
    <div class="box-container">

        <div class="box">
            <div class="img">
                <img src="images/image7.jpg" alt="">
            </div>
            <div class="content">
            <div class="icons">
                <a href="#"> <i class="fas fa-calender"></i> 12 Jan , 2024 </a>
                <a href="#"> <i class="fas fa-user"></i> by administrator </a>
            </div>
            <h3>Blogs title page </h3>
            <p>Lorem ipsum dolor  itaque exercitationem hic.</p>
            <a href="#" class="btn"> Read more...</a>
        </div>
        </div>

        <div class="box">
            <div class="img">
                <img src="images/blog2.jpg" alt="">
            </div>
            <div class="content">
            <div class="icons">
                <a href="#"> <i class="fas fa-calender"></i> 12 Jan , 2024 </a>
                <a href="#"> <i class="fas fa-user"></i> by administrator </a>
            </div>
            <h3>Blogs title page </h3>
            <p>Lorem ipsum dolor  itaque exercitationem hic.</p>
            <a href="#" class="btn"> Read more...</a>
        </div>
        </div>
        
        <div class="box">
            <div class="img">
                <img src="images/blog3.jpg" alt="">
            </div>
            <div class="content">
            <div class="icons">
                <a href="#"> <i class="fas fa-calender"></i> 12 Jan , 2024 </a>
                <a href="#"> <i class="fas fa-user"></i> by administrator </a>
            </div>
            <h3>Blogs title page </h3>
            <p>Lorem ipsum dolor  itaque exercitationem hic.</p>
            <a href="#" class="btn"> Read more...</a>
        </div>
        </div>

        <div class="box">
            <div class="img">
                <img src="images/blog4.png" alt="">
            </div>
            <div class="content">
            <div class="icons">
                <a href="#"> <i class="fas fa-calender"></i> 12 Jan , 2024 </a>
                <a href="#"> <i class="fas fa-user"></i> by administrator </a>
            </div>
            <h3>Blogs title page </h3>
            <p>Lorem ipsum dolor  itaque exercitationem hic.</p>
            <a href="#" class="btn"> Read more...</a>
        </div>
        </div>
        
        <div class="box">
            <div class="img">
                <img src="images/blog5.jpg" alt="">
            </div>
            <div class="content">
            <div class="icons">
                <a href="#"> <i class="fas fa-calender"></i> 12 Jan , 2024 </a>
                <a href="#"> <i class="fas fa-user"></i> by administrator </a>
            </div>
            <h3>Blogs title page </h3>
            <p>Lorem ipsum dolor  itaque exercitationem hic.</p>
            <a href="#" class="btn"> Read more...</a>
        </div>
        </div>
        <div class="box">
            <div class="img">
                <img src="images/blog6.jfif" alt="">
            </div>
            <div class="content">
            <div class="icons">
                <a href="#"> <i class="fas fa-calender"></i> 12 Jan , 2024 </a>
                <a href="#"> <i class="fas fa-user"></i> by administrator </a>
            </div>
            <h3>Blogs title page </h3>
            <p>Lorem ipsum dolor  itaque exercitationem hic.</p>
            <a href="#" class="btn"> Read more...</a>
        </div>
        </div>
    </div>
</section>

 <!-- Contact section -->

<div class ="heading" id="contact">
    <h1>Contact us</h1>
</div>

<section class="contact">
    <div class="icon-container">

        <div class="icons">
            <i class="fas fa-phone"></i>
            <h3>Our Number</h3>
            <p>+456-245-3333</p>
            <p>+321-176-8976</p>
        </div>

        <div class="icons">
            <i class="fas fa-envelope"></i>
            <h3>Our Email</h3>
            <p>dreamydelisghts321@gmail.com</p>
            <p>dreams4321@gmail.com</p>
            
        </div>

        <div class="icons">
            <i class="fas fa-location"></i>
            <h3>Our address</h3>
            <p>Lahore, Pakistan</p>
        </div>
    </div>
   
<!-- footer section  -->
 <section class ="footer">
    <div class="box-container">
    <div class="box">
        <h3>quick links</h3>
        <a href="#home"> <i class="fas fa-arrow-right"></i>Home</a>
        <a href="#category"> <i class="fas fa-arrow-right"></i>Shop</a>
        <a href="#about"> <i class="fas fa-arrow-right"></i>About</a>
        <a href="#review"> <i class="fas fa-arrow-right"></i>Review</a>
        <a href="#blog"> <i class="fas fa-arrow-right"></i>Blog</a>
        <a href="#contact"> <i class="fas fa-arrow-right"></i>Contact</a>
    </div>
    <div class="box">
        <h3>Extra links</h3>
        <a href="cart.php"><i class="fas fa-arrow-right"></i> my cart</a>
        <a href="index.php"><i class="fas fa-arrow-right"></i> my favourite</a>
        <a href="Products.php"><i class="fas fa-arrow-right"></i> Shop</a>
        <a href="index.php"><i class="fas fa-arrow-right"></i> my account</a>
        <a href="#"><i class="fas fa-arrow-right"></i> terms or use</a>
    </div>
    <div class="box">
        <h3>Social Links</h3>
        <a href="https://www.facebook.com/DreamyDelightsBakery" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
        <a href="https://twitter.com/DreamyDelightsBakery" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
        <a href="https://www.instagram.com/DreamyDelightsBakery" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
        <a href="https://www.linkedin.com/company/dreamydelightsbakery" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
        <a href="https://www.youtube.com/channel/DreamyDelightsBakery" target="_blank"><i class="fab fa-youtube"></i> YouTube</a>
    </div>
    

    <div class="box">
        <h3>newsletter</h3>
        <p>subscribe for letter updates</p>
        <form action="">
        <input type="email" placeholder="Enter your email address">
         <input type="submit" value="subscribe" class="btn">
        </form>
         <img src="images/dreamy-1024x665.png"  class="payment" alt="">       
    </div>
</div>

 </section>

 <section class="credit">
    <p>&copy; 2024 Dreamy Delights Bakery. All rights reserved.</p>
</section>

    <!-- Custom .Js file link -->
    <script src="main.js"></script>
    <script>
        // Initialize the cart on page load
        window.onload = function() {
            updateCartCount();
        };
    </script>
</body>
</html>
