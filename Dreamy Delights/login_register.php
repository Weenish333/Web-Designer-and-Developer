<?php 
require('connection.php');
session_start();

// Error Reporting (for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Login/SignIn functionality
if (isset($_POST['SignIn'])) 
{
    // Construct the query
    $query = "SELECT * FROM `registered_users` WHERE `Email`='$_POST[email_username]' OR `Username`='$_POST[email_username]'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Check if a user exists
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);

            // Verify the password
            if ($_POST['password'] === $result_fetch['Password']) {
                $_SESSION['Username'] = $result_fetch['Username'];
                $_SESSION['loggedIn'] = true; // Set session variable to track login status

                // Redirect based on user_type
                if ($result_fetch['user_type'] === 'Admin') {
                    echo "
                    <script>
                        alert('Welcome Admin!');
                        window.location.href = 'productindex.php';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('Login successful');
                        window.location.href = 'index.php';
                    </script>
                    ";
                }
            } else {
                // Password is incorrect
                echo "
                <script>
                    alert('Incorrect password');
                    window.location.href = 'index.php';
                </script>
                ";
            }
        } else {
            // If no user is found
            echo "
            <script>
                alert('Email or Username not registered');
                window.location.href = 'index.php';
            </script>
            ";
        }
    } else {
        // If query fails
        echo "
        <script>
            alert('Cannot run query. Please try again later.');
            window.location.href = 'index.php';
        </script>
        ";
    }
}

// SignUp functionality
if (isset($_POST['SignUp']))
{
    // Check if the username or email already exists in the database
    $user_exist_query = "SELECT * FROM registered_users WHERE Username='$_POST[username]' OR Email='$_POST[email]'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) { // If username or email already exists
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['Username'] == $_POST['username']) {
                // Username already taken
                echo "
                    <script>
                        alert('$result_fetch[Username] - Username already taken');
                        window.location.href = 'index.php';
                    </script>
                ";
            } else {
                // Email already registered
                echo "
                    <script>
                        alert('$result_fetch[Email] - E-mail already registered');
                        window.location.href = 'index.php';
                    </script>
                ";
            }
        } else {
            // Ensure password and confirm password match
            if ($_POST['password'] === $_POST['confirmPassword']) {
                // Validate password format (exactly 6 characters, including letters, numbers, and special characters)
                if (preg_match('/^[A-Za-z\d@$!%*?&]{6}$/', $_POST['password'])) {
                    // Insert data into the database
                    $query = "INSERT INTO `registered_users`(`Username`, `Email`, `Password`, `user_type`) 
                              VALUES ('$_POST[username]', '$_POST[email]', '$_POST[password]', '$_POST[user_type]')";

                    if (mysqli_query($con, $query)) {
                        // If data inserted successfully
                        echo "
                            <script>
                                alert('Registration successful');
                                window.location.href = 'index.php';
                            </script>
                        ";
                    } else {
                        // If data cannot be inserted
                        echo "
                            <script>
                                alert('Cannot run query');
                                window.location.href = 'index.php';
                            </script>
                        ";
                    }
                } else {
                    // Password does not meet criteria
                    echo "
                        <script>
                            alert('Password must be exactly 6 characters long and can include uppercase, lowercase, numbers, and special characters');
                            window.location.href = 'index.php';
                        </script>
                    ";
                }
            } else {
                // Passwords do not match
                echo "
                    <script>
                        alert('Passwords do not match');
                        window.location.href = 'index.php';
                    </script>
                ";
            }
        }
    } else {
        // Error running query
        echo "
            <script>
                alert('Cannot run query');
                window.location.href = 'index.php';
            </script>
        ";
    }
}
?>
