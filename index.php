<?php
	session_start();

	require_once("form.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>QCM</title>
</head>
<body>
	<?php
		$form_connexion = new form("connexion","form_connexion.php","post","");
		$form_connexion->setinput("text","id","Login",1);
		$form_connexion->setinput("password","mdp","Mot de passe",1);
		$form_connexion->setsubmit("validerconnexion","Connexion");
		$form_connexion->getform();
	?>
</body>
</html>