<?php
    require "../direct.php";
    require "../db.php";
    $loginUrl = "../../login.php";
    $mainPageUrl = '../../main.php';

    if ($_POST["id"] && $_POST["password"]) {
        $input_username = htmlspecialchars($_POST["id"]);
        $input_password = htmlspecialchars($_POST["password"]);
        try {
            $stmt = $pdo->prepare("SELECT id,nama,password FROM pengelola WHERE id = :id");
            $stmt->execute([":id" => $input_username]);
            $pengelola = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($pengelola) {
                if (password_verify($input_password, $pengelola["password"])) {
                    session_start();
                    $_SESSION["pengelola"] = $pengelola;
                    direct($mainPageUrl, "");
                } else {
                    direct($loginUrl, "?auth_err=fail");
                }

            } else {
                direct($loginUrl, "?auth_err=not_found");
            }
        
        } catch (PDOException $e) {
            echo "Gagal mengambil data: ".$e->getMessage();
        }

    } else {
        direct($loginUrl, "error");
    }
?>