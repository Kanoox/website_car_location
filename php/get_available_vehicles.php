<?php
// Connexion à la base de données
$servername = "bf2229608-001.eu.clouddb.ovh.net:35609";
$username = "Garage_Admin";
$password = "GroupeAdmin80";
$database = "db_garage";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Requête pour récupérer les véhicules disponibles
$sql = "SELECT id, marque, modele, couleur FROM voitures WHERE dispo = 1";
$result = $connection->query($sql);

$vehicles = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vehicle = array(
            'id' => $row['id'],
            'marque' => $row['marque'],
            'modele' => $row['modele'],
            'couleur' => $row['couleur'],
        );
        $vehicles[] = $vehicle;
    }
}

$connection->close();

// Renvoyer les données au format JSON
header('Content-Type: application/json');
echo json_encode($vehicles);
?>