<?php
try {
  $connexion= new PDO("mysql:host=localhost;dbname=BdPartiel","root","");
} catch (PDOException $e){
  echo 'Echec de la connexion à la base de donnée';
}
?>