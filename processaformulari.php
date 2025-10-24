<?php
//obtenim els camps del formulari enviats per post
//camp ocult
$creador = "";
if (isset($_POST["creador"]) && (strcmp(trim($_POST["creador"]), "") != 0)) {
    $creador = htmlspecialchars(trim($_POST["creador"]));
} else {
    $creador = "Sense Valor";
}
$usuari = "";
if (isset($_POST["usuari"]) && (strcmp(trim($_POST["usuari"]), "") != 0)) {
    $usuari = htmlspecialchars(trim($_POST["usuari"]));
} else {
    $usuari = "Sense Valor";
}
$contrasenya = "";
if (isset($_POST["contrasenya"]) && (strcmp(trim($_POST["contrasenya"]), "") != 0)) {
    $contrasenya = htmlspecialchars(trim($_POST["contrasenya"]));
} else {
    $contrasenya = "Sense Valor";
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="utf-8">
    <title>Formulari</title>
    <link rel="stylesheet" href="estils.css">
</head>

<body>
    <div id="wrapper">
        <header id="cap">
            <h1 id="titol">Formulari</h1>
        </header>
        <main id="principal">
            <h2>Valors enviats pel formulari</h2>
            <?php
            echo "<p><span class=\"nomCamp\">Creador ocult</span>: $creador</p>";
            echo "<p><span class=\"nomCamp\">Usuari</span>: $usuari</p>";
            echo "<p><span class=\"nomCamp\">Contrasenya</span>: $contrasenya</p>";
            if (isset($_FILES['fitxer']) && !empty($_FILES['fitxer']['name'])) {
                if (move_uploaded_file($_FILES['fitxer']['tmp_name'], $_FILES['fitxer']['name'])) {
                    //canviem els permisos del fitxer
                    chmod($_FILES['fitxer']['name'], 0644);
                    echo "<p><span class=\"nomCamp\">Fitxer</span>: " . $_FILES["fitxer"]["name"] . " s'ha pujat correctament.</p>";
                    $fitxerpujat = file($_FILES["fitxer"]["name"]);
                    echo "<p>Primera línia: $fitxerpujat[0]</p>";
                }else {
                    echo "<p><span class=\"nomCamp\">Fitxer</span>: Hi ha hagut algun error movent el fitxer.";
            }
            } else {
                echo "<p><span class=\"nomCamp\">Fitxer</span>: Hi ha hagut algun error pujant el fitxer.</p>";
            }
            ?>
			<p class="enrere"><a href="index.html">Tornar enrere</a></p>
        </main>
        <footer id="peu">
            <p>
                IES Dr. Lluís Simarro<br>
                DAM<br>
                Llenguatges de marques<br>
                Curs 25/26
            </p>
        </footer>
    </div>
</body>

</html>