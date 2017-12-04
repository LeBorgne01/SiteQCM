<?php
    include "../classes/Qcm.php";
    include "../classes/Form.php";

    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $numberQuestion=$_POST['nbQuestion'];

	  $formTest = new Form("formQuestion","formQuestion","validerQcm.php","post","");

   	for($i = 0; $i < $numberQuestion; $i++){
   		  echo "<p> Question".($i+1)."</p>";      
        $formTest->set_input("question", "text","question","Question",true);
        $formTest->set_input("answer", "text","answer","Réponse",true);   
        $formTest->update_form();
        $formTest->reset_form();
   	} 
   	$formTest->set_submit("validerQcm", "validerQcm","Valider");
    $formTest->get_form();
?>	