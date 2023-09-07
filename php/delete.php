<?php


session_start();



// Connexion à la base de données
$servername = "bf2229608-001.eu.clouddb.ovh.net:35609";
$username = "Garage_Admin";
$password = "GroupeAdmin80";
$database = "db_garage";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Vérification de la connexion
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


// Récupérer l'email depuis l'URL
$email = $_SESSION['email'];

// Vérification des variables POST
if (isset($_POST['id'])) {
    // Récupérer l'identifiant de rendez-vous à supprimer
    $rdv_id = $_POST['id'];

    // Requête SELECT pour vérifier la correspondance de l'identifiant de rendez-vous
    $select_sql = "SELECT * FROM rdv WHERE id = ?";
    $select_stmt = $connection->prepare($select_sql);
    $select_stmt->bind_param("i", $rdv_id);
    $select_stmt->execute();
    $result = $select_stmt->get_result();

    if ($result->num_rows === 0) {
        die("Aucun résultat trouvé pour l'identifiant de rendez-vous : " . $rdv_id);
    }

    $select_stmt->close();

    // Affichage des valeurs pour débogage
    echo "Rdv ID: " . $rdv_id . "<br>";

    // Récupérer l'identifiant de la voiture associée au rendez-vous
    $select_car_sql = "SELECT voiture_id FROM rdv WHERE id = ?";
    $select_car_stmt = $connection->prepare($select_car_sql);
    $select_car_stmt->bind_param("i", $rdv_id);
    $select_car_stmt->execute();
    $car_result = $select_car_stmt->get_result();

    if ($car_result->num_rows === 0) {
        die("Aucune voiture associée à l'identifiant de rendez-vous : " . $rdv_id);
    }

    $car_row = $car_result->fetch_assoc();
    $voiture_id = $car_row['voiture_id'];

    $select_car_stmt->close();

    // Mettre la voiture à dispo = 1 dans la table voitures
    $update_car_sql = "UPDATE voitures SET dispo = 1 WHERE id = ?";
    $update_car_stmt = $connection->prepare($update_car_sql);
    $update_car_stmt->bind_param("i", $voiture_id);

    if ($update_car_stmt->execute() === false) {
        die("Erreur lors de la mise à jour de la disponibilité de la voiture : " . $update_car_stmt->error);
    }

    $update_car_stmt->close();

    // Requête de suppression
    $sql_delete = "DELETE FROM rdv WHERE id = ?";
    $stmt_delete = $connection->prepare($sql_delete);
    $stmt_delete->bind_param("i", $rdv_id);

    if ($stmt_delete->execute() === false) {
        die("Erreur lors de la suppression du rendez-vous : " . $stmt_delete->error);
    }

    $stmt_delete->close();

    echo "Suppression effectuée avec succès.";
}

$connection->close();

// Assurez-vous qu'aucun contenu HTML n'est envoyé avant la redirection
ob_end_clean();

// Rediriger vers la page précédente
header("Location: ../php/update_bdd.php?Filtre=" . urlencode($email));
exit();
?>