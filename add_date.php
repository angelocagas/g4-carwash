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
    $date = $_POST['date'];
    $cash = $_POST['cash'];
   
   
    // mysql query to insert data
    $pdoQuery = "INSERT INTO `date_tbl`(`date`, `cash`) VALUES (:date,:cash); set @autoid :=0; update date_tbl set id = @autoid := (@autoid+1);  alter date_tbl Auto_Increment = 1;";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":date"=>$date,":cash"=>$cash));
    
    // check if mysql insert query successful
    if($pdoExec)
    {
        // retrieve all files and display
        $pdoQuery = 'SELECT * FROM date_tbl';
        $pdoResult =  $pdoConnect->prepare($pdoQuery);
        $pdoResult->execute();
            while ($row = $pdoResult->fetch()){
                echo  $row['id'] . " | " .$row['date'] . " | " . $row['cash'] . " | " . "<br/>";
            }
            header("Location: initial_cash.php");
            exit;
        } else {
            echo 'Data Not Inserted';
    }
}
$pdoConnect = null;
?>

