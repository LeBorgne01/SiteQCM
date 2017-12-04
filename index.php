<?php
session_start();

require_once("classes/form.php");
include("classes/HTML.php");
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
	echo $html->header("QCM en folie");
	echo $html->menu_nav_eleve();
	?>
	<main>
		<?php
		$form_connexion = new form("connexion","fonctions/form_connexion.php","post","");
		$form_connexion->set_input("text","login","Login",1);
		$form_connexion->set_input("password","password","Mot de passe",1);
		$form_connexion->set_submit("validerconnexion","Connexion");
		$form_connexion->get_form();
		?>
	</main>
</body>
</html>