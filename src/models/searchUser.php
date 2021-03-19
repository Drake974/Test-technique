<?php
require_once('../controllers/session.php');
require_once('../class/Connection.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    if(isset($_POST["search_user"])){
        
    try{   
   
            //all user ok
            $idSearch = htmlspecialchars($_POST["search_user"], ENT_QUOTES);
            $query = $db->query("SELECT * 
            FROM `utilisateurs` 
            WHERE `roles` = 2 AND `numero_utlisateur`
            LIKE '$idSearch' ;
            ");
            $searchUsers = $query->fetchAll(PDO::FETCH_OBJ);
            // $logger->info("Recuperation des données d'utilisateur' -- SUCCESS");
        
        // $logger->info("Recuperation des données -- FIN DES REQ");
        exit();
    }catch(PDOException $e){
        $error = $e->getMessage();
        // $logger->error("Echec de l'Affichage d'utilisateur -- $error");
        exit();
    }
};
}else{
   // $logger->alert("Echec lors l'Affichage des utilisateurs -- Impossible de se connecter à la base de données");
   exit();
}
