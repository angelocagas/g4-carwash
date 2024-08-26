<?php
include_once './include/dbcon.php';

if (!empty($_POST["modify"])) {
    $pdoQuery = $pdoConnect->prepare("update services_tbl set service = '" . $_POST['service'] . "' , price = '" . $_POST['price'] . "' where id = " . $_GET["id"]);
    $pdoResult = $pdoQuery->execute();
    if ($pdoResult) {
        header('location:services.php');
    }
}
$pdoQuery = $pdoConnect->prepare("SELECT * FROM services_tbl where id=" . $_GET["id"]);
$pdoQuery->execute();
$pdoResult = $pdoQuery->fetchAll();
$pdoConnect = null;
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Edit Service | G4 Carwash Services</title>
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
                        <li> <a href='index.php'>Home</a> </li>
                        <li> <a href='cashier.php'>Cashier</a> </li>
                        <li> <a href='settings.php'>Settings</a> </li>
                        <li> <a href='owner.php'>Owner</a> </li>
                    </ul>
                </nav>
            </div>
        </header>
        <h1>Edit Service</h1>
        <br>
        <div class="center">
            <form action="" method="post">
                Service: <br> <input type="text" name="service" value="<?php echo $pdoResult[0]['service']; ?>" required
                    placeholder="Service"><br><br>
                Price: <br><input type="text" name="price" value="<?php echo $pdoResult[0]['price']; ?>" required
                    placeholder="Price"><br><br>
                <input type="submit" name="modify" value="Update">
            </form>
        </div>
        <br>
    </body>

</html>