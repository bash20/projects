<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "detail";

$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_errno){
    die("Connection failed: ". $conn->connect_errno);
}

$sql = "UPDATE owner WHERE shopname";

