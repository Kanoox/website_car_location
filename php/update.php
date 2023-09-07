<?php

session_start();
ob_start();

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

// Récupérer les données du formulaire
$id = $_POST['id'];
$voiture = $_POST['voiture'];
$date_reservation = $_POST['date_reservation'];

// Récupérer l'email depuis l'URL
$email = $_SESSION['email'];

// Désactiver l'ancien véhicule
$disable_sql = "UPDATE voitures SET dispo = 1 WHERE id = (
    SELECT voiture_id FROM rdv WHERE id = ?
)";
$disable_stmt = $connection->prepare($disable_sql);
$disable_stmt->bind_param("i", $id);
$disable_stmt->execute();
$disable_stmt->close();

// Mettre à jour les données
$update_sql = "UPDATE rdv SET voiture_id = ?, date_reservation = ? WHERE id = ?";
$update_stmt = $connection->prepare($update_sql);
$update_stmt->bind_param("iss", $voiture, $date_reservation, $id);
$update_stmt->execute();
$rows_affected = $update_stmt->affected_rows;
$update_stmt->close();

// Mettre la disponibilité de la nouvelle voiture à 0
$disable_new_car_sql = "UPDATE voitures SET dispo = 0 WHERE id = ?";
$disable_new_car_stmt = $connection->prepare($disable_new_car_sql);
$disable_new_car_stmt->bind_param("i", $voiture);
$disable_new_car_stmt->execute();
$disable_new_car_stmt->close();

// Requête pour récupérer les données mises à jour
$select_sql = "SELECT clients.id AS client_id, voitures.id AS voiture_id, rdv.id AS rdv_id, clients.nom, clients.adresse, rdv.date_reservation, CONCAT(voitures.marque, ' ', voitures.modele) AS voiture
        FROM rdv 
        JOIN clients ON clients.id = rdv.client_id
        JOIN voitures ON voitures.id = rdv.voiture_id
        WHERE rdv.id = ?";
$select_stmt = $connection->prepare($select_sql);
$select_stmt->bind_param("i", $id);
$select_stmt->execute();
$result = $select_stmt->get_result();
$results = $result->fetch_assoc();
$select_stmt->close();

// Vérifier si une ligne a été mise à jour avec succès et si des résultats ont été obtenus
if ($rows_affected > 0 && $results !== null) {
    // ...
    echo "Data Inserted and modified.";
} else {
    echo "Data Not Inserted.";
}


// Assurez-vous qu'aucun contenu HTML n'est envoyé avant la redirection
ob_end_clean();

// Rediriger vers la page précédente
header("Location: ../php/update_bdd.php?Filtre=" . urlencode($email));
exit();
?>