<?php
session_start();
include "Fiokkezeles.php";

if (!isset($_SESSION["user"])) {
    header("Location: Account.php");
}

$hibak = [];


if (isset($_POST["butt"])) {

    if (strlen($_POST["newpassword"]) < 8) {
        $hibak[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie!";
    }

    if ($_POST["newpassword"] !== $_POST["newpassword2"]) {
        $hibak[] = "Nem egyeznek az új jelszavak egymással!";
    }

    if (!password_verify($_POST["oldpassword"], $_SESSION["user"]["password"])) {
        $hibak[] = "A régi jelszó nem helyes!";
    }

    if (count($hibak) === 0) {
        $siker = TRUE;

        $users = loadUsers("txt/users.txt");
        $users2 = [];
        foreach ($users as $user) {
            if ($user["email"] === $_SESSION["user"]["email"]) {
                $uj_jelszo = password_hash($_POST["newpassword"], PASSWORD_DEFAULT);
                $user["password"] = $uj_jelszo;
            }
            $users2[] = $user;
        }
        saveUsers("txt/users.txt", $users2);
    } else {
        $siker = FALSE;
    }
}

if (isset($_POST["userbutt"])) {
    $users = loadUsers("txt/users.txt");
    $users2 = [];
    foreach ($users as $user) {
        if ($user["email"] === $_SESSION["user"]["email"]) {
            $user["username"] = $_POST["newuser"];
        }
        $users2[] = $user;
    }
    saveUsers("txt/users.txt", $users2);
    $siker = TRUE;
    header("Refresh:0");
}

if (isset($_POST["delbutt"])) {
    $users = loadUsers("txt/users.txt");
    $lines = file("txt/users.txt");
    foreach ($users as $index => $user) {
        if ($user["email"] === $_SESSION["user"]["email"]) {
            unset($lines[$index]);
            file_put_contents("txt/users.txt", implode("", $lines));
        }
    }
    session_unset();
    session_destroy();
    header("Location: Account.php");
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
    <title>Rózsatövis Étterem - Profil</title>
    <link rel="icon" href="kepek/rose.png">
    <link rel="stylesheet" href="Stylesheet/stylesheet.css">
    <style>
        @media print {
            p {
                font-size: 12pt;
                color: black
            }

            img {
                display: none;
            }

            h1,
            h2,
            h3,
            h4 {
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
            <?php if (isset($_SESSION["user"])) { ?>
                <li class="nav-item"><a class="nav-link" href="Foglalas.php">Asztalfoglalás</a></li>
                <li class="nav-item"><a class="nav-link active" href="Profil.php">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="Kijelentkezes.php">Kijelentkezés</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link active" href="Account.php">Bejelentkezés</a></li>
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
    <section class="profil">
        <h1>Profil adatok</h1>
        <?php

        $profilkep = "kepek/user.svg";
        $utvonal = "kepek/" . $_SESSION["user"]["username"];

        $kiterjesztesek = ["png", "jpg", "jpeg"];

        foreach ($kiterjesztesek as $kiterjesztes) {
            if (file_exists($utvonal . "." . $kiterjesztes)) {
                $profilkep = $utvonal . "." . $kiterjesztes;
            }
        }
        ?>

        <div>

            <img src="<?php echo $profilkep; ?>" alt="Profilkép" height="200"/>
            <?php if ($_SESSION["user"]["username"] !== "default") { /* a "default" nevű példa felhasználó esetén ne engedélyezzük a profilkép módosítását */ ?>
                <form action="Profil.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="profile-pic" accept="image/*"/>
                    <input type="submit" name="upload-btn" value="Profilkép módosítása"/>
                </form>
            <?php } ?>

            <?php
            echo "<ul>";
            echo "<li>Felhasználónév: " . $_SESSION["user"]["username"] . "</li>";
            echo "<li>E-mail-cím: " . $_SESSION["user"]["email"] . "</li>";
            echo "</ul> ";
            ?>
        </div>

        <?php

        if (isset($_POST["upload-btn"]) && is_uploaded_file($_FILES["profile-pic"]["tmp_name"])) {
            $fajlfeltoltes_hiba = "";
            uploadProfilePicture($_SESSION["user"]["username"]);

            $kit = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));
            $utvonal = "images/" . $_SESSION["user"]["username"] . "." . $kit;

            if ($fajlfeltoltes_hiba === "") {
                if ($utvonal !== $profilkep && $profilkep !== "kepek/user.svg") {
                    unlink($profilkep);
                }

                header("Location: Profil.php");
            } else {
                echo "<p>" . $fajlfeltoltes_hiba . "</p>";
            }
        }
        ?>

        <form action="Profil.php" method="POST">
            <br>
            <hr>
            <br>
            <h3>Jelszó megváltoztatása</h3>
            <div class="input-box">
                <input placeholder="Új jelszó (legalább 8 karakter)" type="password" required name="newpassword">
            </div>
            <div class="input-box">
                <input placeholder="Új jelszó ismét" type="password" required name="newpassword2">
            </div>

            <div class="input-box">
                <input placeholder="Régi jelszó " type="password" required name="oldpassword">
            </div>

            <button type="submit" name="butt">Jelszó változtatás</button>


        </form>

        <form action="Profil.php" method="POST">
            <br>
            <hr>
            <h3>Felhasználónév megváltoztatása</h3>

            <div class="input-box">
                <input placeholder="Új felhasznánév" type="text" required name="newuser">
            </div>

            <button onclick="location.reload()" type="submit" name="userbutt">Felhasználónév változtatás</button>
        </form>

        <form action="Profil.php" method="POST">
            <br>
            <hr>
            <br>
            <h3>Fiók törlése</h3>
            <input type="checkbox" required> Igen, mindenképp szeretném törölni a fiókom. <br>
            <button type="submit" name="delbutt">Fiók törlése</button>

        </form>
    </section>

    <div class="hibauzenet">
        <?php
        if (isset($siker) && $siker === TRUE) {
            echo "<p>Sikeres művelet!</p>";
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