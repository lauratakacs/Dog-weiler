<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Itt kezeld a képfeltöltést
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    // Ellenőrizd, hogy valóban kép-e a fájl
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Csak JPG, JPEG, PNG & GIF fájlok engedélyezettek.";
        $uploadOk = 0;
    }
    // Ellenőrizd a feltöltési hibákat
    if ($uploadOk == 0) {
        echo "A fájl nem lett feltöltve.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "A(z) ". basename( $_FILES["file"]["name"]). " fájl feltöltve.";
        } else {
            echo "Hiba történt a feltöltés során.";
        }
    }
}
?>
