<?php
session_start();
$_SESSION['root']=dirname(__FILE__);



require_once("classes/Form.php");
require_once("classes/html.php");
require_once("fonctions/connexion_bdd.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php
	$html = new HTML(null,"utf-8","QCM","style.css");
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


		$form_modifierQCM = new form("modifierQCM","..\modifierQCM.php","post","");
		$form_modifierQCM->set_input("text","nomQCM",$resultat[2],1);
		$form_modifierQCM->add_br();

		$form_modifierQCM->set_input("text","descriptionQCM",$resultat[3],1);
		$form_modifierQCM->add_br();


		$form_modifierQCM->set_submit("valideModification","Valider");
	    echo $form_modifierQCM->get_form();

		

	?>
		
	</main>
</body>
</html>