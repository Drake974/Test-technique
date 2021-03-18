<?php
require_once('../class/Connection.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    try{   
        //all postes ok
        $query = $db->query("SELECT * 
        FROM `postes`
        ");
        $computers = $query->fetchAll(PDO::FETCH_OBJ);
        // $logger->info("Recuperation des données des postes -- SUCCESS");

        //all postes disponible ok
        $query = $db->query("SELECT * 
        FROM `postes`
        
        ");
        $freeComputers = $query->fetchAll(PDO::FETCH_OBJ);
        // $logger->info("Recuperation des données des postes -- SUCCESS");

        // all horaire ok
        $query = $db->query("SELECT * 
        FROM `creneaux`
        
        ");
        $timeTables = $query->fetchAll(PDO::FETCH_OBJ);
        // $logger->info("Recuperation des données des postes -- SUCCESS");
        
        // $logger->info("Recuperation des données -- FIN DES REQ");
        
    }catch(PDOException $e){
        $error = $e->getMessage();
        // $logger->error("Echec de l'Affichage des postes -- $error");
        exit();

    }
    
}else{
   // $logger->alert("Echec lors l'Affichage des postes -- Impossible de se connecter à la base de données");
    exit();
}
