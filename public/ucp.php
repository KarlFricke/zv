<?php
session_start();

// Überprüfen, ob der Benutzer angemeldet ist
if (!isset($_SESSION['username'])) {
    // Benutzer ist nicht angemeldet, zur Anmeldeseite weiterleiten
    header("Location: index.php");
    exit();
}

// Benutzer ist angemeldet, UCP-Seite anzeigen
?>

<!DOCTYPE html>
<html>
<head>
    <title>UCP - Event Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <!-- Header-Inhalt hier -->
    </header>

    <main>
        <h1>Willkommen zur UCP - Event Management</h1>
        <p>Hier können Sie Ihre UCP-Inhalte anzeigen und bearbeiten.</p>
    </main>

    <footer>
        <!-- Footer-Inhalt hier -->
    </footer>
</body>
</html>
