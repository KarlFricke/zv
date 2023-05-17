<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Überprüfe, ob der Benutzername und das Passwort übereinstimmen
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $response = array('success' => true);
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'message' => 'Ungültige Anmeldeinformationen');
        echo json_encode($response);
    }
} else {
    // Falls die Anfrage keine POST-Anfrage ist, gebe einen Fehler zurück
    $response = array('success' => false, 'message' => 'Ungültige Anfrage');
    echo json_encode($response);
}
?>
