
<?php
include_once './include/dbcon.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Owner | G4 Carwash Services</title>
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
    <h1>Owner</h1>
    <div class="center">
        <form action="search.php" method="post">

           <label> Date </label> <br>
           <input type="date" name="date" required>  <br><br>

           
           <input type="submit" name="find" value="search"><br><br><br>
    </div>
        </form> 
<br>

    </body>
</html>

