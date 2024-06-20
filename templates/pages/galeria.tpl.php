<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <title>Rottweiler fajtamentés honlapja - Galéria</title>
  </head>
  <body>

<div class="container my-4">
    <h2 class="mb-4 text-danger">Gazdára váró Rottweiler-ek</h2>
    <div class="row">
        <div class="col-md-4">
            <figure>
                <img src="images/lilith.jpg" class="img-fluid gallery-image" alt="Lilith">
                <figcaption class="text-center">
                <p><strong>Lilith</strong><br>
                4 hónapos szuka<br>
                Barátságos, játékos kutya, szereti az embereket.<br>
                A macskákkal nem jön ki jól.</p>
            </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure>
                <img src="images/ashley.jpg" class="img-fluid gallery-image" alt="Ashley">
                <figcaption class="text-center">
                <p><strong>Ashley</strong><br>
                1 éves szuka<br>
                Barátságos, játékos kutya, de gyerekek mellé nem ajánlott.<br>
                Szeret futni, sportolni.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure>
                <img src="images/astor.jpg" class="img-fluid gallery-image" alt="Astor">
                <figcaption class="text-center">
                <p><strong>Astor</strong><br>
                1 éves kan<br>
                Erős házörző ösztönei vannak, csak kertes lakásba ajánlott.<br>
                Más kutyákat nem fogad el.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure>
                <img src="images/bosco.jpg" class="img-fluid gallery-image" alt="Bosco">
                <figcaption class="text-center">
                <p><strong>Bosco</strong><br>
                5 éves kan<br>
                Barátságos, emberekkel jól kijön.<br>
                Alap engedelmes parancsokat tudja.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure>
                <img src="images/brown.jpg" class="img-fluid gallery-image" alt="Brown">
                <figcaption class="text-center">
                <p><strong>Brown</strong><br>
                7 éves kan<br>
                Barátságos, de félelme miatt sokszor agresszívan reagál.<br>
                Tapasztalt, tudatos gazdának ajánlott.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure>
                <img src="images/frank.jpg" class="img-fluid gallery-image" alt="Frank">
                <figcaption class="text-center">
                <p><strong>Frank</strong><br>
                2 éves kan<br>
                Kiváló aktív sportot űző embereknek.<br>
                Szeret dolgozni, apportírozásban kiemelkedő.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure>
                <img src="images/gaia.jpg" class="img-fluid gallery-image" alt="Gaia">
                <figcaption class="text-center">
                <p><strong>Gaia</strong><br>
                4 éves szuka<br>
                Magas képzettségű kutya, őrző-védő ágazatban kiemelkedő.<br>
                Csak tapasztalt, aktív gazdáknak adjuk örökbe.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure>
                <img src="images/layla.jpg" class="img-fluid gallery-image" alt="Layla">
                <figcaption class="text-center">
                <p><strong>Layla</strong><br>
                2 hónapos szuka<br>
                Félszobatiszta, akaratok kölyök.<br>
                Formálható még, de az embereket, állatokat kedveli.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure>
                <img src="images/stylo.jpg" class="img-fluid gallery-image" alt="Stylo">
                <figcaption class="text-center">
                <p><strong>Stylo</strong><br>
                5 hónapos kan<br>
                Barátságos, de rossz kutya.<br>
                Szeret rágni, ásni, könnyen tanítható.</p>
                </figcaption>
            </figure>
        </div>
    </div>
</div>


<?php include('logicals/engedely.php'); ?>

<br>

<div class="col-md-6 kepek">
    <div id=kepek>
    <?php include('logicals/megjelenit.php'); ?> <br>
    </div>
  </div>



 <style type="text/css">
        label { display: block; }
    </style>
    <h1>Képfeltöltés a galériába:</h1>
<?php
    if (!empty($uzenet))
    {
        echo '<ul>';
        foreach($uzenet as $u)
            echo "<li>$u</li>";
        echo '</ul>';
    }
?>
   <div id=feltolt> <form action="logicals/kepfeltolt.php" method="post"
                enctype="multipart/form-data">
        <label>
            <input type="file" name="elso" required>
        </label>       
        <input type="submit" name="kuld">
      </form>
      </div>    
    
</body>
</html>