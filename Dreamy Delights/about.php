<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/336-3360895_delight-bakery-logo-bakery-clipart.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <style>
         

 html {
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-behavior: smooth;
}

section {
    padding: 3rem 9%;
}

 .heading {
    background: url("images/about\ back2.jpeg") no-repeat;
    background-size: cover;
    background-position: center;
    text-align: center;
    padding-top: 8rem; /* Pehle 12rem se chhota kiya */
    padding-bottom: 5rem; /* Pehle 8rem se chhota kiya */
}

/* Basic styling for h1 */
.heading h1 {
    color: #fff; /* Set text color */
    display: inline-block; /* Ensure the hover effect applies only to the text, not the entire h1 area */
    transition: background-color 0.3s ease; /* Smooth transition for background color */
}

/* Hover effect only on the text */
.heading h1:hover {
    color: #4c0101f6;
    transform: scale(1.2);
    cursor: pointer;
}

 /* Styling for the about section container */
.about {
    display: flex; /* Align items in a row */
    align-items: center; /* Vertically center the items */
    justify-content: space-between; /* Spread content to sides */
    gap: 3rem; /* Increased space between the image and content */
    background-color: #201f1f; /* Dark background for contrast */
    padding: 4rem 2rem; /* Add padding for spacing */
    min-height: 70vh; /* Increase height */
    border-radius: 5px; /* Add some border-radius for smooth edges */
}

/* Specific background colors for different sections */
.about-us {
    background: url(images/back1.jpg); 
}

.our-story {
    background-color: #161515; /* Slightly lighter for the Our Story section */
}

.our-values {
    background-color: #3b3b3b; /* Lighter gray for Our Values */
}


/* Specific background colors for different sections */
.meet-the-team {
    background-color: #201f1f; /* Dark gray for the About Us section */
}

.our-specialties {
    background: url(images/back1.jpg); 
}

.customer-say {
    background-color: #161515; /* Lighter gray for Our Values */
}

.taste-the-dream {
    background-color: #282828; /* Slightly lighter for the Our Story section */
}
/* Styling for the image container */
.about .img {
    flex: 0 0 45%; /* Set a flexible width for the image container */
    max-width: 500px; /* Limit the max width to keep the image from being too large */
    border: 1.5px solid rgba(208, 146, 11, 0.942); /* Light yellow border (for other sections) */
    box-shadow: 0 0 4px rgba(187, 141, 40, 0.7); /* Increased shadow for better depth */
    border-radius: 10px; /* Rounded corners for a smoother look */
    overflow: hidden; /* Ensure the image respects the border radius */
    display: flex; /* Use flexbox to center the image */
    justify-content: center; /* Center the image horizontally */
    align-items: center; /* Center the image vertically */
}

/* Remove the border for the Call to Action section */
.taste-the-dream .img {
    border: none; /* No border for this specific section */
    box-shadow: none;
}

/* Styling for the image itself */
.about .img img {
    width: 100%; /* Ensure the image fills the container */
    height: 300px; /* Set a fixed height for uniform size */
    object-fit: cover; /* Maintain aspect ratio and cover the area */
    border-radius: 6px; /* Slightly round the corners */
    transition: transform 0.3s ease; /* Smooth transition on hover */
}

.taste-the-dream .img img:hover {
    transform: scale(1.05); /* Add a hover effect to zoom in */
}



/* Styling for the content container */
.about .content {
    flex: 1; /* Let content take up the remaining space */
    padding-left: 2rem; /* Add space between the image and content */
}

 /*Styling for span elements within content*/
 .about .content span {
    color: #f79f3b; /* White color for the span text */
    font-size: 2.5rem; /* Set a good font size for span */
    display: block; /* Ensure it takes full width */
    margin-bottom: 1rem; /* Space below the span */
    text-transform: uppercase; /* Make the text uppercase for a bold effect  */
} 

/* Styling for heading */
.about .content h3 {
    color: #f7cd9e; /* Eye-catching color for the heading */
    font-size: 3.5rem; /* Slightly increase the font size */
    margin: 1rem 0; /* Add space above and below the heading */
    font-family: 'Poppins', sans-serif; /* Apply the Poppins font */
    font-weight: 600; /* Make the text bold */
    letter-spacing: 0.05em; /* Add some spacing between the letters for style */
    text-transform: uppercase; /* Make the heading text all uppercase for emphasis */
}

/* Hover effect for heading */
.about .content h3:hover {
    color: #eb8d22; /* Change color on hover */
    letter-spacing: 0.1em; /* Slightly increase letter spacing on hover */
    transform: scale(1.05); /* Slightly scale the text */
    cursor: pointer; /* Change cursor to pointer on hover */
}


/* Styling for paragraphs */
.about .content p {
    color: #703d03; /* Light color for easy readability */
    font-size: 1.6rem; /* Larger font size for readability */
    line-height: 1.8; /* Improved line height for better spacing */
    padding: 1.5rem 0; /* Increase padding for space above and below paragraphs */
}

