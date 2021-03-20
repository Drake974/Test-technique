<?php
require_once(dirname(__DIR__).'/class/Connection.php');
require_once(dirname(__DIR__).'/controllers/session/session.php'); 


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
        
        // On complete les valeurs pour session
        $_SESSION['flash'] = array('Success', "Utilisateur supprimé avec succès");
        header("Location: ../views/userDashboard.php");
    }catch(PDOException $e){
        $error = $e->getMessage();
        
        $_SESSION['flash'] = array('Error', "Echec lors de la suppression de l'utilisateur");
        header("Location: ../views/userDashboard.php");
    }
}else{
   
    $_SESSION['flash'] = array('Error', "Echec lors de la suppression de l'utilisateur");
    header("Location: ../views/userDashboard.php");
};
