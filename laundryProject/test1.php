
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @media(max-width:600px){
        html,body{
            width: 100%;
            height: 100%;
            margin: 0%;
            padding: 0%;
        }
        .content{
            width: 100%;
            height: 100%;
        }
        .top{
            height: 20%;
            width: 100%;
        }
        .down{
            height: 80%;
            width: 100%;
            overflow-x: auto;
        }
        .down table{
        font-size: 5vw;
        width: 90%;
        height: 250px;
        border-radius: 5px;
        border: 2px solid black;
        color: black;
        margin-left: 5%;
        margin-right: 5%;
        background-color: lightgray;
        }
        td,th{
            text-align: center; 
        }
        .down p{
            text-align: center;
            font-size: 8vw;
        }
        h3{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        input[type="submit"]{
            margin-top: 5%;
            margin-left: 5%;
            margin-right: 5%;
            height: 5%;
          width: 90%;
          border-radius: 5px;
          font-size: 5vw;
          color: red;
          background-color: pink;
        }
    }
        </style>
</head>
<body>
    <div class="content">
        <div class=top></div>
        <div class="down">
<?php 

session_start();
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ) {
    // If not logged in, redirect to login.php
    header('Location: login.php');
    exit;
}

if(isset($_POST["search"])){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "item";

    $cname = $_POST['dname'];
    $_SESSION['dname'] = $cname;
    
$conn = new mysqli($servername,$username,$password,$database);

if($conn->connect_errno){
    die("Connection failed: ". $conn->connect_errno);
}

$sql = "SELECT * FROM cloths WHERE cname = '$cname'";

$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $serializedArray1 = $row['Items'];
        $serializedArray2 = $row['process'];
        $serializedArray3 = $row['nofclo'];
        $serializedArray4 = $row['price'];
        $date = $row['d'];

$_SESSION['d']= $date;

        $myArray1 = unserialize($serializedArray1);
        $myArray2 = unserialize($serializedArray2);
        $myArray3 = array_values(unserialize($serializedArray3));
        $myArray4 = array_values(unserialize($serializedArray4)); 

    }
    }
    $total = 0;
    for($j=0;$j<count($myArray3);$j++){
    $total =$total+ (int)$myArray3[$j]*(int)$myArray4[$j];
    }
    $_SESSION['total']=$total;
    $_SESSION['Items'] = $myArray1;
    $_SESSION['process'] = $myArray2;
    $_SESSION['nofclo']=$myArray3;
    $_SESSION['price'] = $myArray4;
}
?>
<form method="POST" action="email.php">
<table>
    <tr>
        <td colspan="5"><h3>Vinayak Laundry</h3></td>
    </tr>
    <tr>
        <td colspan="5"><?php echo $cname;?></td>
    </tr>
    <tr>
        <td colspan="5"><?php echo $date;?></td>
    </tr>
    <tr>
        <th>Items</th>
        <th>Process</th>
        <th>Price</th>
        <th>NO</th>
        <th>Total</th>
    </tr>
    <?php for($i=0;$i<count($myArray1);$i++){?>
     <tr>
        <td><?php echo $myArray1[$i];?></td>
        <td><?php echo $myArray2[$i];?></td>
        <td><?php echo $myArray4[$i];?></td>
        <td><?php echo $myArray3[$i];?></td>
        <td><?php echo (int)$myArray3[$i]*(int)$myArray4[$i];}?></td>
     </tr>
     <tr><td colspan="4"></td>
         <td><?php echo $total;?></td>
     </tr>
</table>
<input type="submit" name="send" value="Send Email">

</form>
        </div>
    </div>
</body>
</html>

