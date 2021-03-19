<?php
require_once(dirname(__DIR__).'/controllers/session.php');
require_once(dirname(__DIR__).'/class/Connection.php');

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
            
        exit();
    }catch(PDOException $e){
        $error = $e->getMessage();
        
        exit();
    }
};
}else{
  
   exit();
}
