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
  <title>admin</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
      include 'connectbdd.php';
    //  if(!isset($_POST['okay'])){
        ?>
        <h2>Période de consultation</h2>
        <br>
        <form action="admin.php" method="POST">
          <div class="conteneur">
            <div>
              <label for="connection_start"><b>Début</b> : </label>
              <input type="datetime" name="connection_start" >
              <br><br><br>
              <label for="connection_end"><b>Fin</b> :&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <input type="datetime" name="connection_end">
            </div>
            <div>
                <input type="submit" value="Rechercher" name="okay">
                <br><br><br>
                <a href="admin.php"><input type="button" name="reset" value="Réinitialiser"></a>
            </div>
            <div>
            <a href="deconnection.php"><input type="button" name="quit" value="Déconnection de l'admin"></a>
            <br><br><br>
            <a href="delete3mounth.php"><input type="button" name="delete" value="Supprimer les données d'au-delà de 3 mois"></a>
            </div>
          </div>
        </form>
        <br><br><br>
      <?php
    // }
    if(isset($_POST['okay'])){
      $req=$connexion->query("SELECT * FROM connection inner join user where connection.id_login=user.id and connection_start BETWEEN '".$_POST['connection_start']."' and '".$_POST['connection_end']."' and connection_end BETWEEN '".$_POST['connection_start']."' and '".$_POST['connection_end']."' ");?>
      <div class="container">
      <table border="1">
        <thead>
          <th>DATE ET HEURE DE DEBUT</th>
          <th>DATE ET HEURE DE FIN</th>
          <th>LOGIN</th>
        </thead>
        <?php
      while($donnee=$req->fetch()){
        ?>
         
          <tr>
          <td><?=$donnee['connection_start']?></td>
          <td><?=$donnee['connection_end']?></td>
          <td><?=$donnee['login']?></td>
          </tr>
        <?php
      }?>
      </table>
      </div>
      <?php
    }
    ?>
  
</body>
</html>