
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
        
        <div class="icons">
    
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search" onclick="openModal('')"></div>
            <div id="heart-btn" class="fas fa-heart">
            <span id="like-count">0</span> <!-- This span will display the like count --></div>
            

               <!-- select query -->
                <?php
                $select_product=mysqli_query($con, "select * from `cart`") or die("query failed");
                 $row_count=mysqli_num_rows($select_product);
                ?>

            <!-- Shopping-cart icon on index.html -->
            <div><a href="cart.php" class="fas fa-shopping-cart"><span><sup><?php  echo $row_count ?></sup></span></a>
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
</header>