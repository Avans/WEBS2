<?php
/**
 * CREATE TABLE WSPHP_GEBRUIKERS (
 *     geb_id INT AUTO_INCREMENT PRIMARY KEY,
 *     geb_voornaam VARCHAR(20),
 *     geb_achternaam VARCHAR(40)
 * )
 * INSERT INTO WSPHP_GEBRUIKERS (geb_voornaam, geb_achternaam) VALUES ("Annie", "Aa");
 * INSERT INTO WSPHP_GEBRUIKERS (geb_voornaam, geb_achternaam) VALUES ("Bobby", "Bee");
 * INSERT INTO WSPHP_GEBRUIKERS (geb_voornaam, geb_achternaam) VALUES ("Charlie", "Cee");
 */

// Create a credentials.php return an array with host, username and password
$credentials = require __DIR__ . DIRECTORY_SEPARATOR . 'credentials.php';
$conn = new mysqli($credentials['host'], $credentials['username'], $credentials['password']);
if ($conn->connect_errno != 0) {
    die("Probleem bij het leggen van connectie");
}
print "Connectie met db server gemaakt.";
if ($conn->select_db('hameijer_db') === false) {
    die("Probleem bij selecteren van de database");
}
print '<br />' . "Database geselecteerd.";

$query = "SELECT geb_voornaam, geb_achternaam FROM WSPHP_GEBRUIKERS";
$result = $conn->query($query);
print '<br />' . 'Gebruikers presenteren via array:';
while ($row = $result->fetch_array(MYSQLI_ASSOC))
{
    echo '<br />' . $row["geb_voornaam"] . ' ' . $row["geb_achternaam"];
}

$result->data_seek(0);
print '<br />' . '<br />' . 'Gebruikers presenteren via objecten:';
while ($row = $result->fetch_object())
{
    echo '<br />' . $row->geb_voornaam . ' ' . $row->geb_achternaam;
}

print '<br /><br />Gebruikersaantal via 1 resultaat:';
print '<br />' . 'Aantal gebruikers = ' . $result->num_rows;

$result->close();
$conn->close();
