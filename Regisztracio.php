<?php
session_start();
include "Fiokkezeles.php";
$fiokok = loadUsers("txt/users.txt");

$hibak = [];



if (isset($_POST["regisztracio"])) {
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "")
        $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["password"]) || trim($_POST["password"]) === "" || !isset($_POST["password2"]) || trim($_POST["password2"]) === "")
        $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["email"]) || trim($_POST["email"]) === "")
        $hibak[] = "Az e-mail-cím megadása kötelező!";


    $felhasznalonev = $_POST["username"];
    $jelszo = $_POST["password"];
    $jelszo2 = $_POST["password2"];
    $email = $_POST["email"];


    foreach ($fiokok as $fiok) {
        if ($fiok["username"] === $felhasznalonev)
            $hibak[] = "A felhasználónév már foglalt!";

        if ($fiok["email"] === $email)
            $hibak[] = "Ezzel az e-mail-címmel már regisztráltak!";
    }

    if (strlen($jelszo) < 8)
        $hibak[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie!";

    if ($jelszo !== $jelszo2)
        $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    if (empty($felhasznalonev || $email || $jelszo || $jelszo2))
        $hibak[] = "Hiányzó adat(ok)!";

    if (count($hibak) === 0) {
        $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
        $fiokok[] = ["username" => $felhasznalonev, "password" => $jelszo, "email" => $email];
        saveUsers("txt/users.txt", $fiokok);
        $siker = TRUE;
        header("Location: Account.php");
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
    <meta name="desciption" content="Az étterem weboldala">
    <meta name="keywords" content="étterem, Budapest, Rózsatövis, rózsa">
    <title>Rózsatövis Étterem - Profil</title>
    <link rel="icon" href="kepek/rose.png">
    <link rel="stylesheet" href="Stylesheet/stylesheet.css">
    <link rel="stylesheet" href="Stylesheet/Account.css">
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
                <li class="nav-item"><a class="nav-link" href="Account.php">Bejelentkezés</a></li>
                <li class="nav-item"><a class="nav-link active" href="Regisztracio.php">Regisztráció</a></li>
            <?php } ?>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <script src="Javascript/js.js"></script>
    </nav>
    <div>

    </div>
    <div class="container">
        <div class="wrapper active form-box register">
            <div class="form-box register">
                <h2>Regisztráció</h2>


                <form action="Regisztracio.php" method="POST">
                    <div class="input-box">
                        <span class="icon"> <img src="kepek/user_icon.svg" alt="E-mail ikon"></span>
                        <input placeholder="Felhasználónév" type="text" required name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="icon"> <img src="kepek/mail_icon.svg" alt="E-mail ikon"></span>
                        <input placeholder="E-mail" type="email" required name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="icon"> <img src="kepek/lock_icon.svg" alt="Lakat ikon"></span>
                        <input placeholder="Jelszó (legalább 8 karakter)" type="password" required name="password">
                    </div>
                    <div class="input-box">
                        <span class="icon"> <img src="kepek/lock_icon.svg" alt="Lakat ikon"></span>
                        <input placeholder="Jelszó ismét" type="password" required name="password2">
                    </div>
                    <div class="forgot">
                        <label><input type="checkbox" required> Elfogadom a felhasználási feltételeket. </label>
                    </div>
                    <button type="submit" name="regisztracio" class="btn">Regisztráció</button>
                    <div class="login-register">
                        <p> Már van fiókom <a href="Account.php" class="login-link"> Bejelentkezés </a></p>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <div class="hibauzenet">
        <?php
        if (isset($siker) && $siker === TRUE) {
            echo "<p>Sikeres regisztráció!</p>";
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
    <script src="Javascript/Account.js"></script>
</body>

</html>