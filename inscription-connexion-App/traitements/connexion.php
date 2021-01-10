<?php
session_start();
include('../bdd.php');

if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])){
  
  $login = $_POST['login'];
  $password = $_POST['password'];

  $req = " SELECT * FROM utilisateur WHERE login =?";
  #$req ->bindParam(1, $login);
  $stmt = $bdd -> prepare($req);
  $stmt ->execute([$login]);
  $data = $stmt->fetch();
    if(password_verify($password,$data['password'])){
      $_SESSION["login"] = $login;
      header('location:../membre.php');
    }
    else{
      echo 'incorrect';
    }
 
  

  



}
?>