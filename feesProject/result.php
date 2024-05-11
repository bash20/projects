<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
session_start();

require("src\Instamojo.php");


const API_KEY = "test_d36f102525adbd46e0afb814182";
const AUTH_TOKEN = "test_9f8dc3e5546dbfc7b7529c585e1";

$api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN, 'https://test.instamojo.com/api/1.1/');

try {
    $payment_req_id = $_GET['payment_request_id'];
    $pay_id = $_GET['payment_id'];
    $response = $api->paymentRequestStatus($payment_req_id);
    
    if($response['status']=="Failed"){
        echo("Payment not successful");
    }
    else{
        $survername = "localhost";
        $username = "root";
        $password = "";
        $database = "fees";

$conn = mysqli_connect($survername,$username,$password,$database);

        $name = $_SESSION['sname'];
        $enrol = $_SESSION['num'];
        $pmode = $_SESSION['mode'];
        $course = $_SESSION['course']; 
        $sfees = $_SESSION['fees'];
        $fstat = $_SESSION['stat'];

        $sql = "INSERT INTO `student` (`Name`, `Enrollment no.`,`Payment mode`,`Course Name`,`Fees`,`Fees status`,`dt`,`paymentid`) VALUES ('$name', '$enrol','$pmode','$course','$sfees','$fstat',current_timestamp(),'$pay_id'	)";
       
$result = mysqli_query($conn,$sql);
if($result){
    echo '<div class="alert alert-success" role="alert">
    Thank you! 
    Payment Successfull done!
  </div>';

}
else{
    echo "not inserted";
}
    }
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>