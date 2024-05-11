<?php 
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ) {
    // If not logged in, redirect to login.php
   header('Location: login.php');
    exit;
}
    if(isset($_POST['enter'])){

    $cname = $_POST['custname'];
    $email = $_POST['emailid'];
    $add = $_POST['add'];
        $conn = new mysqli("localhost","root","","detail");
        if($conn->connect_errno){
            die("connection failed: ".$conn->connect_errno);
        }
        else{
            $sql = "INSERT INTO custdet(Cust_name,email,cust_add) VALUE (?,?,?)";
            $stmt = $conn->prepare($sql);

            // Generate a random encryption key
//$encryptionKey = openssl_random_pseudo_bytes(32);

// Encrypt the data
//$enccname = openssl_encrypt($cname, 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
//$encemail = openssl_encrypt($email, 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
//$encadd = openssl_encrypt($add, 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

            // Bind parameters and execute the query
            $stmt->bind_param("sss", $cname, $email,$add);
            
            if ($stmt->execute()) {
                header("Location: main.php");
            } else {
                echo "Error: " . $stmt->error;
            }
            
            // Close the statement and the database connection
            $stmt->close();
            $conn->close();
            
        }

    }
?>
