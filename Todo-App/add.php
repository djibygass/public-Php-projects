<?php
		include 'connectbdd.php';
		$tache=$_POST['tache'];
	
		if (empty($_POST['tache'])) {
			echo "Vous n'avez rien écrit !!";
		}
		else{
			$requete="INSERT INTO tache (lib_tache) VALUES (?)";
				$rep = $connexion->prepare($requete);
				$reponse = $rep -> execute(array($tache));
			header('Location: index.php');	
		}

?>