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
    $service = $_POST['service'];
    $price = $_POST['price'];
   
   
    // mysql query to insert data
    $pdoQuery = "INSERT INTO `services_tbl`(`service`, `price`) VALUES (:service,:price); set @autoid :=0; update services_tbl set id = @autoid := (@autoid+1);  alter services_tbl Auto_Increment = 1;";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":service"=>$service,":price"=>$price));
    
    // check if mysql insert query successful
    if($pdoExec)
    {
        // retrieve all files and display
        $pdoQuery = 'SELECT * FROM services_tbl';
        $pdoResult =  $pdoConnect->prepare($pdoQuery);
        $pdoResult->execute();
            while ($row = $pdoResult->fetch()){
                echo  $row['id'] . " | " .$row['service'] . " | " . $row['price'] . " | " . "<br/>";
            }
            header("Location: services.php");
            exit;
        } else {
            echo 'Data Not Inserted';
    }
}
$pdoConnect = null;
?>

