<!DOCTYPE html>
<html>
<head>
    <title>UCP - Anmeldung</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <!-- Header-Inhalt hier -->
    </header>

    <main>
        <center>
        <h1>UCP - Anmeldung</h1>
        <form id="loginForm" action="ucp.php" method="post">
                <label for="username">Benutzername:</label>
                    <input type="text" id="username" name="username" required>

                <label for="password">Passwort:</label>
                    <input type="password" id="password" name="password" required>

            <input type="submit" value="Anmelden">
        </form>

        <p>Noch kein Konto? <a href="register.php">Jetzt registrieren</a></p>
        <div id="errorDiv"></div>
</center>
    </main>

    <footer>
        <!-- Footer-Inhalt hier -->
    </footer>
</body>
</html>
