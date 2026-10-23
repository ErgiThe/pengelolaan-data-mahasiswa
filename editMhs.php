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
    $confirm = isset($_POST["nim"]) && isset($_POST["nama"]) && isset($_POST["kelas"]);
    // if ($get):
?>
<?php if ($get):?>
<form action="editMhs.php" method="post">
    <?php if ($_SESSION["bahasa"] === 'id'): ?>
        <h3>UBAH DATA MAHASISWA</h3>
        <p>mengubah data mahasiswa</p>
        <table>
            <tr><th align=left>NIM</th><td>: <input type="number" name="nim" id="" value="<?php echo $_GET["nim"]; ?>" readonly></td></tr>
            <tr><th align=left>NAMA</th><td>: <input type="text" name="nama" id="" value="<?php echo $_GET["nama"]; ?>" ></td></tr>
            <tr><th align=left>KELAS</th><td>: <input type="text" name="kelas" id="" value="<?php echo $_GET["kelas"]; ?>" ></td></tr>
        </table>
        <br>
            <button type="submit">Ubah</button>
        <br>
        <br>
        <a href="<?php echo $urlBack; ?>">Kembali</a>
    <?php elseif ($_SESSION["bahasa"] === 'en'): ?>
        <h3>EDIT STUDENT DATA</h3>
        <p>modify student data</p>
        <table>
            <tr><th align=left>NIM</th><td>: <input type="number" name="nim" id="" value="<?php echo $_GET["nim"]; ?>" readonly></td></tr>
            <tr><th align=left>NAME</th><td>: <input type="text" name="nama" id="" value="<?php echo $_GET["nama"]; ?>" ></td></tr>
            <tr><th align=left>CLASS</th><td>: <input type="text" name="kelas" id="" value="<?php echo $_GET["kelas"]; ?>" ></td></tr>
        </table>
        <br>
        <button type="submit">Edit</button>
        <br>
        <br>
        <a href="<?php echo $urlBack; ?>">Back</a>
    <?php endif;?>
</form>
<?php endif; ?>
<?php 
if ($confirm) {
    require "backend/db.php";

    if (isset($_POST["nim"]) && isset($_POST["nama"]) && isset($_POST["kelas"])) {
        try {
            $stmt = $pdo->prepare("UPDATE mahasiswa SET nama = :nama, kelas = :kelas WHERE nim = :nim ");
            $stmt->execute([
                ":nama" => htmlspecialchars($_POST["nama"]),
                ":kelas" => htmlspecialchars($_POST["kelas"]),
                ":nim" => htmlspecialchars($_POST["nim"])
            ]);

            if ($_SESSION["bahasa"] === 'id') {
                echo "<p>data berhasil diubah!";
            } elseif ($_SESSION["bahasa"] === 'en') {
                echo "<p>data edited successfully!";
            }
        } catch (PDOExeption $e) {
            echo "Gagal mengubah data: ".$e->getMessage();
        }
    }
}
?>