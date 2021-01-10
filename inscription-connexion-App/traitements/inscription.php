<?php
include('../bdd.php');


if(isset($_POST['login']) && !empty($_POST['login']) &&
    isset($_POST['password']) && !empty($_POST['password']) && 
    isset($_POST['passwordVerif']) && !empty($_POST['passwordVerif']) &&
    isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['prenom']) && !empty($_POST['prenom'])){
        
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $passwordVerify = $_POST['passwordVerif'];

        if($password != $passwordVerify){
            ?>
            <p>Les mots de passes ne correspondent pas</p>
            <a href="../inscription.php">Retour à l'inscription</a>
            <?php
        }else{
            
            $req = "SELECT login FROM utilisateur WHERE login = ?";
            $resultat = $bdd->prepare($req);
            $resultat->bindParam(1, $login);
            $resultat->execute();
            $resultat = $resultat->fetchAll();

            if(sizeof($resultat) > 0){
                ?>
                <p>L'utilisateur existe déjà</p>
                <a href="../inscription.php">Retour à l'inscription</a>
                <?php
            }else{

                $password = password_hash($password, PASSWORD_BCRYPT);
                $req = "INSERT INTO utilisateur(nom, prenom, login, password)
                        VALUES (?, ?, ?, ?)";
                $stmt = $bdd -> prepare($req);
                $stmt->execute([$nom,$prenom,$login,$password]);
              #  $resultat = $bdd->prepare($req);
              #  $resultat->bindParam(1, $nom);
              #  $resultat->bindParam(2, $prenom);
              #  $resultat->bindParam(3, $login);
              #  $resultat->bindParam(4, $password);
              #  $resultat->execute();
                
                header('location:../connexion.php');

            }

        }
        
    }else{
        ?>
        <p>Il manque un ou plusieurs champs</p>
        <a href="../inscription.php">Retour à l'inscription</a>
        <?php
    }

?>