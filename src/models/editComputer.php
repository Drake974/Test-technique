<?php 
require_once('../class/Connection.php');
require_once('../controllers/session.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;
$id_postes = htmlspecialchars($_POST['id_postes'], ENT_QUOTES);
//Validation des données cote serveur + securite specialchars
$inputRequired = ['edit_computer_number'];
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
        'numero_poste' => $_POST['edit_computer_number']
    ];   
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    $filters = [
        
        'numero_poste' => 'trim|escape|capitalize|htmlspecialchars'
    ];  
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();
    // $logger->info("Création d'un nouvel utilisateur -- SANITIZE OK");
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){
        //$id_utilisateur = md5(uniqid(rand(), true));
        //$id = md5(uniqid(rand(), true));
        try{
            $db->beginTransaction();
            
            //AJOUT TABLE UTILISATEURS
            $query = 'UPDATE `postes` SET `numero_poste` = :numero_poste
              WHERE `id_postes` = :id_postes';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id_postes' => $id_postes    
            ));

            //$logger->info("Création d'un nouvel utilisateur -- TABLE UTILISATEUR OK");
            $db->commit();

            //$logger->info("Création d'un nouvel utilisateur -- Role colocataire");
            // On complete les valeurs pour session
            //$_SESSION['flash'] = array('Success', "Utilisateur créé avec succès");
            //$_SESSION['isLoggedIn'] = true;
            //$_SESSION['role'] = "utilisateur";
            //$_SESSION['id_utilisateur'] = $id_utilisateur;
             header("Location: ../views/dashboard.php");
           
        }catch(PDOException $e){
            $error = $e->getMessage();
            //$logger->error("Echec de la créationd d'un nouvel utilisateur (colocataire) -- $error");
            $db->rollBack();
            $_SESSION['flash'] = array('Error', "Echec lors de la création d'un utilisateur");
            header("Location: ../views/dashboard.php");
           
        }
    }else{
        //$logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
        // http_response_code(503);
        $_SESSION['flash'] = array('Error', "Echec lors de la création d'un utilisateur");
        header("Location: ../views/dashboard.php");
       
    }
}
?>