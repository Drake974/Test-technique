<?php
if(session_status() != 2){
    session_start();
}

if(!isset($_SESSION['isLoggedIn'])){
    $_SESSION['isLoggedIn'] = false;
}

require_once(dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');