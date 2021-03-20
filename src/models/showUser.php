<?php
require_once(dirname(__DIR__).'/controllers/session/session.php'); 
require_once(dirname(__DIR__).'/class/Connection.php');

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
        
    }catch(PDOException $e){
        $error = $e->getMessage();
        
        exit();

    }
   
}else{
   
    exit();
}
