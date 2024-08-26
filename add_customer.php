<?php
// php pdo insert data to mysql database 
if(isset($_POST['insert']))
{
    try {
        // connect to mysql
    $pdoConnect = new PDO("mysql:host=localhost;dbname=carwash_db","root","");
    // set the PDO error mode to exception
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    // get values form input text and number
    $id = $_POST['id'];
    $customername = $_POST['customername'];
    $date = $_POST['date'];
    $cartype = $_POST['cartype'];
    $service = $_POST['service'];
    $charge = $_POST['charge'];
   
   
    // mysql query to insert data
    $pdoQuery = "INSERT INTO `customers_tbl`(`customername`, `date`, `cartype`, `service`, `charge`) VALUES (:customername, :date, :cartype, :service, :charge); set @autoid :=0; update customers_tbl set id = @autoid := (@autoid+1);  alter customers_tbl Auto_Increment = 1;"; 
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":customername"=>$customername, ":date"=>$date, ":cartype"=>$cartype, ":service"=>$service, ":charge"=>$charge));
    
    // check if mysql insert query successful
    if($pdoExec)
    {
        // retrieve all files and display
        $pdoQuery = 'SELECT * FROM customers_tbl';
        $pdoResult =  $pdoConnect->prepare($pdoQuery);
        $pdoResult->execute();
            while ($row = $pdoResult->fetch()){
                echo  $row['id'] . " | " .$row['customername'] . " | " .$row['date'] . " | " .$row['cartype'] . " | " .$row['service'] . " | " .$row['charge'] . " | "  ."<br/>";
            }
            header("Location: cashier.php");
            exit;
        } else {
            echo 'Data Not Inserted';
    }
}
$pdoConnect = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>