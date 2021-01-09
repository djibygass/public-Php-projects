
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gassama's</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 

		include 'connectbdd.php';
		$rep=$connexion->query('SELECT * FROM tache');
		$j=date('d');
		$m=date('m');
		$y=date('y');
		$heure=date('h');
		$minute=date('i');
		echo 'Nous somme le '.$j.'/'.$m.'/'.$y;
		echo '<br> Il est '.$heure.':'.$minute;
	?>
	<h1>TODO LIST</h1>
	<form method="POST" action="add.php">
		<input type="text" name="tache" placeholder="AJOUTER UNE TACHE">
		<button type="submit">+</button>
	</form>
	<br>
	<?php
 
	while ($donnees = $rep->fetch()) {?>
		<div id="container">
			<div id=souscontainer>
				<div><?php echo $donnees['lib_tache'];?></div>
				<div><a href="delete.php?idsss=<?php echo $donnees['id_tache'];?>">&otimes;</a>
				    <a href="update.php?idsss=<?php echo $donnees['id_tache'];?>"><button type="submit" action="">modifier </button></a> 
				</div>
			</div>
		</div>
	<?php } ?>
	
	<br>
	<br>	
	<form method="POST" action="">
  <button type="submit" name="supp">SUPPRIMER TOUT</button>
   </form>
   	<?php 
   	if (isset($_POST['supp'])) {
   		include 'connectbdd.php';
		$requete="DELETE FROM tache ";
		$rep = $connexion->prepare($requete);
		$reponse = $rep -> execute(array());
		header('location:index.php');
   	}
	?>




</body>
</html>