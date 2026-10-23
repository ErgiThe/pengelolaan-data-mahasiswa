<?php
    session_start();
    unset($_SESSION["pengelola"]);
    require __DIR__."/../direct.php";
    direct("/pengelolaan data mahasiswa/index.php","?message=ok");
?>