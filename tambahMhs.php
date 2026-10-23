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

<?php if ($_SESSION["bahasa"] === 'id'): ?>
    <h3>TAMBAH MAHASISWA</h3>
    <p>menambahkan 1 mahasiswa.</p>
<?php elseif ($_SESSION["bahasa"] === 'en'): ?>
    <h3>ADD STUDENT</h3>
    <p>adding 1 student</p>
<?php endif;?>

<?php if (!(isset($_POST["nim"]) && isset($_POST["nama"]) && isset($_POST["kelas"]))): ?>
<form action="tambahMhs.php" method="post">
    <?php if ($_SESSION["bahasa"] === 'id'): ?>
    <table>
        <tr><th align=center>NIM</th></tr>
        <tr><td><input type="number" name="nim" id="" require></td></tr>
        <tr><th align=center>NAMA</th></tr>
        <tr><td><input type="text" name="nama" id="" require></td></tr>
        <tr><th align=center>KELAS</th></tr>
        <tr><td><input type="text" name="kelas" id=""></td></tr>
    </table>
    <br>
        <button type="reset">Reset</button>
        <button type="submit">Tambah</button>
    <br>
    <br>
    <a href="<?php echo $urlBack; ?>">Kembali</a>
    <?php elseif ($_SESSION["bahasa"] === 'en'): ?>
        <table>
            <tr><th align=center>NIM</th></tr>
            <tr><td><input type="number" name="nim" id="" require></td></tr>
            <tr><th align=center>NAME</th></tr>
            <tr><td><input type="text" name="nama" id="" require></td></tr>
            <tr><th align=center>CLASS</th></tr>
            <tr><td><input type="text" name="kelas" id=""></td></tr>
        </table>
        <br>
        <button type="reset">Reset</button>
        <button type="submit">Add</button>
        <br>
        <br>
        <a href="<?php echo $urlBack; ?>">Back</a>
    <?php endif;?>
</form>
<?php endif; ?>
<?php
    require "backend/db.php";
    if (isset($_POST["nim"]) && isset($_POST["nama"]) && isset($_POST["kelas"])) {
        try {
            $stmt = $pdo->prepare("INSERT INTO mahasiswa (nim,nama,kelas) VALUES (:nim,:nama,:kelas)");
            $stmt->execute([
                ":nim" => htmlspecialchars($_POST["nim"]),
                ":nama" => htmlspecialchars($_POST["nama"]),
                ":kelas" => htmlspecialchars($_POST["kelas"])
            ]);

            if ($_SESSION["bahasa"] === 'id') {
                echo "data berhasil ditambahkan!";
            } elseif ($_SESSION["bahasa"] === 'en') {
                echo "data saved successfully!";
            }
        } catch (PDOExeption $e) {
            echo "Gagal menambahkan data: ".$e->getMessage();
        }
    }
?>