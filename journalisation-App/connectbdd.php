<?php
try {
  $connexion= new PDO("mysql:host=localhost;dbname=journal_bdd","root","");
} catch (PDOException $e){
  echo 'Echec de la connexion à la base de donnée';
}
?>