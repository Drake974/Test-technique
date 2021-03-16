<?php require_once('../class/Connection.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;
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

//à faire pour la connection
$logger->info("Champs de connexion rempli -- VERIF SERVEUR OK");
if($error == null) {
    //Coup de sanytol sur les données des formulaires
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password']   
    ];
    //filtre personnalisé
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    
    $filters = [
        'email' => 'trim|escape|lowercase|htmlspecialchars',
        'password' => 'htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters, $customFilter);
    $data_sanitized = $sanitizer->sanitize(); //stock des valeurs des inputs nettoyer 
    
    $logger->info("Valeurs des inputs nettoyer utilisateur -- SANITIZE OK");
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){

        try{
            //COMPARAISON DE L'EMAIL AVEC LA TABLE UTILISATEURS
            $query = 'SELECT * FROM `utilisateurs` INNER JOIN `roles` ON utilisateurs.id_role = roles.role_id WHERE `email`=:email';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':email' => $data_sanitized['email']   
            ));
            $resultat = $sth->fetchAll(PDO::FETCH_OBJ); //stock dans une variable les données de la bdd 
            $logger->info("Recuperation des données Utilisateur -- EMAIL / TABLE UTILISATEUR OK");

            //COMPARAISON DU PASSWORD AVEC LA TABLE UTILISATEURS
            if (!$resultat){
                // echo 'Mauvais identifiant ou mot de passe!';
                $_SESSION['flash'] = array('Error',"Echec lors de la connexion au compte", "Mauvais identifiant ou mot de passe!!");
                $logger->info("Email inexistant Utilisateur -- EMAIL / TABLE UTILISATEUR NOK");
                header("Location:" . getenv("URL_APP") . "/src/pages/seconnecter.php");
            } else {
                $passwordCorrect = password_verify($data_sanitized['password'],htmlspecialchars($resultat[0]->password));
                if ($passwordCorrect){
                    $_SESSION['flash'] = array('Success', "Connexion avec succès");
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['role'] = $resultat[0]->libelle_role; 
                    $_SESSION['id_utilisateur'] = $resultat[0]->id;
                    $logger->info("Connexion Utilisateur -- CONNEXION UTILISATEUR OK");
                    header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
                }else{
                    echo 'Mauvais identifiant ou mot de passe !';
                    $_SESSION['flash'] = array('Error',"Echec lors de la connexion au compte", "Mauvais identifiant ou mot de passe!!!");
                    $logger->info("Mot de passe incorrect Utilisateur -- MOT DE PASSE UTILISATEUR NOK");
                    header("Location:" . getenv("URL_APP") . "/src/pages/seconnecter.php");
                }
            }


        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("'Mauvais identifiant ou mot de passe!' -- $error");
            $_SESSION['flash'] = array('Error',"Echec lors de laconnexion de compte", "Mauvais identifiant ou mot de passe!");
            header("Location:" . getenv("URL_APP") . "/src/pages/seconnecter.php");
            
        }
    }else{
        $logger->alert("Echec de la connexion -- Impossible de se connecter à la base de données");
        $_SESSION['flash'] = array('Error', "Echec de la connexion","Echec lors de la connexion </br> Impossible de se connecter à la base de données");
        header("Location:" . getenv("URL_APP") . "/src/pages/seconnecter.php");
        
    }
}