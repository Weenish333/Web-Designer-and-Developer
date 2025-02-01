<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/336-3360895_delight-bakery-logo-bakery-clipart.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Checkout</title>
    <!-- Font Awesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<!-- Custom CSS File Link -->
<link rel="stylesheet" href="productstyles.css">
<style>
body {
    font-family: Arial, sans-serif;
    background-color: black;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 550px;
    margin: 30px auto;
    padding: 20px;
    background: url("images/banner3.jpg");
    background-color: rgb(30, 28, 28);
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.heading {
    text-align: center;
    color:rgb(244, 169, 9);
    font-size: 24px;
    font-weight: bold;
    margin-top: 50px;
}

.form-section {
    width: 100%;
    margin-bottom: 20px;
}

h3 {
    font-size: 20px;
    font-weight: bold;
    color: rgb(174, 129, 31);
    margin-bottom: 15px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 1px;
}

h3:hover {
    color: rgb(221, 154, 10);
}

input, textarea, select {
    width: 80%;
    padding: 15px;
    margin-bottom: 15px;
    border: 1.7px solid rgb(77, 53, 2);
    border-radius: 8px;
    font-size: 16px;
    background-color: black;
    color: rgb(216, 153, 18); /* Text color when input is normal */
    box-sizing: border-box;
}

/* Placeholder text color */
input::placeholder, textarea::placeholder, select::placeholder {
    color: rgb(47, 38, 17); 
}

/* Ensure text color stays visible when focused */
input:focus, textarea:focus, select:focus {
    color: rgb(244, 169, 9); /* Text color when focused */
    background-color: #333; /* Darker background on focus for contrast */
    outline: none;
    border-color: rgb(204, 151, 38); /* Highlight border color */
}

textarea {
    resize: vertical;
}

select {
    color: #ecab1f; /* Text color */
    background-color: black;
}

select:hover {
    color: rgb(47, 38, 17);
    background-color: #333;
}

select:focus, input:focus, textarea:focus {
    outline: none;
    border-color: rgb(204, 151, 38);
    background-color: black;
}

.btn {
    width: 30%;
    padding: 15px;
    background-color: black;
    color: #ecab1f;
    border: none;
    border-radius: 8px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #6c3b02;
}


</style>
<body>
<body>
    <header class="header">
        <a href="#" class="logo">
            <i class="fas fa-shopping-basket"></i>
            <img src="images/dreamy-1024x665.png" alt="">
        </a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="index.php#about">About</a>
            <a href="cart.php">Cart</a>
            <a href="Products.php">Shop</a>
            <a href="index.php#contact">Contact</a>
        </nav>
    </header>

    <div class="container">
        <h1 class="heading">Place Your Order</h1>

        <form action="process_order.php" method="POST">
    <!-- User Details -->
    <div class="form-section">
        <h3>User Details</h3>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
    </div>

    <!-- Shipping Details -->
    <div class="form-section">
        <h3>Shipping Details</h3>
        <input type="text" id="address" name="address" placeholder="Enter your shipping address" required>
        <input type="text" id="city" name="city" placeholder="Enter your city" required>
        <input type="text" id="postal_code" name="postal_code" placeholder="Enter your postal code" required>
        <input type="text" id="country" name="country" placeholder="Enter your country" required>
    </div>

    <!-- Payment Details -->
    <div class="form-section">
        <h3>Payment Details</h3>
        <select id="payment_method" name="payment_method" required>
            <option value="credit_card">Credit Card</option>
            <option value="cash_on_delivery">Cash on Delivery</option>
            <option value="paypal">PayPal</option>
        </select>

        <!-- Credit Card Fields -->
        <div id="credit_card_details" style="display: none;">
            <input type="text" id="card_number" name="card_number" placeholder="Enter your card number">
            <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY">
            <input type="text" id="cvv" name="cvv" placeholder="Enter CVV (3 digits)">
        </div>
    </div>

    <!-- Additional Information -->
    <div class="form-section">
        <h3>Additional Information</h3>
        <textarea id="notes" name="notes" rows="4" placeholder="Add any special instructions or notes"></textarea>
    </div>

    <!-- Submit Button -->
<button type="submit" class="btn" onclick="showAlert()">Place Order</button>

<script>
    function showAlert() {
        alert('Place Order Successfully');
    }
</script>

</form>
</div>

    <script>
        // Show Credit Card Fields if Payment Method is Credit Card
        const paymentMethod = document.getElementById('payment_method');
        const creditCardDetails = document.getElementById('credit_card_details');

        paymentMethod.addEventListener('change', function() {
            if (this.value === 'credit_card') {
                creditCardDetails.style.display = 'block';
            } else {
                creditCardDetails.style.display = 'none';
            }
        });
    </script>

    
</body>
</html>