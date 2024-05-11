<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["login"])){
$servername = "localhost";
$username = "root";
$password = "";
$database = "detail";

$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_errno){
    die("Connection failed: ". $conn->connect_errno);
}
$login = false;

function validUser($dukan,$tala,$conn){

  $sql = "SELECT * FROM owner WHERE shopname = ? AND password = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss",$dukan,$tala);

  $stmt->execute();

  $result = $stmt->get_result();

  if($result->num_rows > 0){
    return true;
  }else{
    return false;
  }

}
$dukan = $_POST['name'];
$tala = $_POST['pass'];
if(validUser($dukan,$tala,$conn)){
$login = true;
session_start();
  
    $_SESSION['loggedin'] = true;
    $_SESSION['shopname'] = $dukan;
    header('Location: main.php');
    exit;
}
else{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Invalid username or password.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
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
    <style>
      @media(max-width:600px){
        html,body{
          width: 100%;
          height: 100%;
          
       }
        .contant{
          height: 100%;
          width: 100%;
        }
        .top{
          height: 30%;
          width: 100%;
          
        }
        .down{
          height: 70%;
          width: 100%; 
         
        }
        .down form{
          width: 80%;
          margin-left: 10%;
          margin-right: 10%;
          border: 5px solid orange;
          border-radius: 5px;
          margin-top: 5%;
          margin-bottom: 5%;
        }
        input[type="text"],
        input[type="password"]{
          width: 90%;
          margin-left: 5%;
          margin-right: 5%;
        }
        .down button{
          margin-left: 10%;
          margin-right: 10%;
          margin-bottom: 5%;
        }
        .down p{
          margin-left: 10%;
          margin-right: 10%;
          text-align: center;
          color: red;
          font-weight: 500;
          font-size: 4vw;
        }
        hr {
          color: #333; 
          background-color: #333; 
          height: 2px; 
          border: none; 
          width: 80%;
        }
        .down button{
          width: 70%;
          margin-top: 5%;
          margin-left: 15%;
          border-radius: 10px;
          font-size: 4.5vw;
        }
        .down input{
          border: none;
          background: transparent;
          border-bottom: 2px solid black;
          outline: none;
          font-size: 4.5vw;
          margin-top: 5%;
        }
        .top img{
          width: 100%;
          height: 70%;
        }
        .down form button{
          color:white;
          background-color: orange;
          padding: 3%;
        }
        
      }

    </style>
</head>
<body>
  <div class="contant">
    <div class="top">
      <img src="./webimg.jpg">
    </div>
    <div class="down">
      <form method="post" action="login.php">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter shop name" name="name">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" placeholder="Password" name="pass">
  </div>
  <button type="submit" name="login">Log In</button>
</form>
<a href="fpass.php"><p>Forgot password?</p></a>
<hr>
<a href="#"><button class="btn btn-success" name="submit">Create a New Account</button></a>
</div>
  </div>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>