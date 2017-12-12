<?php
	require_once('classes/Enseignant.php');
	session_start();
	require_once("fonctions/connexion_bdd.php");
	require_once("classes/html.php");
	require_once("classes/Form.php");

	//On vérifie que l'utilisateur est connecté et qu'il s'agit bien d'un enseignant
	if(!isset($_SESSION['utilisateur']) || $_SESSION['typeUtilisateur'] != "Enseignant"){
		header('Location: index.php?erreur="Vous n\'êtes pas connecté"');
	}

	$html = new HTML(null,"utf-8","QCM","styleEnseignant.css");

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
<<<<<<< HEAD
		echo $html->header("QCM");
		echo $html->menu_nav_prof();
=======
		echo $html->header("QCM en folie");
		echo "<a href='./fonctions/form_deconnexion.php'>Déconnexion</a>";

>>>>>>> 18c5050f30208c4e228fa8a7a59cfc3438144920
		$qcmEnseignant = $BaseDeDonnees->select_qcm("*","loginEnseignant",$_SESSION['utilisateur']->getLogin());
		$qcmEnseignant = $qcmEnseignant->fetchAll();

		foreach ($qcmEnseignant as $row) {
			echo "<div classe='listeQcmEnseignant'>";
			echo $row[2];
			$form = new Form("modifierQcm","","post","");
			$form->set_hidden("idQcm",$row[0]);
			$form->set_submit("modifier","Modifier/Corriger");
			echo $form->get_form();
			echo "</div>";
		}
	?>
</body>
</html>