<?php
        include("layout/header.php");
        //unset($_SESSION['user'])
       session_destroy();
       header('Location: ../index.php');
    
?>