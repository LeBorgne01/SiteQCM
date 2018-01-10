<?php
	session_start();
	$numberQuestion=$_SESSION['numberQuestion'];
	$indicator = 0;
	//var_dump($_POST["question"][1]);
	if($numberQuestion > 1){
		for($i =0; $i < $numberQuestion; $i++){
			for($j = 0; $j < $numberQuestion; $j++){
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
	//var_dump($numberQuestion);
?>