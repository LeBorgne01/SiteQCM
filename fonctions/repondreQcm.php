<?php
	require_once('../classes/Etudiant.php');
	session_start();

	require_once('../classes/html.php');
	require_once('connexion_bdd.php');


	//On vérifie que l'utilisateur est connecté et qu'il s'agit bien d'un enseignant
	if(!isset($_SESSION['utilisateur']) || $_SESSION['typeUtilisateur'] != "Etudiant"){
		header('Location: index.php?erreur="Vous n\'êtes pas connecté"');
	}

	$html = new HTML(null,"utf-8","QCM",__DIR__."/style/style.css");


	$idQcm = $_POST['idQcm'];

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

		$qcm = $BaseDeDonnees->select_qcm("*","idQcm",$idQcm);
		$qcm = $qcm->fetch();
		
		echo $qcm['nom']."<br>";
		echo "De : ".$qcm['loginEnseignant']."<br>";
		echo "Description : ".$qcm['description']."<br>";
		
		$questions = $BaseDeDonnees->select_questionQcm($idQcm);
		//$questions = $questions->fetchAll();
		

		foreach ($questions as $question) {
			echo $question['intitule']."<br>";
			$reponses = explode(',',$question['reponses']);
			foreach ($reponses as $reponse) {
				echo "<input type='checkbox'>".$reponse."</input><br>";
			}
		}
		


		echo $html->setLink("form_deconnexion.php","Déconnexion","id","deconnexion");
	?>
</body>
</html>
