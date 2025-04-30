<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: Account.php");
}

$hibak = [];



if (isset($_POST["butt"])) {

    $emil = $_POST["email"];

    if ($_SESSION["user"]["email"] !== $emil) {
        $hibak[] = "Ez az e-mail-cím nem egyezik a fiókéval!";
    } else {
        $f = fopen("txt/foglalas.txt", "a");
        fwrite($f, "Felhasználó: " . $_SESSION["user"]["username"] . "\n\t Név: " . $_POST["nev"] . "\n\t Személyek: " . $_POST["szemszam"] . "\n\t Idopont: " . $_POST["idopont"] . "\n\t Telefonszam: " . $_POST["telszam"] . "\n\t Email: " . $_POST["email"] . "\n\t Megjegyzes: " . $_POST["megjegyzes"] . "\n\n");
        fclose($f);
    }

    if (count($hibak) === 0) {
        $siker = TRUE;
    } else {
        $siker = FALSE;
    }
}

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
    <link rel="stylesheet" href="Stylesheet/Foglalas.css">
    <style>
        @media print {
            p {
                font-size: 12pt;
                color: black
            }

            img,
            footer,
            video {
                display: none;
            }

            h1,
            h2,
            h3,
            h4,
            div {
                page-break-after: avoid;
            }
        }

        @page {
            margin: 0.1cm;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="Kezdolap.php" class="nav-bradning">Rózsatövis Étterem</a>
        <ul class="nav-menu">
            <li class="nav-item"><a class="nav-link" href="Kezdolap.php">Kezdőlap</a></li>
            <li class="nav-item"><a class="nav-link" href="Etlap.php">Étlap</a></li>
            <li class="nav-item"><a class="nav-link" href="Itallap.php">Itallap</a></li>
            <li class="nav-item"><a class="nav-link" href="Galeria.php">Galéria</a></li>
            <li class="nav-item"><a class="nav-link active" href="Foglalas.php">Asztalfoglalás</a></li>
            <?php if (isset($_SESSION["user"])) { ?>
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

    <section id="fejleckep">

        <div class="fejleckep">
            <img id="fejlec" src="kepek/fejlec.jpg" alt="A fejléc képe">
        </div>
        <div class="fejleckep-szoveg">
            <h1>Asztalfoglalás</h1>
        </div>
    </section>
    <div class="container">

        <div class="box">
            <div class="column">
                <div class="form-box">


                    <form action="Foglalas.php" method="POST">

                        <div class="form-input">
                            <label for="nev"> Név: </label><br>
                            <input type="text" name="nev" id="nev" required>
                        </div>

                        <div class="form-input">
                            <label for="szemszam"> Személyek száma: </label><br>
                            <input type="number" name="szemszam" id="szemszam" min=1 required>
                        </div>

                        <div class="form-input">
                            <label for="idopont"> Válasszon időpontot: </label><br>
                            <input type="datetime-local" name="idopont" id="idopont" required>
                        </div>


                        <div class="form-input">
                            <label for="telszam"> Telefonszám: </label><br>
                            <input type="text" name="telszam" id="telszam" required>
                        </div>

                        <div class="form-input">
                            <label for="email">E-mail:</label><br>
                            <input type="email" name="email" id="email" required>
                        </div>

                        <div class="form-input">
                            <label for="megjegyzes">Megjegyzés:</label><br>
                            <textarea name="megjegyzes" id="megjegyzes"></textarea>
                        </div>
                        <div class="btn">
                            <button type="submit" name="butt">Asztalfoglalás</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column vidi">
                <video controls>
                    <source src="Multimedias%20elem/video.mp4" type="video/mp4">
                    Ebben a böngészőben nem lehet megjeleníteni a videót.
                </video>
            </div>
        </div>
    </div>

    <div class="hibauzenet">
        <?php
        if (isset($siker) && $siker === TRUE) {
            echo "<p>Sikeres asztalfoglalás!</p>";
        } else {
            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
            }
        }
        ?>
    </div>

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