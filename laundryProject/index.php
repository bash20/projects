<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      @media (max-width:600px){
        html,body{
            height: 100%;
            width: 100%;
            background-image: url("https://www.seekpng.com/png/detail/117-1177280_transparent-download-put-in-hamper-clipart-laundry-washing.png");
        }
        .content{
            height: calc(100% - 100px);
            width: 100%;
            display: flex;
        }
        .right{
            height: 100%;
            width: 100%;
            
        }
        .right span{
            color: rgb(243, 101, 6);
        }
        .right button{
            background: lightseagreen;
            margin-top: 20vw;
            width: 90%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 7vw;
            color:white ;
            font-weight: 800;
            border-radius: 6px;
            margin-left: 5%;
            margin-right: 5%;
        }
        h1{
            font-size: 7vh;
            margin-left: 5%;
            margin-right: 5%;
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
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="main.html">Cloth Entry</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="test1.php" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

    <div class="content">
        <div class="right">
            <h1>Make Easy laundry <span>Business</span></h1>
           <a href="main.php"><button>Old Customer</button></a>
            <a href="newcust1.php"><button>New Customer</button></a>

        </div>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
