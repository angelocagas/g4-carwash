<?php
require_once("./include/dbcon.php");

    $pdoQuery = "DELETE FROM services_tbl where id =" . $_GET['id'];
    $pdoResult =  $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute();
	header('location:services.php');

	$pdoConnect = null;
?>