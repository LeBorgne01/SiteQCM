<?php
	require_once(__DIR__.'/classes/Etudiant.php');
	session_start();
	/*var_dump(is_file('./fonctions/connexion_bdd.php'));
	die();*/
	require_once('./fonctions/connexion_bdd.php');
	require_once(__DIR__.'/classes/html.php');

	//On vérifie que l'utilisateur est connecté et qu'il s'agit bien d'un enseignant
	if(!isset($_SESSION['utilisateur']) || $_SESSION['typeUtilisateur'] != "Etudiant"){
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

		$qcmEtudiant = $BaseDeDonnees->select_qcmEtudiant($_SESSION['utilisateur']->getLogin());
		var_dump($qcmEtudiant);
		die();
		$qcmEtudiant = $qcmEtudiant->fetch();

		foreach ($qcmEtudiant as $row) {
			echo "<div classe='qcm'>";
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