<?php
    session_start(); 
    $_SESSION['numberQuestion']=htmlspecialchars($_POST['nbQuestion']); 
?>
<?php
    include "../classes/Qcm.php";
    include "../classes/Form.php";
    include "../classes/BaseDeDonnees.php";

    //Variable
    $bd = new BaseDeDonnees("root","qcm","","localhost"); //Construction d'une nouvelle Base de données
    $bd->connexion(); //Connexion à la base de données
    $ind = 1; //Indicateur booléen

    /*Ajout à la BD*/
    $res = $bd->select("*","qcm",""); //On selectionne toutes les données dans la table User
    //var_dump($res);
    //var_dump(empty($_POST['title']));
    if(empty($_POST['title']) && empty($_POST['desc']) && empty($_POST['nbQuestion']) && $numberQuestion == "0"){
      header('Location:http://localhost/siteqcm/test.php#?bad_title_description_nb'); //Reconduit vers la page de création
    }
    else{
      $title=htmlspecialchars($_POST['title']); //Récupère le titre du QCM
      $desc=htmlspecialchars($_POST['desc']); //Récupère la description du QCM
      $numberQuestion=htmlspecialchars($_POST['nbQuestion']); //Récupère le nombre de question
      
      sleep(1);

      while($donnees = $res->fetch()){ //On parcours toutes la tables
      //On vérifie si le login n'existe
        //var_dump($title);
        //var_dump($donnees['nom']);
        if($title == $donnees['nom']){ //On vérifie si le Login existe déjà dans la BD
          $ind = 0;
          header('Location:http://localhost/siteqcm/test.php#?qcm_already_existant');
      }
    }
    
    var_dump($ind);

    if($ind == 1){
        $request = "INSERT INTO qcm VALUES(NULL,'','".$title."','".$desc."')";
        $bd->get_pdo()->query($request);
      }
}

	  $formTest = new Form("formQuestion","./validerCreationQcm.php","post",""); //Construction d'un QCM

    

   	for($i = 0; $i < $numberQuestion; $i++){ //Boucle que va de 0 à N questions
   		  echo "<p> Question".($i+1)."</p>"; //Affiche "Question (i+1)"
        $formTest->set_input("text","question[".$i."]","Question",true); //Ajouter un input de type texte qui correspond à la question
        $formTest->set_input("text","answer[".$i."]","Réponse",true); //Ajouter un input de tyoe text qui correspond à la réponse 
        /*echo $formTest->update_form(); //Permet d'afficher un form
        $formTest->reset_form(); //Remise à "" d'un form*/
   	} 
   	$formTest->set_submit( "validerQcm","Valider"); //Ajoute le bouton Valider
    echo $formTest->get_form(); //Afficher le form
?>	