<?php
$survername = "localhost";
$username = "root";
$password = "";
$database = "fees";
$database2 = "studentlib";

$conn = mysqli_connect($survername,$username,$password,$database);
$conn2 = mysqli_connect($survername,$username,$password,$database2);



if(isset($_POST['submit'])){
                 
    $enrol = $_POST['num'];
    $sub = $_POST['sub'];
    $book = $_POST['book'];

    $sql = "SELECT * FROM `books` WHERE `Bookname` = '$book' " ;
    $result = mysqli_query($conn2,$sql);
    $row = mysqli_fetch_assoc($result);
    $bookn = $row['bookno'];

    if($book==$book){
        $bookn = $bookn-1;
        $sql1 = "UPDATE books SET bookno = '$bookn' WHERE `Bookname` = '$book'";
        $result = mysqli_query($conn2,$sql1);
    }

    if($bookn>0){

    echo("Apne <h5>$book</h5> li he ab $bookn hi baki he agar chahiye to aur lo varna jane do.Kam khatam hone par book vapas karna apni property samaj kar rakh mat lena");}
    elseif($bookn==0)
   {
    echo("Aap late ho chuke sab book ka stock khatam.Chalo aab niklo.");
   }
}
?>