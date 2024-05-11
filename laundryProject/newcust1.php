<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ) {
    // If not logged in, redirect to login.php
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        @media (max-width:600px){
        html,body{
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;    
        }
        .content{
            height: 100%;
            width: 100%;
        }
        .top{
            height: 30%;
            width: 100%;
        }
        .top h1{
            font-size: 7vh;
            width: 90%;
            margin-left: 5%;      
        }
        .top span{
            color: orange;
        }
        .down{
            height: 70%;
            width: 100%;
        }
        .down form{
            margin-top: 5%;
            background-color: lightgray;
            border-radius: 10px;
            margin-bottom: 5%;
            margin-left: 5%;
            margin-right: 5%;
            width: 90%;
        }
        .down label{
            font-size: 8vw;
            font-weight: 400;
            width: 90%;
            margin-left: 5%;
        }
        input[type="text"],
        input[type="email"]{
        width: 90%;
        margin-left: 5%;
             
       }
       #goback{
        margin-top: 2%;
        width: 90%;
        margin-left: 5%;
        margin-bottom: 10%;
       }
       #enter{
        width: 90%;
        margin-left: 5%;
        margin-bottom: 5%;
        
       }}
    </style>
</head>

<body>
    <div class="content">
    <div class="top">
        <h1>Connect New <span>Customer!</span></h1>
    </div>
    <div class="down">
    <form action="newcust.php" method="POST">
    <div class="form-group">
    <label for="inputAddress">Name</label>
    <input type="text" class="form-control" name="custname" placeholder="Enter name">
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="emailid" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="add" placeholder="1234 Main St">
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg btn-block" id = "enter" name="enter">Enter</button>
    </div>
  </div>
</form>
          <a href="index.php"><button type="button" class="btn btn-secondary btn-lg btn-block" id="goback">Go Back</button></a>
    </div>
    </div>
    
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>