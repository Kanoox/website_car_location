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

// Query to retrieve data
$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . ", Name: " . $row["nom"] . ", Email: " . $row["email"] .", telephone: " . $row["telephone"] .", adresse: " . $row["adresse"] . "<br>";
        // Customize the output based on your table structure
    }
} else {
    echo "No results found.";
}

// Close connection
$conn->close();
?>
