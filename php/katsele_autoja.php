<?php
require_once('db.php');
$sql = "SELECT * FROM autot";
$tulos = mysqli_query($yhteys, $sql);
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <title>Katsele autoja</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Autot</h1>
    <p><a href="../index.php">Takaisin etusivulle</a></p>

<table>
    <tr>
        <th>Kuva</th>
        <th>Rekisterinumero</th>
        <th>Merkki</th>
        <th>Malli</th>
        <th>Vuosimalli</th>
        <th>Hinta</th>
        <th>Vaihteisto</th>
        <th>Tyyppi</th>
        <th>Käyttövoima</th>
        <th>Korimalli</th>
        <th>Vapaana</th>
    </tr>

<?php while ($rivi = mysqli_fetch_assoc($tulos)) { ?>
    <tr>
        <td><img src="../images/<?= htmlspecialchars($rivi["malli"]) ?>.png" width="100"></td>
        <td><?= htmlspecialchars($rivi["rekisterinumero"]) ?></td>
        <td><?= htmlspecialchars($rivi["merkki"]) ?></td>
        <td><?= htmlspecialchars($rivi["malli"]) ?></td>
        <td><?= htmlspecialchars($rivi["vuosimalli"]) ?></td>
        <td><?= htmlspecialchars($rivi["hinta"]) ?> €/vrk</td>
        <td><?= htmlspecialchars($rivi["vaihteisto"]) ?></td>
        <td><?= htmlspecialchars($rivi["tyyppi"]) ?></td>
        <td><?= htmlspecialchars($rivi["kayttovoima"]) ?></td>
        <td><?= htmlspecialchars($rivi["korimalli"]) ?></td>
        <td><?= htmlspecialchars($rivi["onkovapaa"] ? "Kyllä" : "Ei") ?></td>
    </tr>
<?php } ?>
</table>
</body>
</html>
