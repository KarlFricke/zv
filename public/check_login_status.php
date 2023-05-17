<?php
session_start();

// Überprüfen, ob der Benutzer angemeldet ist
if (isset($_SESSION['username'])) {
    // Benutzer ist angemeldet, Erfolgsantwort senden
    $response = [
        'success' => true,
        'message' => 'Benutzer ist angemeldet.',
        'username' => $_SESSION['username']
    ];
} else {
    // Benutzer ist nicht angemeldet, Fehlerantwort senden
    $response = [
        'success' => false,
        'message' => 'Benutzer ist nicht angemeldet.'
    ];
}

// Antwort als JSON zurückgeben
header('Content-Type: application/json');
echo json_encode($response);
?>
