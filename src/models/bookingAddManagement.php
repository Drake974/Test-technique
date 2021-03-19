<?php 
require_once(dirname(__DIR__).'/class/Connection.php');
require_once(dirname(__DIR__).'/controllers/session.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;


//Validation des données cote serveur + securite specialchars
$inputRequired = ['date_poste', 'id_poste', 'time_date'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $_SESSION['flash'] = array('Error', "Echec lors de l'attribution d'un poste");
        header("Location: ../views/bookingDashboard.php");
        exit();
    }
}
if($error == null) {
    //On déclare les valeurs à sanitizer
    $data = [
        'id_utilisateurs' => $_POST['booking_user_id'],
        'id_postes' => $_POST['id_poste'],
        'date' => $_POST['date_poste'],
        'horaire' => $_POST['time_date'] 
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];

    $filters = [
        
        'id_utilisateurs' => 'trim|escape|capitalize|htmlspecialchars',
        'id_postes' => 'trim|escape|capitalize|htmlspecialchars',
        'date' => 'trim|format_date:Y-m-d, Y-m-d|htmlspecialchars',
        'horaire' => 'trim|escape|capitalize|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    
    $data_sanitized = $sanitizer->sanitize();
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){

        try{
            $db->beginTransaction();
            
            //AJOUT TABLE UTILISATEURS
            $query = 'INSERT INTO `creneaux`(`id_poste`, `id_utilisateur`,`date`, `horaire`) 
            VALUES (:id_postes, :id_utilisateurs, :date_register, :horaire)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id_postes' => $data_sanitized['id_postes'],
                ':id_utilisateurs' => $data_sanitized['id_utilisateurs'],
                ':date_register' => $data_sanitized['date'],
                ':horaire' => $data_sanitized['horaire']
            ));
            $db->commit();

            
            $_SESSION['flash'] = array('Success', "Reservation créé avec succès");
            
           header("Location: ../views/bookingDashboard.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $db->rollBack();
            $_SESSION['flash'] = array('Error', "Echec lors de l'attribution d'un poste");
            header("Location: ../views/bookingDashboard.php");
        }
    }else{
        // http_response_code(503);
        $_SESSION['flash'] = array('Error', "Echec lors de l'attribution d'un poste");
        header("Location: ../views/bookingDashboard.php");
    }
}
?>