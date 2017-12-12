<?php
    include "classes\Form.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre</title>
    </head>
    <body>
    <?php
        //Formulaire pour entrer le titre et le descriptif du formulaire
        $formTest = new Form("formTest","formTest","fonctions\displayCreationQcm.php","post","");
        $formTest->set_input("title", "text","title","Titre",true);
        $formTest->set_input("desc", "text","desc","Description",true);
        $formTest->set_input("nbQuestion", "text","nbQuestion","Nombre de Question",true);
        $formTest->set_submit("validerQcm", "validerQcm","Valider");
        $formTest->get_form();
    ?>
    </body>
</html>
