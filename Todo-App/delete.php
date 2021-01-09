 <?php  
	include 'connectbdd.php';
	$id = $_GET['idsss'];
	$requete="DELETE FROM tache WHERE id_tache = ?";
	$rep = $connexion->prepare($requete);
	$reponse = $rep -> execute(array($id));
				
	// $reponse = $etat->execute( array ($id));
	
	if($reponse){
    echo 'Suppression effectué';
    
    header ('location: index.php');
	}
				
?>