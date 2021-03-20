<?php 
require_once(dirname(__DIR__).'/class/Connection.php');
require_once(dirname(__DIR__).'/controllers/session/session.php'); 
use \Waavi\Sanitizer\Sanitizer;

$error = null;

$id_utilisateurs = htmlspecialchars($_POST['id_utilisateurs'], ENT_QUOTES);
//Validation des données cote serveur + securite specialchars
$inputRequired = ['last_name_edit', 'first_name_edit', 'number_edit'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        
        $_SESSION['flash'] = array('Error', "Echec lors de la modification d'un utilisateur");
        header("Location: ../views/userDashboard.php");
        exit();
    }
}

if($error == null) {
    //On déclare les valeurs à sanitizer
    $data = [
        'nom_utilisateur' => $_POST['last_name_edit'],
        'prenom_utilisateur' => $_POST['first_name_edit'],
        'numero_utilisateur' => $_POST['number_edit'],
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
    
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){
        
        try{
            $db->beginTransaction();
            
            //AJOUT TABLE UTILISATEURS
            $query = 'UPDATE `utilisateurs` SET `nom_utilisateur` = :nom_utilisateur,
             `prenom_utilisateur` = :prenom_utilisateur,
              `numero_utilisateur`= :numero_utilisateur
              WHERE `id_utilisateurs` = :id_utilisateurs';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id_utilisateurs' => $id_utilisateurs,
                ':nom_utilisateur' => $data_sanitized['nom_utilisateur'],
                ':prenom_utilisateur' => $data_sanitized['prenom_utilisateur'],
                ':numero_utilisateur' => $data_sanitized['numero_utilisateur']
            ));

            
            $db->commit();
            
            $_SESSION['flash'] = array('Success', "Modification avec succès");
                        
            header("Location: ../views/userDashboard.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            
            $db->rollBack();
            $_SESSION['flash'] = array('Error', "Echec lors de la modification d'un utilisateur");
            header("Location: ../views/userDashboard.php");
        }
    }else{
        
        $_SESSION['flash'] = array('Error', "Echec lors de la modification d'un utilisateur");
        header("Location: ../views/userDashboard.php");
    }
}
?>