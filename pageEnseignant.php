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
		echo $html->header("QCM en folie");

		echo $html->setLink("./fonctions/form_deconnexion.php","Déconnexion","id","deconnexion");
		echo '<div id="main">';
		echo $html->setLink("","Ajouter","id","ajouterQcm");

		$qcmEnseignant = $BaseDeDonnees->select_qcm("*","loginEnseignant",$_SESSION['utilisateur']->getLogin());
		$qcmEnseignant = $qcmEnseignant->fetchAll();

		foreach ($qcmEnseignant as $row) {
			echo "<div class='listeQcmEnseignant'>";
			echo "<p>".$row[2]."</p>";
			$form = new Form("modifierQcm","modifierQcm.php","post","");
			$form->set_hidden("idQcm",$row[0]);
			$form->set_submit("modifier","Modifier/Corriger");
			echo $form->get_form();
			echo "</div>";
		}
		echo "</div>";
	?>
</body>
</html>