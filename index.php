<?php
    session_start();
    require "backend/direct.php";
    require "backend/sessionHandling/verifyAccount.php";
    
    if (isset($_SESSION["pengelola"])) {
        if (verifyAccount()) {
            direct("main.php", "");
        } else {
            direct("login.php", "");
        }

    } else {
        direct("login.php", "");
    }
?>