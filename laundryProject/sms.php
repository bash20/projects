<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

<?php

session_start();
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ) {
    // If not logged in, redirect to login.php
    header('Location: login.php');
    exit;
}

$date = $_SESSION['d'];
$cname = $_SESSION['dname'];
$total = $_SESSION['total'];
$myArray1 = $_SESSION['Items'];
$myArray2 = $_SESSION['process'];
$myArray3 = $_SESSION['nofclo'];
$myArray4 = $_SESSION['price'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-6.8.1\PHPMailer-6.8.1\src/PHPMailer.php';
require 'PHPMailer-6.8.1\PHPMailer-6.8.1\src/SMTP.php';
require 'PHPMailer-6.8.1\PHPMailer-6.8.1\src/Exception.php';


if(isset($_POST['send'])){
   

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Enable SMTP debugging (optional)
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

// Set mailer to use SMTP
$mail->isSMTP();

// Specify SMTP server settings
$mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server's hostname
$mail->SMTPAuth = true;
$mail->Username = 'barmedashreyansh1710@gmail.com'; // Your SMTP username
$mail->Password = 'iafl kzbs park vnqq'; // Your SMTP password
$mail->SMTPSecure = 'ssl'; // Enable TLS
$mail->Port = 465; // Use the appropriate port (587 for TLS)

// Set sender and recipient
$mail->setFrom('barmedashreyansh1710@gmail.com');
$mail->addAddress('bekar1710@gmail.com');

$message = "Dear $cname your order given on $date is\n";
for($i=0;$i<count($myArray1);$i++){
    $message .= "$myArray1[$i] => "."$myArray2[$i] => "."$myArray3[$i] => "."$myArray4[$i]/- => ".(int)$myArray3[$i]*(int)$myArray4[$i]."\n";
}
$message .= "is ready and your total amount is $total/-. So collect your order.";

// Email content
$mail->Subject = 'Vinayak Laundry Bill';
$mail->Body = $message;

// Send the email
if ($mail->send()) {
    echo '<div class="alert alert-success" role="alert">
    Email sent succesfully !
  </div>';
} else {
    echo 'Email sending failed: ' . $mail->ErrorInfo;
}

}

?>
