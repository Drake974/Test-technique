<?php
require_once('../class/Connection.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    try{   
        //all annonce ok
        $query = $db->query("SELECT * 
        FROM `postes`
        ");
        $computers = $query->fetchAll(PDO::FETCH_OBJ);
        // $logger->info("Recuperation des données d'utilisateur' -- SUCCESS");
        
        // $logger->info("Recuperation des données -- FIN DES REQ");
        
    }catch(PDOException $e){
        $error = $e->getMessage();
        // $logger->error("Echec de l'Affichage d'utilisateur -- $error");
        exit();
    

    }catch(PDOException $e){
        $error = $e->getMessage();
        // $logger->error("Echec de l'Affichage des utilisateurs -- $error");
        exit();
    }
    
    
}else{
   // $logger->alert("Echec lors l'Affichage des utilisateurs -- Impossible de se connecter à la base de données");
    exit();
}