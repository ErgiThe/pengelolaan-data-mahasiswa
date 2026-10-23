<?php
    session_start();
    require "backend/sessionHandling/bahasa.php";
    require "backend/sessionHandling/verifyAccount.php";
    require "backend/direct.php";
    require_once "backend/db.php";
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

    <?php if ($_SESSION["bahasa"] === "id"):?>
        <h2>DAFTAR MAHASISWA</h2>
    <?php elseif ($_SESSION["bahasa"] === "en"):?>
        <h2>STUDENT LIST</h2>
    <?php endif;?>
    
    <table>
    <tr>
        <?php if ($_SESSION["bahasa"] === "id"):?>
            <td><a href="cariMhs.php">Cari</a></td>
            <td><a href="tambahMhs.php">Tambah</a></td>
        <?php elseif ($_SESSION["bahasa"] === "en"):?>
            <td><a href="cariMhs.php">Search</a></td>
            <td><a href="tambahMhs.php">Add</a></td>
        <?php endif;?>
    </tr>
    </table>
    <br>
    
    <?php 
        try {
            $stmt = $pdo->prepare("SELECT * FROM mahasiswa ORDER BY nim ASC");
            $stmt->execute();
            $mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) { 
            echo "Gagal mengambil data: ".$e->getMessage();
        }
    if ($mahasiswa !== NULL):?>
    <?php if (count($mahasiswa) !== 0):?>
    <table border=1 cellpadding=5>
        <tr>
            <?php if ($_SESSION["bahasa"] === "id"):?>
                <th>NIM</th>
                <th>NAMA</th>
                <th>KELAS</th>
                <th>AKSI</th>
            <?php elseif ($_SESSION["bahasa"] === "en"):?>
                <th>NIM</th>
                <th>NAME</th>
                <th>CLASS</th>
                <th>ACTION</th>
            <?php endif;?>
        </tr>
        
        <tr>
            <?php
                foreach ($mahasiswa as $mhs) {
                    echo "<tr>";
                    echo "<td>".$mhs["nim"];
                    echo "<td>".$mhs["nama"];
                    echo "<td>".$mhs["kelas"];
                    $edit = "editMhs.php?".http_build_query($mhs);
                    $delete = "hapusMhs.php?".http_build_query($mhs);
                    if ($_SESSION["bahasa"] === "id") {
                        echo "<td align=center>".'<a href="'.$edit.'">ubah</a><br><a href="'.$delete.'">hapus</a>'."</td>";
                    } elseif ($_SESSION["bahasa"] === "en") {
                        echo "<td align=center>".'<a href="'.$edit.'">edit</a><br><a href="'.$delete.'">delete</a>'."</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tr>
    </table>
    <?php else: 
        if ($_SESSION["bahasa"] === "id") {
            echo "<p>Tidak ada data</p>";
        } elseif ($_SESSION["bahasa"] === "en") {
            echo "<p>Empty</p>";
        }
    endif;
    ?>
    <?php else: 
        if ($_SESSION["bahasa"] === "id") {
            echo "<p>Gagal menampilkan data</p>";
        } elseif ($_SESSION["bahasa"] === "en") {
            echo "<p>Failed showing all data's</p>";
        }
    endif;
    ?>
</body>
</html>