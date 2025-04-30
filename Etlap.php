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
  <title>Rózsatövis Étterem - Étlap</title>
  <link rel="icon" href="kepek/rose.png">
  <link rel="stylesheet" href="Stylesheet/stylesheet.css">
  <link rel="stylesheet" href="Stylesheet/Etlap.css">
  <style>
    @media print {
      p { font-size: 12pt; }
      img, footer { display: none; }
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
        <li class="nav-item"><a class="nav-link active" href="Etlap.php">Étlap</a></li>
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


<div class="main">
  <div id="etlap" class="animacio">
    <h2>Étlap</h2>
    <p style="font-size: 20px">Finomabbnál finomabb ételek</p>
  </div>

    <div>
        <h1>A séf ajánlata:</h1>
         <form action="Etlap.php" method="GET" >
             <p>
                 <input type="submit" name="ajanlat" value="Mutasd">
             </p>
         </form>
        <?php
        if(isset($_GET['ajanlat'])) {
            echo "<h3>Leves: Gombakrémleves <br> Főétel: Székelykáposzta <br> Desszert: Tiramisu</h3>";

        }
        ?>
    </div>


  <div class="menu">
    <div class="menu-column">
      <h4 style="font-size: 20px; font-weight: bold">Levesek</h4>
            <div class="single-menu">
                <img id="gombakremleves" src="kepek/gombakremleves.jpg" alt="Gombakremleves">
                <div class="menu-content">
                    <h5>Gombakrémleves<span class="ar">1100 Ft</span></h5>
                </div>
            </div>



      <div class="single-menu">
        <img id="husgombocleves" src="kepek/husgombocleves.jpg" alt="Húsgombócleves">
        <div class="menu-content">
          <h5>Húsgombócleves<span class="ar">1000 Ft</span></h5>
        </div>
      </div>


      <div class="single-menu">
        <img id="husleves" src="kepek/husleves.jpg" alt="Húsleves">
        <div class="menu-content">
          <h5>Húsleves<span class="ar">1000 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="orjaleves" src="kepek/orjaleves.jpg" alt="Orjaleves">
        <div class="menu-content">
          <h5>Orjaleves<span class="ar">1100 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="sutotokkremleves" src="kepek/sutotokkremleves.jpg" alt="Sutotokkremleves">
        <div class="menu-content">
          <h5>Sütőtök krémleves<span class="ar">1000 Ft</span></h5>
        </div>
      </div>

      <div class="single-menu">
        <img id="tarkonyos" src="kepek/tyukhusleves.jpg" alt="tyukhusleves">
        <div class="menu-content">
          <h5>Tyúkhúsleves<span class="ar">1100 Ft</span></h5>
        </div>
      </div>
<br>
      <div class="menu">
        <div class="menu-column">
          <h4 style="font-size: 20px; font-weight: bold">Főételek</h4>
          <div class="single-menu">
            <img id="foetel1" src="kepek/foetel-szekelykaposzta.jpg" alt="Székelykáposzta">
            <div class="menu-content">
              <h5>Székelykáposzta<span class="ar">1890 Ft</span></h5>
            </div>
          </div>

          <div class="single-menu">
            <img id="foetel2" src="kepek/foetel-paradicsomoskrumplikolbasszal.jpg" alt="paradicsomoskrumpli">
            <div class="menu-content">
              <h5>Paradicsomos krumpli kolbásszal<span class="ar">2100 Ft</span></h5>
            </div>
          </div>

          <div class="single-menu">
            <img id="foetel3" src="kepek/foetel-szecsuanicsirke.jpg" alt="szecsuani">
            <div class="menu-content">
              <h5>Szecsuáni csirke<span class="ar">2000 Ft</span></h5>
            </div>
          </div>

          <div class="single-menu">
            <img id="foetel4" src="kepek/foetel-tejszinesgombasteszta.jpg" alt="tejszinesgombaszeszta">
            <div class="menu-content">
              <h5>Tejszínes-gombás tészta<span class="ar">1950 Ft</span></h5>
            </div>
          </div>

          <div class="single-menu">
            <img id="foetel5" src="kepek/foetel-rantottkarajfuszeresedesburgonyaval.jpg" alt="rantottkaraj">
            <div class="menu-content">
              <h5>Rántott karaj fűszeres édesburgonyával<span class="ar">2000 Ft</span></h5>
            </div>
          </div>

          <div class="single-menu">
            <img id="foetel6" src="kepek/foetel-mozzarellavaltoltottrantottcukkiniparnak.jpg" alt="rantottcukkini">
            <div class="menu-content">
              <h5>Mozzarellával töltött rántott cukkini párnák<span class="ar">2000 Ft</span></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="menu">
      <div class="menu-column">
        <h4 style="font-size: 20px; font-weight: bold">Desszertek</h4>
        <div class="single-menu">
          <img id="desszert1" src="kepek/desszert-brownie.jpg" alt="brownie">
          <div class="menu-content">
            <h5>Brownie<span class="ar">790 Ft</span></h5>
          </div>
        </div>

        <div class="single-menu">
          <img id="desszert2" src="kepek/desszert-fagyi.jpg" alt="fagyi">
          <div class="menu-content">
            <h5>Fagylalt<span class="ar">500 Ft</span></h5>
          </div>
        </div>

        <div class="single-menu">
          <img id="desszert3" src="kepek/desszert-macaron.jpg" alt="macaron">
          <div class="menu-content">
            <h5>Macaron (3 db)<span class="ar">600 Ft</span></h5>
          </div>
        </div>

        <div class="single-menu">
          <img id="desszert4" src="kepek/desszert-muffin.jpg" alt="muffin">
          <div class="menu-content">
            <h5>Muffin<span class="ar">400 Ft</span></h5>
          </div>
        </div>

        <div class="single-menu">
          <img id="desszert5" src="kepek/desszert-pite.jpg" alt="pite">
          <div class="menu-content">
            <h5>Pite<span class="ar">500 Ft</span></h5>
          </div>
        </div>

        <div class="single-menu">
          <img id="desszert6" src="kepek/desszert-tiramisu.jpg" alt="tiramisu">
          <div class="menu-content">
            <h5>Tiramisu<span class="ar">700 Ft</span></h5>
          </div>
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
