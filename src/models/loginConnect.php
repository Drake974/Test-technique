<?php

require_once(dirname(__DIR__).'/class/Connection.php');
require_once(dirname(__DIR__).'/controllers/session.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;

//Validation des données cote serveur + securite specialchars
//contrôle des champs input si c'est vide
$inputRequired = ['identity', 'password'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){ 
        $error = true;
        
        $_SESSION['flash'] = array('Error', "Echec lors de la connexion au compte","Erreur dans le formulaire </br> Veuillez vérifier votre email ou votre mot de passe");
        header("Location: ../views/login.php");
        exit();
    }
}
if($error == null) {
    //Coup de sanytol sur les données des formulaires
    $data = [
        'identity' => $_POST['identity'],
        'password' => $_POST['password']   
    ];
    //filtre personnalisé
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    
    $filters = [
        'identity' => 'trim|escape|lowercase|htmlspecialchars',
        'password' => 'htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters, $customFilter);
    $data_sanitized = $sanitizer->sanitize(); //stock des valeurs des inputs nettoyer 
    
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){

        try{
            //COMPARAISON DE L'EMAIL AVEC LA TABLE UTILISATEURS
            $query = 'SELECT * FROM `utilisateurs` WHERE `nom_utilisateur`=:name_identity';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':name_identity' => $data_sanitized['identity']   
            ));
            $resultat = $sth->fetchAll(PDO::FETCH_OBJ); //stock dans une variable les données de la bdd 

            //COMPARAISON DU PASSWORD AVEC LA TABLE UTILISATEURS
            if (!$resultat){
                // echo 'Mauvais identifiant ou mot de passe!';
                $_SESSION['flash'] = array('Error',"Echec lors de la connexion au compte", "Mauvais identifiant ou mot de passe!");
                header("Location: ../views/login.php");
            } else {
                $passwordCorrect = password_verify($data_sanitized['password'],htmlspecialchars($resultat[0]->password_utilisateur));
                if ($passwordCorrect){
                    $_SESSION['flash'] = array('Success', "Connexion avec succès");
                    $_SESSION['isLoggedIn'] = true;
                    header("Location: ../views/home.php");
                }else{
                    echo 'Mauvais identifiant ou mot de passe !';
                    $_SESSION['flash'] = array('Error',"Echec lors de la connexion au compte", "Mauvais identifiant ou mot de passe!");
                    
                    header("Location: ../views/login.php");
                }
            }


        }catch(PDOException $e){
            $error = $e->getMessage();
            
            $_SESSION['flash'] = array('Error',"Echec lors de laconnexion de compte", "Mauvais identifiant ou mot de passe!");
            header("Location: ../views/login.php");
            
        }
    }else{
        ;
        $_SESSION['flash'] = array('Error', "Echec de la connexion","Echec lors de la connexion </br> Impossible de se connecter à la base de données");
        header("Location: ../views/login.php");
        
    }
}
