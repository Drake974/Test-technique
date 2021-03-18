<?php
require_once('../class/Connection.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    try{   
        //all user ok
        $query = $db->query("SELECT * 
        FROM `utilisateurs` 
        WHERE `roles`= 2;
        ");
        $utilisateurs = $query->fetchAll(PDO::FETCH_OBJ);
        // $logger->info("Recuperation des données d'utilisateur' -- SUCCESS");
        
        // $logger->info("Recuperation des données -- FIN DES REQ");  
    }catch(PDOException $e){
        $error = $e->getMessage();
        // $logger->error("Echec de l'Affichage d'utilisateur -- $error");
        exit();

    }
   
}else{
   // $logger->alert("Echec lors l'Affichage des utilisateurs -- Impossible de se connecter à la base de données");
    exit();
}
