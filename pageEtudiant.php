<?php
	require_once(__DIR__.'/classes/Etudiant.php');
	session_start();
	/*var_dump(is_file('./fonctions/connexion_bdd.php'));
	die();*/
	require_once('./fonctions/connexion_bdd.php');
	require_once(__DIR__.'/classes/html.php');
	require_once(__DIR__.'/classes/Form.php');

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
		

		foreach ($qcmEtudiant as $row) {
			echo "Nom : ".$row['nom']."<br>";

			$form_reponse = new Form("form_reponse","./fonctions/repondreQcm.php","post","");
			$form_reponse->set_hidden("idQcm",$row['idQcm']);
			$form_reponse->set_submit("repondreQcm","Répondre");
			
			echo $form_reponse->get_form();
		}


		echo $html->setLink("./fonctions/form_deconnexion.php","Déconnexion","id","deconnexion");
	?>
</body>
</html>