<?php
session_start();

		


//On regarde si on a un message d'erreur
	if(isset($_GET['message'])){
		echo '<script>alert("'.  $_GET['message'] .'");</script>';
				}
$_SESSION['root']=dirname(__FILE__);



require_once("classes/Form.php");
require_once("classes/html.php");
require_once("fonctions/connexion_bdd.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php
	$html = new HTML(null,"utf-8","QCM","styleEnseignant.css");
	echo $html->meta_data();
	?>
</head>
<body>
	<?php
	echo $html->header("Modifier un QCM");
	

	?>
	<main>
		<?php	
		$idQcm = $_POST['idQcm'];
		$resultat = $BaseDeDonnees->select_qcm("*","idQcm",$idQcm);
		$resultat = $resultat->fetch();

		$form_modifierQCM = new form("modifierQCM","fonctions/modificationQCM.php","post","");
		
		$form_modifierQCM->set_inputValue("text","nomQCM",$resultat[2],1);
		$form_modifierQCM->add_br();

<<<<<<< HEAD
		//$form_modifierQCM->set_input("text","descriptionQCM",$resultat[3],1);
		
		$form_modifierQCM->set_textArea("description","3","15",$resultat[3],1);
		$form_modifierQCM->add_br();
		$form_modifierQCM->add_br();
		$questions= $BaseDeDonnees->select_questionQcm($resultat[0]);
=======
		$form_modifierQCM->set_input("text","descriptionQCM",$resultat[3],1);
		$form_modifierQCM->add_br();
>>>>>>> 511348cba8380cf389f4ca008378970219026e2e

		$questions= $BaseDeDonnees->select_questionQcm($resultat[0]);

		foreach ($questions as $question ) {
<<<<<<< HEAD

			$form_modifierQCM->set_inputValue("text","descriptionQCM",$question[2],1);
			$form_modifierQCM->set_inputValue("text","descriptionQCM",$question[3],1);
			$form_modifierQCM->set_inputValue("text","descriptionQCM",$question[4],1);
			$form_modifierQCM->set_inputValue("text","descriptionQCM",$question[5],1);
			$form_modifierQCM->add_br();
		}
=======
			$form_modifierQCM->set_input("text","descriptionQCM",$question[2],1);
			$form_modifierQCM->set_input("text","descriptionQCM",$question[3],1);
			$form_modifierQCM->set_input("text","descriptionQCM",$question[4],1);
			$form_modifierQCM->set_input("text","descriptionQCM",$question[5],1);
>>>>>>> 511348cba8380cf389f4ca008378970219026e2e

		}

		$form_modifierQCM->set_submit("valideModification","Valider");

<<<<<<< HEAD
	  

=======
		echo $html->setLink("pageEnseignant.php","Retour","id","retour");
>>>>>>> 511348cba8380cf389f4ca008378970219026e2e
		
		echo '<div class ="modif">';
		echo $form_modifierQCM->get_form();
		echo '</div>';

		?>
		
	</main>
</body>
</html>