<?php
$dbHost = 'localhost';  // Datenbank-Host
$dbName = 'ucp_eventmanagement';  // Datenbank-Name
$dbUser = 'root';  // Datenbank-Benutzername
$dbPass = '';  // Datenbank-Passwort

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    echo "Verbindung zur Datenbank erfolgreich hergestellt!";
} catch(PDOException $e) {
    die("Fehler bei der Verbindung zur Datenbank: " . $e->getMessage());
}
?>
