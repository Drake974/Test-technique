<?php
    session_start();
    unset($_SESSION['isLoggedIn']);
    header("Location: ../views/home.php");
?>