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

$date = $_SESSION['d'];
$cname = $_SESSION['dname'];
$total = $_SESSION['total'];
$myArray1 = $_SESSION['Items'];
$myArray2 = $_SESSION['process'];
$myArray3 = $_SESSION['nofclo'];
$myArray4 = $_SESSION['price'];

if(isset($_POST['send'])){

$to = "barmedashreyansh1710@gmail.com";
$subject = "My Subject";
$message = "Dear $cname your order given on $date is\n";
for($i=0;$i<count($myArray1);$i++){
    $message .= "$myArray1[$i] => "."$myArray2[$i] => "."$myArray3[$i] => "."$myArray4[$i]/- => ".(int)$myArray3[$i]*(int)$myArray4[$i]."\n";
}
$message .= "is ready and your total amount is $total/-. So collect your order.";

$headers = "From: bekar1710@gmail.com";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Email sending failed.";
}}
?>

