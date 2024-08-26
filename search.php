
<?php

// php search data in mysql database using PDO
// set data in input text
echo "<div class=center>";
echo "<div class=maincont>";
$id = "";
$date = "";
$cash = "";
$nodata = "No&nbsp;data";
$charge ="";

if(isset($_POST['find']))
{
        // connect to mysql
    try {
        $pdoConnect = new PDO("mysql:host=localhost;dbname=carwash_db","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
    // date to search
    $date = $_POST['date'];

    //DATE
    
    echo " <br> <br> <br> <br><label> Date: </label> <br>";
    echo "<input type=text value=$date readonly=readonly> <br><br>";
    
     
    // CUSTOMERS
    $pdoQuery = "SELECT * FROM customers_tbl WHERE date = :date";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $count = 0;
    $income = 0;

    $pdoExec = $pdoResult->execute(array(":date"=>$date));
    
      if($pdoExec)
    {
        if($pdoResult->rowCount()>0)
        {
            
        while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
            $count++;
        extract($row);
            }
            echo " <label> Total Number of Customers: </label> <br>";
            echo "<input type=text value=$count readonly=readonly><br><br>";
        } else {
            echo " <label> Total Number of Customers: </label> <br>";
            echo "<input type=text value=$nodata readonly=readonly> <br><br>";
        }
    }
        // INITIAL CASH
        $pdoQuery = "SELECT * FROM date_tbl WHERE date = :date";
        $pdoResult = $pdoConnect->prepare($pdoQuery);

        $pdoExec = $pdoResult->execute(array(":date"=>$date));

        if($pdoExec)
        {
            if($pdoResult->rowCount()>0)
            {
        while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            echo " <label> Initial Cash: </label> <br>";
            echo "<input type=text value=$cash readonly=readonly id=initial> <br><br>";
            
                }
            } else {
                echo " <label> Initial Cash: </label> <br>";
                echo "<input type=text value=$nodata readonly=readonly><br><br>";
        }
        }

        // TOTAL EXPENSE Today
        echo " <label> Total Expense Today: </label> <br>";
        echo "<input type=text placeholder=Expenses&nbsp;Today id=expense value=> <br> <br>";

        // INCOME
        $pdoQuery = "SELECT charge FROM customers_tbl WHERE date = :date";
        $pdoResult = $pdoConnect->prepare($pdoQuery);

        $pdoExec = $pdoResult->execute(array(":date"=>$date));

        if($pdoExec)
        {
            if($pdoResult->rowCount()>0)
            {
        while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $income += $charge;
            
                }
            echo " <label> Income Earned Today: </label> <br>";
            echo "<input type=text value=$income readonly=readonly id=income> <br><br>";
            } else {
                echo " <label> Income Earned Today: </label> <br>";
                echo "<input type=text readonly=readonly value=$nodata><br><br>";
        }
        }

        echo "<input type = button value = Compute&nbsp;Total class=btn> <br><br>";

        // TOTAL INCOME
            echo " <label> Total Income Earned Today: </label> <br>";
            echo "<input type=text readonly=readonly id=total> <br>";
            echo "</div>";
            echo "</div>";
}
$pdoConnect = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Date Search | G4 Carwash Services</title>
</head>
<body>
    
<script>
        const btnTotal = document.querySelector('.btn').addEventListener('click', function(){
        const initial = document.querySelector('#initial').value;
        const income = document.querySelector('#income').value;
        const expense = document.querySelector('#expense').value;
        const totalIncome = document.querySelector('#total');

        if(expense == 0 || expense == null){
            alert('Input Expenses Today');
        }
        else{
            totalIncome.value = (Number(initial) + Number(income)) - Number(expense);
        }
    })
</script>
</body>
</html>