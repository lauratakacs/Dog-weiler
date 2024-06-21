<a href="fooldal.php">Főoldal</a> <a href="masikoldal.php">MásikOldal</a>
<?php 
    if(!isset($_SESSION['login'])) echo '<a href="belepes.php">Belépés</a> '; 
    else echo '<a href="kilepes.php">Kilépés</a>'; 
    //print_r($_SESSION);
    echo "<h2>";
    if(isset($_SESSION['login']))
        echo "Be van jelentkezve: ".$_SESSION['login']." ".$_SESSION['csn']." ".$_SESSION['un'];
    else 
        echo "Nincs bejelentkezve";
    echo "</h2>";  
?>