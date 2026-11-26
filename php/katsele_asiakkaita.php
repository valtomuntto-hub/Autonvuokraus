<?php
require_once('db.php');
$sql = "SELECT * FROM asiakkaat ORDER BY sukunimi";
$tulos = mysqli_query($yhteys, $sql);
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <title>Katsele asiakkaita</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Asiakkaat</h1>
    <p><a href="../index.php">Takaisin etusivulle</a></p>
<table>
    <tr>
    <th>Nimi</th>
    <th>Syntymäaika</th>
    <th>Osoite</th>
    <th>Puhelin</th>
    <th>Sähköposti</th>
</tr>

<?php while ($rivi = mysqli_fetch_assoc($tulos)) { ?>
    <tr>
        <td><?= htmlspecialchars($rivi["etunimi"] . " " . $rivi["sukunimi"]) ?></td>
        <td><?= date('d.m.Y', strtotime($rivi["saika"])) ?></td>
        <td><?= htmlspecialchars($rivi["osoite"]) ?></td>
        <td><?= htmlspecialchars($rivi["puhelin"]) ?></td>
        <td><?= htmlspecialchars($rivi["sahkoposti"]) ?></td>
    </tr>
<?php } ?>
</table>
</body>
</html>