<?php
if(session_status() != 2){
    session_start();
}

if(!isset($_SESSION['isLoggedIn'])){
    $_SESSION['isLoggedIn'] = false;
}

require_once('../../vendor/autoload.php');