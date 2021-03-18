<?php 
require_once('../class/Connection.php');
require_once('../controllers/session.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;


//Validation des données cote serveur + securite specialchars
$inputRequired = ['date_poste', 'id_poste', 'time_date'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $_SESSION['flash'] = array('Error', "Echec lors de l'attribution d'un ordinateur");
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
            $query = 'INSERT INTO `creneaux`(`id_postes`, `id_utilisateurs`,`date`, `horaire`) 
            VALUES (:id_postes, :id_utilisateurs, :date_register, :horaire)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id_postes' => $data_sanitized['id_postes'],
                ':id_utilisateurs' => $data_sanitized['id_utilisateurs'],
                ':date_register' => $data_sanitized['date'],
                ':horaire' => $data_sanitized['horaire']
            ));
            $db->commit();

            // On complete les valeurs pour session
            //$_SESSION['flash'] = array('Success', "Utilisateur créé avec succès");
            //$_SESSION['isLoggedIn'] = true;
            //$_SESSION['role'] = "utilisateur";
            //$_SESSION['id_utilisateur'] = $id_utilisateur;
           header("Location: ../views/bookingDashboard.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $db->rollBack();
            $_SESSION['flash'] = array('Error', "Echec lors de l'attribution d'un ordinateur");
            header("Location: ../views/bookingDashboard.php");
        }
    }else{
        // http_response_code(503);
        $_SESSION['flash'] = array('Error', "Echec lors de l'attribution d'un ordinateur");
        header("Location: ../views/bookingDashboard.php");
    }
}
?>