<?php
//obtenim els camps del formulari enviats per post
//camp ocult
$creador = "";
if (isset($_POST["creador"]) && (strcmp(trim($_POST["creador"]), "") != 0)) {
    $creador = htmlspecialchars(trim($_POST["creador"]));
} else {
    $creador = "Sense Valor";
}
$nom = "";
if (isset($_POST["nom"]) && (strcmp(trim($_POST["nom"]), "") != 0)) {
    $nom = htmlspecialchars(trim($_POST["nom"]));
} else {
    $nom = "Sense Valor";
}

$cognoms = "";
if (isset($_POST["cognoms"]) && (strcmp(trim($_POST["cognoms"]), "") != 0)) {
    $cognoms = htmlspecialchars(trim($_POST["cognoms"]));
} else {
    $cognoms = "Sense Valor";
}

$contrasenya = "";
if (isset($_POST["contrasenya"]) && (strcmp(trim($_POST["contrasenya"]), "") != 0)) {
    $contrasenya = htmlspecialchars(trim($_POST["contrasenya"]));
} else {
    $contrasenya = "Sense Valor";
}

$poblacio = "";
if (isset($_POST["poblacio"]) && (strcmp(trim($_POST["poblacio"]), "") != 0)) {
    $poblacio = htmlspecialchars(trim($_POST["poblacio"]));
} else {
    $poblacio = "Sense Valor";
}

$email = "";
if (isset($_POST["email"]) && (strcmp(trim($_POST["email"]), "") != 0)) {
    $email = htmlspecialchars(trim($_POST["email"]));
} else {
    $email = "Sense Valor";
}

$telefon = "";
if (isset($_POST["telefon"]) && (strcmp(trim($_POST["telefon"]), "") != 0)) {
    $telefon = htmlspecialchars(trim($_POST["telefon"]));
} else {
    $telefon = "Sense Valor";
}

$estudis = "";
//en realitat s'obte un array, perquè els 4 valors poden marcar-se
//si no treballem amb arrays, s'obté l'últim valor marcat
if (isset($_POST["estudis"])) {
    $estudis = $_POST["estudis"];
} else {
    $estudis = "Sense Valor";
}

$horari = "";
if (isset($_POST["horari"])) {
    $horari = $_POST["horari"];
} else {
    $horari = "Sense Valor";
}

$familia = "";
if (isset($_POST["familia"])) {
    $familia = $_POST["familia"];
} else {
    $familia = "Sense Valor";
}

$comentaris = "";
if (isset($_POST["comentaris"]) && (strcmp(trim($_POST["comentaris"]), "") != 0)) {
    $comentaris = htmlspecialchars(trim($_POST["comentaris"]));
} else {
    $comentaris = "Sense Valor";
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
            echo "<p><span class=\"nomCamp\">Nom</span>: $nom</p>";
            echo "<p><span class=\"nomCamp\">Cognoms</span>: $cognoms</p>";
            echo "<p><span class=\"nomCamp\">Contrasenya</span>: $contrasenya</p>";
            echo "<p><span class=\"nomCamp\">Població</span>: $poblacio</p>";
            echo "<p><span class=\"nomCamp\">E-mail</span>: $email</p>";
            echo "<p><span class=\"nomCamp\">Telèfon</span>: $telefon</p>";
            echo "<p><span class=\"nomCamp\">Estudis</span>: <br>";
            //comprovem si és un array o bé està buit.
            if(!is_array($estudis)){
                echo " $estudis <br>";
            } else{
                foreach($estudis as $e){
                    echo " $e <br>";
                }      
            }                
            echo "</p>";
            echo "<p><span class=\"nomCamp\">Horari</span>: $horari</p>";
            echo "<p><span class=\"nomCamp\">Família</span>: $familia</p>";
            //obtenim fitxer que ha carregat l'usuari
            //si no indiquem una ruta, es guarda a la carpeta on es troba el fitxer pujar.php
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

            echo "<p><span class=\"nomCamp\">Comentaris</span>: $comentaris</p>";
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