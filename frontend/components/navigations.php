<?php if ($_SESSION["bahasa"] === 'id'): ?>

<a href="/pengelolaan data mahasiswa/mhs.php">Daftar Mahasiswa</a> |
<a href="/pengelolaan data mahasiswa/pengaturan.php">Pengaturan</a> |
<a href="/pengelolaan data mahasiswa/backend/login/process_logout.php">Logout</a>

<?php elseif ($_SESSION["bahasa"] === 'en'): ?>

<a href="/pengelolaan data mahasiswa/mhs.php">Student list</a> |
<a href="/pengelolaan data mahasiswa/pengaturan.php">Settings</a> |
<a href="/pengelolaan data mahasiswa/backend/login/process_logout.php">Logout</a>

<?php endif; ?>