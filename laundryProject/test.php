<?php 
    session_start();
    $date = $_SESSION['date'];
    echo "$date";
?>vxfa nddx wjeb oifm
<?php

if(isset($_POST["submit"])){
$servername = "localhost";
$username = "root";
$password = "";
$database = "detail";

$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_errno){
    die("Connection failed: ". $conn->connect_errno);
}
$name = $_POST["name"];
$pass = $_POST["pass"];
$login = false;

$sql = "SELECT * FROM owner WHERE shopname = '$name' AND password = '$pass'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num==1){
  $login = true;
  session_start();
  
    $_SESSION['loggedin'] = true;
    $_SESSION['shopname'] = $name;
    header('Location: main.php');
    exit;

} else {
    // Invalid credentials, handle accordingly
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> No accoount found.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<form method="post" action="login.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Shop Name</label>
    <input type="text" class="form-control" placeholder="Enter shop name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="pass">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<div class="content">
<div class="up"></div>
<div calss="down">
  <form method="post" action="login.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Shop Name</label>
    <input type="text" class="form-control" placeholder="Enter shop name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="pass">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
    </div>