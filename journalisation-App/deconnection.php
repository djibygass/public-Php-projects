<?php
session_start();
if(isset($_SESSION["adminonline"]))
{
    session_destroy();
    header("location:index.php");
}else{
include 'connectbdd.php';
$lastid=$_SESSION['lastid'];
$req=$connexion->query("UPDATE connection SET connection_end=NOW() WHERE id=".$lastid);
session_destroy();
header("location:index.php");}
?>
