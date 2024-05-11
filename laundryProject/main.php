<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ) {
    // If not logged in, redirect to login.php
    header('Location: login.php');
    exit;
}
echo $name=$_SESSION['shopname'] ;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Hello, world!</title>
    <style>
      @media (max-width:600px){
        html,body{
          height: 100%;
          width: 100%;
          background-image: url("./img.png");
          background-position: center;
            background-size: cover;
        }
       .content{
        height: calc(100% - 100px);
        width: 100%;
       }
       .item{
        height: 20%;
        width: 100%;
       }
       .tab{
        height: 70%;
        width: 100%;
        overflow-x: auto;
       }
       .tab table{
        font-size: 2.1vw;
        width: 90%;
        height: 250px;
        border-radius: 5px;
        border: 5px solid black;
        text-shadow: 0 0 5px orange, 0 0 5px orange;
        color: black;
        margin-left: 5%;
        margin-right: 5%;
       }
       td,th{
        font-size:x-large;
        text-align: center;
        font-weight: 900;  
        border: 4px solid black;    
       }
       input[type="submit"],
       input[type="text"],
       input[type="date"]{
        width: 90%;
        margin-top: 5%;
        margin-left: 5%;
        margin-right: 5%;        
       }
       .item h1{
        font-size: 7vh;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: pink;
        text-shadow: 0 0 10px black, 0 0 10px black;
       }      
    }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="main.php">Cloth Entry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="POST" action="test1.php">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="dname">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
      </form>
    </div>
  </nav>
  <div class="content">
    <div class="item">
    <h1>Enter cloth detail</h1>
    </div>
    <form action = "result.php" method="POST">
    <div class="form-group">
              <input type="text" class="form-control" name="custname" placeholder="Enter Name">
            </div>
    <div class="form-group">
              <input type="date" class="form-control" name="date">
    </div>
    <div class="tab" >
<table border="1">
<tr>
<th>Items</th>
<th>Process</th>
<th>Price</th>
<th>Number of Items</th>
<th>Total</th>
</tr>
<tr>
<td><div class="form-check">
<input class="form-check-input" type="checkbox" name="checkbox[]" value="pent">
<label class="form-check-label" for="pent">Pent</label>
</div></td>
<td><div class="dropdown">
<select id="pantpro" name="select[]">
<option value="none" selected disabled hidden>Select an Option</option>
<option value="washing" id="pwash">Washing</option>
<option value="pressing">Pressing</option>
<option value="washpress">Washing + Pressing</option>
<option value="drywash">Drywash</option>
<option value="rollpol">RollPolice</option>
</select>
</div></td>
<td><input type="number" class="price" placeholder="Enter price" name="price[]"></td>
<td><input type="number" class="quantity" name="no[]"></td>
<td><p class="tot" id="penttot">0</p></td>
</tr>

<tr>
<td><div class="form-check">
<input class="form-check-input" type="checkbox" name="checkbox[]" value="shirt">
<label class="form-check-label" for="shirt">Shirt</label>
</div></td>
<td><div class="dropdown">
<select name="select[]">
<option value="none" selected disabled hidden>Select an Option</option>
<option value="washing">Washing</option>
<option value="pressing">Pressing</option>
<option value="washpress">Washing + Pressing</option>
<option value="drywash">Drywash</option>
<option value="rollpol">RollPolice</option>
</select>
</div></td>
<td><input type="number" class="price" placeholder="Enter price" name="price[]"></td>
<td><input type="number" class="quantity" name="no[]"></td>
<td><p class="tot" id="shirttot"></p></td>
</tr>

<tr>
<td><div class="form-check">
<input class="form-check-input" type="checkbox" name="checkbox[]" value="sari">
<label class="form-check-label" for="sari">Sari</label>
</div></td>
<td><div class="dropdown">
<select name="select[]">
<option value="none" selected disabled hidden>Select an Option</option>
<option value="washing">Washing</option>
<option value="pressing">Pressing</option>
<option value="washpress">Washing + Pressing</option>
<option value="drywash">Drywash</option>
<option value="rollpol">RollPolice</option>
</select>
</div></td>
<td><input type="number" class="price" placeholder="Enter price" name="price[]"></td>
<td><input type="number" class="quantity" name="no[]"></td>
<td><p class="tot" id="saritot">0</p></td>
</tr>

<tr>
<td><div class="form-check">
<input class="form-check-input" type="checkbox" name="checkbox[]" value="suit">
<label class="form-check-label" for="suit">Suit</label>
</div></td>
<td><div class="dropdown">
<select name="select[]">
<option value="none" selected disabled hidden>Select an Option</option>
<option value="washing">Washing</option>
<option value="pressing">Pressing</option>
<option value="washpress">Washing + Pressing</option>
<option value="drywash">Drywash</option>
<option value="rollpol">RollPolice</option>
</select>
</div></td>
<td><input type="number" class="price" placeholder="Enter price" name="price[]"></td>
<td><input type="number" class="quantity" name="no[]" ></td>
<td><p class="tot" id="suittot">0</p></td>
</tr>
<tr>
<td colspan="4"></td>
<td><p class="tot" id="total">0</p>
<input type="hidden" name="total" id="th"></td>
</tr>
</table>
  </div>
  <input class="btn btn-primary" type="submit" value="Enter" name="enter">
</form>
  </div>
  
<script>

  //let p = parseInt(document.getElementById("penttot").innerHTML);
  //let sh = parseInt(document.getElementById("shirttot").innerHTML);
  //let sa = parseInt(document.getElementById("saritot").innerHTML);
  //let su = parseInt(document.getElementById("suittot").innerHTML);
  
document.addEventListener("input",function(e){
  if(e.target.classList.contains('price') || e.target.classList.contains("quantity") ){
    updateTable(e.target.closest("tr"))
  }
});
function updateTable(selectedRow){
  let rowid = selectedRow.querySelector("p").id;
  const qu = parseInt(selectedRow.querySelector(".quantity").value)||0;
  const pr = parseInt(selectedRow.querySelector(".price").value)||0;
  const subtotal = qu*pr;
  document.querySelector("#" + rowid).textContent = subtotal;
let total = document.querySelector("#" + rowid).textContent;
}
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</div>
  </body>
</html>
