<?php
	session_start();
	require_once("fonctions/connexion_bdd.php");

?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<?php
		$resultat = $BaseDeDonnees->select_etudiant("*","login","Michou");
		$resultat = $resultat->fetchAll();
		
		foreach ($resultat as $row) {
			echo "login : ".$row[0]." mot de passe : ".$row[1]." moyenne : ".$row[2]."<br>";
		}
	?>
</body>
</html>