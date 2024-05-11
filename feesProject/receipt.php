
<!DOCTYPE html>
<head>

<style>
        @media print{
        .input{
                display: none;
        }
        .in2{
                display: none;
        }
        .back{
                display: none;
        }
        .lab{
                display: none;
        }
}
</style>

</head>
<body>

        <form action="receipt.php" method = "POST">
                
                <input type="text" name="num" class="input" placeholder="Enter your Enrollment number"><br><br>

                <input type="submit" name="generate" value="Generate Receipt" class="in2"><br><br>
        </form>
        
        <table border="1">

                <?php
                 $survername = "localhost";
                 $username = "root";
                 $password = "";
                 $database = "fees";
                 
                 $conn = mysqli_connect($survername,$username,$password,$database);
                 
                 if(isset($_POST['generate'])){
                 
                         $enrol = $_POST['num'];
                 
                 $sql = "SELECT * FROM `student` WHERE `Enrollment no.` = '$enrol' " ;
                 $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_assoc($result);
                ?>
                <th colspan="2">Fees Receipt</th>
                <tr>
                        <th>Name</th>
                        <td><?php echo $row['Name']; ?></td>
                </tr>
                <tr>
                        <th>Number</th>
                        <td><?php echo $row['Enrollment no.']; ?></td>
                </tr>
                <tr>
                        <th>Fees</th>
                        <td><?php echo $row['Fees']; ?></td>
                </tr>
                <tr>
                        <th>Date and Time</th>
                        <td><?php echo $row['dt']; ?></td>
                </tr>
                <tr>
                        <th>Mode</th>
                        <td><?php echo $row['Payment mode']; ?></td>
                </tr>
                <tr>
                        <th>Course</th>
                        <td><?php echo $row['Course Name']; ?></td>
                </tr>
                <tr>
                        <th>Generated on</th>
                        <td><?php echo date('d/m/y H:i:s') ?></td>
                </tr>
                <?php
                        }
                        else
                        {
                ?>
                       <tr>
                        <td colspan="3">
                                <?php echo "no record found" ?>
                        </td>
                       </tr>
                <?php
                        }
                }
                ?>

        </table>

        <a href="example.php" class="back">Go back</a>

</body>
</html>