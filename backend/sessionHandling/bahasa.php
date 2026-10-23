<?php 
    $_SESSION["bahasa"] = $_SESSION["bahasa"] ?? "id";
    if (isset($_GET['bahasa'])) { 
        $_SESSION["bahasa"] = $_GET['bahasa'];
    }
?>