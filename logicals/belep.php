<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=dogweiler', 'dogweiler', '123456',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Emuláció kikapcsolása
        
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Felhsználó keresése
        $sqlSelect = "select id, csaladi_nev, uto_nev from felhasznalok where bejelentkezes = :bejelentkezes and jelszo = sha1(:jelszo)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindParam(':bejelentkezes', $_POST['felhasznalo'], PDO::PARAM_STR);
        $sth->bindParam(':jelszo', $_POST['jelszo'], PDO::PARAM_STR);
        $sth->execute();
        
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            session_start();
            $_SESSION['csn'] = $row['csaladi_nev']; 
            $_SESSION['un'] = $row['uto_nev']; 
            $_SESSION['login'] = $_POST['felhasznalo'];
        }
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }      
}
else {
    header("Location: .");
}
?>