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
    <title>Pengaturan</title>
</head>
<body>
    <center><?php include "frontend/components/header.php";?>
    <?php require "frontend/components/navigations.php";?>

    <?php if ($_SESSION["bahasa"] === "id"):?>
        <h2>PENGATURAN</h2>
    <?php elseif ($_SESSION["bahasa"] === "en"):?>
        <h2>SETTINGS</h2>
    <?php endif;?>
    
    <?php require "frontend/components/languageOptions.php";?>

</body>
</html>
<?php
?>