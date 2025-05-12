<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location:Sakura-Scan2.0/Form_connexion.php");
    exit();
?>