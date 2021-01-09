<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="container">
  <?php
  include 'connectbdd.php';
  // search by name
  if ($_POST['searchon']==1){
    // name's input must be not empty
    if(!empty($_POST['name'])){
      //  checking the lines request's result (rowcount for delete or insert or update but fetchColumn for select cf doc)
      $req=$connexion->query("SELECT COUNT(*) FROM animal INNER JOIN generique WHERE animal.id_generique=generique.id AND animal.nom LIKE '%".$_POST['name']."%'");
        if ($req->fetchColumn()>0){
          // and after checking that select count(*)'s line > 0 we gonna run THE REQUEST (without count(*) and so the (else) will based on the checking(count(*)) je parle pas anglais (;
          $req=$connexion->query("SELECT * FROM animal INNER JOIN generique WHERE animal.id_generique=generique.id AND animal.nom LIKE '%".$_POST['name']."%'");
          while($donnee=$req->fetch()){
           ?>
           
             <div class=pictandcarest>
                <div>
                  <img src="img/<?=$donnee['photo']?>" alt="image d'animal" height="279px" weight="386px">
                </div>
              <div class="blocanim">
                <div>
                  <h3>Nom :&nbsp;<?=$donnee['nom']?></h3>
                </div>
                <div>
                  <h3>Générique :&nbsp;<?=$donnee['nom_generique']?></h3>
                </div>
             </div>
          </div>
           <?php
          }
        }else{
          echo "Aucun résultat";
        }
    }else{
      echo 'champs de recherche VIDE !';
    }
  }
  if ($_POST['searchon']==2)
  {
    $req=$connexion->query("SELECT count(*) FROM animal INNER JOIN generique WHERE animal.id_generique=generique.id AND generique.nom_generique LIKE '%".$_POST['generique']."%'");
    if ($req->fetchColumn()>0){
      $req=$connexion->query("SELECT * FROM animal INNER JOIN generique WHERE animal.id_generique=generique.id AND generique.nom_generique LIKE '%".$_POST['generique']."%'");
      while($donnee=$req->fetch()){
        ?>
          <div class=pictandcarest>
                <div>
                  <img src="img/<?=$donnee['photo']?>" alt="image d'animal" height="279px" weight="386px">
                </div>
              <div class="blocanim">
                <div>
                  <h3>Nom :&nbsp;<?=$donnee['nom']?></h3>
                </div>
                <div>
                  <h3>Générique :&nbsp;<?=$donnee['nom_generique']?></h3>
                </div>
             </div>
          </div>
        <?php
      }
    }else{
      echo 'Aucun résultat pour '.$_POST['generique'];
    }
  }
  if ($_POST['searchon']==3){
      $req=$connexion->query("SELECT COUNT(*) From animal INNER join generique, proprietaire WHERE animal.id_generique=generique.id AND animal.id_proprietaire=proprietaire.id ");
      if ($req->fetchColumn()>0){
        $req=$connexion->query("SELECT * From animal INNER join generique, proprietaire WHERE animal.id_generique=generique.id AND animal.id_proprietaire=proprietaire.id ");
         while($donnee=$req->fetch()){
         ?>
           <div class=pictandcarest>
                  <div>
                    <img src="img/<?=$donnee['photo']?>" alt="image d'animal" height="279px" weight="386px">
                  </div>
                  <div class="blocanim">
                <div>
                  <h3>Nom :&nbsp;<?=$donnee['nom']?></h3>
                </div>
                <div>
                  <h3>Générique :&nbsp;<?=$donnee['nom_generique']?></h3>
                </div>
             </div>
             <div class="blocanim">
                <div>
                  <h3>titre propretaire :&nbsp;<?=$donnee['titre']?></h3>
                </div>
                <div>
                  <h3>prénom :&nbsp;<?=$donnee['prenom']?></h3>
                </div>
                <div>
                  <h3>nom :&nbsp;<?=$donnee['nom_proprietaire']?></h3>
                </div>
             </div>
          </div>
        
        
        <?php
      }
    }

  }
  ?>
     </div>
</body>
</html>