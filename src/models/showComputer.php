<?php
require_once(dirname(__DIR__).'/controllers/session/session.php'); 
require_once(dirname(__DIR__).'/class/Connection.php');

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
        
        //all postes disponible ok
        $query = $db->query("SELECT * 
        FROM `postes`
        
        ");
        $freeComputers = $query->fetchAll(PDO::FETCH_OBJ);
        
        // all horaire ok
        $query = $db->query("SELECT * 
        FROM `creneaux`
        
        ");
        $timeTables = $query->fetchAll(PDO::FETCH_OBJ);

         // all horaire ok
         $query = $db->query("SELECT 
         COUNT(*) as nb_poste
         FROM `postes`
         
         ");
         $nbComputers = $query->fetch();
    
    
    }catch(PDOException $e){
        $error = $e->getMessage();
        
        exit();

    }
    
}else{
  
    exit();
}
