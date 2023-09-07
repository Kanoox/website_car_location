<?php
// Connexion à la base de données
$servername = "bf2229608-001.eu.clouddb.ovh.net:35609";
$username = "Garage_Admin";
$password = "GroupeAdmin80";
$database = "db_garage";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


// Récupération de la catégorie de véhicule sélectionnée depuis la requête AJAX
$vehicleCategory = $_POST['vehicle-category'];

// Exécution de la requête SQL pour récupérer les modèles correspondants à la catégorie de véhicule
$query = "SELECT id,marque, modele, annee, couleur FROM voitures WHERE dispo = 1 AND classe = '$vehicleCategory'";
$result = mysqli_query($connection, $query);

// Création d'un tableau pour stocker les modèles
$models = array();

// Parcours des résultats et ajout des modèles au tableau
while ($row = mysqli_fetch_assoc($result)) {
    $modelData = array(
        'id' => $row['id'],
        'marque' => $row['marque'],
        'modele' => $row['modele'],
        'annee' => $row['annee'],
        'couleur' => $row['couleur']
    );
    $models[] = $modelData;
}

// Fermeture de la connexion à la base de données
$connection->close();

// Envoi des résultats au format JSON
echo json_encode($models);
?>
