<?php
require_once(dirname(__DIR__).'/controllers/session.php');
require_once(dirname(__DIR__).'/class/Connection.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();

if($db){
    if(isset($_POST["show_user"])){
    
    try{
        $numberUser = htmlspecialchars($_POST["user_show"], ENT_QUOTES);   

         $query = 'SELECT * FROM `utilisateurs` WHERE `numero_utilisateur`=:numero_utilisateur';
         $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute(array(
             ':numero_utilisateur' => $numberUser
         ));
         $resultats = $sth->fetchAll(PDO::FETCH_OBJ); //stock dans une variable les données de la bdd 
        

   
    }catch(PDOException $e){
        $error = $e->getMessage();
       
        exit();

    }
}};