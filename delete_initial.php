<?php
require_once("./include/dbcon.php");

    $pdoQuery = "DELETE FROM date_tbl where id =" . $_GET['id'];
    $pdoResult =  $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute();
	header('location:initial_cash.php');

	$pdoConnect = null;
?>
