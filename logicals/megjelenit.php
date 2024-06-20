<?php   
    $images = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false)
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK))
                $images[$fajl] = filemtime($MAPPA.$fajl);            
        }
    closedir($olvaso);
    
    // Megjelenítés logika:
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Feltöltött képek</title>
    <style type="text/css">
    div#galeria {margin: 0 auto; width: 920px;}
    div.kep { 
        display: inline-block; 
        vertical-align: top; /* Képek felső igazítása */
        margin: 5px; /* Képek közötti térköz */
        width: 200px; /* Kép szélessége */
    }
    div.kep img { 
        max-width: 100%; /* Képek maximális szélessége */
        height: auto; /* Automatikus magasság beállítása a méretarány megtartása érdekében */
    }
</style>
</head>
<body>
    <div id="galeria">
    <h1>Honlapra feltöltött összes kép</h1>
    <?php
    arsort($images);
    foreach($images as $fajl => $datum)
    {
    ?>
        <div class="kep">
            <a href="<?php echo $MAPPA.$fajl ?>">
                <img src="<?php echo $MAPPA.$fajl ?>">
            </a>            
            <p>Név:  <?php echo $fajl; ?></p>
            <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
        </div>
    <?php
    }
    ?>
    </div>
</body>
</html>
