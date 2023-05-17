<!DOCTYPE html>
<html>
<head>
    <title>UCP - Registrierung</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <!-- Header-Inhalt hier -->
    </header>

    <main>
        <center>
        <h1>Registrierung</h1>
        <?php
        // Verbindung zur Datenbank herstellen
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ucp_eventmanagement";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
        }

        // Registrierungsformular verarbeiten
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Überprüfen, ob der Benutzername oder die E-Mail bereits vorhanden sind
            $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $checkResult = $conn->query($checkQuery);

            if ($checkResult->num_rows > 0) {
                echo "Benutzername oder E-Mail sind bereits registriert.";
            } else {
                // Neuen Benutzer in die Datenbank eintragen
                $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
                if ($conn->query($insertQuery) === TRUE) {
                    echo "Registrierung erfolgreich.";
                } else {
                    echo "Fehler beim Eintragen des Benutzers: " . $conn->error;
                }
            }
        }

        $conn->close();
        ?>
        <form action="register.php" method="post">
            <label for="username">Benutzername:</label>
            <input type="text" name="username" required>

            <label for="email">E-Mail:</label>
            <input type="email" name="email" required>

            <label for="password">Passwort:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Registrieren">
        </form>

        <p>Bereits registriert? <a href="index.php">Hier anmelden</a></p>
    </center>
    </main>

    <footer>
        <!-- Footer-Inhalt hier -->
    </footer>
</body>
</html>
