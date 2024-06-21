<?php
session_start();

// Adatbázis kapcsolódás
$servername = "localhost";
$username = "konyvek";
$password = "123456";
$database = "konyvek";

$conn = new mysqli($servername, $username, $password, $database);


// Ellenőrizzük a kapcsolatot
if ($conn->connect_error) {
    die("Hiba a kapcsolódás során: " . $conn->connect_error);
}

// Felhasználó által megadott adatok
$nev = $_POST['nev'];
$email = $_POST['email'];
$szoveg = $_POST['szoveg'];

// SQL lekérdezés az adatok beszúrására
$sql = "INSERT INTO uzenetek (nev, email, szoveg) VALUES ('$nev', '$email', '$szoveg')";

// Lekérdezés végrehajtása és ellenőrzése
if ($conn->query($sql) === TRUE) {
    echo "Az adatok sikeresen mentve az adatbázisba.";
} else {
    echo "Hiba az adatok mentésekor: " . $conn->error;
}

// Üzenetek lekérdezése az adatbázisból időrendben
$sql = "SELECT nev, email, szoveg, datum FROM uzenetek ORDER BY datum DESC";
$result = $conn->query($sql);

// Táblázat megjelenítése csak bejelentkezett felhasználók számára
if (isset($_SESSION['login'])) {
    echo "<h2>Üzenetek</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Név</th><th>Email</th><th>Üzenet</th><th>Dátum</th></tr>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['nev'] . "</td><td>" . $row['email'] . "</td><td>" . $row['szoveg'] . "</td><td>" . $row['datum'] . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nincs üzenet</td></tr>";
    }
    echo "</table>";
} else {
    echo "Csak bejelentkezett felhasználók láthatják az üzeneteket!";
}

$conn->close();
?>
