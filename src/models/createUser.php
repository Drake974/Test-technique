<?php 
require_once('../class/Connection.php');
require_once('../controllers/session.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['last_name', 'first_name', 'number'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        //$logger->info("Création d'un nouvel utilisateur -- VERIF SERVEUR NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la création de compte");
        header("Location: ../views/userDashboard.php");
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
        'numero_utilisateur' => 'trim|escape|capitalize|htmlspecialchars'
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
            $identity = htmlspecialchars($_POST["number"], ENT_QUOTES);   

         $query = 'SELECT * FROM `utilisateurs` WHERE `numero_utilisateur`=:numero_utilisateur';
         $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute(array(
             ':numero_utilisateur' => $identity
         ));
         $result = $sth->fetchAll(PDO::FETCH_OBJ);
         if($result){
            $_SESSION['flash'] = array('Error',"Echec lors de l'enregistrement", "Choisir un autre identifiant!");
            header("Location: ../views/userDashboard.php");

         }else{

            $db->beginTransaction();
            //AJOUT TABLE UTILISATEURS
            $query = 'INSERT INTO `utilisateurs`(`roles`, `nom_utilisateur`, `prenom_utilisateur`, `numero_utilisateur`) 
            VALUES (:roles, :nom_utilisateur, :prenom_utilisateur, :numero_utilisateur)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':roles' => 2,
                ':nom_utilisateur' => $data_sanitized['nom_utilisateur'],
                ':prenom_utilisateur' => $data_sanitized['prenom_utilisateur'],
                ':numero_utilisateur' => $data_sanitized['numero_utilisateur']
            ));
            //$logger->info("Création d'un nouvel utilisateur -- TABLE UTILISATEUR OK");
            $db->commit();

            //$logger->info("Création d'un nouvel utilisateur -- Role colocataire");
            // On complete les valeurs pour session
            //$_SESSION['flash'] = array('Success', "Utilisateur créé avec succès");
            //$_SESSION['isLoggedIn'] = true;
            //$_SESSION['role'] = "utilisateur";
            //$_SESSION['id_utilisateur'] = $id_utilisateur;
            header("Location: ../views/userDashboard.php");
        }
        }catch(PDOException $e){
            $error = $e->getMessage();
            //$logger->error("Echec de la créationd d'un nouvel utilisateur (colocataire) -- $error");
            $db->rollBack();
            $_SESSION['flash'] = array('Error', "Echec lors de la création d'un utilisateur");
            header("Location: ../views/userDashboard.php");
        }
    }else{
        //$logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
        // http_response_code(503);
        $_SESSION['flash'] = array('Error', "Echec lors de la création d'un utilisateur");
        header("Location: ../views/userDashboard.php");
    }
}
?>