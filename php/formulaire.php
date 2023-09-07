<?php
// Database configuration
$servername = "bf2229608-001.eu.clouddb.ovh.net:35609";
$username = "Garage_Admin";
$password = "GroupeAdmin80";
$database = "db_garage";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$appointmentDate = $_POST['appointment-date'];
$vehicleCategory = $_POST['vehicle-category'];
$vehicleId = $_POST['vehicle-id'];

// Start a transaction
$conn->begin_transaction();

try {
    // Check if the email already exists in the 'clients' table
    $emailExistsQuery = "SELECT id FROM clients WHERE email = '$email'";
    $emailExistsResult = $conn->query($emailExistsQuery);

    if ($emailExistsResult && $emailExistsResult->num_rows > 0) {
        // Email already exists, no need to create a new row
        $row = $emailExistsResult->fetch_assoc();
        $clientId = $row['id'];
    } else {
        // Email does not exist, insert data into 'clients' table
        $insertClientQuery = "INSERT INTO clients (nom, email, telephone, adresse) VALUES ('$name', '$email', '$phone', '$address')";
        $conn->query($insertClientQuery);

        // Check if the insert was successful
        if ($conn->affected_rows > 0) {
            $clientId = $conn->insert_id;
        } else {
            throw new Exception("Error inserting data into 'clients' table.");
        }
    }

    // Insert data into 'rdv' table
    $insertRdvQuery = "INSERT INTO rdv (client_id, voiture_id, date_reservation) VALUES ('$clientId', '$vehicleId', '$appointmentDate')";
    $conn->query($insertRdvQuery);

    // Check if the insert was successful
    if ($conn->affected_rows > 0) {
        // Update 'voitures' table
        $updateVoituresQuery = "UPDATE voitures SET dispo = 0 WHERE id = '$vehicleId'";
        $conn->query($updateVoituresQuery);

        // Check if the update was successful
        if ($conn->affected_rows > 0) {
            // Commit the transaction
            $conn->commit();
            echo "Réservation complétée - Data inserted successfully!";
            echo '<br>';
            echo '<button onclick="goBack()">Revenir à la page précédente</button>';
            echo '<script>function goBack() { window.history.back(); }</script>';

        } else {
            throw new Exception("Error updating 'voitures' table.");
        }
    } else {
        throw new Exception("Error inserting data into 'rdv' table.");
    }
} catch (Exception $e) {
    // Rollback the transaction
    $conn->rollback();
    echo "Transaction failed: " . $e->getMessage();
    echo '<br>';
    echo '<button onclick="goBack()">Revenir à la page précédente</button>';
    echo '<script>function goBack() { window.history.back(); }</script>';
}

// Close connection
$conn->close();
?>