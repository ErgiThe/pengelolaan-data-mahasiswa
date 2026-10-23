<?php
    session_start();
    require "backend/sessionHandling/bahasa.php";
    require "backend/sessionHandling/verifyAccount.php";
    require "backend/direct.php";
    if (!verifyAccount()) {
        direct("login.php", "");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
<body>
    <center><?php include "frontend/components/header.php" ?>
    <?php require "frontend/components/navigations.php";?>
</body>
</html>
<?php
?>