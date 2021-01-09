<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header("location:index.php");
}

echo "Bienvenue ". $_SESSION["login"];
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title> perso </title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
<h1> Page privée </h1>
<h2>N'oubliez pas de vous déconnecter svp</h2>
<a href="deconnection.php"> Deconnexion </a>