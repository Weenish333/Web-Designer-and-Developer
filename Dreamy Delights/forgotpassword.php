<?php
require('connection.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Debug mode enable karein


function  sendMail($email, $reset_token)
{
   require('PHPMailer/PHPMailer.php');
   require('PHPMailer/SMTP.php');
   require('PHPMailer/Exception.php');
   $mail = new PHPMailer(true);

   try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'weephp333@gmail.com';                     //SMTP username
    $mail->Password   = '#3333333';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465; //465                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('weenphp333@gmail.com');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password reset Link from weenish';
    $mail->Body    = "We got a request from you to reset your password! <br>
                     Click the link below: <br>
                     <a href = 'http://localhost//Wdd/Dreamy Delights ---Bakery/updatepassword.php?email=$email&reset_token=$reset_token'>
                     Reset password
                     </a>";
   

    $mail->send();
    return true;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return false;
}

}


if(isset($_POST['Sendlink']))
{
     $query = "SELECT * FROM `registered_users` WHERE `Email` = '$_POST[email]'";
     $result = mysqli_query($con, $query);
     if($result)
     {
       if(mysqli_num_rows($result)==1)
       {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Kolkata');
            $date = date("Y-m-d");
            $query = "UPDATE `registered_users` SET `Reset_token`='$reset_token',
            `Reset_token_expired`='$date' WHERE `Email` = '$_POST[email]'";
            if(mysqli_query($con, $query) && sendMail($_POST['email'], $reset_token))
            {
                echo "
                <script>
                 alert('Password Reset Link Send to mail');
                window.location.href = 'index.php'; // Redirect back to login page
               </script>
                    ";
            }
            else
            {
                echo "
                 <script>
                        alert('Server down!. Try again later');
                        window.location.href = 'index.php'; // Redirect back to login page
                         </script>
                      ";
            }
       }
       else
       {
        echo "
        <script>
            alert('Email not found');
            window.location.href = 'index.php'; // Redirect back to login page
        </script>
        ";
       }
     }
     else
     {
        echo "
                <script>
                    alert('cannot run query');
                    window.location.href = 'index.php'; // Redirect back to login page
                </script>
                ";
     }
}


// require('connection.php');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// function sendMail($email, $reset_token)
// {
//     require('PHPMailer/PHPMailer.php');
//     require('PHPMailer/SMTP.php');
//     require('PHPMailer/Exception.php');

//     $mail = new PHPMailer(true);
//     try {
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'weenphp333@gmail.com';
//         $mail->Password = '#3333333'; // Ensure this is correct and secure
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//         $mail->Port = 465;

//         $mail->setFrom('weenphp333@gmail.com', 'weenish');
//         $mail->addAddress($email);

//         $mail->isHTML(true);
//         $mail->Subject = 'Password reset Link from weenish';
//         $mail->Body = "We got a request from you to reset your password! <br>
//                        Click the link below: <br>
//                        <a href='http://localhost/Wdd/Dreamy%20Delights%20---Bakery/updatepassword.php?email=$email&reset_token=$reset_token'>
//                        Reset password
//                        </a>";

//         $mail->SMTPDebug = 2; // Enable debug mode for troubleshooting

//         $mail->send();
//         return true;
//     } catch (Exception $e) {
//         error_log('Mailer Error: ' . $mail->ErrorInfo); // Log any errors
//         return false;
//     }
// }

// if (isset($_POST['Sendlink'])) {
//     $email = mysqli_real_escape_string($con, $_POST['email']); // Prevent SQL injection
//     $query = "SELECT * FROM `registered_users` WHERE `Email` = ?";
//     $stmt = mysqli_prepare($con, $query);
//     mysqli_stmt_bind_param($stmt, 's', $email);
//     mysqli_stmt_execute($stmt);
//     $result = mysqli_stmt_get_result($stmt);

//     if ($result) {
//         if (mysqli_num_rows($result) == 1) {
//             $reset_token = bin2hex(random_bytes(16));
//             date_default_timezone_set('Asia/Kolkata');
//             $date = date("Y-m-d");
//             $query = "UPDATE `registered_users` SET `Reset_token`=?, `Reset_token_expired`=? WHERE `Email` = ?";
//             $stmt = mysqli_prepare($con, $query);
//             mysqli_stmt_bind_param($stmt, 'sss', $reset_token, $date, $email);

//             if (mysqli_stmt_execute($stmt) && sendMail($email, $reset_token)) {
//                 echo "<script>
//                         alert('Password Reset Link Sent to Mail');
//                         window.location.href = 'index.php';
//                       </script>";
//             } else {
//                 echo "<script>
//                         alert('Server down! Try again later');
//                         window.location.href = 'index.php';
//                       </script>";
//             }
//         } else {
//             echo "<script>
//                     alert('Email not found');
//                     window.location.href = 'index.php';
//                   </script>";
//         }
//     } else {
//         echo "<script>
//                 alert('Cannot run query: " . mysqli_error($con) . "');
//                 window.location.href = 'index.php';
//               </script>";
//     }
// }
// ?>

