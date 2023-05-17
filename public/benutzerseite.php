<!DOCTYPE html>
<html>
<head>
    <title>UCP - Benutzerprofil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <!-- Header-Inhalt hier -->
    </header>

    <main>
        <h1>Benutzerprofil</h1>

        <?php
        // Überprüfen, ob der Benutzer angemeldet ist
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<p>Angemeldeter Benutzer: $username</p>";
        } else {
            // Weiterleitung zur Anmeldeseite
            header("Location: login.php");
            exit();
        }
        ?>

        <!-- UCP-Inhalte hier -->

    </main>

    <footer>
        <!-- Footer-Inhalt hier -->
    </footer>
</body>
</html>