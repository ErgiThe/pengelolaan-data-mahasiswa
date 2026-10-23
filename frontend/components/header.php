<?php 
if ($_SESSION["bahasa"] === 'id') {
    echo "<h1>PENGELOLAAN DATA MAHASISWA</h1>";
    if (isset($_SESSION["pengelola"])) {
        echo "Pengelola: ".$_SESSION["pengelola"]["nama"];
        echo "<br>";
        echo "<br>";
    }
} elseif ($_SESSION["bahasa"] === 'en') {
    echo "<h1>STUDENT DATA MANAGEMENT</h1>";
    if (isset($_SESSION["pengelola"])) {
        echo "Administrator: ".$_SESSION["pengelola"]["nama"];
        echo "<br>";
        echo "<br>";
    }
}
?>