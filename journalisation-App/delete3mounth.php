<?php
session_start();
if(!isset($_SESSION["adminonline"]))
{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>delete confirme</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <form  method="post">
    <h2 class="Danger">Confirmer que vous voulez supprimer les données de plus de trois en tapant votre mot de passe d'administrateur !!!!</h2>
    <div>
      <input type="password" name="password" >
    </div>
    <div>
      <input type="submit" name="ok" >
    </div>
  </form>
  <?php
  if(isset($_POST['ok'])){
      
    if ($_POST['password']==$_SESSION['mdpadmin']){
      include 'connectbdd.php';
      $req=$connexion->query("DELETE FROM connection WHERE DATEDIFF(NOW(),connection_start)>90");
      header('location:admin.php');
    }
    else{
      echo 'VOUS N\'ETES PAS ADMINISTRATEUR';
      //header('location:deconnection.php');
  }
}
  
  
  ?>
  
</body>
</html>