<?php
session_start();


//$_SESSION['root']=dirname(__FILE__);
echo $_POST['nomQCM'].' <br>';
echo ($_POST['descriptionQCM']).' <br>';
echo ($_POST['description']).' <br>';

/*if(!empty($_POST['nomQCM'])&&(!empty($_POST['descriptionQCM']))&&(!empty($_POST['description']))){


	header('Location: ../pageEnseignant.php?message="QCM modifié"');
}
else{

	header('Location: ../modifierQCM.php?message="Champs incomplets"');
}
*/

?>