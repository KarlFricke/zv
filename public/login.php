<?php
// Stelle die Verbindung zur Datenbank her
$dbHost = 'localhost';
$dbName = 'ucp_eventmanagement';
$dbUser = 'root';
$dbPass = '';

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Fehler bei der Verbindung zur Datenbank: " . $e->getMessage());
}

// Überprüfe die eingegebenen Anmeldeinformationen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Datenbankabfrage anpassen
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password); // ACHTUNG: Das Passwort sollte gehasht und nicht im Klartext gespeichert sein!
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        session_start();
        $_SESSION['username'] = $user['username'];
        $response = array('success' => true);
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'message' => 'Ungültige Anmeldeinformationen');
        echo json_encode($response);
    }
}
?>
