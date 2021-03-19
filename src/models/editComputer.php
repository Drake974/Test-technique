<?php 
require_once(dirname(__DIR__).'/class/Connection.php');
require_once(dirname(__DIR__).'/controllers/session.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;
$id_postes = htmlspecialchars($_POST['id_postes'], ENT_QUOTES);
//Validation des données cote serveur + securite specialchars
$inputRequired = ['edit_computer_number'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        
        $_SESSION['flash'] = array('Error', "Echec lors de la modification du poste");
        header("Location: ../views/computerDashboard.php");
        exit();
    }
}

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
    
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){
        
        try{
            $db->beginTransaction();
            
            //AJOUT TABLE UTILISATEURS
            $query = 'UPDATE `postes` SET `numero_poste` = :numero_poste
              WHERE `id_postes` = :id_postes';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id_postes' => $id_postes,
                ':numero_poste' => $data_sanitized['numero_poste']
            ));


            $db->commit();

            $_SESSION['flash'] = array('Success', "Modification avec succès");
            
            header("Location: ../views/computerDashboard.php");
           
        }catch(PDOException $e){
            $error = $e->getMessage();
            
            $db->rollBack();
            $_SESSION['flash'] = array('Error', "Echec lors de la modification d'un poste");
            header("Location: ../views/computerDashboard.php");
           
        }
    }else{
        
        $_SESSION['flash'] = array('Error', "Echec lors de la modification d'un poste");
        header("Location: ../views/computerDashboard.php");
       
    }
}
?>