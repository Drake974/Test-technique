<?php require_once('../class/Connection.php');

 //Validation des données cote serveur + securite specialchars
//contrôle des champs input si c'est vide
$inputRequired = ['identity', 'password'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){ 
        $error = true;
        //$logger->info("Champs vides de connexion -- VERIF SERVEUR NOK"); //NOK= non OK
        $_SESSION['flash'] = array('Error', "Echec lors de la connexion au compte","Erreur dans le formulaire </br> Veuillez vérifier votre identifiant ou votre mot de passe");
        header("Location: ../views/login.php");
        exit();
    }
}