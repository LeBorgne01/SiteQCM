<?php
	session_start();

	require_once("classes/form.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>QCM</title>
</head>
<body>
	<?php
		$form_connexion = new form("connexion","form_connexion.php","post","");
		$form_connexion->set_input("text","id","Login",1);
		$form_connexion->set_input("password","mdp","Mot de passe",1);
		$form_connexion->set_submit("validerconnexion","Connexion");
		$form_connexion->get_form();
	?>
</body>
</html>