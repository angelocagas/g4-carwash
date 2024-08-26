
<?php
include_once './include/dbcon.php';
 

if(!empty($_POST["modify"])) {
    $pdoQuery=$pdoConnect->prepare("update date_tbl set date = '" . $_POST['date'] . "' , cash = '" . $_POST['cash'] . "' where id = " . $_GET["id"]);
         $pdoResult = $pdoQuery->execute();
             if($pdoResult) {
                 header('location:initial_cash.php');
    }
}
    $pdoQuery = $pdoConnect->prepare("SELECT * FROM date_tbl where id=" . $_GET["id"]);
    $pdoQuery->execute();
    $pdoResult = $pdoQuery->fetchAll();
    $pdoConnect = null;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Initial Cash | G4 Carwash Services</title>
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
    <h1>Edit Initial Cash </h1>
        <br>
        <div class="center">
        <form action="" method="post">
           <label> Date </label>  <br> 
           <input type="date" name="date" value="<?php echo $pdoResult[0]['date']; ?>" required placeholder="Date" ><br><br>
           
           <label > Cash </label><br> 
           <input type="text" name="cash"  value="<?php echo $pdoResult[0]['cash']; ?>"  required placeholder="Cash"><br><br>
            <input type="submit" name="modify" value="Update"> 
        </form>
        </div>
        <br>
    </body>
</html>

