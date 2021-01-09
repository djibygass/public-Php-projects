<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Updating</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<br>	
	<br>	
	<form method="POST" action="">	
			<input type="text" name="newtache" placeholder="Entrer la nouvelle tache">
			<input type="submit" value="Remplacer">
	</form>
	<?php 
	if (isset($_POST['newtache'])) {
		include 'connectbdd.php';
			$tache=$_POST['newtache'];
			$id = $_GET['idsss'];
			$requete="UPDATE tache SET tache.lib_tache = ? WHERE tache.id_tache=".$id;
			$rep = $connexion->prepare($requete);
			$reponse = $rep -> execute(array($tache));
				
	// $reponse = $etat->execute( array ($id));
	
	if($reponse){
    echo 'Modification effectué';
	}
			
    
    header ('location: index.php');
	}
				
	?>


</body>
</html>
