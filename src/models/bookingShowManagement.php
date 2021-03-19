<?php
require_once('../class/Connection.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    if(isset($_POST["booking_show_register"])){
    try{  
        $poste = htmlspecialchars($_POST["id_poste_show"], ENT_QUOTES); 
        $date=htmlspecialchars($_POST["date_show"], ENT_QUOTES); 
        $horaire = htmlspecialchars($_POST["time_date_show"], ENT_QUOTES);  
        //all user ok
        $query = $db->query("SELECT * 
        FROM `creneaux`
        INNER JOIN `utilisateurs` ON creneaux.id_utilisateur = utilisateurs.id_utilisateurs
        INNER JOIN `postes` ON creneaux.id_poste = postes.id_postes
        WHERE `id_poste`= $poste AND  horaire = '$horaire' AND `date` = '$date';
        ");
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        
        //affichage table utilisateur
        // $query = $db->query("SELECT * 
        // FROM `utilisateurs`;
        // ");
        // $showUsers = $query->fetchAll(PDO::FETCH_OBJ);

        
   
    }catch(PDOException $e){
        $error = $e->getMessage();    
        exit();
    }
}
}else{
   
    exit();
}
