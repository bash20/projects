<?php

session_start();

require("src\Instamojo.php");

const API_KEY = "test_d36f102525adbd46e0afb814182";
const AUTH_TOKEN = "test_9f8dc3e5546dbfc7b7529c585e1";

$api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN, 'https://test.instamojo.com/api/1.1/');

$name = $_POST["sname"];
$enrol = $_POST["num"];
$pmode = $_POST["mode"];
$course = $_POST["course"];
$sfees = $_POST["fees"];
$fstat = $_POST["stat"];

$_SESSION['sname']=$name;
$_SESSION['num']=$enrol;
$_SESSION['mode']=$pmode;
$_SESSION['course']=$course;
$_SESSION['fees']=$sfees;
$_SESSION['stat']=$fstat;

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "fees",
        "amount" => $sfees,
        "send_email" => true,
        "email" => "foo@example.com",
        "redirect_url" => "http://localhost/instamojo/result.php"
        ));
   $url = $response['longurl'];
   header("location:$url");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}


?>