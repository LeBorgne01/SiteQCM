<?php
	require_once('classes/Enseignant.php');
	session_start();
	require_once("fonctions/connexion_bdd.php");
	require_once("classes/html.php");

	//On vérifie que l'utilisateur est connecté et qu'il s'agit bien d'un enseignant
	if(!isset($_SESSION['utilisateur']) || $_SESSION['typeUtilisateur'] != "Enseignant"){
		header('Location: index.php?erreur="Vous n\'êtes pas connecté"');
	}

	$html = new HTML(null,"utf-8","QCM","style.css");

?>
<!DOCTYPE html>
<html>
<head>
	<?php
		echo $html->meta_data();
	?>
</head>
<body>
	<?php
		echo $html->header("QCM en folie");

		$qcmEnseignant = $BaseDeDonnees->select_qcm("*","loginEnseignant",$_SESSION['utilisateur']->getLogin());
		$qcmEnseignant = $qcmEnseignant->fetchAll();

		foreach ($qcmEnseignant as $row) {
			echo "<div classe='qcm'>";
			echo $row[2];
		}
	?>
</body>
</html>