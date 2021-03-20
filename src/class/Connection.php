<?php 
//connexion bdd

 class Connection{

    public static function getPDO (): PDO
    {
        // $pdo = new PDO('mysql:host=127.0.0.1;dbname=culturel;charset=utf8', 'root', '');
        $pdo = new PDO('mysql:host=db4free.net;port=3306;dbname=culturel;charset=utf8', 'saminadin', 'mercredi');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    

 }
 ?>