<?php
require_once('db.php');
$virhe = '';  $viesti = '';
$etunimi = '';  $sukunimi = '';
$saika = '';  $puhelin = '';  $henkilotunnus = '';
$sahkoposti = '';  $ajokortti = '';  $osoite = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $etunimi = trim($_POST['etunimi']);
    $sukunimi = trim($_POST['sukunimi']);
    $saika = trim($_POST['saika']);
    $puhelin = trim($_POST['puhelin']);
    $henkilotunnus = trim($_POST['henkilotunnus']);
    $sahkoposti = trim($_POST['sahkoposti']);
    $ajokortti = trim($_POST['ajokortti']);
    $osoite = trim($_POST['osoite']);

    if ($etunimi == '' || $sukunimi == '' || $saika == '' || $puhelin == '' ||
        $henkilotunnus == '' || $sahkoposti == '' || $ajokortti == '' || $osoite == '') {
        $virhe = "Täytä kaikki kentät.";
    }

    if ($virhe == '') {
        $sql = "INSERT INTO asiakkaat (etunimi, sukunimi, saika, puhelin, henkilotunnus, sahkoposti, ajokortti, osoite)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($yhteys, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssss", $etunimi, $sukunimi, $saika, $puhelin, $henkilotunnus, $sahkoposti, $ajokortti, $osoite);
        if (mysqli_stmt_execute($stmt)) {
            $viesti = "Asiakas lisättiin.";
            $etunimi = '';  $sukunimi = '';
            $saika = '';  $puhelin = '';  $henkilotunnus = '';  $sahkoposti = '';  $ajokortti = '';  $osoite = '';
        } else {
            $virhe = "Tallennus epäonnistui.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <title>Lisää asiakas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Lisää asiakas</h1>
    <p><a href="../index.php">Takaisin etusivulle</a></p>

<?php if ($virhe != '') { ?><p class="viesti virhe"><?= htmlspecialchars($virhe) ?></p><?php } ?>
<?php if ($viesti != '') { ?><p class="viesti"><?= htmlspecialchars($viesti) ?></p><?php } ?>
<form method="post">
    <p><label>Etunimi:</label>
       <input type="text" name="etunimi" value="<?= htmlspecialchars($etunimi) ?>"></p>
    <p><label>Sukunimi:</label>
       <input type="text" name="sukunimi" value="<?= htmlspecialchars($sukunimi) ?>"></p>
    <p><label>Syntymäaika:</label>
       <input type="date" name="saika" value="<?= htmlspecialchars($saika) ?>"></p>
    <p><label>Puhelin:</label>
       <input type="text" name="puhelin" value="<?= htmlspecialchars($puhelin) ?>"></p>
    <p><label>Henkilötunnus:</label>
       <input type="text" name="henkilotunnus" maxlength="11" value="<?= htmlspecialchars($henkilotunnus) ?>"></p>
    <p><label>Sähköposti:</label>
       <input type="email" name="sahkoposti" value="<?= htmlspecialchars($sahkoposti) ?>"></p>
    <p><label>Ajokortti:</label>
       <input type="text" name="ajokortti" value="<?= htmlspecialchars($ajokortti) ?>"></p>
    <p><label>Osoite:</label>
       <input type="text" name="osoite" value="<?= htmlspecialchars($osoite) ?>"></p>
    <input type="submit" value="Lisää asiakas">
</form>
</body>
</html>
