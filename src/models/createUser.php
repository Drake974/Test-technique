<?php require_once('../class/Connection.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['last_name', 'first_name', 'number'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        //$logger->info("Création d'un nouvel utilisateur -- VERIF SERVEUR NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la création de compte");
        header("Location: ../views/dashboard.php");
        exit();
    }
}
//$logger->info("Création d'un nouvel utilisateur -- VERIF SERVEUR OK");
if($error == null) {
    //On déclare les valeurs à sanitizer
    $data = [
        'nom_utilisateur' => $_POST['last_name'],
        'prenom_utilisateur' => $_POST['first_name'],
        'numero_utilisateur' => $_POST['number']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    
    $filters = [
        
        'nom_utilisateur' => 'trim|escape|capitalize|htmlspecialchars',
        'prenom_utilisateur' => 'trim|escape|capitalize|htmlspecialchars',
        'numero_particulier' => 'trim|escape|capitalize|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();
    // $logger->info("Création d'un nouvel utilisateur -- SANITIZE OK");
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){
        $id_utilisateur = md5(uniqid(rand(), true));
        $id = md5(uniqid(rand(), true));
        try{
            $db->beginTransaction();
            
            //AJOUT TABLE UTILISATEURS
            $query = 'INSERT INTO `utilisateurs`(`id`, `id_role`, `email`, `password`) 
            VALUES (:id, :id_role, :email, :password_user)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id_utilisateur,
                ':id_role' => 4,
                ':email' => $data_sanitized['email'],
                ':password_user' => $data_sanitized['password']
            ));
            $logger->info("Création d'un nouvel utilisateur -- TABLE UTILISATEUR OK");
            //AJOUT TABLE PARTICULIER
            $query = 'INSERT INTO `particulier`(`id`, `id_utilisateur`, `nom`, `prenom`, `pseudo`, `date_naissance`, `date_disponibilite`)
            VALUES (:id, :id_utilisateur, :nom, :prenom, :pseudo, :date_naissance, :date_disponibilite)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id,
                ':id_utilisateur' => $id_utilisateur,
                ':nom' => $data_sanitized['nom_particulier'],
                ':prenom' => $data_sanitized['prenom_particulier'],
                ':pseudo' => $data_sanitized['prenom_particulier'].$data_sanitized['nom_particulier'],
                ':date_naissance' => $data_sanitized['date_naissance'],
                ':date_disponibilite' => $data_sanitized['date_disponibilite']
            ));
            $logger->info("Création d'un nouvel utilisateur -- TABLE PARTICULIER OK");
            //AJOUT DES INTERETS
            if(isset($_POST['interets'])){
                foreach($_POST['interets'] as $value){
                    $query = 'INSERT INTO `interet_particulier`(`id_particulier`, `id_interet`)
                    VALUES (:id_particulier, :id_interet)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id_particulier' => $id,
                        ':id_interet' => htmlspecialchars($value, ENT_QUOTES)
                    ));
                }
            }
            $logger->info("Création d'un nouvel utilisateur -- TABLE INTERETS OK");
            //AJOUT DES VILLES
            if(isset($_POST['villes'])){
                foreach($_POST['villes'] as $value){
                    $query = 'INSERT INTO `ville_particulier`(`particulier_id`, `ville_id`) 
                    VALUES (:particulier_id, :ville_id)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':particulier_id' => $id,
                        ':ville_id' => htmlspecialchars($value, ENT_QUOTES)
                    ));
                }
            }
            $logger->info("Création d'un nouvel utilisateur -- TABLE VILLES OK");
            $db->commit();

            $logger->info("Création d'un nouvel utilisateur -- Role colocataire");
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Compté créé avec succès");
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['role'] = "particulier";
            $_SESSION['id_utilisateur'] = $id_utilisateur;
            header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec de la créationd d'un nouvel utilisateur (colocataire) -- $error");
            $db->rollBack();
            $_SESSION['flash'] = array('Error', "Echec lors de la création de compte");
            header("Location:" . getenv("URL_APP") . "/src/pages/inscriptionParticulier.php");
        }
    }else{
        $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
        // http_response_code(503);
        $_SESSION['flash'] = array('Error', "Echec lors de la création de compte");
        header("Location:" . getenv("URL_APP") . "/src/pages/inscriptionProprietaire.php");
    }
}
