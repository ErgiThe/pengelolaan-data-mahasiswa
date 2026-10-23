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
    $get = isset($_GET["nim"]) && isset($_GET["nama"]) && isset($_GET["kelas"]);
    $deleted = isset($_POST["nim"]) && isset($_POST["nama"]) && isset($_POST["kelas"]);
    // if ($get):
?>
<?php if ($get):?>
<form action="hapusMhs.php" method="post">
    <?php if ($_SESSION["bahasa"] === 'id'): ?>
        <h3>HAPUS MAHASISWA</h3>
        <p>apakah anda yakin untuk menghapus satu mahasiswa ini?</p>
        <table>
            <tr><th align=left>NIM</th><td>: <input type="number" name="nim" id="" value="<?php echo $_GET["nim"]; ?>" readonly></td></tr>
            <tr><th align=left>NAMA</th><td>: <input type="text" name="nama" id="" value="<?php echo $_GET["nama"]; ?>" readonly></td></tr>
            <tr><th align=left>KELAS</th><td>: <input type="text" name="kelas" id="" value="<?php echo $_GET["kelas"]; ?>" readonly></td></tr>
        </table>
        <br>
            <button type="submit">Hapus</button>
        <br>
        <br>
        <a href="<?php echo $urlBack; ?>">Kembali</a>
    <?php elseif ($_SESSION["bahasa"] === 'en'): ?>
        <h3>DELETE STUDENT</h3>
        <p>are you sure to delete this student?</p>
        <table>
            <tr><th align=left>NIM</th><td>: <input type="number" name="nim" id="" value="<?php echo $_GET["nim"]; ?>" readonly></td></tr>
            <tr><th align=left>NAME</th><td>: <input type="text" name="nama" id="" value="<?php echo $_GET["nama"]; ?>" readonly></td></tr>
            <tr><th align=left>CLASS</th><td>: <input type="text" name="kelas" id="" value="<?php echo $_GET["kelas"]; ?>" readonly></td></tr>
        </table>
        <br>
        <button type="submit">Delete</button>
        <br>
        <br>
        <a href="<?php echo $urlBack; ?>">Back</a>
    <?php endif;?>
</form>
<?php endif; ?>
<?php 
if ($deleted) {
    require "backend/db.php";

    if (isset($_POST["nim"]) && isset($_POST["nama"]) && isset($_POST["kelas"])) {
        try {
            $stmt = $pdo->prepare("DELETE FROM mahasiswa WHERE nim = :nim");
            $stmt->execute([
                ":nim" => htmlspecialchars($_POST["nim"]),
            ]);

            if ($_SESSION["bahasa"] === 'id') {
                echo "<p>data berhasil dihapus!";
            } elseif ($_SESSION["bahasa"] === 'en') {
                echo "<p>data deleted successfully!";
            }
        } catch (PDOExeption $e) {
            echo "Gagal menghapus data: ".$e->getMessage();
        }
    }
}
?>