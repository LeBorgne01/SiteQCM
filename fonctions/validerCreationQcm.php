<?php
	session_start();

	include "../classes/BaseDeDonnees.php";

    //Variable
    $bd = new BaseDeDonnees("root","qcm","","localhost"); //Construction d'une nouvelle Base de données
    $bd->connexion(); //Connexion à la base de données

    $nomQcm=$_SESSION['nomQcm'];
	$numberQuestion=$_SESSION['numberQuestion'];
	$indicator = 0;
	//var_dump($_POST["question"][1]);
	if($numberQuestion > 1){
		for($i =0; $i < $numberQuestion; $i++){
			for($j = $i+1; $j < $numberQuestion; $j++){
				if($_POST["question"][$i] == $_POST["question"][$j]){
					echo "Benou Arrête !";
					$indicator = 1;
					break;
				}
				else {
					echo "Uvwevwevwevwe !";
					$indicator = 1;
				}
			}
		}

	}

	$idQcm = $bd->select_qcm("idQcm","nom",$nomQcm);
	$idQcm=$idQcm->fetch();
	var_dump($idQcm);

	if($indicator == 1){
		for($i =0; $i < $numberQuestion; $i++){
 			$request = "INSERT INTO question VALUES(NULL,NULL,'".$_POST['question'][$i]."','','','".$_POST['answer'][$i]."')";
       		$bd->get_pdo()->query($request);
		}
	}
?>