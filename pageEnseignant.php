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
		$resultat = $BaseDeDonnees->select_etudiant("*","login","Axel");
		$resultat = $resultat->fetchAll();

		if(empty($resultat)){
			echo "C'est vide";
		}
		else{
			foreach ($resultat as $row) {
				echo "login : ".$row[0]." mot de passe : ".$row[1];
				if(isset($row[2])){
					echo " moyenne : ".$row[2];
				}
				echo "<br>";
			}
		}
		
		
	?>
</body>
</html>