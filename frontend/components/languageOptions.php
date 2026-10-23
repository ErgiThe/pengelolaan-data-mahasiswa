<?php 
    if (isset($_GET['bahasa'])) { 
        $_SESSION["bahasa"] = $_GET['bahasa'];
    }
?>
<label for="bahasa"><?php 
    if ($_SESSION["bahasa"] === 'id') {
        echo "Bahasa";
    } elseif ($_SESSION["bahasa"] === 'en') {
        echo "Language";
    }
?> </label>
<select name="bahasa" id="bahasa" onchange="ubahBahasa()">
        <option value="id" <?= $_SESSION["bahasa"] === 'id' ? 'selected' : '' ?>> Indonesia </option> 
        <option value="en" <?= $_SESSION["bahasa"] === 'en' ? 'selected' : '' ?>> English </option>
</select>
<script> 
function ubahBahasa() { 
    const bahasa = document.getElementById('bahasa').value; 
    window.location.href = '?bahasa=' + bahasa; 
} 
</script>