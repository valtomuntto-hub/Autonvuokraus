<?php
$palvelin = "localhost";
$kayttaja = "root";
$salasana = "";
$tietokanta = "autonvuokraus";

$yhteys = mysqli_connect($palvelin, $kayttaja, $salasana, $tietokanta);

if (!$yhteys) {
    die("Yhteys tietokantaan epäonnistui: " . mysqli_connect_error());
}

mysqli_set_charset($yhteys, "utf8mb4");
date_default_timezone_set('Europe/Helsinki');
?>
