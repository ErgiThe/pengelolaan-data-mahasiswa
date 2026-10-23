<?php 
    session_start();
    require "backend/sessionHandling/verifyAccount.php";
    require "backend/direct.php";
    if (!verifyAccount()) {
        direct("login.php", "");
        }
    require "backend/sessionHandling/bahasa.php";
    $urlBack = '/pengelolaan data mahasiswa/mhs.php';
?>

<center><?php include "frontend/components/header.php" ?>
<?php require "frontend/components/navigations.php";?>

<?php
    $confirm = isset($_POST["nim"]);
?>
<form action="cariMhs.php" method="post">
    <?php if ($_SESSION["bahasa"] === 'id'): ?>
        <h3>CARI MAHASISWA BERDASARKAN NIM</h3>
        <p>menampilkan 1 mahasiswa berdasarkan nim yang dicari</p>
        <table>
            <tr><th align=left>NIM</th><td>: <input type="number" name="nim" id=""></td></tr>
        </table>
        <br>
            <button type="submit">CARI</button>
        <br>
        <br>
        <a href="<?php echo $urlBack; ?>">Kembali</a>
    <?php elseif ($_SESSION["bahasa"] === 'en'): ?>
        <h3>SEARCH STUDENT BASED ON NIM</h3>
        <p>displays 1 student based on student ID number searced for</p>
        <table>
            <tr><th align=left>NIM</th><td>: <input type="number" name="nim" id=""></td></tr>
        </table>
        <br>
        <button type="submit">SEARCH</button>
        <br>
        <br>
        <a href="<?php echo $urlBack; ?>">Back</a>
    <?php endif;?>
</form>
<?php 
if ($confirm) :
    require "backend/db.php";

    if (isset($_POST["nim"])) {
        try {
            $stmt = $pdo->prepare("SELECT nim,nama,kelas FROM mahasiswa WHERE nim = :nim");
            $stmt->execute([
                ":nim" => htmlspecialchars($_POST["nim"])
            ]);
            $mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOExeption $e) {
            echo "Gagal mengubah data: ".$e->getMessage();
        }
    }
?>

<?php if ($mahasiswa !== NULL):?>
    <?php if (count($mahasiswa) !== 0):?>
    <p>ditemukan!</p>
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

<?php endif;?>