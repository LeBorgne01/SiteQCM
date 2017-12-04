<?php
	session_start();
	require_once("fonctions/connexion_bdd.php");

	if(!isset($_SESSION['utilisateur']) || !is_a($_SESSION['utilisateur'],"Etudiant")){
		header('Location: index.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<?php
		$resultatRequete = $BDD->select_qcm("*","loginEtudiant",$_SESSION['utilisateur']['login']);
		$resultatRequete->fetch();

		foreach ($resultatRequete as $row) {
			echo "<div classe='qcm'>";
			echo $resultatRequete[0];
		}
		
	?>
</body>
</html>