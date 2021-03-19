<?php
require_once(dirname(__DIR__).'/controllers/session.php');
require_once(dirname(__DIR__).'/class/Connection.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    if(isset($_POST["home_date_choose"])){
        try{  
            
            $date=htmlspecialchars($_POST["search_date"], ENT_QUOTES); 
              
            //all user ok
            $query = $db->query("SELECT * 
            FROM `creneaux`
            INNER JOIN `utilisateurs` ON creneaux.id_utilisateur = utilisateurs.id_utilisateurs
            INNER JOIN `postes` ON creneaux.id_poste = postes.id_postes
            WHERE  `date` = '$date';
            ");
            $users = $query->fetchAll(PDO::FETCH_OBJ);

    
            }catch(PDOException $e){
                $error = $e->getMessage();    
                exit();
            }
        }else{
        if(isset($_POST["show_register"])){
            try{  
                $user_identity = htmlspecialchars($_POST["user_identity"], ENT_QUOTES); 
                 
                //all user ok
                $query = $db->query("SELECT * 
                FROM `creneaux`
                INNER JOIN `utilisateurs` ON creneaux.id_utilisateur = utilisateurs.id_utilisateurs
                INNER JOIN `postes` ON creneaux.id_poste = postes.id_postes
                WHERE `numero_utilisateur`= $user_identity;
                ");
                $users = $query->fetchAll(PDO::FETCH_OBJ);
           
                }catch(PDOException $e){
                $error = $e->getMessage();    
                exit();
                }
        }
    }
    }else{
   
    exit();
}