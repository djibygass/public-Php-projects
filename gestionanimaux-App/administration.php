<?php 
session_start();
include 'connectbdd.php';
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>Admin (:</title>
  <script src="https://kit.fontawesome.com/d57bd52145.js" crossorigin="anonymous"></script> 
  <link rel="stylesheet" href="./style.css">
</head>
<body>

<a href="index.php"><button><i class="fas fa-arrow-left"></i></button></a>
<h2 align="center">Administration</h2>
<?php ?>
      <section>
      <!-- formulaire -->
      <form method="post">
      <div id="section">
      <div>
      <div>
        <div>
          <?php
           $req1=$connexion->query("SELECT * FROM generique");
          ?>
          <label for="generique">Vous voulez ajouter un :</label>
           <select name="generique" >
                <?php while ($generique=$req1->fetch()){?>
                <option><?=$generique['nom_generique'];}?></option>
                <option>Autres</option>
                <!-- <?php $generique=$generique['nom_generique'];?> -->
            </select>
        </div>
        <div>
          <label for="name">Nom de l'animal</label>
          <input type="text" name="name">
        </div>
        <div>
          <input type="file" name="image"  default="aucune.jpg">
        </div>
      </div>
     
      </div>
      <div>
      
          <div>
             <label for="prenom_proprietaire">Prénom du propriétaire :</label>
            <input type="text" name="prenom_proprietaire">
          </div>
          <div>
             <label for="nom_proprietaire">Nom du propriétaire :</label>
            <input type="text" name="nom_proprietaire">
          </div>
          <div>
          
          <label for="titre">titre  :</label>
           <select name="titre" >
                <option value="M.">M.</option>
                <option value="Mlle">Mlle</option>
                <option value="Mme">Mme</option>
                <?php ?>
            </select> 
          </div>
      </div>
      </div>
      <div align="center">
           <input type="submit" name="okok" value="Ajouter" weight="150px">
      </div>
      </form>
      <!-- fin formulaire -->
      </section>
      
      
      <?php
    if (isset($_POST['okok'])){
    if (!empty($_POST['name']) && !empty($_POST['prenom_proprietaire']) && !empty($_POST['nom_proprietaire'])){
      //Ajout proprietaire
      $req3=$connexion->query("SELECT COUNT(*) FROM proprietaire WHERE nom_proprietaire = '".$_POST['nom_proprietaire']."' AND prenom = '".$_POST['prenom_proprietaire']."'");
      if ($req3->fetchColumn()==0){
            //insert into the table 'proprietaire'
            $req3=$connexion->prepare("INSERT INTO proprietaire(titre,nom_proprietaire,prenom) VALUE(?,?,?)");
            $req3->execute(array($_POST['titre'],$_POST['nom_proprietaire'],$_POST['prenom_proprietaire']));
            //taking the id
            $req3=$connexion->query("SELECT id FROM proprietaire WHERE nom_proprietaire = '".$_POST['nom_proprietaire']."' AND prenom = '".$_POST['prenom_proprietaire']."'");
            $idexistprop=$req3->fetch(); 
            //$idexistprop['id'];
      }else{
        $req3=$connexion->query("SELECT id FROM proprietaire WHERE nom_proprietaire ='".$_POST['nom_proprietaire']."' AND prenom = '".$_POST['prenom_proprietaire']."'");
        $idexistprop=$req3->fetch(); 
        //$idexistprop['id'];
      }
      $req4=$connexion->query("SELECT id FROM generique WHERE nom_generique ='".$_POST['generique']."'");
      $idgenerique=$req4->fetch();
      //$idgenerique['id'];

      $req6=$connexion->query("SELECT COUNT(*) FROM animal WHERE nom='".$_POST['name']."' AND id_generique='".$idgenerique['id']."' AND id_proprietaire='".$idexistprop['id']."'");
      // $donneee=$req6->fetch();
      if($req6->fetchColumn()==0){
        $req5=$connexion->prepare("INSERT INTO animal(nom,photo,id_generique,id_proprietaire) VALUES (?,?,?,?)");
        $req5->execute(array($_POST['name'],$_POST['image'],$idgenerique['id'],$idexistprop['id']));
      }else{
        echo "Cet animal est déja enregistrer dans notre base";
      }
      //print_r($_POST);
    }else{
      echo 'Tous les champs sont obligatoire !!
      ';
    }
  
  }
  //}




?>
  
</body>
</html>