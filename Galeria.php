<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no">
    <meta name="author" content="Lőrincz Emma és Fazekas Róbert">
    <meta name="desciption" content="Az étterem kezdőlapja">
    <meta name="keywords" content="étterem, Budapest, Rózsatövis, rózsa">
    <title>Rózsatövis Étterem - Galéria</title>
    <link rel="icon" href="kepek/rose.png">
   <link rel="stylesheet" href="Stylesheet/stylesheet.css">
    <link rel="stylesheet" href="Stylesheet/Galeria.css">
    <style>
        @media print {
            p { font-size: 12pt; color: black}
            img { display: none; }
            h1, h2, h3, h4 { page-break-after: avoid; }
        }

        @page {
            margin: 0.1cm; }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="Kezdolap.php" class="nav-bradning">Rózsatövis Étterem</a>
        <ul class="nav-menu">
            <li class="nav-item"><a class="nav-link" href="Kezdolap.php">Kezdőlap</a></li>
            <li class="nav-item"><a class="nav-link" href="Etlap.php">Étlap</a></li>
            <li class="nav-item"><a class="nav-link" href="Itallap.php">Itallap</a></li>
            <li class="nav-item"><a class="nav-link active" href="Galeria.php">Galéria</a></li>
            <?php if (isset($_SESSION["user"])) { ?>
                <li class="nav-item"><a class="nav-link" href="Foglalas.php">Asztalfoglalás</a></li>
                <li class="nav-item"><a class="nav-link" href="Profil.php">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="Kijelentkezes.php">Kijelentkezés</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="Account.php">Bejelentkezés</a></li>
                <li class="nav-item"><a class="nav-link" href="Regisztracio.php">Regisztráció</a></li>
            <?php } ?>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <script src="Javascript/js.js"></script>
    </nav>

   
    <div class="container">


        <div class="heading">
            <h1>Étterem galéria</h1>
        </div>
        <!--Ezt a részt majd PHP-val szeretném megjeleníteni ha lehet olyat-->
        <div class="box">
            <div class="column">
                <img src="kepek/AsztalGaleria.jpg" alt="Asztal kép">
                <img src="kepek/Belter2.jpg" alt="Beltér kép 2">
                <img src="kepek/Kulter1.jpg" alt="Kültér kép 1">
            </div>
            <div class="column">
                <img src="kepek/Belter1.jpeg" alt="Beltér kép 1">
                <img src="kepek/Kulter2.jpg" alt="Kültér kép 2">
                <img src="kepek/Belter4.jpg" alt="Beltér kép 4">
            </div>
            <div class="column">
                <img src="kepek/Etel1.jpg" alt="Étel kép">
                <img src="kepek/Belter3.jpg" alt="Beltér kép 3">
                <img src="kepek/Etel2.jpg" alt="Étel kép">
            </div>
        </div>

        <div class="popup-img">
            <span>&times;</span>
            <img src="kepek/Asztal.jpg" alt="Asztal kép">
        </div>

    </div>
    <script src="Javascript/Galeria.js"> </script>

    <footer class="footer">
        <div class="container2"></div>
        <div class="row">
            <h4>Elérhetőségek:</h4>
            <ul>
                <li>
                    <p>+36 12 345 6789</p>
                </li>
                <li>
                    <p>1234 Budapest, Példa utca 24.</p>
                </li>
                <li>
                    <p>rozsatovis@info.hu</p>
                </li>
            </ul>
        </div>
    </footer>

</body>

</html>