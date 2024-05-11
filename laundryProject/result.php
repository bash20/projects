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
if(isset($_POST['checkbox']) && isset($_POST['enter']) && isset($_POST['select']) && $_POST['price'] && $_POST['no']){

$items = serialize($_POST['checkbox']);
$process = serialize($_POST['select']);
$price = $_POST['price'];
$no = $_POST['no'];
$name = $_POST['custname'];
$date = $_POST['date'];



$servername = "localhost";
$username = "root";
$password = "";
$database = "item";

$no = serialize(array_filter($no,"strlen"));
$price = serialize(array_filter($price,"strlen"));


$conn = new mysqli($servername,$username,$password,$database);

if($conn->connect_errno){
    die("Connection failed: ". $conn->connect_errno);
}
$sql = "INSERT INTO cloths (cname,d,items,process,nofclo,price,t) VALUES ('$name','$date','$items','$process','$no','$price',current_timestamp())";
if ($conn->query($sql) === TRUE) {
    echo '<div class="alert alert-success" role="alert">
    Customer data Entered succesfully in Database
  </div>';
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>