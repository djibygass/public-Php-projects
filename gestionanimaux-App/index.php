<?php
session_start();
// connect bdd and request for generique
include 'connectbdd.php';
$req=$connexion->query("SELECT * FROM generique");
if (isset($_POST['comeon'])){
  $requ=$connexion->query("SELECT * FROM admin");
  $donnee=$requ->fetch();
  if (password_verify($_POST['password'],$donnee['password'])){
  $_SESSION['password']=$_POST['password'];
  header("location:administration.php");
}
else{
  echo "<h3>MOT DE PASSE INCORRECT !!!</h3>";
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animaux</title>
  <link rel="stylesheet" href="./style.css">
 
</head>
<body>
  <section>
    <h1 align="center" >Base de donnée Animaux</h1>
    <div id="section">
      <div>
        <h2>Interrogation</h2>
        <form action="searchresult.php" method="post"> 
          <div>
              <input type="radio" name="searchon" value="1" checked>
              <label for="searchon">Recherche sur le nom</label>
              <br>
              <label for="name">Nom :</label>
              <input type="search" name="name" placeholder="*nom*">
          </div>
          <br>
          <div>
              <input type="radio" name="searchon" value="2">
              <label for="searchon">Recherche par nom générique</label>
              <div>
                  <select name="generique" >
                    <?php while ($generique=$req->fetch()){?>
                    <option><?=$generique['nom_generique'];}?></option>
                    <?php $generique=$generique['nom_generique'];?>
                  </select>
              </div>
          </div>
          
            <div>
              <input type="radio" name="searchon" value="3"> 
              <label for="searchon">Affichage de tous les animaux </label>
            </div>
            <br>
            <div align="center">  
             <input type="submit" name="ok" value="Rechercher">
             <a href="index.php"><input type="button" name="reset" value="Réinitialiser"></a>
             </div>
        </form>
      </div>
            <div>
              <h2>Passage en mode Administrateur</h2>
              <form action="index.php" method="post">
                <div>
                  <label for="password">Mot de passe :</label>
                  <input type="password" name="password">
                </div>
                <br>
                <div align="center">
                  <input type="submit" name="comeon" value="Connexion">
                  <a href="index.php"><input type="button" name="reset" value="Réinitialiser"></a>
                <div>
              </form>
            </div>
    </div>       
  </section>
</body>
</html>
<?php $req=null;?>
