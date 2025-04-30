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
  <title>Rózsatövis Étterem - Itallap</title>
  <link rel="icon" href="kepek/rose.png">
  <link rel="stylesheet" href="Stylesheet/stylesheet.css">
  <link rel="stylesheet" href="Stylesheet/Etlap.css">
  <style>
    @media print {
      p { font-size: 12pt; }
      img { display: none; }
      h1, h2, h3, h4, div { page-break-after: avoid; }
    }

    @page {
      margin: 0.1cm; }
  </style>


</head>
<body>

<header>
  <nav class="navbar">
    <a href="Kezdolap.php" class="nav-bradning">Rózsatövis Étterem</a>
    <ul class="nav-menu">
        <li class="nav-item"><a class="nav-link" href="Kezdolap.php">Kezdőlap</a></li>
        <li class="nav-item"><a class="nav-link" href="Etlap.php">Étlap</a></li>
        <li class="nav-item"><a class="nav-link active" href="Itallap.php">Itallap</a></li>
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

<div class="main">
  <div id="etlap" class="animacio">
    <h2>Itallap</h2>
    <p style="font-size: 20px">Kóstold meg házi limonádénkat!</p>
  </div>
  <div class="menu">
    <div class="menu-column">
      <h4 style="font-size: 20px; font-weight: bold">Italok</h4>
      <div class="single-menu">
        <img id="ital1" src="kepek/ital-asvanyviz.jpg" alt="asvanyviz">
        <div class="menu-content">
          <h5>Ásványvíz 0,33 l<span class="ar">490 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="ital2" src="kepek/ital-cocacola.jpg" alt="cocacola">
        <div class="menu-content">
          <h5>Coca Cola 0,25 l <span class="ar">650 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="ital3" src="kepek/ital-gyumolcsle.jpg" alt="gyumolcsle">
        <div class="menu-content">
          <h5>Gyümölcslé 0,25 l<span class="ar">650 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="ital4" src="kepek/ital-forrocsoki.jpg" alt="forrocsoki">
        <div class="menu-content">
          <h5>Forrócsoki<span class="ar">700 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="ital5" src="kepek/ital-kave.jpg" alt="kave">
        <div class="menu-content">
          <h5>Kávé<span class="ar">500 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="ital6" src="kepek/ital-tea.jpg" alt="tea">
        <div class="menu-content">
          <h5>Tea<span class="ar">550 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="ital7" src="kepek/ital-limonade.jpg" alt="limonade">
        <div class="menu-content">
          <h5>Házi limonádé 0,5 l<span class="ar">1000 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="ital8" src="kepek/ital-bor.jpg" alt="bor">
        <div class="menu-content">
          <h5>Vörösbor<span class="ar">800 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="ital9" src="kepek/ital-sor.jpg" alt="bor">
        <div class="menu-content">
          <h5>Csapolt sör<span class="ar">700 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="ital10" src="kepek/ital-koktel.jpg" alt="koktel">
        <div class="menu-content">
          <h5>Koktél<span class="ar">1000 Ft</span></h5>
        </div>
      </div>

      </div>
  </div>
</div>

<footer class="footer">
  <div class="container2"></div>
  <div class="row">
    <h4>Elérhetőségek:</h4>
    <ul>
      <li><p>+36 12 345 6789</p></li>
      <li><p>1234 Budapest, Példa utca 24.</p></li>
      <li><p>rozsatovis@info.hu</p></li>
    </ul>
  </div>
</footer>
</body>
</html>