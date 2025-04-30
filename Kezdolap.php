<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="author" content="Lőrincz Emma és Fazekas Róbert">
    <meta name="desciption" content="Az étterem weboldala">
    <meta name="keywords" content="étterem, Budapest, Rózsatövis, rózsa">
    <title>Rózsatövis Étterem - Kezdőlap</title>
    <link rel="icon" href="kepek/rose.png">
    <link rel="stylesheet" href="Stylesheet/stylesheet.css">
    <link rel="stylesheet" href="Stylesheet/kezdolap.css">
    <style>
        @media print {

            .kezdolap-szoveg {
                text-shadow: none;
            }

            body {
                background: none;
                text-shadow: none;
                color: black;
                border: none;

            }

            p,
            h1,
            h2,
            h4 {
                font-size: 12pt;
                color: black
            }

            video,
            audio,
            iframe,
            nav,
            img,
            button,
            footer,
            a,
            .kezdolap-doboz,
            .footer {
                display: none;
            }

            h1,
            h2,
            h3,
            h4,
            section,
            div,
            table {
                page-break-after: avoid;
            }

        }

        @page {
            margin: 0.1cm;
        }
    </style>

</head>

<body>

    <header>
        <nav class="navbar">
            <a href="Kezdolap.php" class="nav-bradning">Rózsatövis Étterem</a>
            <ul class="nav-menu">
                <li class="nav-item"><a class="nav-link active" href="Kezdolap.php">Kezdőlap</a></li>
                <li class="nav-item"><a class="nav-link" href="Etlap.php">Étlap</a></li>
                <li class="nav-item"><a class="nav-link" href="Itallap.php">Itallap</a></li>
                <li class="nav-item"><a class="nav-link" href="Galeria.php">Galéria</a></li>
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
    </header>
    <section id="fejleckep">
        <div class="container">
            <div class="fejleckep">
                <img id="fejlec" src="kepek/fejlec.jpg" alt="A fejléc képe">
            </div>
            <div class="fejleckep-szoveg, slideInLeft">
                <h1 style="padding-top: 50px; text-align: center; text-shadow: 5px 5px 5px darkgray">Üdvözöljük honlapunkon!</h1>
            </div>
        </div>
    </section>

    <section class="kezdolap" id="kezdolap">
        <div class="kezdolap-doboz">
            <h2>Az étteremről</h2>
            <p class="kezdolap-szoveg">
                Budapest egyik legvonzóbb és legkedveltebb gasztronómiai helyszínén található éttermünk, amely a tradicionális magyar és nemzetközi ételek kiváló keverékét kínálja vendégeinek.
                <br>A Rózsatövis Étterem hangulatos környezetben várja azokat, akik szeretnének egy kellemes és ízletes ebédet vagy vacsorát eltölteni barátaikkal, családjukkal vagy üzleti partnereikkel.
                <br>Az étterem kínálatában szerepelnek olyan különleges ételek is, amelyek egyedülálló ízvilágukkal és kiváló minőségükkel biztosan lenyűgözik majd az ínyenceket.
            </p>
        </div>

        <div class="kezdolap-kep">
            <img id="kezdolap-kepe" src="kepek/kezdolap1.jpg" alt="Kép a kezdőlapon">
        </div>
    </section>

    <section id="etelekitalok" class="etelekitalok">
        <div class="etelekitalok-kep">
            <img id="etelekitalokkep" src="kepek/kezdolap2.jpg" alt="Ételek és italok">
        </div>
        <div class="kezdolap-etelekitalok">
            <h2>Ételek és italok</h2>
            <p class="kezdolap-szoveg">A Rózsatövis Étterem változatos étlappal, szezonális ajánlatokkal várja minden kedves vendégét.
                <br>A’ La Carte étlapunkról rengeteg finom fogás közül válogathatnak vendégeink, de az itallapot sem érdemes figyelmen kívül hagyni.
            </p>
            <a href="Etlap.php" class="gomb">Étlap</a>
            <a class="gomb" href="Itallap.php">Itallap</a>
        </div>
    </section>

    <section id="kiszallitas" class="etelekitalok">
        <div class="kezdolap-doboz">
            <h2>Házhozszállítás</h2>
            <p class="kezdolap-szoveg">Szeretnél az éttermünkben enni, de nincs kedved kimozdulni? Semmi gond! Csak hívd a <strong style="text-decoration: underline #ffffff solid 2px">+36 12 345 6789</strong>-es telefonszámot vagy rendelj itt, weboldalunkon és mi házhoz visszük a rendelésedet!
                <br>A jobb oldalon látható táblázatból pedig ki tudod számolni, hogy ez mennyibe is kerül.
            </p>
        </div>
        <div class="arazas">
            <table id="kiszallitass">
                <thead>
                    <tr>
                        <th>Kiszállítás távolsága</th>
                        <th>Ár</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>5 km</td>
                        <td>500 Ft</td>
                    </tr>
                    <tr>
                        <td>10 km</td>
                        <td>1000 Ft</td>
                    </tr>
                    <tr>
                        <td>15 km</td>
                        <td>1500 Ft</td>
                    </tr>
                    <tr>
                        <td>20 km</td>
                        <td>2000 Ft</td>
                    </tr>
                    <tr>
                        <td>25 km</td>
                        <td>2500 Ft</td>
                    </tr>
                    <tr>
                        <td>30 km</td>
                        <td>3500 Ft</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </section>
    <section id="asztalok" class="asztalok">
        <div id="asztalok-szoveg" class="asztalok-szoveg">
            <h2>Asztalok</h2>
            <p class="kezdolap-szoveg">Éttermünkben akár 100 fő is kényelmesen elfér, így alkalmas lehet születésnapok ünneplésére is. Foglald le most asztalainkat! Az online asztalfoglalás csak regisztrált és bejelentkezett vendégeinken érhető el!</p>
            <a class="gomb" href="Foglalas.php">Asztalfoglalás</a>
        </div>
        <div class="asztalkep">
            <img id="asztal" src="kepek/asztalkezdolap.jpg" alt="Kép az asztalról.">
        </div>
    </section>
    <section id="multimedia" class="multimedia">
        <div class="video">
            <h2 style="color: black; text-shadow: 5px 5px 5px darkgray; padding: 20px 15px;">Nézd meg a bemutatkozó videónkat is!</h2>
            <iframe class="video" style="padding-bottom: 100px" src="https://www.youtube.com/embed/6_2565hnCmI" title="Tabletop Director, Tabletop Reel, Food Demo, Tabletop Commercials" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <article>
            <div class="zene">
                <h2 style="padding-bottom: 15px;">Gyönyörű háttérzenékkel is várjuk a kedves vendégeket!</h2>
                <div style="position: static">
                    <audio controls>
                        <source src="Multimedias%20elem/hatterzene.mp3" type="audio/mpeg">
                        Háttérzene az étteremben.
                    </audio>
                </div>
            </div>
        </article>
    </section>

    <div class="velemeny">
        <h3 class="velemeny">Vendégeink véleménye</h3>
            <hr>
            <br>
            <?php
            $file = fopen("txt/velemeny.txt", "a");
            $filer = fopen("txt/velemeny.txt", "r");
           
            if (isset($_POST["butt"])) {

                $velemenyek[] = ["username" => $_SESSION["user"]["username"], "email" => $_SESSION["user"]["email"], "comment" => $_POST["megjegyzes"]];

                foreach ($velemenyek as $velemeny) {
                    $serialized_velemeny = serialize($velemeny);
                    fwrite($file, $serialized_velemeny . "\n");
                }
                fclose($file);
            }

            if ($file === FALSE) {
                die("A vélemények fájl megnyitása nem sikerült!");
            }

            $comments = [];

            while (($line = fgets($filer)) !== FALSE) {
                $comment = unserialize($line);
                $comments[] = $comment;

                echo "
                <p class='fejlec'><b>" . $comment["username"] . "</b> felhasználó írta: </p>
                <p class='comment'> " . $comment["comment"] . "</p>";
            }

            fclose($filer);

            if (isset($_SESSION["user"])) {

                echo " <hr>
                <form action='kezdolap.php' method='POST'>
                    <label for='megjegyzes'>Írjon Ön is véleményt:</label><br>
                    <textarea name='megjegyzes' id='megjegyzes'></textarea><br>
                    <button onclick='location.reload()' class='gomb' type='submit' name='butt'>Küldés</button>
                </form>";
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