/* Add a subtle hover effect for content */
.about .content p:hover {
    color: #f7cd9e; /* Change color on hover to match the heading */
    transition: color 0.3s ease; /* Smooth color transition */
}

/* Parent container */
.container {
    display: flex;
    justify-content: center; /* Horizontally center the button */
    align-items: center;     /* Vertically center if necessary */
    height: 13vh;           /* Optional: to take full viewport height */
}
/* Button styling */
.btn {
    margin: 1rem auto;          /* Center the button horizontally */
    display: inline-block;       /* Display inline-block to control width */
    padding: 0.8rem 2.5rem;      /* Adjust padding for a balanced size */
    background: #f28e1a;
    color: #060606;
    font-size: 1.7rem;           /* Adjust font size for balance */
    cursor: pointer;
    border-radius: 6px;          /* Rounded corners */
    text-align: center;
    transition: transform 0.2s ease; /* Smooth transition for hover */
    max-width: 200px;            /* Set a maximum width to control size */
}

/* Hover effect for the button */
.btn:hover {
    transform: scale(1.05);      /* Slightly increase size on hover */
    background: #6c3b02;         /* Change background color on hover */
}


    
/* Footer credit styling */
.credit {
    text-align: center;
    background: #121111;
    color: #eb8d22;
    font-size: 1.8rem; /* Reduced font size for credits */
    padding: 1.2rem 0; /* Added padding to balance the footer */
}

        </style>
</head>
<body>

    <!-- About section Start -->
     <div class  = "heading" >
    <h1>About us </h1>
 </div>

 <section class ="about">
    <div class="img ">
        <img src="images/slogan.jpg" alt="">
    </div>
    <div class ="content">
        <h3>Indulge in Sweatness, Savor the Magic!</h3>
    </div>

 </section>

 <!-- About Us Section -->
<section class="about about-us">
    <div class="content">
        <span>Welcome to Dreamy Delights</span>
        <h3>About Us</h3>
        <p>At Dreamy Delights Bakery, we believe in crafting sweet moments that bring joy and magic to your life. Our passion for baking transforms simple ingredients into unforgettable experiences.</p>
    </div>
    <div class="img">
        <img src="images//aboutus.jpg" alt="Our Bakery">
    </div>
</section>

<!-- Our Story Section -->
<section class="about our-story">
    <div class="img">
        <img src="images/ur story.webp" alt="Founder">
    </div>
    <div class="content">
        <h3>Our Story</h3>
        <p>What started as a humble kitchen experiment in [Year], Dreamy Delights has now grown into a beloved bakery known for its creative and personalized treats. Inspired by family recipes and a deep love for the art of baking, we’ve created a legacy of delicious delights.</p>
    </div>
</section>

<!-- Our Values Section -->
<section class="about our-values">
    <div class="content">
        <h3>Our Values</h3>
        <p>At the heart of Dreamy Delights, our core values are quality, creativity, and a commitment to delivering delightful experiences to every customer. We source the freshest ingredients and bake everything with care, ensuring every bite is full of flavor and love.</p>
    </div>
    <div class="img">
        <img src="images/our vales.jfif" alt="Our Values">
    </div>
</section>

<!-- Meet the Team Section -->
<section class="about meet-the-team">
    <div class="img">
        <img src="images/meet the time.webp" alt="Our Team">
    </div>
    <div class="content">
        <h3>Meet the Team</h3>
        <p>Our talented team of bakers and pastry chefs work tirelessly to create sweet treats that are as beautiful as they are delicious. From [Chef’s Name], our head baker, to every member of our staff, we bring years of expertise and passion into everything we create.</p>
    </div>
</section>

<!-- Specialties Section -->
<section class="about our-specialties">
    <div class="content">
        <h3>Our Specialties</h3>
        <p>From custom cakes to melt-in-your-mouth pastries, Dreamy Delights specializes in crafting desserts that are perfect for any occasion. Whether you’re looking for a birthday cake, wedding cake, or just a sweet treat, we have something for everyone.</p>
    </div>
    <div class="img">
        <img src="images//our specialties.jpg" alt="Specialties">
    </div>
</section>

<!-- Customer Testimonials Section -->
<section class="about customer-say">
    <div class="img">
        <img src="images/customer say.jpg" alt="Happy Customers">
    </div>
    <div class="content">
        <h3>What Our Customers Say</h3>
        <p>"Dreamy Delights made the most beautiful and delicious cake for my wedding! Their attention to detail and flavor made our special day even sweeter." – [Customer Name]</p>
    </div>
</section>

<!-- Call to Action Section -->
<section class="about taste-the-dream">
    <div class="content">
        <h3>Ready to Taste the Dream?</h3>
        <p>Come visit us at [Address] or browse our menu online. We’re excited to bake something special for you. Place an order today or stop by for a sweet treat!</p>
    </div>
    <div class="img">
        <img src="images/dream.png" alt="Visit Us">
    </div>
    
</section>
<div class="container">
    <a href="index.php" class= "btn"> << Back</a>
</div>



<section class="credit">
    <p>&copy; 2024 Dreamy Delights Bakery. All rights reserved.</p>
</section>
       

</body>
</html>
