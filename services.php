
<?php
include_once './include/dbcon.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Services | G4 Carwash Services</title>
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
    <h1>ADD SERVICES</h1>
    <div class="center">
        <form action="add_service.php" method="post">
           <input type="hidden" name="Id">
           <label> Service: </label> <br>
           <input type="text" name="service" required placeholder="Service"><br><br>
           <label> Price: </label>  <br>
           <input type="text" name="price" required placeholder="Price"><br><br>
           <input type="submit" name="insert" value="Save"><br><br><br>
        </form>
    </div> 
<br>
<?php
    $pdoQuery = 'SELECT * FROM services_tbl';
    $pdoResult =  $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute();
    echo "<div class=center>";
        echo "<table class=content-table>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Service</th>";
                    echo "<th>Price</th>";     
                    echo "<th>Action</th>"; 
                echo "</tr>";
        echo "</thead>";
    while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$service</td>";
        echo "<td>Php $price</td>";
        echo "<td><a href='edit_service.php?id=$id';>Edit</a> <a href='delete_service.php?id=$id';?>Delete</a></td>";
        
		echo "</tr>";
        echo "</div>";
    }
?>
    </body>
</html>

