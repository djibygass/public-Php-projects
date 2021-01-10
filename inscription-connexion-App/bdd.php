<?php
try {
  $bdd= new PDO("mysql:host=localhost;dbname=bd_rsx_s","root","");
} catch (PDOException $e){
  echo 'Echec de la connexion à la base de donnée';
}
?>