<!-- Nomor Pengguna : 10124146 -->
<!-- Password : admin123 -->
<?php 
    session_start();
    include "backend/sessionHandling/bahasa.php";
    require "backend/sessionHandling/verifyAccount.php";
    require "backend/direct.php";
    if (verifyAccount()) {
        direct("main.php", "");
    }
    // var_dump($_SESSION['pengelola']);
?>

<!DOCTYPE html>
<html lang="<?php $_SESSION["bahasa"] ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Data Mahasiswa</title>
</head>
<body>
    <center>
    <?php include "frontend/components/header.php" ?>
    <h2>Login</h2>
    <form action="backend/login/process_login.php" method="post">
        <table>
            <tr>
                <td>ID</td>
                <td><input type="number" name="id" id="id" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
        </table>
        <br>
        <button type="submit">Login</button>
        <br>
        <br>
        <?php
        if (isset($_GET["auth_err"])) {
            if ($_GET["auth_err"] == "fail") {
                if ($_SESSION["bahasa"] == "id") {
                    echo "ID atau password salah, ulangi lagi!";
                } elseif ($_SESSION["bahasa"] == "en") {
                    echo "ID or password is incorrect, try again!";
                }
            } else if ($_GET["auth_err"] == "not_found") {
                if ($_SESSION["bahasa"] == "id") {
                    echo "ID tidak ditemukan!";
                } elseif ($_SESSION["bahasa"] == "en") {
                    echo "ID is not found!";
                }
            }
        }
        ?>
    </form>
    <br>
    <?php include "frontend/components/languageOptions.php" ?>
</body>
</html>