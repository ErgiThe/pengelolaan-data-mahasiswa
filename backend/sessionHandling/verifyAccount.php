<?php
    function verifyAccount() {
        require __DIR__."/../db.php";
        // var_dump($_SESSION['pengelola']);
        if(isset($_SESSION["pengelola"])) {
            // verify
            $id = $_SESSION["pengelola"]["id"];
            $passwordSession = $_SESSION["pengelola"]["password"];
            try {
                $stmt = $pdo->prepare("SELECT id,password FROM pengelola WHERE id = :id");
                $stmt->execute([":id" => $id]);
                $pengelola = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($pengelola) {
                    if (($pengelola["id"] === $id) && ($pengelola["password"] === $passwordSession)) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                }
            } catch (PDOException $e) {
                echo "Gagal mengambil data: ".$e->getMessage();
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
?>