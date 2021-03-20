<?php 
require_once(dirname(__DIR__).'/class/Connection.php');
require_once(dirname(__DIR__).'/controllers/session/session.php'); 
use \Waavi\Sanitizer\Sanitizer;

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['last_name', 'first_name', 'number'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        
        $_SESSION['flash'] = array('Error', "Echec lors de la création d'un utilisateur'");
        header("Location: ../views/userDashboard.php");
        exit();
    }
}

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
    
    $db = Connection::getPDO();
    if($db){
        
        try{
            $identity = htmlspecialchars($_POST["number"], ENT_QUOTES);   

         $query = 'SELECT * FROM `utilisateurs` WHERE `numero_utilisateur`=:numero_utilisateur';
         $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute(array(
             ':numero_utilisateur' => $identity
         ));
         $result = $sth->fetchAll(PDO::FETCH_OBJ);
         if($result){
            $_SESSION['flash'] = array('Error',"L'identifiant existe déjà!", "Choisir un autre identifiant!");
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
            
            $db->commit();

            
            $_SESSION['flash'] = array('Success', "Enregistrement de l'identifiant avec succès");
            
            
            header("Location: ../views/userDashboard.php");
        }
        }catch(PDOException $e){
            $error = $e->getMessage();
            
            $db->rollBack();
            $_SESSION['flash'] = array('Error', "Echec lors de la création d'un utilisateur");
            header("Location: ../views/userDashboard.php");
        }
    }else{
        
        $_SESSION['flash'] = array('Error', "Echec lors de la création d'un utilisateur");
        header("Location: ../views/userDashboard.php");
    }
}
?>