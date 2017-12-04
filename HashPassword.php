<?php 
	
session_start();
$_SESSION['root']=dirname(__FILE__);
	require_once("fonctions/connexion_bdd.php");
	require_once("classes/Form.php");
		$form = new form("connexion","HashPassword.php","post","");
		$form->set_input("text","password","Password",1);
		$form->add_br();
		$form->set_submit("validerHash","Hashage");
		echo $form->get_form();
		
		
 if(!empty($_POST['password'])){

 	$hash = hash_password($_POST['password']);
 	echo $hash;

 }

 ?>