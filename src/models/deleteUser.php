<?php
require_once('../class/Connection.php');
require_once('../controllers/session.php');


$error = null;

$db = Connection::getPDO();
$id_delete = $_POST['id_utilisateurs_delete'];
if($db){
    try{
        $query = 'DELETE FROM `utilisateurs` WHERE id_utilisateurs = :id';
        $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(
            ':id' => $id_delete
        ));
        // $logger->info("Suppression d'un equipement -- TABLE EQUIPEMENTS OK");
        
        // On complete les valeurs pour session
        $_SESSION['flash'] = array('Success', "Utilisateur supprimé avec succès");
        header("Location: ../views/userDashboard.php");
    }catch(PDOException $e){
        $error = $e->getMessage();
        // $logger->error("Echec lors de la suppression de l'equipement -- $error");
        $_SESSION['flash'] = array('Error', "Echec lors de la suppression de l'utilisateur");
        header("Location: ../views/userDashboard.php");
    }
}else{
    // $logger->alert("Echec lors de la suppression de l'equipement -- Impossible de se connecter à la base de données");
    $_SESSION['flash'] = array('Error', "Echec lors de la suppression de l'utilisateur");
    header("Location: ../views/userDashboard.php");
};
