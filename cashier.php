
<?php
include_once './include/dbcon.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cashier | G4 Carwash Services</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
    <header>
            <div class="container">
                <div id="branding">
                    <h1> G4 Carwash Services LTD </h1>
                </div>
                <nav>
                    <ul>
                        <li>  <a href='index.php'>Home</a> </li>
                        <li>  <a href='cashier.php'>Cashier</a> </li>
                        <li>  <a href='settings.php'>Settings</a> </li>
                        <li> <a href='owner.php'>Owner</a> </li>
                    </ul>
                </nav>
            </div>
        </header>
    <h1 class="adjust-margin">CASHIER</h1>
    <div class="center">
        <form action="add_customer.php" method="post">
           <input type="hidden" name="Id">

           <label> Customer </label>  <br>
           <input type="text" name="customername" required placeholder="Customer Name"><br><br>

           <label> Date </label> <br>
           <input type="date" name="date" required><br><br>

           <label> Car Type </label>  <br>
           <input type="text" name="cartype" required placeholder="Car Type"><br><br>

           <label> Service </label> <br>
           <?php 
                // Write out our query.
                $pdoQuery = "SELECT * FROM services_tbl"; 
                // Execute it, or let it throw an error message if there's a problem.
                $pdoResult = $pdoConnect->query($pdoQuery); 
                
                $dropdown = "<select name='service'> <option> Select Service</option>";
                
                foreach ($pdoResult as $row) {
                $dropdown .= "<option value='{$row['service']}'>{$row['service']} ({$row['price']}) </option>" ;
                    }

                $dropdown .= "</select>";
                echo $dropdown;
            ?>  
    
            <br><br>
            <label> Charge </label> <br>
            <input type="text" name="charge" required placeholder="Charge"><br><br>

           <input type="submit" name="insert" value="Save"><br><br><br>
        </form> 
    </div>
<br>
<?php
    $pdoQuery = 'SELECT * FROM customers_tbl';
    $pdoResult =  $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute();
        echo "<div class=center>";
        echo "<table class=content-table>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Customer</th>";
                    echo "<th>Date</th>";
                    echo "<th>Car Type</th>";
                    echo "<th>Service</th>";    
                    echo "<th>Charge</th>";  
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";       
    while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
            
                echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$customername</td>";
                    echo "<td>$date</td>";
                    echo "<td>$cartype</td>";
                    echo "<td>$service</td>";
                    echo "<td>$charge</td>";
		        echo "</tr>";
    }
            echo "</tbody>";
        echo "</div>"
    
?>
    </body>
</html>

