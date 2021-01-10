<?php
require_once "User.php";
$user = new User();
if(isset($_POST['message']) && !empty($_POST['message']) && isset($_POST['auteur']) && !empty($_POST['auteur'])){
    $message = $_POST['message'];
    $auteur = $_POST['auteur'];

    $user->sendMessage($auteur,$message);

    header('location:index.php');

}else{
    ?>
    Erreur : Le message ou l'auteur est vide<br/>
    <a href="index.php">Retour à l'accueil</a>
    <?php
}
?>