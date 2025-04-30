<?php
session_start();
include "Fiokkezeles.php";
$users = loadUsers("txt/users.txt");
$message = "";

if(isset($_POST["login"])){
    if (!isset($_POST["email"]) || trim($_POST["email"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "") {
        $message = "Az adatok megadása kötelező!";
    } else {
        $email = $_POST["email"];
        $jelszo = $_POST["password"];
        $message = "A belépési adatok nem megfelelőek!";

        foreach ($users as $user) {
            if ($user["email"] === $email && password_verify($jelszo, $user["password"])) {
                $message = "Sikeres belépés!";
                if(!isset($_COOKIE["latogato"])){
                    setcookie("latogato", 1);
                }else{
                    setcookie("latogato",$_COOKIE["latogato"]+1);
                }
                $_SESSION["user"] = $user;
                header("Location: Profil.php");

            }
        }
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

    <div class="container">
        <div class="wrapper">
            <div class="form-box login">
                <h2>Bejelentkezés</h2>
                <form action="Account.php" method="POST">
                    <div class="input-box">
                        <span class="icon"> <img src="kepek/mail_icon.svg" alt="E-mail ikon"></span>
                        <input type="email" required name="email">
                        <label>E-mail</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"> <img src="kepek/lock_icon.svg" alt="Lakat ikon"></span>
                        <input type="password" required name="password">
                        <label>Jelszó</label>
                    </div>
                    <div class="forgot">
                        <label> <input type="checkbox"> Emlékezz rám </label>
                        <a href="#">Elfelejtettem a jelszavam</a>
                    </div>
                    <button type="submit" class="btn" name="login">Bejelentkezés</button>
                    <div class="login-register">
                        <p> Még nem regisztrált? <a href="Regisztracio.php" class="register-link"> Regisztráció </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="hibauzenet">
        <?php
        echo $message . "<br/>";

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