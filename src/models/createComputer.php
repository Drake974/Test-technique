<?php 
require_once(dirname(__DIR__).'/class/Connection.php');
require_once(dirname(__DIR__).'/controllers/session/session.php'); 
use \Waavi\Sanitizer\Sanitizer;

$error = null;


//Validation des données cote serveur + securite specialchars
$inputRequired = ['register_number_computer'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        
        $_SESSION['flash'] = array('Error', "Echec lors de la création d'un poste'");
        header("Location: ../views/computerDashboard.php");
        exit();
    }
}

if($error == null) {
    //On déclare les valeurs à sanitizer
    $data = [
        'numero_poste' => $_POST['register_number_computer']
        
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
       
        $statut= "free";
        try{
            $number = htmlspecialchars($_POST["register_number_computer"], ENT_QUOTES);   

         $query = 'SELECT * FROM `postes` WHERE `numero_poste`=:numero_poste';
         $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute(array(
             ':numero_poste' => $number
         ));
         $Allcomputer = $sth->fetchAll(PDO::FETCH_OBJ);
         if($Allcomputer){
            $_SESSION['flash'] = array('Error',"Echec lors de l'enregistrement", "Choisir un autre numéro!");
            header("Location: ../views/computerDashboard.php");

         }else{
            $db->beginTransaction();
            
            //AJOUT TABLE UTILISATEURS
            $query = 'INSERT INTO `postes`(`numero_poste`, `statut_poste`) 
            VALUES (:numero_poste, :statut_poste)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':numero_poste' => $data_sanitized['numero_poste'],
                ':statut_poste' => $statut
            ));
            
            $db->commit();

            
            $_SESSION['flash'] = array('Success', "Poste créé avec succès");
            
            header("Location: ../views/computerDashboard.php");
        }
        }catch(PDOException $e){
            $error = $e->getMessage();
            
            $db->rollBack();
            $_SESSION['flash'] = array('Error', "Echec lors de la création d'un poste");
            header("Location: ../views/computerDashboard.php");
        }
    }else{
        
        $_SESSION['flash'] = array('Error', "Echec lors de la création d'un poste");
        header("Location: ../views/computerDashboard.php");
    }
}
?>