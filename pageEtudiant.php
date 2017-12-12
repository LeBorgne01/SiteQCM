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
		
		
	?>
</body>
</html>