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
<div class="overlay" id="successOverlay"></div>
    <header>
    <nav>
    <ul>
      <li><a class="username"><?php echo $_SESSION['username']; ?></a></li>
      <li><a href="logout.php" class="logout">Abmelden</a></li>
    </ul>
  </nav>
    </header>

    <main>
        <h1>Willkommen zur UCP - Event Management</h1>
        <p>Hier können Sie Ihre UCP-Inhalte anzeigen und bearbeiten.</p>
    </main>

    <footer>
        <!-- Footer-Inhalt hier -->
    </footer>
    <script>
  // Annahme: Die Anmeldung war erfolgreich
var loginSuccess = true;

if (loginSuccess) {
  var successOverlay = document.getElementById("successOverlay");
  successOverlay.style.display = "block";

  // Fade-In-Effekt
  successOverlay.style.opacity = 0;
  var fadeInInterval = setInterval(function() {
    if (successOverlay.style.opacity < 1) {
      successOverlay.style.opacity = parseFloat(successOverlay.style.opacity) + 0.1;
    } else {
      clearInterval(fadeInInterval);
    }
  }, 20); // Verkürzt auf 50 Millisekunden

  // Nach 0,5 Sekunden den Fade-Out-Effekt starten
  setTimeout(function() {
    // Fade-Out-Effekt
    var fadeOutInterval = setInterval(function() {
      if (successOverlay.style.opacity > 0) {
        successOverlay.style.opacity = parseFloat(successOverlay.style.opacity) - 0.1;
      } else {
        clearInterval(fadeOutInterval);
        successOverlay.style.display = "none";
      }
    }, 20); // Verkürzt auf 50 Millisekunden
  }, 200); // Verkürzt auf 500 Millisekunden
}

    </script>
</body>
</html>
