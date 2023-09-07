<?php

session_start();

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

// get email client
$email = isset($_GET['Filtre']) ? $_GET['Filtre'] : '';

$_SESSION['email'] = $email;

// Query to retrieve data
$sql = "SELECT clients.id AS client_id, voitures.id AS voiture_id, rdv.id AS rdv_id, clients.nom, clients.adresse, rdv.date_reservation, CONCAT(voitures.marque, ' ', voitures.modele) AS voiture
        FROM rdv 
        JOIN clients ON clients.id = rdv.client_id
        JOIN voitures ON voitures.id = rdv.voiture_id
        WHERE clients.email = ?";

$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data as a table
    echo '<script src="../js/update_delete.js"></script>
    <table>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Date de réservation</th>
                <th>Voiture</th>
                <th>Actions</th>
            </tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["nom"] . '</td>';
        echo '<td>' . $row["adresse"] . '</td>';
        echo '<td>' . $row["date_reservation"] . '</td>';
        echo '<td>' . $row["voiture"] . '</td>';
        echo '<td>
                <button onclick="modifyRow(' . $row["rdv_id"] . ')">Modifier</button>
                <button onclick="deleteRow(' . $row["rdv_id"] . ')">Supprimer</button>
            </td>';
        echo '<input type="hidden" id="voiture_id_' . $row["rdv_id"] . '" value="' . $row["voiture_id"] . '">';
        echo '<input type="hidden" id="date_reservation_id_' . $row["rdv_id"] . '" value="' . $row["date_reservation"] . '">';
        echo '<input type="hidden" id="email' . '" value="' . $email . '">';
        echo '</tr>';
    }
    echo '</table>';
    echo '<br>';
    echo '<button onclick="goBack()">Revenir à la page précédente</button>';
    echo '<script>function goBack() { window.history.back(); }</script>';
} else {
    if (isset($_POST['id'])) {
        // Une modification a été effectuée
        echo "Data.";
    } else {
        echo "Aucun Rendez-Vous.";
        echo '<br>';
        echo '<button onclick="goBack()">Revenir à la page précédente</button>';
        echo '<script>function goBack() { window.history.back(); }</script>';

    }
}

$stmt->close();
$connection->close();
?>

<script src="../js/update_delete.js"></script>